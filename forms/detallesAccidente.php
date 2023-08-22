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
     <script type="text/javascript" src="js/security.js"></script>

     
</head>

<body>

     <div class="header">
  
    <center>         
       <?php 
         
   include("../functions/phpfunctions.php");
   $n = $_GET['n'];
   if ($n != "5"){
    menuAdmin("DETALLES ACCIDENTE");
   }
   if ( $n == "5"){
    menuMed();
   }
    ?>
        
         
   </center>

    </div>
    
      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">

      <form>
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
               <input style="border: none" id="nombreUsuario" name="nombreUSuario" readonly>
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
      
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente,
    telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, actividadAcc, sintomas, intensidadAccidente, regionRDCA,
    idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, ACCT.idHospital, nombreEscuela, ES.nombreEstatus,
    PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, lesionProbableInicial,tipoDeEventoInicial, periodoDeCobertura,
    FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, lugarAccIn, descRepor, correoReportante, 
    ACCT.correoEscuela, dirEscRepor,notasAcc, regionPrincipal, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc, calleHospital, delegacionHospital, tipoLlamada
    FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC, vasegurobd.cat_hospitales HO
    WHERE  ACCT.idEscuela=ESC.idEscuela 
    AND ES.idEstatus=ACCT.idEstatus 
    AND ACCT.idHospital= HO.nombreClinicaHospital
    AND ACCT.FolioAccidentado=ACT.FolioAccidentado 
    AND ACCT.idEstatus= ES.idEstatus  
    AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela 
    AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
    
		 ?>
       <div class="col-1">
    <label style="color: darkblue; font-size: 15px;">
      TIPO DE LLAMADA:  
     <?php echo '<label style ="color: black;">'.$mostrar['tipoLlamada']; ?></label> 

    
  </div>
      <div class="col-1"> 
        <span class="textSection" style="font-size: 28px;"><center><?php 
            echo "<b>".$mostrar['nombreEstatus']."</b>"; ?></center></span></div>
          <div class="col-1">
          <center>
          <label style="font-size: 50px; color: darkblue;" ><?php echo $mostrar['FolioAccidente']; ?> 
          </label><label><br><br></label></center></div>
       

          <div class="col-3"><span class="accdet"><?php echo "<b>Nombre del Reportante:</b><br> ".$mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor']."<br><br>";  ?></span>span></div>   
          <div class="col-3"><span class="accdet"><?php echo "<b> Puesto de reportante:</b> <br>".$mostrar['puestoReportante']."<br><br>";  ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Telefono del reportante:</b> <br>".$mostrar['telefonoReportante']."<br><br>";  ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Fecha de accidente<br>(Registrada por el sistema):</b><br> ".$mostrar['fechaRepor']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Fecha de accidente<br>(Indicada por el reportante):</b><br> ".$mostrar['fechaHoraAccidente']; ?></span></div>
          <div class="col-3"><span class="accdet"></span></div>
          
          <div class="col-3"><label><input type="hidden" id="foAcc" value="<?php echo $mostrar['FolioAccidente'];  ?>" > </label></div>
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

  $.ajax({
    url: '../functions/diaTabNT.php',
    type: 'POST', 
    data: {palabra:palabra},
    success:function(data){
      $('#diatab').show();
      $('#diatab').html(data);        
    }
  });

  $.ajax({
    url: '../functions/proceTabNT.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#procetab').show();
      $('#procetab').html(data);        
    }
  });
          </script>
          
          
          
          <div class="col-1"><br></div>
      <div class="col-1"> <span class="textSection"><center>DETALLES DEL ACCIDENTE</center></span></div> 
         
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Region principal afectada: </b><br>".$mostrar['regionPrincipal']; ?></span></div>
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Actividad realizada : </b><br>".$mostrar['actividadAcc']; ?></span></div>

          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Tipo de Accidente: </b><br>".$mostrar['idTipoDeAccidente']; ?></span></div>
          
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Donde ocurrio el accidente:</b><br> ".$mostrar['lugarAccIn'].", ".$mostrar['idLugarAccidente']; ?></span></div> 
          


          <div class="col-1"><span class="accdetRED">
             DESCRIPCION DE ACCIDENTE: 
          </span><center>
          <textarea  
spellcheck="true"
style="width:90%; font-size: 12px; color: darkred;" rows="6"  readonly>
<?php echo $mostrar['descRepor']; ?> 
</textarea></center>
        
        </div>

          
          <div class="col-4"><span class="accdetRED"><?php echo "<br> <b>Estabilidad del Accidentado:</b> <br> ".$mostrar['estabilidad'];  ?></span></div>
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> LESION PROBABLE INICIAL: </b><br>".$mostrar['lesionProbableInicial']; ?></span></div>
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> TIPO DE EVENTO INICIAL: </b><br>".$mostrar['tipoDeEventoInicial']; ?></span></div>
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> PERIODO DE COBERTURA: </b><br>".$mostrar['periodoDeCobertura']; ?></span></div>



          <div class="col-3"><span class="accdet"><?php echo "<br> <b> Escuela:</b> <br>".$mostrar['nombreEscuela']."<br>"; ?></span></div> 

          <div class="col-3"><span class="accdet"><?php echo "<br> <b>CORREO DE LA ESCUELA: </b><br> ".$mostrar['correoEscuela'];  ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<br> <b>Fecha y hora del Accidente: </b><br> ".$mostrar['fechaHoraAccidente'];  ?></span></div>
          <div class="col-2"><span class="accdet"><?php  echo "<br><b> Hospital Seleccionado:</b> <br> ".$mostrar['idHospital']; ?></span></div>
          <div class="col-2"><span class="accdet"><?php  echo "<br><b> Direccion Hospital:</b> <br> ".$mostrar['calleHospital'].", ".$mostrar['delegacionHospital']; ?></span></div>
          
          <?php 
            $dir = explode(", ",  $mostrar['dirEscRepor'] );
            echo $dir[0]; ?>

           <div class="col-2"><span class="accdet"><?php  echo "<br><b> CALLE Y NUMERO DE LA ESCUELA:</b> <br> ".$dir[0]; ?></span></div>
           <div class="col-2"><span class="accdet"><?php  echo "<br><b> ALCALDIA DE LA ESCUELA:</b> <br> ".$dir[1]; ?></span></div>
           <div class="col-2"><span class="accdet"><?php  echo "<br><b> C.P. DE LA ESCUELA:</b> <br> ".$dir[3]; ?></span></div>
           <div class="col-2"><span class="accdet"><?php  echo "<br><b> TELEFONO DE LA ESCUELA:</b> <br> ".$dir[4]; ?></span></div>
        

          <div class="col-1">
        
          <span class="textSectionPEN"style="font-size: 14px;">LESIÓNES OCURRIDAS EN EL ACCIDENTE:</span>
          <table id="lestab"></table></div>


         <div class="col-1"><br></div>
         <div class="col-1"> <span class="textSection"><center>DETALLES DEL ACCIDENTADO</center></span></div>    
         <div class="col-1"><span class="accdet"><?php  echo "<br><b> CURP:</b>  ".$mostrar['curpAcc']; ?></span></div>

         <div class="col-4"><span class="accdet"><?php  echo "<br> <b>PERSONA ACCIDENTADA:</b> <br> ".$mostrar['PrimerApellidoA'].
         " ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?></span></div> 
         <div class="col-4"><span class="accdet"><?php  echo "<br><b> GRADO ESCOLAR:</b> <br> ".$mostrar['GradoEscolarA']; ?></span></div>
          <div class="col-4"><span class="accdet"><?php  echo "<br><b> PROCEDENCIA:</b> <br> ".$mostrar['estado']; ?></span></div>
          <div class="col-4"><span class="accdet"><?php  echo "<br><b> FECHA DE NACIMIENTO:</b> <br> ".$mostrar['FechaNacimientoA']; ?></span></div>
          <div class="col-1"><span class="accdet">
          <?php  echo "<br><b> DOMICILIO:</b> ".$mostrar['AlcaldiaMunicipio'].", ".$mostrar['Colonia'].", ".$mostrar['CalleA']."<br>"; ?></span></div>
            
          <div class="col-1"><br></div>
          <div class="col-1"> <span class="textSection"><center>ARCHIVOS</center></span></div> 
          <div class="col-1"> 
          <label>
            
          <?php 
          $thefolder = "../confirmaciones_egreso/".$mostrar['FolioAccidente']."/";
if ($handler = opendir($thefolder)) {
	echo "<ol>";
    while (false !== ($file = readdir($handler))) {
      if(is_dir($file)){
            
      }else{

        echo "<li> <a href='$thefolder/$file'  target='_blank' > $file</a></li>";
      }
    }
    echo "</ol>";
    closedir($handler);
}

?>
         

          </label>
 </div> 
 <div class="col-1"> <span class="textSectionRED"><center>DIAGNOSTICOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="diatab"></table>
  
  </div> 
  <div class="col-1"> <span class="textSectionNEW"><center>PROCEDIMIENTOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="procetab"></table>
  
  </div> 
          <div class="col-1"> <span class="textSection"><center>RESPONSABLE</center></span></div>  
          <div class="col-2"><span class="accdet"><?php  echo "<b><br> NOMBRE DE PERSONA RESPONSABLE:</b> <br> ".$mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes']."<br><br>"; ?></span></div> 
          <div class="col-2"><span class="accdet"><?php  echo "<b><br>CONTACTO <br> </b>".$mostrar['telFiRes']." / ".$mostrar['telCelRes']."<br><br>"; ?></span></div>
          <div class="col-2"><span class="accdet"><?php  echo "<b><br>NOTAS AGREGADAS AL ACCIDENTE <br> </b>".$mostrar['notasAcc']."<br><br>"; ?></span></div>
          
          <div class="col-1"> <span class="textSection"><center>ETNIA</center></span></div>  
          <div class="col-2"><span class="accdet"><?php  echo "<b><br> ¿HABLA ALGUN LENGUA INDIGENA?:</b> <br> ".$mostrar['dialectoAcc']."<br>"; ?></span></div> 
          <div class="col-2"><span class="accdet"><?php  echo "<b><br>¿CUAL? <br> </b>".$mostrar['dialectoAccES']."<br>"; ?></span></div>
          <div class="col-2"><span class="accdet"><?php  echo "<b><br> ¿SE CONSIDERA INDIGENA? <br> </b>".$mostrar['indigenaAcc']."<br>"; ?></span></div>
         <div class="col-1">   
        <center><a href="pdfdetailsAcc.php?idAcc=<?php
         echo $mostrar['idAcc']; 
         ?>" target="_blank"><button type="button" class="submitbtn" onclick="" style="width:200px;">OBTENER PDF</button> </a></center>
             <label><br></label>
          </div> 
        
      <?php
          }
          ?>
        </form>
  </div>
          </div>
    </div>
</body>     
</html>
