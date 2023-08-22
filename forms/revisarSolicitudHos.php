<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administracion VASEGURO</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <style>
        .text {
  font-size:24px;
  font-family:helvetica;
  font-weight:bold;
  color: darkred;
  text-transform:uppercase;
}
.parpadea {
  
  animation-name: parpadeo;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {  
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}
      </style>

    
   <script type="text/javascript">     
        if((localStorage.getItem('sessionValue') == "")){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
        }
       
       function pregunta(){
    if (confirm('¿Confirmar?')){

      loading();
       document.arrHosForm.submit();
    }

}

function loading(){
    var Val = $('#file').val(); 
        if(Val=='') 
        { 
           

        } 
       else
         {
          document.getElementById('loading').style.display = 'inline'; 
         }

  

}
    </script>  
</head>

     
    
<body>
<div class="header">
  
  <center>         
     <?php 
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br> 
      <span class='titleHeader'>   REVISION DE SOLICITUD </span>";
 include("../functions/phpfunctions.php");
  menuHos();
  ?>
      
        
 </center>

  </div>

      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#6992EA;">

        
        
        <?php   
        $idAcc = $_GET['idAcc'];
        $idSA = $_GET['idSA'];


		$conexion = con();
		$sql1="SELECT idAcc,FolioAccidente,FolioAccidentado  FROM vasegurobd.tb_accidentes WHERE  idAcc = ".$idAcc."  LIMIT 0,1;";
          
          
		$result1=mysqli_query($conexion,$sql1);
		while($mostrar=mysqli_fetch_array($result1)){

		 ?>
        
      <form id="arrHosForm" action ="../functions/confirmarSolicitud.php" method="POST" enctype="multipart/form-data">   
      <div class="col-3">
          <label>
          <input   name="medico" id="medico" style="border:none; " readonly> 
          <script>
          document.getElementById("medico").value = localStorage.getItem('nombreUsuario');
          </script>
              </label>
              </div> 

      
      <div class="col-3">
          <label>
          <input   name="idSA" id="idSA" style="border:none;" value="<?php echo $idSA; ?>"  readonly> 
          
              </label>
              </div> 
<div><input type="hidden" name="foAcc" id="foAcc" value="<?php echo $mostrar['FolioAccidente']?>" ></div>
              <div class="col-3" >
      
              <label>
          <input name="fechaHoy" id="fechaHoy" style="border: none" value="<?php 
          date_default_timezone_set('America/Mexico_City');
  echo $fechaActual;
                               ?>"   readonly>
       
          </label>
      
      </div>






              <script>
    var palabra = $('#foAcc').val();
    var sa = $('#idSA').val();

    $.ajax({
    url: '../functions/filesTabSA.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#filestab').show();
      $('#filestab').html(data);        
    }
  });
    
    
    $.ajax({
    url: '../functions/diaTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#diatab').show();
      $('#diatab').html(data);        
    }
  });

  $.ajax({
    url: '../functions/proceTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#procetab').show();
      $('#procetab').html(data);        
    }
  });
          </script>

             <?php 
   
            }
            $fol ='';
            $conce ='';   
            $sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, autorizacion, subsecuencia,
           telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, hospitalesSugeridos, sintomas, regionRDCA, intensidadAccidente,
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, alcaldiaEscuela, ES.nombreEstatus,
             PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, enunciadoLes, dirEscRepor, conceptoServicio,
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc,
             comentarioAcc, folioSiniestro, comentarioMed, estadoSolicitud
            FROM  vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC, vasegurobd.tab_serviciosadicionales SA
            WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
             AND idAcc = ".$idAcc."  AND id_servicio = ".$idSA." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus 
             AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
      $fol =$mostrar['FolioAccidente'];
      $conce = $mostrar['conceptoServicio'];
             ?> 
                
                <div class='col-1'><span class='accdet'>CONCEPTO DEL SERVICIO:</span></div> 
               <center> <div class='col-1'><span  style='font-size: 50px; block: inline;'><?php echo $mostrar['conceptoServicio'] ?></span></div> </center>
               <div class='col-1'><span class='accdet'>COMENTARIO DE SOLICITUD:</span></div> 
               <center> <div class='col-1'><span  style='font-size: 15px; block: inline; color: darkgreen;'><?php echo $mostrar['comentarioAcc'] ?></span></div> </center>
               

            <div class="col-1"><label></label></div>
          
            <input type="hidden" name="conSo" id="conSo" value="<?php echo $mostrar['conceptoServicio']?>" style="display: none" >
          
          
        <div class='col-2' id="detallesAcc" >    
     <center><span class="textOption" style="text-align: left; margin-left: 20px">
     <?php echo   
        
        "<p style='margin-left: 20px'>
        <label style='font-size: 16px; color: darkblue;'><br><b>FOLIO DE ACCIDENTE: ".$mostrar['FolioAccidente'].
        "</b></label><br><b>Fecha de accidente:</b> ".$mostrar['fechaRepor'].
        "<br><b> Escuela: </b>  ".$mostrar['nombreEscuela'].
        "<br><b> Direccion Escuela: </b>  ".$mostrar['dirEscRepor'].
        "<br><b>Estabilidad del Accidentado:</b> ".$mostrar['estabilidad'].
        "<br><b> SINIESTRO: </b>  ".$mostrar['folioSiniestro']."</p>";
        ?>
            </span></center> </div>
              
          <div class='col-2' id="detallesAcc2" >  
         <center><span class="textOption"  style="text-align: left; margin-left: 20px"><?php echo 
        
        "<p style='margin-left: 20px'>
        <br><b> Tipo de Accidente:</b> ".$mostrar['idTipoDeAccidente'].
        
        "</acc><br><b> Fecha y hora del Accidente:</b> ".$mostrar['fechaHoraAccidente'].
        
        "
        <br><b>
        PERSONA ACCIDENTADA:</b><u>".$mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'].
        "</u><br><b>GRADO ESCOLAR: </b>".$mostrar['GradoEscolarA'].         
        " <br><b>PROCEDENCIA: </b> ".$mostrar['estado'].
        "<br> <b>FECHA DE NACIMIENTO: </b> ".$mostrar['FechaNacimientoA'].
        
        
        "</p>";
        
          
          ?></span></center></div>  

<div class="col-1"><label><br></label></div>



    
        
      
<div class="col-1"> <span class="textSectionRED"><center>DIAGNOSTICOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="diatab"></table>
  
  </div> 
  <div class="col-1"> <span class="textSectionNEW"><center>PROCEDIMIENTOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="procetab"></table>
  
  </div> 
  <div class="col-1"> <span class="textSection"><center>ARCHIVOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="filestab"></table>
  
  </div>

 
<?php 
     
        } 
        
         ?>
    
    <div class="col-1" style="border: solid black;" id="mensajesBox"><?php chatMed($idSA, "S"); ?></div>
    
<div class="col-1" ><label><br></label></div>
  
     
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>

 