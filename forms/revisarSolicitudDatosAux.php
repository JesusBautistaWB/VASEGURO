<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administracion VASEGURO</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/securityMedAux.js"></script>
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
  menuMedAux();
  ?>
      
        
 </center>

  </div>

      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#985E6B;">

        
        
        <?php   
        $idAcc = $_GET['idAcc'];
        $idSA = $_GET['idSA'];
		$conexion = con();
      
		$sql1="SELECT idAcc,FolioAccidente,FolioAccidentado  FROM vasegurobd.tb_accidentes WHERE  idAcc = ".$idAcc."  LIMIT 0,1;";
          
          
		$result1=mysqli_query($conexion,$sql1);
		while($mostrar=mysqli_fetch_array($result1)){

		 ?>
        
      <form id="arrHosForm" action ="../functions/llenarDatosSolicitud.php" method="POST" enctype="multipart/form-data">   
      <div class="col-3">
          <label>
          <input   name="medico" id="medico" style="border:none; " readonly> 
          <script>
          document.getElementById("medico").value = localStorage.getItem('nombreUsuario');
          </script>
              </label>
              </div> 
              <input type="hidden" name="foAcc" id="foAcc" value="<?php echo $mostrar['FolioAccidente']?>" >
      
      <div class="col-3">
          <label>
          <input   name="idSA" id="idSA" style="border:none;" value="<?php echo $idSA; ?>"  readonly> 
          
              </label>
              </div> 

              <div class="col-3" >
      
              <label>
          <input name="fechaHoy" id="fechaHoy" style="border: none" value="<?php 
          date_default_timezone_set('America/Mexico_City');
          $fechaActual = date('Y-m-d');
  echo $fechaActual;
                               ?>"   readonly>
       
          </label>
      
      </div>






              <script>
    var palabra = $('#idSA').val();


  
    var palabra = $('#foAcc').val();

    $.ajax({
    url: '../functions/filesTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#filestab').show();
      $('#filestab').html(data);        
    }
  });
    
    $.ajax({
    url: '../functions/diaTabSA.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#diatab').show();
      $('#diatab').html(data);        
    }
  });

  $.ajax({
    url: '../functions/proceTabSA.php',
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
            $sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, costoServicio,
           telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, hospitalesSugeridos, sintomas, regionRDCA, intensidadAccidente,
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, alcaldiaEscuela, ES.nombreEstatus,
             PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, enunciadoLes, dirEscRepor, conceptoServicio, idHospital,
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc, comentarioAcc, folioSiniestro
            FROM  vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC, vasegurobd.tab_serviciosadicionales SA
            WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
             AND ACCT.idAcc = ".$idAcc."  AND id_servicio = ".$idSA." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus 
             AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
      $fol =$mostrar['FolioAccidente'];
      $conce = $mostrar['conceptoServicio'];
             ?> 
                
                <div class='col-3'><span class='accdet'>CONCEPTO DEL SERVICIO:</span><br>
               <center> <span  style='font-size: 30px; block: inline; color: darkgreen;'><?php echo $mostrar['conceptoServicio'] ?></span></div> </center>
               <div class='col-3'><span class='accdet'>COMENTARIO DE SOLICITUD:
                 <br>
               </span><span  style='font-size: 15px; block: inline; color: darkgreen;'><center>
               <?php echo strtoupper($mostrar['comentarioAcc']); ?></center>
              </span></div> 
              <div class='col-3'><span  style='font-size: 15px; block: inline; color: darkgreen;'> COSTO $:<br>
               
              </span>
            <input type="number" id="costo" name="costo" value="<?php echo $mostrar['costoServicio']; ?>">
            </div> 
              </center>
               
              <input type="hidden" name="foAcc" id="foAcc" value="<?php echo $mostrar['FolioAccidente']?>" >
            <div class="col-1"><label></label></div>
            <div class="col-1"> <span class="textSection"><center>ARCHIVOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="filestab"></table>
  
  </div>
            <div class="col-1" >
<span class="textSection">AGREGAR ARCHIVOS:</span>
</div>
<?php archivosPorTipoSA(); ?>
          
            <input type="hidden" name="conSo" id="conSo" value="<?php echo $mostrar['conceptoServicio']?>" style="display: none" >
            
          
          
        <div class='col-2' id="detallesAcc" >    
     <center><span class="textOption" style="text-align: left; margin-left: 20px">
     <?php echo   
        
        "<p style='margin-left: 20px'>
        <br><b>Fecha de accidente:</b> ".$mostrar['fechaRepor'].
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
        
    }
          ?></span></center></div>  

<div class="col-1"><label><br></label></div>


          <script>


var palabra = $('#foAcc').val();
    
    $.ajax({
    url: '../functions/lesTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#lestab').show();
      $('#lestab').html(data);
              
              
    }
  });
          </script>
        
         

  

         
<div class="col-1" >
<label>ESPECIFIQUE UN MEDICO:</label>
<label>
    
<?php
 $sqlSA="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio = '$idSA'";


$resultSA=mysqli_query($conexion,$sqlSA);

while($mostrarSA=mysqli_fetch_array($resultSA)){
  $nombre = explode(" ",$mostrarSA['medicoAt']);
?>


      
      <input  placeholder="APELLIDO PATERNO"  id="appPaAcc" name="appPaAcc"  
      value = "<?php  echo $nombre[0]; ?>"
      autocomplete="off" onkeyup="auAppAcci();" required>
         <span class="listautocomp">
					<ul id="lista_appAcci"></ul>  
					</span>  
      <input placeholder="APELLIDO MATERNO"  id="appMaAcc" name="appMaAcc" 
      value = "<?php  echo $nombre[1]; ?>"
      autocomplete="off" onkeyup="auApmAcci();" >
         <span class="listautocomp">
					<ul id="lista_apmAcci"></ul>  
					</span>  
      <input placeholder="NOMBRE(S)"  id="nombreAcc" name="nombreAcc"  
      value = "<?php  echo $nombre[2]; ?>"
      autocomplete="off" onkeyup="auNomAcci();" required>  
         <span class="listautocomp">
					<ul id="lista_nombreAcci"></ul>  
					</span>  
         
    </label>

</label></div>


<div class="col-3" >

<label>
DOMICILIO MEDICO:
<input id="domicilioMed" name="domicilioMed" type="text" value= "<?php echo $mostrarSA['domicilioMed'] ?>" required>

</label></div>
<div class="col-3" >

<label>
TELEFONO MEDICO:
<input id="telMed" name="telMed"
value= "<?php echo $mostrarSA['telefonoMed'] ?>"
onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      type="tel"  maxlength="10" minlength="10"  placeholder="NUMERO TELEFONICO" required>

</label></div>
    

<div class="col-3" >

<label>

ESPECIALIDAD:
<select id="especialidad" name="especialidad" required>
                    <?php 
                        $esp = "SELECT * FROM semedicbd2.cat_especialidades WHERE Especialidad != 'Prueba Ojos' AND Especialidad != 'SALUD PUBLICA'
                        AND Especialidad != ''
                         ORDER BY Especialidad ASC;";
                        $espr=mysqli_query($conexion,$esp);
                         echo "<option value=''>Seleccione tipo de llamada</option>";
		                             while($milista=mysqli_fetch_array($espr)){
                               echo "<option>".$milista['Especialidad']."</option>";
                                 }
                        ?>
                    </select>




</label></div>


<div class="col-3" >

<label>
CEDULA MEDICO:
<input id="cedulaMed" name="cedulaMed" type="text"
value= "<?php echo $mostrarSA['cedulaMedico'] ?>"
  maxlength="15" minlength="10" 
placeholder="CEDULA" required>

</label></div>

<div class="col-3" >

<label>
CORREO MEDICO:
<input id="correoMed" name="correoMed" 
value= "<?php echo $mostrarSA['correoMedico'] ?>"
type="text" placeholder="CORREO" required>

</label></div>





<div class="col-1" >

<label>
NOTAS:
<input id="notasMed" name="notasMed" type="text" placeholder=" NOTAS ASOCIADAS A LA SOLICITUD" required>
<br><br>
</label></div>
<?php
}
?>
<div class="col-1"> <span class="textSectionRED"><center>DIAGNOSTICOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="diatab"></table>
  
  </div> 
<div class="col-1" >

<label style="color: darkred;">
AGREGAR DIAGNOSTICOS:
<?php
 diagnosticosEgreso();
?>
</label></div>

<div class="col-1" >

<label>
OBSERVACIONES:
<input id="observacionesMed" name="observacionesMed" type="text" placeholder="OBSERVACIONES RESPECTIVAS DE LA SOLICITUD" required>

</label></div>
<div class="col-1"> <span class="textSectionNEW"><center>PROCEDIMIENTOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="procetab"></table>
  
  </div> 
  
<div class="col-1" >

<label>
AGREGAR TRATAMIENTOS(PROCEDIMIENTOS):

<?php
 procedimientosEgreso();
?>
</label></div>

    <center>
      <button id="send" class="submitbtn" type="submit" onclick="pregunta()" style="width: 150; font-size: 12px; background: darkblue;">ENVIAR</button>
     </center>


<div class="col-1" ><label><br></label></div>
        
     
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>

 