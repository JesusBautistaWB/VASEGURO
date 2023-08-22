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
      <script type="text/javascript" src="js/securityEsc.js"></script>
     
</head> 
<body>

<div class="header">
  
  <center>         
     <?php 
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='650'> <br> 
      <span class='titleHeader'>   AVISO DE ACCIDENTE | F. EXCLUIDOS </span>";
 include("../functions/phpfunctions.php");
  menuEsc();
  ?>
      
         
 </center>

  </div>
    
      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">

      <form>
	 
      <div class="col-3">
          <label>
          <input name="idUsuario" id="idUsuario" style="border: none;" readonly> 
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
        <div class="col-3">
           <label>
               <input  id="nombreUsuario" name="nombreUSuario" style="border: none;" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>

      </div>

      <div class="col-3">
      
              <label>
          <input  placeholder="<?php $fechaActual = date('Y-m-d'); echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy" style="border: none;" readonly>
       
          </label>
      </div>
        
        <?php      
        $idAcc = $_GET['idAcc'];
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");   
          
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente,
            telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ACCT.idRiesgoEx,
                   idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
                         PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, lesionProbableInicial, actividadAcc, lugarAccIn,
                                FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, 
                                telCelRes,periodoDeCobertura, tipoDeEventoInicial, descRepor, correoReportante, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc
                                              FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
                                                        WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
                                                        AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
            
            
		 ?>
        
        
         
      <div class="col-1"> <span class="textSectionRed"><center><?php echo " ID: ".$mostrar['idAcc']." | ".$mostrar['nombreEstatus']; ?></center></span></div>
      <div class="col-1"><span class="accdetRED"><?php echo " <b>MOTIVO: ".$mostrar['idRiesgoEx']."</b><br> <br>"; ?></span></div> 
      <div class="col-3"><span class="accdet"><?php echo "<b>Nombre del Reportante:</b><br> ".$mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor']."<br><br>";  ?></span>span></div>   
          <div class="col-3"><span class="accdet"><?php echo "<b> Puesto de reportante:</b> <br>".$mostrar['puestoReportante']."<br><br>";  ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Telefono del reportante:</b> <br>".$mostrar['telefonoReportante']."<br><br>";  ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Fecha de accidente<br>(Registrada por el sistema):</b><br> ".$mostrar['fechaRepor']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Fecha de accidente<br>(Indicada por el reportante):</b><br> ".$mostrar['fechaHoraAccidente']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>CORREO DEL REPORTANTE:</b><br> ".$mostrar['correoReportante']; ?></span></div>
          
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
          
          <div class="col-1"><br></div>
    
          <div class="col-1"><br></div>
          <div class="col-1"> <span class="textSectionRed"><center>DETALLES DEL ACCIDENTE</center></span></div> 
          <div class="col-3"><span class="accdetRED"><?php echo "<br><b> Actividad realizada cuando ocurrio: </b><br>".$mostrar['actividadAcc']; ?></span></div>

          <div class="col-3"><span class="accdetRED"><?php echo "<br><b> Tipo de Accidente: </b><br>".$mostrar['idTipoDeAccidente']; ?></span></div>
          
          <div class="col-3"><span class="accdetRED"><?php echo "<br><b> Lugar donde ocurrio el accidente:</b><br> ".$mostrar['lugarAccIn'].", ".$mostrar['idLugarAccidente']; ?></span></div> 
          
          <div class="col-3"><span class="accdetRED"><?php echo "<br><b> DESCRIPCION DE ACCIDENTE: </b><br>".$mostrar['descRepor']; ?></span></div>

          
          <div class="col-3"><span class="accdetRED"><?php echo "<br> <b>Estabilidad del Accidentado:</b> <br> ".$mostrar['estabilidad'];  ?></span></div>
          <div class="col-3"><span class="accdetRED"><?php echo "<br><b> LESION PROBABLE INICIAL: </b><br>".$mostrar['lesionProbableInicial']; ?></span></div>
          <div class="col-3"><span class="accdetRED"><?php echo "<br><b> TIPO DE EVENTO INICIAL: </b><br>".$mostrar['tipoDeEventoInicial']; ?></span></div>
          <div class="col-3"><span class="accdetRED"><?php echo "<br><b> PERIODO DE COBERTURA: </b><br>".$mostrar['periodoDeCobertura']; ?></span></div>



          <div class="col-3"><span class="accdet"><?php echo "<br> <b> Escuela:</b> <br>".$mostrar['nombreEscuela']."<br>"; ?></span></div> 
          <div class="col-2"><span class="accdet"><?php echo "<br> <b>Fecha y hora del Accidente: </b><br> ".$mostrar['fechaHoraAccidente'];  ?></span></div>
          <div class="col-2"><span class="accdet"><?php  echo "<br><b> Hospital Seleccionado:</b> <br> ".$mostrar['idHospital']; ?></span></div>
          <div class="col-1">
        
        <span class="textSectionPEN"style="font-size: 14px;">LESIÓNES OCURRIDAS EN EL ACCIDENTE:</span>
        <table id="lestab"></table></div>
          <div class="col-1"> <span class="textSectionRed"><center>DETALLES DEL ACCIDENTADO</center></span></div>    
          <div class="col-1"><span class="accdet"><?php  echo "<br><b> CURP:</b>  ".$mostrar['curpAcc']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php  echo "<br> <b>PERSONA ACCIDENTADA:</b> <br> ".$mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?></span></div> 
         <div class="col-3"><span class="accdet"><?php  echo "<br><b> GRADO ESCOLAR:</b> <br> ".$mostrar['GradoEscolarA']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php  echo "<br><b> PROCEDENCIA:</b> <br> ".$mostrar['estado']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php  echo "<br><b> DOMICILIO:</b> <br> ".$mostrar['AlcaldiaMunicipio'].", ".$mostrar['Colonia'].", ".$mostrar['CalleA']; ?></span></div>
            <div class="col-3"><span class="accdet"><?php  echo "<br><b> FECHA DE NACIMIENTO:</b> <br> ".$mostrar['FechaNacimientoA']; ?></span></div>
          <div class="col-1"><br></div>
          <div class="col-1"> <span class="textSectionRed"><center>RESPONSABLE</center></span></div>  
          <div class="col-2"><span class="accdet"><?php  echo "<br> NOMBRE DE PERSONA RESPONSABLE: <br> ".$mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes']; ?></span></div> 
          <div class="col-2"><span class="accdet"><?php  echo "<br>CONTACTO <br> ".$mostrar['telFiRes']." / ".$mostrar['telCelRes']; ?></span></div>
          <div class="col-1"> <span class="textSection"><center>ETNIA</center></span></div>  
          <div class="col-2"><span class="accdet"><?php  echo "<b><br> ¿HABLA ALGUN LENGUA INDIGENA?:</b> <br> ".$mostrar['dialectoAcc']."<br>"; ?></span></div> 
          <div class="col-2"><span class="accdet"><?php  echo "<b><br>¿CUAL? <br> </b>".$mostrar['dialectoAccES']."<br>"; ?></span></div>
          <div class="col-2"><span class="accdet"><?php  echo "<b><br> ¿SE CONSIDERA INDIGENA? <br> </b>".$mostrar['indigenaAcc']."<br>"; ?></span></div>
           
          
             
     

          <?php
          }
          ?>
          
          </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>
