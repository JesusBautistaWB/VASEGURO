<?php
  
  include("phpfunctions.php");
$link = con();
$idAcc= $_REQUEST['idAcc'];
$foAcc = $_POST['foAcc'];



$hospital = $_POST['nombreUsuario'];
$idHos = $_POST['idHos'];


date_default_timezone_set('America/Mexico_City');
$time = time();
$fecha = date("Y:m:d", $time);
$hora = date("H:i:s", $time);

$fechaSolicitud = $fecha." ".$hora;

     


/* $sa1= $_POST['sa1'];

if($sa1 != ""){
  $msa1= $_POST['msa1'];
$coa1= $_POST['coa1'];
$sa1q= "INSERT INTO vasegurobd.tab_serviciosadicionales (conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud ,hospitalOrigen, comentarioAcc, fechaSolicitud)
VALUES('$sa1', '$foAcc', '$msa1','NUEVA','$hospital','$coa1','$fechaSolicitud')";

mysqli_query($link,$sa1q) or die (mysqli_error($link));

} */

$ciru= $_POST['ciru'];
$ciruN= $_POST['ciruN'];
$anes= $_POST['anes'];
$anesN= $_POST['anesN'];
$ayud= $_POST['ayud'];
$ayudN= $_POST['ayudN'];
$ayud2= $_POST['ayud2'];
$ayudN2= $_POST['ayudN2'];

if($ciruN != ""){


$sa1q= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos)
VALUES('CIRUJANO', '$foAcc', '$ciru','NUEVA','$hospital','$ciruN','$fechaSolicitud','$idHos')";

mysqli_query($link,$sa1q) or die (mysqli_error($link));
}

if($anesN != ""){
$anesQ= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos)
VALUES('ANESTESIOLOGO', '$foAcc', '$anes','NUEVA','$hospital','$anesN','$fechaSolicitud','$idHos')";
mysqli_query($link,$anesQ) or die (mysqli_error($link));
}

if($ayudN != ""){
$ayudQ= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos) 
VALUES('AYUDANTE', '$foAcc', '$ayud','NUEVA','$hospital','$ayudN','$fechaSolicitud', '$idHos')";
mysqli_query($link,$ayudQ) or die (mysqli_error($link));
}


if($ayudN2 != ""){
$ayudN2= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos)
VALUES('AYUDANTE', '$foAcc', '$ayud2','NUEVA','$hospital','$ayudN2','$fechaSolicitud', '$idHos')";
mysqli_query($link,$ayudQ2) or die (mysqli_error($link));

}

$consul= $_POST['consul'];
$consulDet= $_POST['consulDet'];
if($consul != ""){
$consulQ= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos)
VALUES('CONSULTA', '$foAcc', '$consul','NUEVA','$hospital','$consulDet','$fechaSolicitud','$idHos')";
mysqli_query($link,$consulQ) or die (mysqli_error($link));

}

$medi= $_POST['medi'];
$mediEs= $_POST['mediEs'];
if($medi != ""){
$mediQ= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos)
VALUES('MEDICAMENTOS', '$foAcc', '$medi','NUEVA','$hospital','$mediEs','$fechaSolicitud', '$idHos')";
mysqli_query($link,$mediQ) or die (mysqli_error($link));

}

$tera= $_POST['tera'];
$teraDet= $_POST['teraDet'];
if($tera != ""){
$teraQ= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos)
VALUES('TERAPIA', '$foAcc', '$tera','NUEVA','$hospital','$teraDet','$fechaSolicitud','$idHos')";
mysqli_query($link,$teraQ) or die (mysqli_error($link));

}

$otro= $_POST['otro'];
$otroDet= $_POST['otroDet'];
if($otro != ""){
$otroQ= "INSERT INTO vasegurobd.tab_serviciosadicionales 
(conceptoServicio, folioAccidenteServicio, costoServicio, estadoSolicitud,
hospitalOrigen, comentarioAcc, fechaSolicitud, idHos)
VALUES('OTRO', '$foAcc', '$otro','NUEVA','$hospital','$otroDet','$fechaSolicitud','$idHos')";
mysqli_query($link,$otroQ) or die (mysqli_error($link));

}

$esIn= "UPDATE vasegurobd.tb_accidentes SET estatusInterno = 'SOLICITUD DE SERVICIO' WHERE FolioAccidente = '$foAcc'";
mysqli_query($link,$esIn) or die (mysqli_error($link));


$directorio = "../confirmaciones_egreso/".$foAcc."/";
chmod($directorio, 0777);


$sqlF="SELECT * FROM vasegurobd.cat_archivos";
          
          
          $resultF=mysqli_query($link,$sqlF);
          while($mostrar=mysqli_fetch_array($resultF)){



 $name = $mostrar['name'];
 $tipo = $mostrar['cat_nomArchivo'];
 
 $idSA = $mostrar['idSA'];

  // Count total files
  $countfiles = count($_FILES[$name]['name']);

  
  // Looping all files
  for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES[$name]['name'][$i];
    $new= $tipo."-".$foAcc."-EGRESO";
    $tipoArchivo = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
     $archivo = $directorio . $new.".".$tipoArchivo;
    // Upload file
    //validar tipo de imagen
    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "pneg" || $tipoArchivo == "pdf" || $tipoArchivo == "doc" || $tipoArchivo == "docx"){
      // se validó el archivo correctamente
      if(move_uploaded_file($_FILES[$name]["tmp_name"][$i], $archivo)){
        $filestab = "INSERT INTO vasegurobd.tb_rutasarchivos (ruta, usuarioCarga, tipo, estado, folioAcc, idSA, tipoDocumento)
         VALUES ('$archivo','$id','SOLICITUD HECHA POR MEDICO', 'EN REVISION', '$foAcc','$idSA', '$tipo')";
          mysqli_query($link,$filestab) or die (mysqli_error($link)); 
         
      }   

    }
  }

  
  
          }



?>
<script>



alert("SOLICITUDES ENVIADAS");
window.location= "../forms/adminMedicos.php?foAcc=<?php echo $foAcc; ?>" ;          
</script>




  
