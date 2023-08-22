<html lang="es-MX">
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  
  <title>VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityAdmin.js"></script>
 <script>
const arr = [];
function changes(data, name){
  
 var d="CAMPO MODIFICADO:"+name+" NUEVO VALOR: "+data;
  
 const count = arr.push(d);
 console.log(count);
  console.log(arr);

  $('#cambios').val(arr);
}
  </script>
      
</head> 
    
<body>
    
<?php 
    include("../functions/phpfunctions.php");
       $idAcc = $_GET['idAcc'];
		$conexion = con();
      
		  $sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, ACT.FolioAccidentado,
      telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, folioSiniestro2,
      fechaHoraAccidente, idHospital,  nombreEscuela, ES.nombreEstatus, nombreUrgAmb, ACCT.descRepor, lesionProbableInicial, paqueteHosAcc,
      actividadAcc, tipoDeEventoInicial,periodoDeCobertura, PrimerApellidoA, lugarAccIn, SegundoApellidoA, NombreA, GradoEscolarA, SexoA,
      enunciadoLes, AlcaldiaMunicipio, ACT.Colonia, CalleA, ACCT.poblacionAccidentado, ACT.estado, AlcaldiaMunicipio, servicioAmbulancia,
      ACT.Colonia, ACT.idCP, ACT.CalleA, FechaNacimientoA, GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, numHospital,
      correoReportante, numeroReporte, tipoDeTramite, tipoDeAtencion, tipoDeCobertura, reservaTecnica, honorariosMedicos, observacionesQueja,
      documentosFaltantes,montosErogados, montosErogadosHM, montosErogadosRT, quejaAccidente, comentarioAccidente, resultadosEncuesta, dirEscRepor,
      folioSiniestro, regionPrincipal, notasAcc, ACCT.correoEscuela, dialectoAcc, dialectoAccES, indigenaAcc, ACT.curpAcc, paquetePrecio, tiempoGenerandoSiniestro,
      estatusInterno, envioAcc, tipoLlamada, seguimientTipificacion, ACCT.diagnosticosLista, ACCT.procedimientosLista, ACCT.diagnosticosAcc, ACCT.procedimientosAcc,
      paquetePrecio, paquetePrecioIVA, fechaEgreso, fechaArriboHospital
      FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
      WHERE  ACCT.idEscuela=ESC.idEscuela 
      AND ES.idEstatus=ACCT.idEstatus 
      AND ACCT.FolioAccidentado=ACT.FolioAccidentado 
      AND ACCT.idEstatus= ES.idEstatus 
      AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela 
      AND ES.idEstatus=ACCT.idEstatus 
      AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
    
	
    ?>
    
     <div class="header">
   
      
            
   <?php 
menuENC("AGREGAR ARCHIVO DE ENCUESTA");
?>


</div>
    
    
  <div id="wrapper">
      <div class="limiter">
    
		
      <div class="container-login100" style="background:#B7B9EB; ">
 
     
 <!-- TRAEMOS LA INFORMACION BASICA DEL USUARIO, YA QUE SE UTILIZARA POSTERIORMENTE PARA FOLIAR AL ACCIDENTE EN CASO DE APROBACION-->
  <form action ="../functions/modificarDatosFunction.php" method="post" 
   name="accform" id="accform" enctype="multipart/form-data" onSubmit="return confirm('Se guardaran todos los cambios realizados¿Desea continuar?') ">

   <?php

$foACT ="";
$foactq="SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE idAcc ='$idAcc'";

$resultFO=mysqli_query($conexion,$foactq);

while($mostrar=mysqli_fetch_array($resultFO)){
    $foACT= $mostrar['FolioAccidente'];
}



   $ulMo ="";
   $usMo ="";
   $ulmoq="SELECT * FROM vasegurobd.tb_historialcambios WHERE accidenteModificado ='$foACT' 
   ORDER BY horaDeCambio DESC LIMIT 0,1";
   
   $resultACT=mysqli_query($conexion,$ulmoq);
   
   while($mostrar=mysqli_fetch_array($resultACT)){
       $ulMo= $mostrar['horaDeCambio'];
       $usMo= $mostrar['usuarioQueModifica'];
   }   

   ?>
<div class="col-1">
  <label>
  <?php
    echo "ULTIMA ACTUALIZACION: <label style ='color: black;'> ".$ulMo."</label ><br> REALIZADA POR:  <label style ='color: black;'>".$usMo."</label >";  
   ?> 
   </label>
   </div>


   <?php



   $result=mysqli_query($conexion,$sql);    
		while($mostrar=mysqli_fetch_array($result)){ 
      ?> 
        <div class="col-1">
    <label style="color: darkblue; font-size: 15px;">
      TIPO DE LLAMADA:  
     <?php echo '<label style ="color: black;">'.$mostrar['tipoLlamada']; ?></label> 

    
  </div>
  <div class="col-1">
  <label> ESTATUS INTERNO ACTUAL: 
<input onchange="changes(this.value, this.name)"  
id="estatusInterno"
value="<?php echo $mostrar['estatusInterno']; ?>"
name="estatusInterno" 
autocomplete="off" readonly>
</label> 
</div>  

<div class="col-1">
<label style="color: red;">SELECCIONE UN ESTATUS INTERNO SI DESEA CAMBIAR EL ACTUAL, DE LO CONTRARIO, NO SELECCIONE ALGUNA OPCION:
                        <select id="estatusInternoSE" name ="estatusInternoSE" onchange="eiSE()">
                    <?php 
                     $con= con();
                        $esIn = "SELECT * FROM vasegurobd.cat_estatusinterno order by nombreEstatusInterno ASC";
                        $esInQ=mysqli_query($con,$esIn);
                         echo "<option value=''>Seleccione una opcion:</option>";
		                             while($milista=mysqli_fetch_array($esInQ)){
                               echo "<option>".$milista['nombreEstatusInterno']."</option>";
                                                                          }
 
                        
                       
                        ?>
                    </select>

</label>
</div>

   <div class="col-1">
     <label><input onchange="changes(this.value, this.name)" type="hidden" id="foAcc" value="<?php
   if ($mostrar['idEstatus'] == '1' ){
    echo $mostrar['FolioAccidentado'];  
   } else{
    echo $mostrar['FolioAccidente']; 
   }
    
   
   ?>" > </label>
   </div>
 

     <script>
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


       <div class="col-2">
         <label>Folio Accidente:
       <input onchange="changes(this.value, this.name)" type="text" id="folio" name="folio" value="<?php echo $mostrar['FolioAccidente']?>" readonly>
      </label>
      </div>

     
       <div clas="col-1">
      <span class="accdet" style="font-size: 10px; text-align: left; margin-left: 20; margin-right: 20;" >
      A CONTINUACION PODRA EDITAR TODA LA INFORMACION DEL ACCIDENTE, PARA CORRECCIONES O ERRORES DE REDACCION O REGISTRO.</span>
      </div>
      <div class="col-1"></div>
      <div class="col-1" style="display: none;">
            <textarea id="cambios" name="cambios"></textarea>
          </div> 
            <div class="col-3">
          <label>
          <input onchange="changes(this.value, this.name)"   name="idUsuario" id="idUsuario" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
       
        <div class="col-3">
           <label>
               <input onchange="changes(this.value, this.name)" id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-3">
      
              <label>
          <input onchange="changes(this.value, this.name)"  placeholder="<?php 
  $fechaActual = date('Y-m-d');
  
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
</div>
          <div class="col-3">
    <label>
      FECHA EN QUE OCURRE EL ACCIDENTE: 
      <input onchange="changes(this.value, this.name)" id="fechaReporD"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="fechaReporD"  
       type="date"
       value="<?php
       
       $fh = explode(" ",  $mostrar['fechaHoraAccidente']);
       echo $fh[0]; // porción1
       ?>" >
    </label>


    <label>
      HORA EN QUE OCURRE EL ACCIDENTE: 
      <input onchange="changes(this.value, this.name)" id="fechaReporH"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="fechaReporH"  
       type="time"
       value="<?php
       
       echo $fh[1]; 
       ?>" >
    </label>
  </div> 

   

 

  



      <div class="col-1">
    <label>
      NUMERO DE REPORTE(EDITABLE): 
      <input onchange="changes(this.value, this.name)" id="numeroReporte"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="numeroReporte"   value="<?php echo $mostrar['numeroReporte']; ?>" >
    </label>
  </div> 
  <div class="col-1">
            <span class="textSectionNEW">
					DATOS ADICIONALES<br>
					</span>
          </div> 
          <div class="col-1">
    
    <label>HOJA ENCUESTA:
<?php hojaencuesta($mostrar['FolioAccidente']); ?>
    </label>  <center><input onchange="changes(this.value, this.name)" id="hojaencuesta" name="hojaencuesta[]" type="file" multiple>
        </center>
       
        </div>
        


<?php                  
	
      
}

mysqli_close($con);
mysqli_close($conexion);
?>



<div class="col-submit">
    <button class="submitbtn">ACTUALIZAR DATOS</button>
  </div>
</form>

  </div>
          
          
            <script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
                
          
</script>

      </div>
    </div>
</body>
    
      
</html>