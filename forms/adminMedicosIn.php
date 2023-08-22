<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>VASEGURO</title>

  <script type="text/javascript" src="js/securityMed.js"></script>
      <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
      
    
      
</head>
  
<body>
    <div class="header">
  
    <center>         
     
     <?php  
   include("../functions/phpfunctions.php");
    menuMed("PERFIL MEDICO");
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background:#6992EA;">
               
 
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
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white;"
value=" INGRESE EL FOLIO ESPECIFICO DEL ACCIDENTE CUYAS SOLICITUDES REQUIERA BUSCAR:">
  
  <input  placeholder="BUSQUEDA POR FOLIO" onkeyup="buscarFolioSM()" onchange="buscarFolioSM()"
  name="folioBus" id="folioBus" style="background: white; color: black; font-size: 12px">

  </label>
</div>
<script>
                      function busquedaSAFo(){

var estatus = $('#estatusSA option:selected').text();


$.ajax({

url: '../functions/filtroSAMFo.php',
type: 'POST',
data: {estatus:estatus},
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
               
               <select id="estatusSA" name="estatusSA" onchange="busquedaSAFo()">
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
         
      


       <div id="div1">
       
	<table border="1" id="adminTable" name="adminTable">
    <tr>
        <thead>
       <td colspan="9"><b> ACCIDENTES CON SOLICITUDES REGISTRADAS </b></td>
       
       
       </thead>
   </tr>
        <tr>
        <thead>
       <td>Folio </td>
       <td> Accidentado/a</td>
       <td>Hospital</td>
       <td>Monto Autorizado</td>
       <td>TIEMPO DESDE ULTIMA SOLICITUD</td>
       <td><b>COMPLETAR DATOS</b></td>
       <td>SOLICITAR</td>
       <td># Solicitudes</td>
       <td>Detalles Accidente</td>
     
       
       </thead>
   </tr>

    <?php

        $conexion = con();




		$sql="SELECT DISTINCT SA.folioAccidenteServicio, AC.montoAuSol, AC.ultimaFechaSolicitud,
        ACCI.PrimerApellidoA, ACCI.SegundoApellidoA, ACCI.NombreA, AC.idHospital, AC.idAcc, folioSiniestro
        FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes AC, vasegurobd.tb_accidentado ACCI  
        WHERE AC.FolioAccidente = SA.folioAccidenteServicio
        AND AC.FolioAccidentado = ACCI.FolioAccidentado
        ORDER BY fechaSolicitud DESC";
        
		$result=mysqli_query($conexion,$sql);





  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr>
           
            <td><b><?php echo $mostrar['folioAccidenteServicio'] ?></b></td> 
            <td  ><?php echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'] ?></td></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td></td>

           <?php montoAprobado($mostrar['folioAccidenteServicio']); ?>

           <?php 
           
           ultimaFecha($mostrar['folioAccidenteServicio']);
          
           
           ?>

            
    <td><a href ="adminMedicos.php?foAcc=<?php echo $mostrar['folioAccidenteServicio']; ?>"> 
            <button style="width: 115; font-size: 10px; background: darkblue;">1 REVISAR SOLICITUDES</button></a></td>
         <td><a href='solicitarServicioAdicionalMed.php?idAcc=<?php echo $mostrar['idAcc']; ?>'><button class='submitbtn' style='font-size: 10px'>2 SOLICITAR SERVICIO</button></a></td>
            
            <td><?php 
            $fa = $mostrar['folioAccidenteServicio'];
            numeroSolicitudes($fa); ?></td>
            <td><a href ="detallesAccidenteMed.php?idAcc=<?php echo $mostrar['idAcc']?>">
            VER
            </a></td>
            	
		</tr>

  <?php
      

}
mysqli_close($conexion);


?>  
		
           </table>
 
     

  </div>
  <div class="col-1">
  <table>
    <tr>
      <td>TOTAL AUTORIZADO:</td><td class="pen" style="font-size: 16px;"><?php montoAprobadoTotal(); ?></td>
    </tr>
</table>
</div>

  <div class="col-submit">
  
    <button class="submitbtn" id="btnPe"style="width: 300px;" onclick="accSolPen();">VER SOLO PENDIENTES</button>
  </div>

  <div class="col-submit">
  
  <button class="submitbtn" id="btnTo" style="width: 300px; display: none;" onclick='location.reload()'>VER TODOS</button>
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
