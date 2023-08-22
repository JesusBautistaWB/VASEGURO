<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title> VASEGURO</title>
  <script type="text/javascript" src="js/securityMed.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      
    
      
</head>
  
<body>
    <div class="header">
  
    <center>         
      
     <?php  
   include("../functions/phpfunctions.php");
    menuMed("REVISAR SOLICITUDES");
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100"  style="background:#6992EA;">
               
 
                <div class="col-3">
          <label>
          <input  class="ace" name="idUsuario" id="idUsuario" readonly> 
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
        <div class="col-3">
           <label>
               <input class="ace" id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>

      </div>

      <div class="col-3">
      
              <label>
          <input class="ace" placeholder="<?php $fechaActual = date('Y-m-d'); echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      </div>

      <div class="col-1">
      
              <label>
          <input class="ace" value="<?php $foAcc = $_GET['foAcc']; echo $foAcc; ?>" name="foAcc" id="foAcc"  readonly>
       
          </label>
      </div>

      <script>
                      function busquedaSA(){

var estatus = $('#estatusSA option:selected').text();


var fo ="<?php echo $_REQUEST['foAcc']; ?>";


$.ajax({

url: '../functions/filtroSAMFo.php',
type: 'POST',
data: {estatus:estatus, fo:fo},
success:function(data){
  
  $('#adminTable').show(); 
  $('#adminTable').html(data);
   
  
  
}
});

}
   
                </script>

                

              
      <div class="col-1" style="background: white;">
                <span class="accdet"> FILTRO DE BUSQUEDA:</span>
               <label> 
               
               <select id="estatusSA" name="estatusSA" onchange="busquedaSA()">
               <?php 
               
                        $conexion = con();
                        $esta = "SELECT DISTINCT estadoSolicitud FROM vasegurobd.tab_serviciosadicionales ";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>SELECCIONE UNA CATEGORIA</option>
                         <option>TODOS</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option value=".$milista['estadoSolicitud'].">".$milista['estadoSolicitud']."</option>";
                                     }
   
                                        ?>
      </select></label>
                </div>
         

                <div class="col-2">
      
      <label> <input readonly style="background:  #05769d; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoSOL()" >

  </label>
</div>

<div class="col-2">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #05769d; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoSOL()">



  </label>
</div>
      


       <div id="div1">
       
	<table border="1" id="adminTable" name="adminTable">
   
        <tr>
        <thead>
       <td>Folio Accidente</td>
       <td>Concepto</td>
       <td>Costo</td>
       <td>Comentario de Solicitante</td>
       <td>Estatus</td>
       <td>Solicitante</td>
       <td>Medico Revisor</td>
       <td>FECHA SOLICITUD</td>
       <td>FECHA RESPUESTA</td>
       <td>REVISAR SOLICITUD</td>
       <td>DATOS</td>
       
     
       
       </thead>
   </tr>

    <?php
$folio = $_GET['foAcc'];

		$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes ACC 
        WHERE SA.folioAccidenteServicio = ACC.FolioAccidente
        AND SA.folioAccidenteServicio = '$folio'
        AND ACC.FolioAccidente = '$folio'
         ORDER BY fechaSolicitud DESC";
       

       

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr>
           
            <td><b><?php echo $mostrar['folioAccidenteServicio'] ?></b></td> 
            <td><?php echo $mostrar['conceptoServicio'] ?></td>
           


            <td class=<?php
            
        if ($mostrar['costoServicio'] < 50000 ){
            echo 'pen';
        }

        elseif ($mostrar['costoServicio'] >= 50000 AND $mostrar['costoServicio'] < 100000){
            echo 'enhos';
        }
        
        elseif ($mostrar['costoServicio'] >= 100000){
            echo 'rec';
        }
        
            
            
            ?>
            
            
            ><b><?php echo "$".$mostrar['costoServicio'] ?></b></td>






            <td><?php echo $mostrar['comentarioAcc'] ?></td>


            <td class=<?php
            
            if ($mostrar['estadoSolicitud'] == 'APROBADA' ){
                echo 'ace';
            }
    
            else {
                echo 'rec';
            }
            
           
                
                
                ?>><?php echo $mostrar['estadoSolicitud'] ?></td>
           
			
			<td><b><?php echo $mostrar['hospitalOrigen'] ?></b></td>
            <td><b><?php echo $mostrar['medicoRevisor'] ?></b></td>


     <?php diasTardanza($mostrar['fechaSolicitud'], $mostrar['estadoSolicitud'], $mostrar['fechaRespuesta'] ); ?> 


<?php
if ($mostrar['fechaRespuesta'] == ''){
    echo '<td class="dup"> <b> EN ESPERA </b> </td>';
}else{
    echo '<td> <b>'.$mostrar['fechaRespuesta'].'</b> </td>';  
}
?>


           
            
            <td><a href ="revisarSolicitud.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">

            <button style="width: 75; font-size: 10px; background: darkblue;">REVISAR</button></a></td>
           
           <?php
                        
if ($mostrar['estadoSolicitud'] == 'APROBADA'){
    if ($mostrar['estadoDatos'] == 'NO'){
    ?>

    <td><a href ="revisarSolicitudDatosMed.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
            <button style="width: 75; font-size: 10px; background: darkred;">COMPLETAR</button></a></td>
            <?php
    }else {
        ?>

        <td><a href ="revisarSolicitudDatosMed.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
                <button style="width: 75; font-size: 10px; background: darkblue;">EDITAR</button></a></td>
                <?php


        
    }
}else{
    ?>

<td>EN ESPERA DE AUTORIZACION</td>
<?php
}
?>

            	

</tr>

  <?php
      

}


?>  
		
           </table>
 
     

  </div>

  <div class="col-1">
  <table>
    <tr>
      <td>TOTAL AUTORIZADO (<?php echo $foAcc; ?>):</td>
      <?php montoAprobado($foAcc); ?>
    </tr>
</table>
</div>
  
  <div class='col-1'>


  <div id="div1">
   

    

 </div>
  </div>
        
          </div>
          </div>
    </div>
</body>
       
</html>
