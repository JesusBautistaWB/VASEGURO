<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administracion VASEGURO</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/securityMed.js"></script>
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

 include("../functions/phpfunctions.php");
  menuMed("EDICION SOLICITUD");
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
        
      <form id="arrHosForm" action ="../functions/llenarDatosSolicitudMed.php" method="POST" enctype="multipart/form-data">   
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

              <div class="col-3" >
      
              <label>
          <input name="fechaHoy" id="fechaHoy" style="border: none" value="<?php 
          date_default_timezone_set('America/Mexico_City');
          $fechaActual = date('Y-m-d');
  echo $fechaActual;
                               ?>"   readonly>
       
          </label>
      
      </div>
      <input type="hidden" name="foAcc" id="foAcc" value="<?php echo $mostrar['FolioAccidente']?>" >





              <script>
    var palabra = $('#foAcc').val();
    var sa = $('#idSA').val();

    $.ajax({
    url: '../functions/filesTabSA.php',
    type: 'POST',
    data: {palabra:palabra, sa:sa},
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
      $('#diatab').show(data);
      $('#diatab').html(data);        
    }
  });

  $.ajax({
    url: '../functions/proceTabSA.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#procetab').show(data);
      $('#procetab').html(data);        
    }
  });
          </script>

             <?php 
   
            }
            $fol ='';
            $conce ='';   
            $sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, costoServicio, esAu, estadoSolicitud,
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
                <div class="col-1"> 
        <span class="textSection" style="font-size: 24; background: white; color: darkblue; outline: 2px solid black;"><center><?php 
            echo "Solicitud: <b>".$mostrar['estadoSolicitud']."</b>"; ?></center></span></div>
          <div class="col-1">
          <center>
         <label><br><br></label></center></div>
                <div class='col-2'>
                   </label>
                   <label style='font-size: 15px; block: inline; color: darkgreen;'>
                  CONCEPTO DEL SERVICIO:<br>

                  <input type="text" id="conceptoSer" name="conceptoSer" value=" <?php echo $mostrar['conceptoServicio']; ?>" 
            style="
    background-color: white;
    color: black;
    font-size: 14px;"
          readonly  >
          </label>
              </div>
               
              <div class='col-2'>
              <label><label style='font-size: 15px; block: inline; color: darkgreen;'> HONORARIOS $:<br></label>
            <input type="number" step="0.01" id="costo" name="costo" value="<?php echo $mostrar['costoServicio']; ?>" 
            style="
    background-color: white;
    color: black;
    font-size: 14px;"
            >
            </div> </label>


            <div class='col-1'>
                
                <label style='font-size: 15px; block: inline; color: darkgreen;'>COMENTARIO DE SOLICITUD:
                  <br>
    
                
 <textarea name="comentarioAcc" id="comentarioAcc"
 spellcheck="true"
 rows="3"
 onkeypress="return validar(event)" 
 onpaste="return validar(event)" 
 style ="width: 100%; border-color: blue;"><?php echo strtoupper($mostrar['comentarioAcc']); ?>
               </textarea>
                </label>
               </div> 











              </center>
              <div class="col-1">      
          <label style="font-size: 16px;"> <b>ESTUDIOS AUTORIZADOS: <br></b>
<textarea  name="esAu" id="esAu"
spellcheck="true"
rows="5"
onkeypress="return validar(event)" 
onpaste="return validar(event)" 
style ="width: 100%; border-color: blue;" ><?php echo $mostrar['esAu']; ?></textarea>
<br>
</label>
        </div>
              
            <div class="col-1"><label></label></div>
            <div class="col-1"> <span class="textSection"><center>ARCHIVOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="filestab"></table>
  
  </div>

          
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
      autocomplete="off" onkeyup="auAppAcci();" >
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
      autocomplete="off" onkeyup="auNomAcci();" >  
         <span class="listautocomp">
					<ul id="lista_nombreAcci"></ul>  
					</span>  
         
    </label>

</label></div>


<div class="col-3" >

<label>
DOMICILIO MEDICO:
<input id="domicilioMed" name="domicilioMed" type="text" value= "<?php echo $mostrarSA['domicilioMed'] ?>" >

</label></div>
<div class="col-3" >

<label>
TELEFONO MEDICO:
<input id="telMed" name="telMed"
value= "<?php echo $mostrarSA['telefonoMed'] ?>"
onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      type="tel"  maxlength="10" minlength="10"  placeholder="NUMERO TELEFONICO" >

</label></div>
    

<div class="col-3" >

<label>

ESPECIALIDAD:
<select id="especialidad" name="especialidad" value= "<?php echo $mostrarSA['especialidadMed'] ?>" >
                    <?php 
                        $esp = "SELECT * FROM semedicbd2.cat_especialidades WHERE Especialidad != 'Prueba Ojos' AND Especialidad != 'SALUD PUBLICA'
                        AND Especialidad != ''
                         ORDER BY Especialidad ASC;";
                        $espr=mysqli_query($conexion,$esp);
                        echo "<option>".$mostrarSA['especialidadMed']."</option>";
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
placeholder="CEDULA" >

</label></div>

<div class="col-3" >

<label>
CORREO MEDICO:
<input id="correoMed" name="correoMed" 
value= "<?php echo $mostrarSA['correoMedico'] ?>"
type="text" placeholder="CORREO" >

</label></div>





<div class="col-1" >

<label>
NOTAS:
<input id="notasMed" name="notasMed" type="text"
 placeholder=" NOTAS ASOCIADAS A LA SOLICITUD" 
 value= "<?php echo $mostrarSA['notasMed'] ?>">
<br><br>
</label></div>

<div class="col-1"> <span class="textSectionRED"><center>DIAGNOSTICOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="diatab"></table>
  
  </div> 
<div class="col-1" >

<label style="color: darkred;">
AGREGAR DIAGNOSTICOS:
<?php
 diagnosticosEgresoEDIT($idSA);
?>
</label></div>

<?php

/*
<div class="col-1" >
<label>
OBSERVACIONES:
<input id="observacionesMed" name="observacionesMed" 
type="text" 
value= "<?php echo $mostrarSA['observacionesMed'] ?>"
placeholder="OBSERVACIONES RESPECTIVAS DE LA SOLICITUD">
</label></div>


<?php

*/

}
?>
<div class="col-1"> <span class="textSectionNEW"><center>PROCEDIMIENTOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="procetab"></table>
  
  </div> 
  
<div class="col-1" >

<label>
AGREGAR TRATAMIENTOS(PROCEDIMIENTOS):

<?php
 procedimientosEgresoEDIT($idSA);

 mysqli_close($conexion);
?>
</label></div>


<div class="col-1" ><label><br></label></div>
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

 