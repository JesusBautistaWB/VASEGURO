<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>VASEGURO</title>
  <script type="text/javascript" src="js/securityMedAux.js"></script>
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
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
        ";  ?> 
         <span style="
         font-family: fantasy;
         border: none;
  font-size: 30px;
  color:  #2C4A9A;
  line-height: 1.2;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 1px 2px #999;
  display: inline;
    margin: auto;" id="labelNOM" name="labelNOM" >
PERFIL ANALISTA DE SINIESTROS
    </span>
     <?php  
   include("../functions/phpfunctions.php");
    menuMedAux();
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100"  style="background:#985E6B;">
               
 
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
      <script>
                      function busquedaSA(){

var estatus = $('#estatusSA option:selected').text();

var fo ="<?php echo $_REQUEST['idAcc']; ?>";


$.ajax({

url: '../functions/filtroSAM.php',
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
               $foAcc = $_REQUEST['idAcc'];
                        $conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                        $conexion -> set_charset("utf8");
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

              
      


       <div id="div1">
       
	<table border="1" id="adminTable" name="adminTable">
    <tr>
        <thead>
       <td colspan="12" style="background: darkblue; color: white;"> SOLICITUDES RELACIONADAS AL ACCIDENTE CON FOLIO: <b>  <?php $foAcc = $_REQUEST['idAcc']; echo $foAcc; ?>  </b></td>
       
       
       </thead>
   </tr>
        <tr>
        <thead>
       <td>Folio Accidente</td>
       <td>Concepto</td>
       <td>Costo</td>
       <td>Comentario de Solicitante</td>
       <td>Estatus</td>
       <td>Hospital </td>
       <td>Medico Revisor</td>
       <td>FECHA SOLICITUD</td>
       <td>FECHA RESPUESTA</td>
     
       
    <td> ESTADO DATOS </td>
       <td><b>COMPLETAR DATOS</b></td>
     
       
       </thead>
   </tr>

    <?php



$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes ACC 
        WHERE SA.folioAccidenteServicio = ACC.FolioAccidente 
        AND SA.folioAccidenteServicio = '$foAcc'";

       

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
            <td><b><?php echo $mostrar['estadoSolicitud'] ?></b></td>
           
			
			<td><?php echo $mostrar['hospitalOrigen'] ?></td>
            <td><?php echo $mostrar['medicoRevisor'] ?></td>


           <td> <b> <?php echo $mostrar['fechaSolicitud'] ?> </b> </td> 


<?php
if ($mostrar['fechaRespuesta'] == ''){
    echo '<td class="rec">  EN ESPERA  </td>';
}else{
    echo '<td class="ace"> '.$mostrar['fechaRespuesta'].'</td>';  
}

if ($mostrar['estadoDatos'] == 'SI'){
    echo '<td class="ace">  COMPLETOS </td>';
}else{
    echo '<td class="rec">PENDIENTES</td>';  
}



            
if ($mostrar['estadoSolicitud'] == 'APROBADA'){
    if ($mostrar['estadoDatos'] == 'NO'){
    ?>

    <td><a href ="revisarSolicitudDatosAux.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
            <button style="width: 75; font-size: 10px; background: darkred;">COMPLETAR</button></a></td>
            <?php
    }else {
        ?>

        <td><a href ="revisarSolicitudDatosAux.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
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

  
  <div class='col-1'>
 
  <div id="div1">
   

    

 </div>
  </div>
        
          </div>
          </div>
    </div>
</body>
       
</html>
