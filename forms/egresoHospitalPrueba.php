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
    if (confirm('¿Confirmar el egreso del paciente?')){

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
      <span class='titleHeader'>   AVISO DE ACCIDENTE | DETALLES APROBADO </span>";
 include("../functions/phpfunctions.php");
  menuHos();

  $idAcc= $_GET['idAcc'];
  ?>
      
    <span class="login100-form-title"> APROBADOS</span>     
 </center>

  </div>

      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">

        <form id="arrHosForm" action ="../functions/confirmarEgresoPrueba.php?idAcc=<?php  echo $idAcc; ?>" method="POST" enctype="multipart/form-data">  
        
      <div class="col-1">
          <label>
          <input   name="hospital" id="hospital" style="border:none; " readonly> 
          <script>
          document.getElementById("hospital").value = localStorage.getItem('nombreUsuario');
          </script>
              </label>
              </div> 

              <div class="col-1">
          <label>
          <input   name="id" id="id" style="border:none; display: none;" readonly> 
          <script>
          document.getElementById("id").value = localStorage.getItem('idHos');
          </script>
              </label>
              </div> 
        <?php   
       
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
      






		$sql1="SELECT idAcc,FolioAccidente,FolioAccidentado  FROM vasegurobd.tb_accidentes WHERE  idAcc = ".$idAcc."  LIMIT 0,1;";
          
          
		$result1=mysqli_query($conexion,$sql1);
		while($mostrar=mysqli_fetch_array($result1)){

		 ?>
        
    

              <script>
    var palabra = $('#hospital').val();

  $.ajax({
    url: '../functions/paqueteHosAcc.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#paqueteHosAcc').show();
      $('#paqueteHosAcc').html(data);        
    }
  });
          </script>
          <div class="col-1"> <span class="textSection"> EGRESO HOSPITAL</span> </div>  
          <div class="col-1"><label><br></label></div>
          

             <?php 
            
                
                echo "
                <div class='col-1'><span class='accdet'>FOLIO DEL ACCIDENTE:</span></div> 
               <center> <div class='col-1'><span  style='font-size: 50px; block: inline;'>".$mostrar['FolioAccidente']."</span></div> </center>";
   
            }
                   
            $sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente,
           telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, hospitalesSugeridos, sintomas, regionRDCA, intensidadAccidente,
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, alcaldiaEscuela, ES.nombreEstatus,
             PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, enunciadoLes, dirEscRepor,
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc
            FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
            WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
             AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
             ?> 
           <div class="col-1" id="loading" name ="loading" style="display: none;">
            <center>
            <span class="parpadea text" style="font-color: darkred; font-size: 24px;"><b>CARGANDO ARCHIVO(S), ESPERE...</b></span>
    </center>
       </div>
          <div class="col-1"><label><br></label></div>
          <div class="col-1">
         <center>
          
          
          </center>
          </div>
         
          <div class="col-1"><center>


          <span class="accdet"> 
            <b>FAVOR DE SELECCIONAR TODOS LOS ARCHIVOS CORRESPONDIENTES AL CASO <br>(AVISO DE ACCIDENTE, NOTA MEDICA, ENCUESTA DE SATISFACCION, ETC) </b> <br>
          <u>EXTENSIONES VALIDAS: JPG, JPEG, PNG, PNEG, PDF, DOC, DOCX </u></span>
          <input type="hidden" name="foAcc" id="foAcc" value="<?php echo $mostrar['FolioAccidente']?>" >
          <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
          <input type="file" name="file[]" id="file" multiple style="display: none" ></center>
          <label><br></label>
    </div>
    <?php archivosPorTipo(); ?>
         
        <?php
         diagnosticosEgreso();
            procedimientosEgreso(); ?>

<div class="col-1">
    <label>
   PAQUETE SELECCIONADO (OBLIGATORIO): 
      <select id="paqueteHosAcc" name ="paqueteHosAcc" required>
      
     
      </select>
    
    </label> 
  </div>
            <div class="col-1"><label></label></div>
          
          <div class='col-1' id="detallesAccT" style="display: none;">    
       <?php echo "<span class='textSectionInf'>ACCIDENTE CON EL ID:  <u>".$mostrar['idAcc']."</u></span>"; ?>
              </div>
          
          
        <div class='col-2' id="detallesAcc" style="display: none; ">    
     <center><span class="textOption" style="text-align: left; margin-left: 20px">
     <?php echo   
        
        "<p style='margin-left: 20px'><br><b>Reportante:</b> ".$mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor'].
        "<br><b>Puesto de reportante:</b>".$mostrar['puestoReportante']. 
        "<br><b>Telefono:</b> ".$mostrar['telefonoReportante'].
        "<br><b>Fecha de accidente:</b> ".$mostrar['fechaRepor'].
        "<br><b> Escuela: </b>  ".$mostrar['nombreEscuela'].
        "<br><b> Direccion Escuela: </b>  ".$mostrar['dirEscRepor'].
        "<br><b>Estabilidad del Accidentado:</b> ".$mostrar['estabilidad'].
        "<br><b> LESIONES: </b>  ".$mostrar['enunciadoLes'].
        "<br><b> Tipo de Accidente:</b> ".$mostrar['idTipoDeAccidente'].
        "<br><b> CURP DEL ACCIDENTADO: </b>  ".$mostrar['curpAcc'].
        "</acc><br><b> Fecha y hora del Accidente:</b> ".$mostrar['fechaHoraAccidente']."</p>";
        ?>
            </span></center> </div>
              
          <div class='col-2' id="detallesAcc2" style="display: none; ">  
         <center><span class="textOption"  style="text-align: left; margin-left: 20px"><?php echo 
               
        
        "<p style='margin-left: 20px'>
        <br><b>
        PERSONA ACCIDENTADA:</b><u>".$mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'].
        "</u><br><b>GRADO ESCOLAR: </b>".$mostrar['GradoEscolarA'].         
        " <br><b>PROCEDENCIA: </b> ".$mostrar['estado'].
        "<br> <b>FECHA DE NACIMIENTO: </b> ".$mostrar['FechaNacimientoA'].
        " <br><b>DOMICILIO: </b> ".$mostrar['AlcaldiaMunicipio'].", <br>".$mostrar['Colonia'].", ".$mostrar['CalleA'].
        "<br><b> HABLA ALGUNA LENGUA INDIGENA: </b>  ".$mostrar['dialectoAcc'].
        "<br><b> QUE LENGUA INDIGENA HABLA: </b>  ".$mostrar['dialectoAccES'].
        "<br><b> SE CONSIDERA INDIGENA: </b>  ".$mostrar['indigenaAcc'].
        "<br><b>NOMBRE DE RESPONSABLE: </b> ".$mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes'].
        "<br><b>CONTACTO:</b> ".$mostrar['telFiRes']." / ".$mostrar['telCelRes'].
        
        "</p><div class='col-1'><label><br></label></div>";
        
          
          ?></span></center></div>  
    
    <div class="col-1"><label><input type="hidden" id="foAcc" value="<?php echo $mostrar['FolioAccidente'];  ?>" > </label></div>
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
          <div class="col-1" id="lesArr" style="display: none;">
        
        <span class="textSectionPEN"style="font-size: 14px;">LESIÓNES OCURRIDAS EN EL ACCIDENTE:</span>
        <table id="lestab"></table></div>
         <?php } 
        
         ?>
    
    <center><button id="send" class="submitbtn" type="submit" onclick="pregunta()" style="width: 150; font-size: 12px; background: #EA6E38;">CONFIRMAR EL EGRESO</button> </center>

<center><button id="buttonDetAcc" class="submitbtn" type="button" onclick="detallesAccidente()" style="width: 150; font-size: 12px;">VER DETALLES DEL ACCIDENTE</button> <br><br> </center>
<center><button id="ocDetAcc" class="submitbtn" type="button" onclick="ocultarDetallesAccidente()" style="width: 150; font-size: 12px; display: none; background: darkred;">
OCULTAR DETALLES</button></center>
<div class="col-1" ><label><br><br></label></div>
        
     
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>

 