<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administracion MEDICA</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityMed.js"></script>
  
</head>

     
    
<body>

     <div class="header">
  
    <center>         
       <?php 
         
   include("../functions/phpfunctions.php");
    menuMed("DETALLES DE ACCIDENTE");
    ?>
      
   </center>

    </div>
    
      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#6992EA;">

      <form  action ="../functions/insertarSERAD.php" method="post"> 
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
		$sql="SELECT * FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
     WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
     AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
     
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
      
		 ?>
        
        
        <div class="col-1"> 
        <span class="textSection" style="font-size: 28px;"><center><?php 
            echo "<b>".$mostrar['nombreEstatus']."</b>"; ?></center></span></div>
          <div class="col-1">
          <center>
          <label style="font-size: 50px; color: darkblue;" ><?php echo $mostrar['FolioAccidente']; ?> 
          </label><label><br><br></label></center></div>
              
         <?php /*  
          <div class="col-3"><span class="accdet"><?php echo "<b>Nombre del Reportante:</b><br> ".$mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor']."<br><br>";  ?></span>span></div>   
          <div class="col-3"><span class="accdet"><?php echo "<b> Puesto de reportante:</b> <br>".$mostrar['puestoReportante']."<br><br>";  ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Telefono del reportante:</b> <br>".$mostrar['telefonoReportante']."<br><br>";  ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Fecha de accidente<br>(Registrada por el sistema):</b><br> ".$mostrar['fechaRepor']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>Fecha de accidente<br>(Indicada por el reportante):</b><br> ".$mostrar['fechaHoraAccidente']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php echo "<b>CORREO DEL REPORTANTE:</b><br> ".$mostrar['correoReportante']; ?></span></div>
          <div class="col-3"><label><input type="hidden" id="foAcc" value="<?php echo $mostrar['FolioAccidente'];  ?>" > </label></div>
      <div class="col-1"> <span class="textSection"><center>DETALLES DEL ACCIDENTE</center></span></div> 

      <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Region principal afectada: </b><br>".$mostrar['regionPrincipal']; ?></span></div>  
      <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Actividad realizada : </b><br>".$mostrar['actividadAcc']; ?></span></div>
      <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Tipo de Accidente: </b><br>".$mostrar['idTipoDeAccidente']; ?></span></div>
      <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Donde ocurrio el accidente:</b><br> ".$mostrar['lugarAccIn'].", ".$mostrar['idLugarAccidente']; ?></span></div> 

<div class="col-3"><span class="accdetRED"><?php echo "<br><b> DESCRIPCION DE ACCIDENTE: </b><br>".$mostrar['descRepor']; ?></span></div>


<div class="col-3"><span class="accdetRED"><?php echo "<br> <b>Estabilidad del Accidentado:</b> <br> ".$mostrar['estabilidad'];  ?></span></div>
<div class="col-3"><span class="accdetRED"><?php echo "<br><b> LESION PROBABLE INICIAL: </b><br>".$mostrar['lesionProbableInicial']; ?></span></div>
<div class="col-3"><span class="accdetRED"><?php echo "<br><b> TIPO DE EVENTO INICIAL: </b><br>".$mostrar['tipoDeEventoInicial']; ?></span></div>
<div class="col-3"><span class="accdetRED"><?php echo "<br><b> PERIODO DE COBERTURA: </b><br>".$mostrar['periodoDeCobertura']; ?></span></div>



<div class="col-3"><span class="accdet"><?php echo "<br> <b> Escuela:</b> <br>".$mostrar['nombreEscuela']."<br>"; ?></span></div>

<div class="col-3"><span class="accdet"><?php echo "<br> <b> Correo Escuela:</b> <br>".$mostrar['correoEscuela']."<br>"; ?></span></div>
<div class="col-3"><span class="accdet"><?php echo "<br> <b>Fecha y hora del Accidente: </b><br> ".$mostrar['fechaHoraAccidente'];  ?></span></div>
<div class="col-3"><span class="accdet"><?php  echo "<br><b> Hospital Seleccionado:</b> <br> ".$mostrar['idHospital']; ?></span></div>


          
          <?php 
            $dir = explode(", ",  $mostrar['dirEscRepor'] );
            echo $dir[0]; ?>

           <div class="col-3"><span class="accdet"><?php  echo "<br><b> CALLE Y NUMERO DE LA ESCUELA:</b> <br> ".$dir[0]; ?></span></div>
           <div class="col-3"><span class="accdet"><?php  echo "<br><b> ALCALDIA DE LA ESCUELA:</b> <br> ".$dir[1]; ?></span></div>
           <div class="col-3"><span class="accdet"><?php  echo "<br><b> C.P. DE LA ESCUELA:</b> <br> ".$dir[2]; ?></span></div>
           <div class="col-3"><span class="accdet"><?php  echo "<br><b> TELEFONO DE LA ESCUELA:</b> <br> ".$dir[3]; ?></span></div>
        






<div class="col-1">
        
        <span class="textSectionPEN"style="font-size: 14px;">LESIÓNES OCURRIDAS EN EL ACCIDENTE:</span>
        <table id="lestab"></table></div>

 */ ?>  
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Region principal afectada: </b><br>".$mostrar['regionPrincipal']; ?></span></div>
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Actividad realizada : </b><br>".$mostrar['actividadAcc']; ?></span></div>

          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Tipo de Accidente: </b><br>".$mostrar['idTipoDeAccidente']; ?></span></div>
          
          <div class="col-4"><span class="accdetRED"><?php echo "<br><b> Donde ocurrio el accidente:</b><br> ".$mostrar['lugarAccIn'].", ".$mostrar['idLugarAccidente']; ?></span></div> 
          <div class="col-1"><label><input type="hidden" id="foAcc" name="foAcc" value="<?php echo $mostrar['FolioAccidente'];  ?>" > </label></div>
               <div class="col-1"><label><input type="hidden" id="ex" name="ex" value="<?php echo $mostrar['expediente'];  ?>" > </label></div>
          <script>


var palabra = $('#foAcc').val();
var ex = $('#ex').val();
$.ajax({
    url: '../functions/filesTabSA.php',
    type: 'POST',
    data: {palabra:palabra, ex:ex},
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
    url: '../functions/serAdTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#seradtab').show();
      $('#seradtab').html(data);
              
              
    }
  });

  $.ajax({
    url: '../functions/cartasTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#cartastab').show();
      $('#cartastab').html(data);
              
              
    }
  });


          </script>
       <div class="col-1"> <span class="textSection"><center>DETALLES DEL ACCIDENTADO</center></span></div>    
   
       <div class="col-3"><span class="accdet"><?php  echo "<br> <b>PERSONA ACCIDENTADA:</b> <br> ".$mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?></span></div> 
       <div class="col-3"><span class="accdet"><?php  echo "<br> <b>Folio:</b> <br>".$mostrar['FolioAccidente']; ?></span></div> 
       <div class="col-3"><span class="accdet"><?php  
       
       if ($mostrar['folioSiniestro'] == "")
       {
        echo "<br> <b>Siniestro:</b> <br><label style='color:darkred;'>PENDIENTE</label>";
      }else{
        echo "<br> <b>Siniestro:</b> <br>".$mostrar['folioSiniestro'];
      }
         ?></span></div> 
          
       <div class="col-1"><span class="accdetRED">
             DESCRIPCION DE ACCIDENTE: 
          </span><center>
          <textarea  
spellcheck="true"
style="width:90%; font-size: 12px; color: darkred;" rows="6"  readonly>
<?php echo $mostrar['descRepor']; ?> 
</textarea></center>
        
        </div>
       
            
       

             <div class="col-1"> <span class="textSection"><center>ARCHIVOS</center></span></div> 
          <div class="col-1"> 
          <table id="filestab"></table>
</div>
         
     

      <?php
          }
          mysqli_close($conexion);
          ?>
  



<div class="col-1"> <span class="textSection"><center>SERVICIOS ADICIONALES SOLICITADOS</center></span>
<table id="seradtab"></table>
</div>

<div class="col-1"> <span class="textSection"><center>HISTORIAL DE CARTAS</center></span>
<table id="cartastab"></table>
</div>




        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>
