<?php
include("phpfunctions.php");
$link = con();

$folio= $_POST['folio'];
$id= $_POST['idRuta'];
$tipoDocumento= $_POST['tipoDocumento'];
$hospital= $_POST['hospital'];

$fechaActual = date('Y-m-d');



chmod("../confirmaciones_egreso/".$folio, 0777);
$directorio = "../confirmaciones_egreso/".$folio."/";


  // Count total files
 $countfiles = count($_FILES['file']['name']);

  
  // Looping all files
  for($i=0;$i<$countfiles;$i++){
    $filename = $_FILES['file']['name'][$i];
    $archivo = $directorio . basename($filename);
    $tipoArchivo = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    // Upload file
    //validar tipo de imagen
    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "pneg" || $tipoArchivo == "pdf" || $tipoArchivo == "doc" || $tipoArchivo == "docx" || $tipoArchivo == "xls"){
      // se validó el archivo correctamente
      if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $archivo)){
        $filestab = "UPDATE vasegurobd.tb_rutasarchivos SET ruta = '$archivo', tipo = '$tipoDocumento', tipoDocumento = 'ACTUALIZADO POR SEMEDIC',
         estado = 'APROBADO', usuarioCarga='$hospital' WHERE idRuta ='$id'";
         echo $filestab;      
          mysqli_query($link,$filestab) or die (mysqli_error($link)); 

       
      } 

    } else {  ?> <script> alert("TIPO DE ARCHIVO NO PERMITIDO"); history.back(); </script>    <?php }
  }





  $idLDP ="";
  $idCon="SELECT idAcc FROM vasegurobd.tb_accidentes WHERE FolioAccidente ='$folio'";
  
  $result=mysqli_query($link,$idCon);
  
  while($mostrar=mysqli_fetch_array($result)){
      $idLDP = $mostrar['idAcc'];
  }   
              
     
     

 
 mysqli_close($link); 

?>
<script>



   alert("CAMBIO DE ARCHIVO EXITOSO");
   window.history.go(-2);  

      window.location.reload();

  </script>


