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
    
    <script type="text/javascript">     
           if((localStorage.getItem('sessionValue') == ""  || localStorage.getItem('nivel') != "2" )){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
            localStorage.setItem('sessionValue', "");
             localStorage.setItem('nivel', "");
            
        }
    
    </script>
     
</head>
<body>

     <div class="header">
  
    <center>         
       <?php 
         echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br> 
        <span class='titleHeader'>   SOLICITAR SERVICIO ADICIONAL </span>";
   include("../functions/phpfunctions.php");
    menuHos();
    ?>
        
      <span class="login100-form-title"> APROBADOS</span>     
   </center>

    </div>
    
      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#CD5C5C;">

      <form  action ="../functions/insertarSERAD.php" method="post" enctype="multipart/form-data"> 
      <div  class="col-3" >
          <label>
          <input style="border: none" name="idUsuario" id="idUsuario" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
       
        <div class="col-3">
           <label>
               <input style="border: none" id="nombreUsuario" name="nombreUsuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-3" >
      
              <label>
          <input style="border: none" placeholder="<?php 
  $fechaActual = date('Y-m-d');
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>
        
        <?php      
        $idAcc = $_GET['idAcc'];
		$conexion = con();
      
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, telefonoReportante, fechaRepor, numHospital,
    idRDCA, idTipoDeAccidente, idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
    PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, descRepor, lugarAccIn, actividadAcc,
    FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, periodoDeCobertura, tipoDeEventoInicial,
    lesionProbableInicial, correoReportante, dirEscRepor, notasAcc, ACCT.correoEscuela, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc
    FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
    WHERE  ACCT.idEscuela=ESC.idEscuela 
    AND ES.idEstatus=ACCT.idEstatus 
    AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
     AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
     
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
      
		 ?>
        
        
         
  
               <div class="col-1"><label><input type="hidden" id="foAcc" name="foAcc" value="<?php echo $mostrar['FolioAccidente'];  ?>" > </label></div>
               <div class="col-1"><label><input type="hidden" id="idAcc" name="idAcc" value="<?php echo $mostrar['idAcc'];  ?>" > </label></div>
               <div class="col-1"><label><input type="hidden" id="idHos" name="idHos" value="<?php echo $mostrar['numHospital'];  ?>" > </label></div>
          <script>


var palabra = $('#foAcc').val();

$.ajax({
    url: '../functions/filesTabAUX.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#filestab').show();
      $('#filestab').html(data);        
    }
  });
    
    $.ajax({
    url: '../functions/lesTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#lestab').show();
      $('#lestab').html(data);
              
              
    }
  });

 
  $.ajax({
    url: '../functions/serAdTabOR.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#seradtab').show();
      $('#seradtab').html(data);
              
              
    }
  });


          </script>
          
          <div class="col-1"> <span class="textSectionred"><center><?php echo $mostrar['FolioAccidente']; ?></center></span></div> 
          
      <div class="col-1"> <span class="textSection"><center>DETALLES DEL ACCIDENTE</center></span></div> 

      <div class="col-3" style="display: none"><span class="accdetRED"><?php echo "<br><b> Region afectada: </b><br>".$mostrar['regionPrincipal']; ?></span></div>  
      <div class="col-3"><span class="accdetRED"><?php echo "<br><b> Actividad realizada : </b><br>".$mostrar['actividadAcc']; ?></span></div>
      <div class="col-3"><span class="accdetRED"><?php echo "<br><b> Tipo de Accidente: </b><br>".$mostrar['idTipoDeAccidente']; ?></span></div>
      <div class="col-3"><span class="accdetRED"><?php echo "<br><b> Donde ocurrio el accidente:</b><br> ".$mostrar['lugarAccIn'].", ".$mostrar['idLugarAccidente']; ?></span></div> 

<div class="col-1"><span class="accdetRED"><?php echo "<br><b> DESCRIPCION DE ACCIDENTE: </b><br>".$mostrar['descRepor']; ?></span></div>


<div class="col-3"><span class="accdetRED"><?php echo "<br> <b>Estabilidad del Accidentado:</b> <br> ".$mostrar['estabilidad'];  ?></span></div>
<div class="col-3" style="display: none"><span class="accdetRED"><?php echo "<br><b> LESION PROBABLE INICIAL: </b><br>".$mostrar['lesionProbableInicial']; ?></span></div>
<div class="col-3" style="display: none"><span class="accdetRED"><?php echo "<br><b> TIPO DE EVENTO INICIAL: </b><br>".$mostrar['tipoDeEventoInicial']; ?></span></div>
<div class="col-3"><span class="accdetRED"><?php echo "<br><b> PERIODO DE COBERTURA: </b><br>".$mostrar['periodoDeCobertura']; ?></span></div>
<div class="col-1"><label><br></label></div>








<div class="col-1">
        
              
<div class="col-1"> <span class="textSection"><center>ARCHIVOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="filestab"></table>
  
  </div>

      <?php
          }
          ?>
          



</div> 
<div class="col-1"> <span class="textSection"><center>SERVICIOS ADICIONALES SOLICITADOS AL MOMENTO</center></span>
<table id="seradtab"></table>
</div>


<div class="col-1"> <span class="textSectionNEW"><center>SOLICITAR SERVICIO ADICIONAL</center></span></div>

<div class="col-1"><label style="font-size: 12px; color: darkred;"> HAGA CLICK SOBRE EL TIPO DE SERVICIO ADICIONAL QUE DESEE SOLICITAR, POSTERIORMENTE RELLENE LOS DATOS QUE SE LE REQUIEREN: <br> </label></div>



<div class="col-3" style="display: none;">
  <label>
<select id="sa1" name="sa1"  >
  <?php                                   
                         $conexion = $con();
                        $pdc = "SELECT * FROM vasegurobd.cat_solicitudesdeservicio ORDER by nombreSolicitud ASC";
                        $resultpdc=mysqli_query($conexion,$pdc);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
		                             while($milista=mysqli_fetch_array($resultpdc)){
                                         
                                     echo "<option>".$milista['nombreSolicitud']."</option>";
                                     }
   
                                        ?>

  </select></label>
  

</div>
<div class="col-3" style="display: none;"><input id="msa1" name="msa1" type="number" placeholder="$ MONTO"></div>
<div class="col-3" style="display: none;"><input id="coa1" name="coa1"  placeholder="COMENTARIO(OPCIONAL)"></div>
<?php serviciosAdicionales(); ?>

<div class="col-1">
  <label>A CONTINUACION, PUEDE ANEXAR UN ARCHIVO A SU SOLICITUD</label>
<label style="font-size: 10px; color: darkgreen;"><u>EXTENSIONES VALIDAS: JPG, JPEG, PNG, PNEG, PDF, DOC, DOCX </u> </label>
</div>
<?php archivosPorTipoSA(); ?>
<div class="col-submit">
  
    <button class="submitbtn"  onclick="aprobar();">2 SOLICITAR SERVICIO</button>
  </div>
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>
