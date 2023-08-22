<?php
include("phpfunctions.php");
$link = con();

$id= $_REQUEST['medico'];
$foAcc= $_REQUEST['foAcc'];
$idSA= $_REQUEST['idSA'];
$estatusSolicitud= $_REQUEST['estatusSolicitud'];
$comentarioMed= $_REQUEST['comentarioMed'];
$conSo= $_REQUEST['conSo'];
$medico= $_REQUEST['medico'];
$auto= $_REQUEST['auto'];
$subse= $_REQUEST['subse'];





$directorio = "../confirmaciones_egreso/".$foAcc."/";
mkdir($directorio, 0777);

$sqlF="SELECT * FROM vasegurobd.cat_archivos;";
          
          
$resultF=mysqli_query($link,$sqlF);
while($mostrar=mysqli_fetch_array($resultF)){



$name = $mostrar['name'];
$tipo = $mostrar['cat_nomArchivo'];

// Count total files
$countfiles = count($_FILES[$name]['name']);


// Looping all files
for($i=0;$i<$countfiles;$i++){
$filename = $_FILES[$name]['name'][$i];
$archivo = $directorio . basename($filename);
$tipoArchivo = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
// Upload file
//validar tipo de imagen
if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "pneg" || $tipoArchivo == "pdf" || $tipoArchivo == "doc" || $tipoArchivo == "docx"){
// se validó el archivo correctamente
if(move_uploaded_file($_FILES[$name]["tmp_name"][$i], $archivo)){
$filestab = "INSERT INTO vasegurobd.tb_rutasarchivos (ruta, usuarioCarga, tipo, estado, folioAcc, idSA, tipoDocumento)
VALUES ('$archivo','$id','SERVICIO ADICIONAL', 'EN REVISION', '$foAcc','$idSA', '$tipo')";
mysqli_query($link,$filestab) or die (mysqli_error($link)); 


} 

}
}



}   


date_default_timezone_set('America/Mexico_City');
$time = time();
$fecha = date("Y:m:d", $time);
$hora = date("H:i:s", $time);

$fechaRespuesta = $fecha." ".$hora;


  
 $sql = "UPDATE vasegurobd.tab_serviciosadicionales SET estadoSolicitud = '$estatusSolicitud',
 comentarioMed = '$comentarioMed', medicoRevisor = '$medico', fechaRespuesta = '$fechaRespuesta',
 autorizacion = '$auto', subsecuencia = '$subse'
  WHERE id_servicio = '$idSA'";

 

mysqli_query($link,$sql) or die (mysqli_error($link)); 
 
  // Looping all files
  ?>
    <script>
      alert("SOLICITUD ATENDIDA, ARCHIVO(S) AGREGADOS");
      window.location.href = "../forms/adminMedicos.php?foAcc=<?php echo $foAcc; mysqli_close($link); ?>";   
      </script>
    

