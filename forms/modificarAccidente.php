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
menuAdmin("MODIFICAR ACCIDENTE");
?>


</div>
    
    
  <div id="wrapper">
      <div class="limiter">
    
		
      <div class="container-login100" style="background:#2F6818; ">
 
     
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
   <div class="col-1"><label>
   ¿Se solicito servicio de Ambulancia?
   <?php
   if ($mostrar['servicioAmbulancia'] == '' ){
    echo ' <label style ="color: black;"><b>NO</b></label>';  
   } else{
    echo ' <label style ="color: black;">SI, '.$mostrar['servicioAmbulancia'].'</label>'; 
   }
    
   
   ?> </label>
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

      <div class="col-2"><label>Folio Accidentado:
      <input onchange="changes(this.value, this.name)" type="text" id="folioACDO" name="folioACDO" value="<?php echo $mostrar['FolioAccidentado']?>" readonly></label>
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

  <div class="col-3">
    <label>
      FECHA DE ARRIBO A HOSPITAL: 
      <input onchange="changes(this.value, this.name)" id="fechaArriboD"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="fechaArriboD"  
       type="date"
       value="<?php
       
       $fA = explode(" ",  $mostrar['fechaArriboHospital']);
       echo $fA[0]; // porción1
       ?>" >
    </label>


    <label>
      HORA DE ARRIBO A HOSPITAL: 
      <input onchange="changes(this.value, this.name)" id="fechaArriboH"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="fechaArriboH"  
       type="time"
       value="<?php
       
       echo $fA[1]; 
       ?>" >
    </label>
  </div> 

  <div class="col-3">
    <label>
      FECHA EGRESO: 
      <input onchange="changes(this.value, this.name)" id="fechaEgresoD"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="fechaEgresoD"  
       type="date"
       value="<?php 
       
        
       $fe = explode(" ",  $mostrar['fechaEgreso']);
       echo $fe[0];
       
       ?>" >
    </label>

    <label>
      HORA EGRESO: 
      <input onchange="changes(this.value, this.name)" id="fechaEgresoH"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="fechaEgresoH"  
       type="time"
       value="<?php echo $fe[1]; ?>" >
    </label>




  </div>

      <div class="col-1">
      <span class="textSectionRED">
     FOLIO DE SINIESTRO: </span>
     <span class="accdet">ADVERTENCIA: AL LLENAR ESTE APARTADO, EL ACCIDENTE PASARA AL ESTATUS FINALIZADO</span>
     <label>
      <input onchange="changes(this.value, this.name)" placeholder="INGRESE FOLIO DEL SINIESTRO"   
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
      id="folioSiniestro" name="folioSiniestro"   
      
      value="<?php echo $mostrar['folioSiniestro']; ?>" 
      <?php if ($mostrar['folioSiniestro'] != ""){ echo "readonly";} ?>>
      </label>
      </div>
      <div class="col-1">
    <label>
      TIEMPO PARA GENERAR SINIESTRO (Minutos): 
      <input onchange="changes(this.value, this.name)" id="tiempoS"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="tiempoS"  
       type="number"
       min = "1"
       max = "60"
       value="<?php echo $mostrar['tiempoGenerandoSiniestro']; ?>" >
    </label>
  </div> 

  <div class="col-1">
  <span class="textSectionRED">
     FOLIO DE SINIESTRO 2: </span>
   <label>  <?php fs2($foACT); ?></label>
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
      <div class="col-2">
      <label>
      MONTOS EROGADOS (PAQUETE SELECCIONADO: <?php
      $paAc= $mostrar['paqueteHosAcc'];
      $idhos = $mostrar['idHospital']; 
      echo '<b>'.$mostrar['paqueteHosAcc'].'</b>'; ?>): 
      <?php selectPaquete($idhos, $paAc); ?>


      <input onchange="changes(this.value, this.name)" placeholder="MONTO EDITABLE" 
        type="number" onchange="setIVA(this.value,1000);"
        style="background: white; color: black;"
        step="0.01" value="<?php if($mostrar['paquetePrecio']== ""){ }else{ echo $mostrar['paquetePrecio']; } ?>"
        id="montosErogadosE" name="montosErogadosE" >
     
      
        <input onchange="changes(this.value, this.name)" placeholder="MONTOS EROGADOS + IVA" 
        type="number"  step="0.01"
        id="montosErogadosIVA" name="montosErogadosIVA" value="<?php if($mostrar['paquetePrecioIVA']== ""){ }else{ echo $mostrar['paquetePrecioIVA']; } ?>" >
      </label>
      </div>
      
      <div class="col-2">
        
      <label>
      <input onchange="changes(this.value, this.name)" id="pq" name="pq" value="<?php echo $mostrar['paqueteHosAcc']; ?>" >

      RESULTADO ENCUESTA: 
      <?php 
      $encAc = $mostrar['resultadosEncuesta'];
      selectEncuesta($encAc); ?>
      <label>
      </div>

      <div class="col-2">
      <label style="color: darkred;">
      DIAGNOSTICOS: <br>
      <textarea placeholder="COMENTARIO"  
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;
    width: 100%;"  
       id="diagnosticosLista" name="diagnosticosLista"
       onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
       ><?php echo $mostrar['diagnosticosLista']; ?> </textarea>
      </label>
      </div>


      <div class="col-2">
      <label>
      PROCEDIMIENTOS: <br>
      <textarea placeholder="COMENTARIO"  
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;
    width: 100%;"  
       id="procedimientosLista" name="procedimientosLista"
       onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
       ><?php echo $mostrar['procedimientosLista']; ?> </textarea>
      </label>
      </div>


      <div class="col-2">
      <label style="color: darkred;">
      CIE10: <br>
      <textarea placeholder="COMENTARIO"  
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;
    width: 100%;"  
       id="diagnosticosAcc"
       onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
       name="diagnosticosAcc" ><?php echo $mostrar['diagnosticosAcc']; ?></textarea>
      </label>
      </div>

      <div class="col-2">
      <label>
      CPT: <br>
      <textarea placeholder="COMENTARIO"  
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;
    width: 100%;"  
       id="procedimientosAcc" 
       onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
       name="procedimientosAcc"><?php echo $mostrar['procedimientosAcc']; ?></textarea>
      </label>
      </div>

     

      <div class="col-2">
      <label>
      DOCUMENTOS FALTANTES: 
      <select
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
        id="documentosFaltantes" name="documentosFaltantes" >
        <option><?php if( $mostrar['documentosFaltantes'] == "")
        {echo "NO";} else { echo $mostrar['documentosFaltantes']; } ?></option>
        <option>SI</option>
        <option>NO</option>
                                                                              </select>
      </label>

      </div>
      <div class="col-2">
      <label>
      OBSERVACIONES: 
      <input onchange="changes(this.value, this.name)" placeholder="OBSERVACIONES" 
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
        id="observacionesQueja" name="observacionesQueja"   value="<?php echo $mostrar['observacionesQueja']; ?>" >
      </label>
      </div>

      <div class="col-2">
      <label>
      RESERVA TECNICA: 
      <input onchange="changes(this.value, this.name)" placeholder="RESERVA TECNICA SIN IVA"  
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" type='number'
       id="reservaTecnica" name="reservaTecnica"  
        value="<?php echo $mostrar['reservaTecnica']; ?>" >

<!--      <input onchange="changes(this.value, this.name)" placeholder="RESERVA TECNICA + IVA" type="number"  
       id="montosErogadosRT" name="montosErogadosRT"   value="<?php //echo $mostrar['montosErogadosRT']; ?>" readonly >-->
      </label>
      </div>

      <div class="col-2">
      <label>
      HONORARIOS MEDICOS: 
      <input onchange="changes(this.value, this.name)" placeholder="HONORARIOS MEDICOS SIN IVA"  
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  type = "number"
       id="honorariosMedicos" name="honorariosMedicos"   
       onkeyup="setIv(this.value);"
       value="<?php if($mostrar['honorariosMedicos'] == ""){ echo "0.00";} else{ echo $mostrar['honorariosMedicos']; } ?>" >
      
     <!--  <input onchange="changes(this.value, this.name)" placeholder="HONORARIOS MEDICOS + IVA"  
      type="number"  id="montosErogadosHM" name="montosErogadosHM"   value="<?php //if ($mostrar['honorariosMedicos'] =="" ){ } else { echo $mostrar['honorariosMedicos']*1.16; }// ?>" disabled >
     --> </label>
      </div>
    
      <div class="col-2">
      <label>
      TIPO DE ATENCION: 
      <select 
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
        id="tipoDeAtencion" name="tipoDeAtencion"   >
        <option><?php  
        if ($mostrar['tipoDeAtencion'] ==""){
          echo "AMBULATORIA";
        } else { echo $mostrar['tipoDeAtencion']; }
        
        ?> </option>
        <option></option>
        <option>AMBULATORIA</option>
        <option>NO ACUDIO</option>
        <option>RECHAZO</option>
        <option>NO APLICA</option>
        <option>HOSPITALIZACION</option>
        <option>PAGO DIRECTO</option>
        <option>QUIRURGICO</option>
                                                                              </select>
      </label>
      </div>

      <div class="col-2">
      <label>
      TIPO DE COBERTURA: 
      <select 
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
       id="tipoDeCobertura" name="tipoDeCobertura">
       <option>
         <?php  
       if($mostrar['tipoDeCobertura'] == ""){
         echo 'PAGO DIRECTO';
       }else {
      echo $mostrar['tipoDeCobertura']; 
       }
       
       ?></option>

       
       <option>APOYO POR INVALIDEZ Y PERMANENTE A CONSECUENCIA</option>
       <option>CASO ESPECIAL</option>
       <option>GASTOS FUNERARIOS</option>
       <option>NO ACUDIO</option>
       <option>NO APLICA</option>
       <option>PAGO DIRECTO</option>
       <option>PENSION POR INVALIDEZ</option>
       <option>PERDIDA ORGANICA</option>
       <option>MUERTE ACCIDENTAL</option>
       <option>REEMBOLSO DE GASTOS FUNERARIOS</option>
       
                                                                              </select>
      </label>
      </div>
      <div class="col-2">
      <label>
      TIPO DE TRAMITE: 
      <select
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
       id="tipoDeTramite" name="tipoDeTramite"  >
       <option><?php if($mostrar['tipoDeTramite'] == "")
       {echo "PAGO DIRECTO";}else{ echo $mostrar['tipoDeTramite']; } ?></option>
       <option></option>
       <option>PAGO DIRECTO</option>
       <option>NO APLICA</option>
       <option>REEMBOLSO</option>
                                                                              </select>
      </label>
      </div>

       <div class="col-2">
      <label>
      QUEJA: 
      <select 
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
       id="quejaAccidente" name="quejaAccidente"  >
<option><?php if($mostrar['quejaAccidente'] == "")
{
  echo "NO";
} else { echo $mostrar['quejaAccidente']; } ?></option>
<option>SI</option>
<option>NO</option>
                                                                              </select>
      </label>
      </div>

       <div class="col-2">
      <label>
      COMENTARIO: <br>
      <textarea placeholder="COMENTARIO"  
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;
    width: 100%;"  
       id="comentarioAccidente" name="comentarioAccidente"  
       onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
       value="<?php echo $mostrar['comentarioAccidente']; ?>" ></textarea>
      </label>
      </div>
      <div class="col-2">
      <label>
      SEGUIMIENTO TIPIFICACION: 
      <?php 
      $segTip = $mostrar['seguimientTipificacion'];
      selectTip($segTip); ?>
      </label>
      </div>
      <div class="col-1">
    <label>
      NOTAS AGREGADAS AL ACCIDENTE:
      <br>   
<textarea  
name="notasAcc" id="notasAcc"
spellcheck="true"
style="width:100%; font-size: 14px; color: darkred;" rows="4"
onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
><?php echo $mostrar['notasAcc']; ?> </textarea>
            
    </label>
  </div> 

     
       <div class="col-1">
            <span class="textSection" >
						 DATOS DEL REPORTANTE  <br>
					</span>
  </div> 
  
      <div class="col-2">
    <label>
   
    
      Apellido Paterno:
      <input onchange="changes(this.value, this.name)"   id="apRepor"   name="apRepor" value="<?php echo $mostrar['appPaRepor']; ?>"> 
      Apellido Materno:
      <input onchange="changes(this.value, this.name)"   id="amRepor" name="amRepor" value="<?php echo $mostrar['appMaRepor']; ?>"> 
      Nombre(s):
      <input onchange="changes(this.value, this.name)"   id="nomRepor" name="nomRepor" value="<?php echo $mostrar['nombreRepor']; ?>"> 
      </label>
          
  </div> 
 
       <div class="col-2">
    <label>
     Puesto: 
      <input onchange="changes(this.value, this.name)"   id="puestoReportante" name="puestoReportante" value="<?php echo $mostrar['puestoReportante']; ?>"> 
      Teléfono(10 digitos): 
      <input onchange="changes(this.value, this.name)"  id="telefonoReportante" name="telefonoReportante" value="<?php echo $mostrar['telefonoReportante']; ?>">
     
    </label>
           
    
    </div>
    
  
      
     
      <div class="col-1">
            <span class="textSection">
						 DATOS DE LA PERSONA ACCIDENTADA <br>
					</span>
  </div> 
  <div class="col-1">
         <label>
     HABLA ALGUN DIALECTO:
      <input onchange="changes(this.value, this.name)"   id="dialectoAcc" name="dialectoAcc" value="<?php echo $mostrar['dialectoAcc']; ?>"> 
      DIALECTO HABLADO:
      <input onchange="changes(this.value, this.name)"  id="dialectoAccES" name="dialectoAccES" value="<?php echo $mostrar['dialectoAccES']; ?>">
     SE CONSIDERA INDIGENA:
      <input onchange="changes(this.value, this.name)"  id="indigenaAcc" name="indigenaAcc"  value="<?php echo $mostrar['indigenaAcc']; ?>" >
      CURP:
      <input onchange="changes(this.value, this.name)"  id="curpAcc" name="curpAcc"  value="<?php echo $mostrar['curpAcc']; ?>" >
  
  
    </label>
  </div> 
     
  <div class="col-2">
         <label>
     APELLIDO PATERNO:
      <input onchange="changes(this.value, this.name)"   id="apAccidentado" name="apAccidentado" value="<?php echo $mostrar['PrimerApellidoA']; ?>"> 
     APELLIDO MATERNO:
      <input onchange="changes(this.value, this.name)"  id="amAccidentado" name="amAccidentado" value="<?php echo $mostrar['SegundoApellidoA']; ?>">
      NOMBRE(S):
      <input onchange="changes(this.value, this.name)"  id="nomAccidentado" name="nomAccidentado"  value="<?php echo $mostrar['NombreA']; ?>" >
  
    </label>
  </div> 

        <div class="col-2">
    <label>TIPO DE POBLACION DEL ACCIDENTADO:
    <input onchange="changes(this.value, this.name)"  id="pobAcc" name="pobAcc" value="
    <?php echo ltrim($mostrar['poblacionAccidentado']); ?>" >
    GRADO ESCOLAR:
    <input onchange="changes(this.value, this.name)"  id="gradoA"  name="gradoA"  value="<?php echo $mostrar['GradoEscolarA']; ?>" >
    SEXO(MASCULINO O FEMENINO):
    <input onchange="changes(this.value, this.name)"  id="sexoA" name="sexoA" value="<?php echo $mostrar['SexoA']; ?>" >
    </label> 
  </div>
      
      
           <div class="col-2">
    <label>
      
    
    Fecha de nacimiento de accidentado/a:
    <input onchange="changes(this.value, this.name)"  id="FechaNacimientoA" name="FechaNacimientoA" type="date"  
    value="<?php echo $mostrar['FechaNacimientoA']; ?>" > 
    </label> 
  </div>
      
          <div class="col-1">
            <span class="textSectionPEN">
						 DOMICILIO DEL ACCIDENTADO/A <br>
					</span>
  </div> 
      
    
         <div class="col-2">
                <label>
      ENTIDAD FEDERATIVA:
      <input onchange="changes(this.value, this.name)"  id="EstadoA" name="EstadoA"  value="<?php echo $mostrar['estado']; ?>" >
      </label>
      
   
  </div>
      

  
      <div class="col-2">
   <label>
      ALCALDIA/MUNICIPIO DEL ACCIDENTADO/A:
      <input onchange="changes(this.value, this.name)"  id="AlcaldiaA" name="AlcaldiaA"  value="<?php echo $mostrar['AlcaldiaMunicipio']; ?>" >
      </label>     
  </div> 
          
      <div class="col-2">
     <label>
         
     COLONIA DEL  ACCIDENTADO:
     <input onchange="changes(this.value, this.name)"  id="ColoniaA" name="ColoniaA"  value="<?php echo $mostrar['Colonia']; ?>" >
      </label> 
           
           
  </div>
      
      
  <div class="col-2">
    <label>
      CODIGO POSTAL:   
      <input onchange="changes(this.value, this.name)"  id="cpAcc" name="cpAcc"  value="<?php echo $mostrar['idCP']; ?>" >
      </label> 
  </div> 
      

      <div class="col-2">
    <label>
      CALLE Y NUMERO:
          
      <input onchange="changes(this.value, this.name)"  name="calleAcc"  value="<?php echo $mostrar['CalleA']; ?>" >
      </label> 
  </div> 

  <div class="col-1">
            <span class="textSection">
						HOSPITAL QUE ATIENDE <br>
					</span>
  </div> 
  <div class="col-1">

<label> ESTE ACCIDENTE SE REFIRIO AL HOSPITAL: 
<input onchange="changes(this.value, this.name)"  
id="hospitalAcc"
value="<?php echo $mostrar['idHospital']; ?>"
name="hospitalAcc" 
autocomplete="off" 
style="font-size: 15px; color: black; background:#C6E7E8; border-radius: 15px;" 
readonly>

<input onchange="changes(this.value, this.name)" type="hidden" id="id_hos" name="id_hos" value="<?php echo $mostrar['numHospital'];

?>"
     style="font-size: 12px; color: black; background:#C6E7E8; border-radius: 15px;" readonly>
</label> 
</div>  
  

<div class="col-1">
<label style="color: darkred; font-size: 12px;">SELECCIONE UN HOSPITAL DISTINTO INTERNO SI DESEA CAMBIAR EL ACTUAL, DE LO CONTRARIO, NO SELECCIONE ALGUNA OPCION:
                        <select id="hosAccSel" name ="hosAccSel" onchange="hosSE()">
                    <?php 
                     $con= mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                     $con -> set_charset("utf8");
                        $hosQ = "SELECT DISTINCT * FROM vasegurobd.cat_hospitales 
                        WHERE tipoDeServicio in ('H','C')
                        ORDER BY nombreClinicaHospital ASC;";
                        $hosQR=mysqli_query($con,$hosQ);
                         echo "<option value=''>Seleccione una opcion:</option>";
		                             while($milista=mysqli_fetch_array($hosQR)){

                               echo "<option>".$milista['nombreClinicaHospital']."</option>";
                                                                                }
 
                        
                        
                        ?>
                    </select>

</label>
</div>
      
        <div class="col-1">
            <span class="textSectionPEN">
						DETALLES DEL ACCIDENTE <br>
					</span>
  </div> 
<script>
 
  </script>

  <div class="col-1">
    <label>
      DESCRIPCION DEL ACCIDENTE:
      <br>   
      <textarea  
name="descRepor" 
id="descRepor"
spellcheck="true"
style="width:100%; font-size: 14px; color: darkred;" rows="4" 
onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
 required>
<?php echo $mostrar['descRepor']; ?></textarea>          
    </label>
  </div> 
  




  <div class="col-3">
      
      <label>
 REGION PRINCIPAL AFECTADA:<br>
  <input onchange="changes(this.value, this.name)" id = "regionPrincipal" name = "regionPrincipal" value="<?php echo $mostrar['regionPrincipal']; ?>" required>
  
</label> 
       
 </div>

  <div class="col-3">
      
      <label>
 LESION PROBABLE INICIAL:<br>
  <input onchange="changes(this.value, this.name)" id = "lesionProbableInicial" name = "lesionProbableInicial" value="<?php echo $mostrar['lesionProbableInicial']; ?>" >
  
</label> 
       
 </div>

  <div class="col-3" id="acti1">
      
      <label>
 ACTIVIDAD REALIZADA:<br>
  <input onchange="changes(this.value, this.name)" id = "actividadAccidente" name = "actividadAccidente" value="<?php echo $mostrar['actividadAcc']; ?>" required>
  
</label> 
       
 </div>
      
    
        
      <div class="col-3">
    <label>
      Tipo de lesion: 
      <input onchange="changes(this.value, this.name)" id = "tipoDeAccidente" name = "tipoDeAccidente" value="<?php echo $mostrar['idTipoDeAccidente']; ?>" required>
      
    </label> 
  </div>

  <div class="col-3">
    <label>
      PERIODO DE COBERTURA: 
      <input onchange="changes(this.value, this.name)" id = "periodoDeCobertura" name = "periodoDeCobertura" value="<?php echo $mostrar['periodoDeCobertura']; ?>" required>
      
    </label> 
  </div>

  <div class="col-3">
    <label>
      TIPO DE EVENTO INICIAL: 
      <input onchange="changes(this.value, this.name)" id = "tipoDeEventoInicial" name = "tipoDeEventoInicial" value="<?php echo $mostrar['tipoDeEventoInicial']; ?>" >
      
    </label> 
  </div>
  <div class="col-3">
    <label>
      LUGAR DONDE OCURRIO: 
      <input onchange="changes(this.value, this.name)" id = "lugarAccIn" name = "lugarAccIn" value="<?php echo $mostrar['lugarAccIn']; ?>" required>
      LUGAR ESPECIFICO: 
      <input onchange="changes(this.value, this.name)" id = "idLugarAccidente" name = "idLugarAccidente" value="<?php echo $mostrar['idLugarAccidente']; ?>" required>
      
    </label> 
  </div>
  <div class="col-1">
    <label>
      LESIONES:
      <br>   
<textarea  
name="enunciadoLes" 
spellcheck="true"
style="width:100%; font-size: 14px; color: darkred;" rows="4" onkeypress="return validar(event)" 
      onpaste="return validar(event)"  required><?php echo $mostrar['enunciadoLes']; ?> </textarea>
            
    </label>
  </div>  
  <div class="col-1"> <span class="textSection"><center>SERVICIOS ADICIONALES SOLICITADOS</center></span>
<table id="seradtab"></table>
</div>
    <!-- aqui estaban las notas --> 



  <div class="col-1"> <span class="textSection"><center>ARCHIVOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="filestab"></table>
  
  </div>
          <div class="col-1"> 
          <center><img src='../images/files.png' height='150'  width='150'></center>
                                                                              </div>
<div class="col-1"><center>
          <span class="accdet"> <b>AQUI PUEDE CARGAR ARCHIVOS NUEVOS AL ACCIDENTE </b> <br> <u>EXTENSIONES VALIDAS: JPG, JPEG, PNG, PNEG, PDF, DOC, DOCX </u> <br></span>
         
          <input onchange="changes(this.value, this.name)" type="hidden" name="MAX_FILE_SIZE" value="1000000000">
          <input onchange="changes(this.value, this.name)" type="file" name="file[]" id="file" multiple  ></center>
          <label></label>
          </div>

          
      
 
       <div class="col-1">
       
            <span class="textSection"><img src='../images/escuela.png' height='20'  width='20'>
					ESCUELA DE PROCEDENCIA<br>
					</span>
          
          <label> NOMBRE:
  <input onchange="changes(this.value, this.name)" id="escuela_id" 
  name="escuela_id"  
  value="<?php echo $mostrar['nombreEscuela']; ?>" 
  onkeyup="autocompletarNOMESC();" autocomplete="off">
   <input onchange="changes(this.value, this.name)" id="escuelaSel" 
  name="escuelaSel" readonly>

          </label> 
          <span class="listautocomp">
					<ul id="lista_esc"></ul>  
					</span>
          </div>
          <div class="col-1">

          <label> CORREO ELECTRONICO: 
     <input onchange="changes(this.value, this.name)"  
     id="correoEscuela"
     value="<?php echo $mostrar['correoEscuela']; ?>"
     name="correoEscuela" 
     autocomplete="off" >
     </label> 
  </div>

  <div class="col-3">
  <label> CALLE Y NUMERO:
     <input onchange="changes(this.value, this.name)"  
     id="calleEscuela"
     value="<?php
     $dir = explode(", ",  $mostrar['dirEscRepor'] );
     echo $dir[0];
     ?>"
     name="calleEscuela" 
     autocomplete="off" >
     </label> 
  </div>

  <div class="col-3">
  <label> ALCALDIA:
     <input onchange="changes(this.value, this.name)"  
     id="alcaldiaEscuela"
     value="<?php
     echo $dir[1];
     ?>"
     name="alcaldiaEscuela" 
     autocomplete="off" >
     </label> 
  </div>

  <div class="col-3">
  <label> COLONIA:
     <input onchange="changes(this.value, this.name)"  
     id="coloniaEscuela"
     value="<?php
     echo $dir[2];
     ?>"
     name="coloniaEscuela" 
     autocomplete="off" >
     </label> 
  </div>

  <div class="col-3">
  <label> CODIGO POSTAL:
     <input onchange="changes(this.value, this.name)"  
     id="cpEscuela"
     value="<?php
     echo $dir[3];
     ?>"
     name="cpEscuela" 
     autocomplete="off" >
     </label> 
  </div>

  <div class="col-3">
  <label> TELEFONO:
     <input onchange="changes(this.value, this.name)"  
     id="telefonoEscuela"
     value="<?php
     echo $dir[4];
     ?>"
     name="telefonoEscuela" 
     autocomplete="off" >
     </label> 
  </div>

          
            <div class="col-3">
              <label> ID:
     <input onchange="changes(this.value, this.name)"  
     id="idEscuela" 

     value="<?php echo $mostrar['idEscuela']; ?>"
     name="idEscuela" 
     autocomplete="off" readonly>
</label>
  </div>  
  <div class="col-1"> <span class="textSectionRED"><center>DIAGNOSTICOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="diatab"></table>
  
  </div> 
  <div class="col-1"> <span class="textSectionNEW"><center>PROCEDIMIENTOS ASOCIADOS AL ACCIDENTE</center></span>
  <table id="procetab"></table>
  
  </div> 

          <?php diagnosticosMultiples();
                procedimientosMultiples(); ?>  
          
      <div class="col-1">
            <span class="textSectionPEN">
					RESPONSABLE DEL ACCIDENTADO<br>
					</span>
  </div> 
  
   <div class="col-2">
    <label>
      Responsable Accidentado/a:
<input onchange="changes(this.value, this.name)" placeholder="APELLIDO PATERNO" id="appResponsable" name="appResponsable" autocomplete="off" onkeyup="appRes();" value="<?php echo $mostrar['apRes']; ?>" required>
            <span class="listautocomp">
					<ul id="lista_appRes"></ul>  
					</span>  
<input onchange="changes(this.value, this.name)" placeholder="APELLIDO MATERNO" id="apmResponsable" name="apmResponsable" autocomplete="off" onkeyup="apmRes();" value="<?php echo $mostrar['amRes']; ?>">
         <span class="listautocomp">
					<ul id="lista_apmRes"></ul>  
					</span>  
<input onchange="changes(this.value, this.name)" placeholder="NOMBRE(S)"  id="nombreResponsable" name="nombreResponsable" autocomplete="off" onkeyup="nombreRes();" value="<?php echo $mostrar['nombreRes']; ?>" required> 
         <span class="listautocomp">
					<ul id="lista_nombreRes"></ul>  
					</span>  
    </label>
  </div>     <div class="col-2">
    <label>

Teléfono (10 DIGITOS): 
<input onchange="changes(this.value, this.name)" placeholder="TELEFONO MOVIL" name="telefonoResponsable" id="telefonoResponsable" type="tel"  maxlength="10" pattern="\d*" value="<?php echo $mostrar['telCelRes']; ?>" required><br>   
<input onchange="changes(this.value, this.name)" placeholder="TELEFONO FIJO"  name="telefonoResponsablefijo" id="telefonoResponsablefijo" type="tel"  maxlength="10" pattern="\d*" value="<?php echo $mostrar['telFiRes']; ?>"  required ><br> 
    </label>
  </div> 
      
 
      <div class="col-1"> <span class="textSectionNEW"><center>ENVIO DEL ACCIDENTE</center></span></div>
      <div class="col-1">

<label> ¿EL ACCIDENTE HA SIDO ENVIADO?: 
<input onchange="changes(this.value, this.name)"  
id="envioAcc"
value="<?php echo $mostrar['envioAcc']; ?>"
name="envioAcc" 
autocomplete="off" readonly>
</label> 
</div>  
  
<div class="col-1">
<label style="color: darkgreen;">SI DESEA CAMBIAR LA SITUACION DEL ENVIO DEL ACCIDENTE, SELECCIONE ABAJO. SINO, DEJE ESTA LISTA INTACTA:
                        <select id="envioAccSE" name ="envioAccSE" onchange="envioAccFU()">
                
                        <option value=''>Seleccione una opcion:</option>
                        <option >ENVIADO</option>
                        <option >NO ENVIADO</option>
                    </select>



</div>

      
<div class="col-1"> <span class="textSectionNEW"><center>PAQUETE HOSPITAL</center></span></div>

<div class="col-1">

<label> MONTO EROGADO: 
<input onchange="changes(this.value, this.name)"  
id="paqueteHosAcc"
value="<?php echo $mostrar['paqueteHosAcc'];

$pqt= explode("$",$mostrar['paqueteHosAcc']);

?>"
name="paqueteHosAcc" 
autocomplete="off" readonly>
</label> 
<label> MONTO EROGADO + IVA: 
<input onchange="changes(this.value, this.name)"  
id="paqueteHosAccIVA"
value="<?php 

$pq = $pqt[1];

$pq1 = rtrim($pq,")");
$pq2 = ltrim($pq1,"(");

$pq3 = $pq2+($pq2*0.16);

echo "$ ".$pq3;
?>"
name="paqueteHosAccIVA" 
autocomplete="off" readonly>
</label> 
</div>  
  

<!--
<div class="col-1">

<label> ESTATUS GENERAL ACTUAL: 
<input onchange="changes(this.value, this.name)"  
id="estatus"
value=" <?php echo $mostrar['nombreEstatus']; ?>"
name="estatus" 
autocomplete="off" readonly>

</label> 
</div>-->
<!--<div class="col-1"> <span class="textSectionNEW"><center>OPCIONES DE HOSPITAL</center></span></div>-->
<div class="col-1">
<label><br></label>
<center>
<?php 
if($mostrar['idEstatus'] == 3){
                echo "<a href='arriboHospital.php?idAcc=".$idAcc."'>
                <button class='submitbtn' type='button' style='font-size: 10px; width: 130px; height: 50px;'>
                REPORTAR ARRIBO</button></a>";
            }  if($mostrar['idEstatus'] == 5){
                echo "<a href='egresoHospital.php?idAcc=".$idAcc.
                "'><button class='submitbtn' type='button' style='background: #EA6E38; font-size: 10px; 
                width: 130px; height: 50px;'>REPORTAR EGRESO</button></a>";
            }
            ?>
</center>
          </div>


        

 <!--
<div class="col-1">
<label style="color: darkred;">SELECCIONE UN ESTATUS GENERAL, SI DESEA CAMBIAR EL ACTUAL, DE LO CONTRARIO, NO SELECCIONE ALGUNA OPCION:
                        <select id="estatusSE" name ="estatusSE" onchange="egSE()">
                    <?php 
                     /*$con= mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                     $con -> set_charset("utf8");
                        $esIn = "SELECT * FROM vasegurobd.cat_estatus ";
                        $esInQ=mysqli_query($con,$esIn);
                         echo "<option value=''>Seleccione una opcion:</option>";
		                             while($milista=mysqli_fetch_array($esInQ)){

                               echo "<option value=".$milista['idEstatus'].">".$milista['nombreEstatus']."</option>";
                                                                                }
 
                        
                        
                       */ ?>
                    </select>

</label>
</div>
-->

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