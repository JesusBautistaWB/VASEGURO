<?php
include("phpfunctions.php");

$link = con();
$FolioAccidente = $_POST['folio'];
$FolioAccidentado = $_POST['folioACDO'];
$numeroReporte = $_POST['numeroReporte'];
$nombreUsuario = $_POST['nombreUSuario'];
$idUsuario= $_POST['idUsuario'];
$appPaRepor = $_POST['apRepor'];
$appMaRepor = $_POST['amRepor'];
$nombreRepor = $_POST['nomRepor'];

$fechaRepor = $_POST['fechaReporD']." ".$_POST['fechaReporH'];
$fechaEgreso = $_POST['fechaEgresoD']." ".$_POST['fechaEgresoH'];
$fechaArribo = $_POST['fechaArriboD']." ".$_POST['fechaArriboH'];

$A ="";
if($fechaEgreso ==" "){
      $A =",";   
}else{
      $A =", fechaEgreso = '$fechaEgreso',";
} 


$B ="";
if($fechaArribo ==" "){
      $B =",";   
}else{
      $B =", fechaArriboHospital = '$fechaArribo',";
} 



$puestoReportante = $_POST['puestoReportante'];
$correoReportante = $_POST['correoReportante'];
$telefonoReportante = $_POST['telefonoReportante'];

$appPaAcc = $_POST['apAccidentado'];
$appMaAcc = $_POST['amAccidentado'];
$nombreAcc = $_POST['nomAccidentado'];

$poblacionAccidentado = $_POST['pobAcc'];
$fechaNacimientonAccidentado = $_POST['FechaNacimientoA'];
$generoAccidentado = $_POST['sexoA'];
$gradoEscolarAccidentado = $_POST['gradoA'];

$diagnosticosAcc = $_POST['diagnosticosAcc'];
$diagnosticosLista = $_POST['diagnosticosLista'];

$procedimientosAcc = $_POST['procedimientosAcc'];
$procedimientosLista = $_POST['procedimientosLista'];

$entidadAccidentado = $_POST['EstadoA'];
$alcaldiaAccidentado = $_POST['AlcaldiaA'];
$coloniaAccidentado = $_POST['ColoniaA'];
$cpAccidentado = $_POST['cpAcc'];
$calleAccidentado = $_POST['calleAcc'];

$descRepor = $_POST['descRepor'];
$regionDelCuerpoAfectada = $_POST['regionDelCuerpoAfectada'];
$hospital = $_POST['hospital'];
$tipoDeAccidente = $_POST['tipoDeAccidente'];
$actividadAccidente = $_POST['actividadAccidente'];
$sin = $_POST['sintomas'];
$intensidad = $_POST['intensidad'];
$regionRDCA = $_POST['regionesRDCA'];
$sintomas = implode(",", $sin);
$estatus = $_POST['estatusAcc'];
$lesionProbableInicial = $_POST['lesionProbableInicial'];
$tipoDeEventoInicial = $_POST['tipoDeEventoInicial'];
$periodoDeCobertura = $_POST['periodoDeCobertura'];
$enunciadoLes = $_POST['enunciadoLes'];
$idEscuela = $_POST['idEscuela'];
$escuelaSel = $_POST['escuelaSel'];
$idLugarAccidente = $_POST['idLugarAccidente'];
$lugarAccIn = $_POST['lugarAccIn'];

$appResponsable = $_POST['appResponsable'];
$apmResponsable = $_POST['apmResponsable'];
$nombreResponsable = $_POST['nombreResponsable'];
$telefonoResponsable = $_POST['telefonoResponsable'];
$telefonoResponsablefijo = $_POST['telefonoResponsablefijo'];
$procedimiento = $_POST['procedimiento'];

$montosErogados = $_POST['montosErogados'];
$resultadoEncuesta = $_POST['resultadoEncuesta'];
$documentosFaltantes = $_POST['documentosFaltantes'];
$observacionesQueja = $_POST['observacionesQueja'];
$reservaTecnica = $_POST['reservaTecnica'];
$montosErogadosRT = $_POST['montosErogadosRT'];
$honorariosMedicos = $_POST['honorariosMedicos'];
$montosErogadosHM = $_POST['montosErogadosHM'];
$tipoDeAtencion = $_POST['tipoDeAtencion'];
$tipoDeCobertura = $_POST['tipoDeCobertura'];
$tipoDeTramite = $_POST['tipoDeTramite'];
$quejaAccidente = $_POST['quejaAccidente'];
$comentarioAccidente = $_POST['comentarioAccidente'];
$folioSiniestro = $_POST['folioSiniestro'];
$folioSiniestro2 = $_POST['folioSiniestro2'];
$regionPrincipal = $_POST['regionPrincipal'];
$hospitalAcc = $_POST['hospitalAcc'];
$pq = $_POST['pq'];
$tiempoS = $_POST['tiempoS'];


$calleEscuela = $_POST['calleEscuela'];
$alcaldiaEscuela = $_POST['alcaldiaEscuela'];
$cpEscuela = $_POST['cpEscuela'];
$id_hos = $_POST['id_hos'];


$telefonoEscuela = $_POST['telefonoEscuela'];
$correoEscuela = $_POST['correoEscuela'];
$coloniaEscuela = $_POST['coloniaEscuela'];
$montosErogadosE = $_POST['montosErogadosE'];
$montosErogadosIVA = $_POST['montosErogadosIVA'];



$dirEscRepor  = $calleEscuela.', '.$alcaldiaEscuela.', '.$coloniaEscuela.', '.$cpEscuela.', '.$telefonoEscuela;

$dialectoAcc = $_POST['dialectoAcc'];
$dialectoAccES = $_POST['dialectoAccES'];
$indigenaAcc = $_POST['indigenaAcc'];
$curpAcc = $_POST['curpAcc'];
$estatusInterno = $_POST['estatusInterno'];
$envioAcc = $_POST['envioAcc'];
$notasAcc = $_POST['notasAcc'];
$segTip = $_POST['segTip'];
$cambios = $_POST['cambios'];




$from = new DateTime($fechaNacimientonAccidentado);
$to   = new DateTime('today');
$edad= $from->diff($to)->y;




$sql = "UPDATE  vasegurobd.tb_accidentes 
SET appPaRepor = '$appPaRepor', montosErogados = '$montosErogados', 
resultadosEncuesta = '$resultadoEncuesta', documentosFaltantes = '$documentosFaltantes',
observacionesQueja = '$observacionesQueja',  reservaTecnica = '$reservaTecnica', 
montosErogadosRT = '$montosErogadosRT', honorariosMedicos = '$honorariosMedicos', 
montosErogadosHM = '$montosErogadosHM', tipoDeAtencion = '$tipoDeAtencion', 
tipoDeCobertura = '$tipoDeCobertura',  tipoDeTramite = '$tipoDeTramite', 
quejaAccidente = '$quejaAccidente', comentarioAccidente = '$comentarioAccidente', 
appMaRepor = '$appMaRepor', nombreRepor='$nombreRepor', fechaHoraAccidente = '$fechaRepor'".$A."
idTipoDeAccidente = '$tipoDeAccidente'".$B."
idLugarAccidente = '$idLugarAccidente', 
lugarAccIn = '$lugarAccIn', correoReportante = '$correoReportante',
idEscuela = '$idEscuela',  puestoReportante = '$puestoReportante',
telefonoReportante ='$telefonoReportante', apRes = '$appResponsable',
amRes ='$apmResponsable', nombreRes = '$nombreResponsable',
telFiRes = '$telefonoResponsablefijo', telCelRes = '$telefonoResponsable',
actividadAcc = '$actividadAccidente', 
lesionProbableInicial = '$lesionProbableInicial',
tipoDeEventoInicial = '$tipoDeEventoInicial',
periodoDeCobertura = '$periodoDeCobertura', 
poblacionAccidentado='$poblacionAccidentado', 
descRepor = '$descRepor', enunciadoLes = '$enunciadoLes',
folioSiniestro = '$folioSiniestro',  dirEscRepor = '$dirEscRepor', 
folioSiniestro2 = '$folioSiniestro2',   
regionPrincipal = '$regionPrincipal', correoEscuela = '$correoEscuela',
dialectoAcc = '$dialectoAcc', dialectoAccES = '$dialectoAccES',
indigenaAcc = '$indigenaAcc', estatusInterno = '$estatusInterno', 
envioAcc = '$envioAcc', notasAcc = '$notasAcc',
idHospital = '$hospitalAcc', numHospital = '$id_hos', seguimientTipificacion = '$segTip',
diagnosticosAcc = '$diagnosticosAcc', diagnosticosLista = '$diagnosticosLista',
paqueteHosAcc = '$pq', tiempoGenerandoSiniestro = '$tiempoS',
procedimientosLista = '$procedimientosLista', procedimientosAcc = '$procedimientosAcc',
 paquetePrecio = '$montosErogadosE', paquetePrecioIVA = '$montosErogadosIVA'
 WHERE FolioAccidente = '$FolioAccidente'";


/* if($folioSiniestro != ""){
      $foSi= "UPDATE vasegurobd.tb_accidentes SET
      idEstatus = '7'  WHERE FolioAccidente = '$FolioAccidente'";
       mysqli_query($link,$foSi) or die (mysqli_error($link));
               }?
               */

$accidentado = "UPDATE vasegurobd.tb_accidentado 
SET PrimerApellidoA = '$appPaAcc', SegundoApellidoA = '$appMaAcc',
 NombreA = '$nombreAcc',
FechaNacimientoA = '$fechaNacimientonAccidentado', 
SexoA = '$generoAccidentado', GradoEscolarA = '$gradoEscolarAccidentado',
 EdadA = '$edad', 
CalleA = '$calleAccidentado', 
 estado = '$entidadAccidentado',
  AlcaldiaMunicipio = '$alcaldiaAccidentado', 
  curpAcc = '$curpAcc',
Colonia = '$coloniaAccidentado' WHERE FolioAccidentado = '$FolioAccidentado'";


// REGISTRO DE CAMBIO DE FOLIO DE SINIESTRO
$folioHistorial = "INSERT INTO vasegurobd.tb_historialfoliosiniestro
 (folioSiniestro, folioAccidente, usuarioQueCambia) 
 VALUES ('$folioSiniestro', '$FolioAccidente', '$nombreUsuario')";


$diagnostico = $_POST['diagnostico'];
if($diagnostico != ""){
      $idd = explode(" ", $diagnostico);
      $dia1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idd[0]' ,'D','$FolioAccidente')";
     mysqli_query($link,$dia1) or die (mysqli_error($link));
      
         }
$diagnostico2 = $_POST['diagnostico2'];
if($diagnostico2 != ""){
      $idd2 = explode(" ", $diagnostico2);
      $dia2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idd2[0]' ,'D','$FolioAccidente')";
     mysqli_query($link,$dia2) or die (mysqli_error($link));
         
         }

$diagnostico3 = $_POST['diagnostico3'];
if($diagnostico3 != ""){ 
      $idd3 = explode(" ", $diagnostico3);
      $dia3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idd3[0]' ,'D','$FolioAccidente')";
     mysqli_query($link,$dia3) or die (mysqli_error($link));
         
         }

 $diagnostico4 = $_POST['diagnostico4'];
if($diagnostico4 != ""){
      $idd4 = explode(" ", $diagnostico4);
      $dia4= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idd4[0]' ,'D','$FolioAccidente')";
     mysqli_query($link,$dia4) or die (mysqli_error($link));
         
         }

$diagnostico5 = $_POST['diagnostico5'];
if($diagnostico5 != ""){
      $idd5 = explode(" ", $diagnostico5);
      $dia5= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idd5[0]' ,'D','$FolioAccidente')";
     mysqli_query($link,$dia5) or die (mysqli_error($link));
         
         }

$diagnostico6 = $_POST['diagnostico6'];
if($diagnostico6 != ""){
      $idd6 = explode(" ", $diagnostico6);
      $dia6= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idd6[0]' ,'D','$FolioAccidente')";
     mysqli_query($link,$dia6) or die (mysqli_error($link));
         
         }



$procedimiento = $_POST['procedimiento'];
if($procedimiento != ""){
      $idp = explode(" ", $procedimiento);
      $pro1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idp[0]' ,'P','$FolioAccidente')";
     mysqli_query($link,$pro1) or die (mysqli_error($link));
         
         }
$procedimiento2 = $_POST['procedimiento2'];
if($procedimiento2 != ""){
      $idp2 = explode(" ", $procedimiento2);
      $pro2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idp2[0]' ,'P','$FolioAccidente')";
     mysqli_query($link,$pro2) or die (mysqli_error($link));
         
         }

 $procedimiento3 = $_POST['procedimiento3'];
         if($procedimiento3 != ""){
            $idp3 = explode(" ", $procedimiento3);
               $pro3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
              VALUES('$idp3[0]' ,'P','$FolioAccidente')";
              mysqli_query($link,$pro3) or die (mysqli_error($link));
                  
                  }

$procedimiento4 = $_POST['procedimiento4'];
if($procedimiento4 != ""){
      $idp4 = explode(" ", $procedimiento4);
      $pro4= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idp4[0]' ,'P','$FolioAccidente')";
     mysqli_query($link,$pro4) or die (mysqli_error($link));
         
         }
         
$procedimiento5 = $_POST['procedimiento5'];
if($procedimiento5 != ""){
      $idp5 = explode(" ", $procedimiento5);
      $pro5= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idp5[0]' ,'P','$FolioAccidente')";
     mysqli_query($link,$pro5) or die (mysqli_error($link));
         
         }

$procedimiento6 = $_POST['procedimiento6'];
if($procedimiento6 != ""){
      $idp6 = explode(" ", $procedimiento6);
      $pro6= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$idp6[0]' ,'P','$FolioAccidente')";
     mysqli_query($link,$pro6) or die (mysqli_error($link));
         
         }



         if ($folioSiniestro != ""){ 
            
            $FOSI = "INSERT INTO vasegurobd.tb_registrofoliosiniestro (usuarioQueRegistra, folioSiniestro,folioAccidente)
            VALUES ('$idUsuario','$folioSiniestro', '$FolioAccidente')";
             mysqli_query($link,$FOSI) or die (mysqli_error($link));
         
         }

         $ultimaActualizacion = "INSERT INTO vasegurobd.tb_historialcambios (accidenteModificado, usuarioQueModifica, tipoDeModificacion, cambios)
         VALUES ('$FolioAccidente','$idUsuario', 'ACTUALIZACION', '$cambios')";
          mysqli_query($link,$ultimaActualizacion) or die (mysqli_error($link));

        



  //////////////////
  
  $directorio = "../confirmaciones_egreso/".$FolioAccidente."/";
  chmod($directorio, 0777);

  // Count total files
 $countfiles = count($_FILES['file']['name']);

  
  // Looping all files
  for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['file']['name'][$i];
    $archivo = $directorio . basename($filename);
    $tipoArchivo = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    // Upload file
    //validar tipo de imagen
    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "pneg" || $tipoArchivo == "pdf" ||
     $tipoArchivo == "doc" || $tipoArchivo == "docx"){
      // se validó el archivo correctamente
      if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $archivo)){

            $filestab = "INSERT INTO vasegurobd.tb_rutasarchivos (ruta, usuarioCarga, tipo, estado, folioAcc, idSA)
         VALUES ('$archivo','$idUsuario','AVISO DE ACCIDENTE', '', '$FolioAccidente','')";
          mysqli_query($link,$filestab) or die (mysqli_error($link));    
        
}

  }
}

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$m = $meses[date('n')-1];
$Year = date("Y");
$directorioHE = "../2022/".$m."/";

          mkdir($directorioHE, 0777);
          chmod($directorioHE, 0777);
        
          // Count total files
         $countfilesH = count($_FILES['hojaencuesta']['name']);
        
          
          // Looping all files
          for($i=0;$i<$countfilesH;$i++){
            $filenameH = $_FILES['hojaencuesta']['name'][$i];
            $newH= $foAcc."HojaDeEncuesta";
            $tipoArchivoH = strtolower(pathinfo($filenameH, PATHINFO_EXTENSION));
            $archivoH = $directorioHE . $newH.".".$tipoArchivoH;
            
            // Upload file
            //validar tipo de imagen
            if($tipoArchivoH == "jpg" || $tipoArchivoH == "jpeg" || $tipoArchivoH == "png" || $tipoArchivoH == "pneg" || $tipoArchivoH == "pdf" || $tipoArchivoH == "doc" || $tipoArchivoH == "docx"){
              // se validó el archivo correctamente
              if(move_uploaded_file($_FILES["hojaencuesta"]["tmp_name"][$i], $archivoH)){
        
                    $filestabH = "INSERT INTO vasegurobd.tb_rutasarchivos (ruta, usuarioCarga, tipo, estado, folioAcc, idSA)
                 VALUES ('$archivoH','$idUsuario','HOJA ENCUESTA', '', '$FolioAccidente','')";
                  mysqli_query($link,$filestabH) or die (mysqli_error($link));    
                
        } 
        
          }
        }



mysqli_query($link,$sql) or die (mysqli_error($link));
mysqli_query($link,$folioHistorial) or die (mysqli_error($link));
mysqli_query($link,$accidentado) or die (mysqli_error($link));


/*
include("../lib/conexionBD.php");

$cnx= new PDO("mysql:host=".$host.";dbname=".$basedatos.";port=".$puerto, $user, $pass);


$res= $cnx->query("SELECT DISTINCT claveDP, NOMBRE 
FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos D 
WHERE tipoDP = 'D' 
AND PD.claveDP = D.CATALOG_KEY
AND idSerAD IS NULL
AND FolioAccidenteDP = '$FolioAccidente' ");
$datos=array();
$textD=array();

foreach ($res as $row){
  $datos[]=$row[claveDP].", ";
  $textD[]=$row[NOMBRE].", ";
}
$diag = implode($datos);
$diaString = utf8_encode(implode($textD));


$resPRO= $cnx->query("SELECT DISTINCT claveDP, PRO_NOMBRE
 FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_procedimientos P
 WHERE tipoDP = 'P' 
 AND idSerAD IS NULL
 AND PD.claveDP = P.CATALOG_KEY
AND FolioAccidenteDP = '$FolioAccidente' ");
$datosPRO=array();
$textP=array();

foreach ($resPRO as $row){
  $datosPRO[]=$row[claveDP].", ";
  $textP[]=$row[PRO_NOMBRE].", ";
}
$pro = implode($datosPRO);
$proString = utf8_encode(implode($textP));



$dpAcc= "UPDATE  vasegurobd.tb_accidentes 
SET  diagnosticosAcc =  '$diag', procedimientosAcc =  '$pro', 
diagnosticosLista = '$diaString', procedimientosLista = '$proString'
WHERE FolioAccidente =  '$FolioAccidente'  ";
     mysqli_query($link,$dpAcc) or die (mysqli_error($link));
     */
     mysqli_close($link);

?>

<script>
 if((localStorage.getItem('nivel') == "1" )){
        alert("DATOS Y/O ARCHIVOS ACTUALIZADOS");
        window.location= "../forms/adminAccidentes.php" ;     
      }
    
if((localStorage.getItem('nivel') == "3" )){
        alert("DATOS Y/O ARCHIVOS ACTUALIZADOS");
         window.location= "../forms/adminAccidentesEsc.php" ;     
      }

if((localStorage.getItem('nivel') == "4" )){
        alert("DATOS Y/O ARCHIVOS ACTUALIZADOS");
         window.location= "../forms/adminAccidentesSuperAdmin.php" ;     
      }
</script>



  
