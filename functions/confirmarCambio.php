<?php

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");

$folio= $_POST['folio'];
$id= $_POST['idRuta'];
$tipoDocumento= $_POST['tipoDocumento'];
$hospital= $_POST['hospital'];

        


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
    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png" || $tipoArchivo == "pneg" || $tipoArchivo == "pdf" || $tipoArchivo == "doc" || $tipoArchivo == "docx"){
      // se validó el archivo correctamente
      if(move_uploaded_file($_FILES["file"]["tmp_name"][$i], $archivo)){
        $filestab = "UPDATE vasegurobd.tb_rutasarchivos SET ruta = '$archivo', tipoDocumento = '$tipoDocumento',
         estado = 'EN REVISION', usuarioCarga='$hospital' WHERE idRuta ='$id'";
         
          mysqli_query($link,$filestab) or die (mysqli_error($link)); 

       
      } 

    }
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
   alert("CAMBIO DE ARCHIVO EXITOSO, SE REVISARA NUEVAMENTE");
          window.location= "../forms/detallesAccidenteHos.php?idAcc=<?php echo $idLDP; ?>" ;

  </script>


