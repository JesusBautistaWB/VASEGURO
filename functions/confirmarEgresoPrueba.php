<?php
include("phpfunctions.php");
$link = con();

$idAcc= $_GET['idAcc'];
$id= $_POST['id'];
$foAcc= $_REQUEST['foAcc'];
$tipoDocumento= $_POST['tipoDocumento'];
$diagnostico = $_POST['diagnostico'];
$diagnostico2 = $_POST['diagnostico2'];
$diagnostico3 = $_POST['diagnostico3'];

$procedimiento = $_POST['procedimiento'];
$procedimiento2 = $_POST['procedimiento2'];
$procedimiento3 = $_POST['procedimiento3'];
$fechaEgreso = $_POST['fechaEgreso'];        



$directorio = "../confirmaciones_egreso/".$foAcc."/";
chmod($directorio, 0777);


$sqlF="SELECT * FROM vasegurobd.cat_archivos";
          
          
          $resultF=mysqli_query($link,$sqlF);
          while($mostrar=mysqli_fetch_array($resultF)){



 $name = $mostrar['name'];
 $tipo = $mostrar['cat_nomArchivo'];

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
         VALUES ('$archivo','$id','EGRESO', 'EN REVISION', '$foAcc','', '$tipo')";
          mysqli_query($link,$filestab) or die (mysqli_error($link)); 
         
      }   

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










                
      $sql = "UPDATE vasegurobd.tb_accidentes SET idEstatus = '15', fechaEgreso = '$fechaEgreso' WHERE idAcc = '$idAcc'";
      mysqli_query($link,$sql) or die (mysqli_error($link)); 
     
          
      // AGREGAR DIAGNOSTICOS
if($diagnostico != ""){
  $idd = explode(" ", $diagnostico);
     $dia1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
    VALUES('$idd[0]' ,'D','$foAcc')";
    mysqli_query($link,$dia1) or die (mysqli_error($link));
        }

if($diagnostico2 != ""){
  $idd2 = explode(" ", $diagnostico2);
     $dia2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
    VALUES('$idd2[0]' ,'D','$foAcc')";
    mysqli_query($link,$dia2) or die (mysqli_error($link)); 
        }

if($diagnostico3 != ""){ 
  $idd3 = explode(" ", $diagnostico3);
     $dia3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
    VALUES('$idd3[0]' ,'D','$foAcc')";
    mysqli_query($link,$dia3) or die (mysqli_error($link));
        
        }
     
// AGREGAR PROCEDIMIENTOS
       
        if($procedimiento != ""){
              $idp = explode(" ", $procedimiento);
              $pro1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
             VALUES('$idp[0]' ,'P','$foAcc')";
             mysqli_query($link,$pro1) or die (mysqli_error($link));
                 
                 }
        
        if($procedimiento2 != ""){
          $idp2 = explode(" ", $procedimiento2);
              $pro2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
             VALUES('$idp2[0]' ,'P','$foAcc')";
             mysqli_query($link,$pro2) or die (mysqli_error($link));
                 
                 }
        
        
        if($procedimiento3 != ""){
          $idp3 = explode(" ", $procedimiento3);
                       $pro3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
                      VALUES('$idp3[0]' ,'P','$foAcc')";
                      mysqli_query($link,$pro3) or die (mysqli_error($link));
                          
                          }

    //ESPECIFICAR PAQUETE

   $paqueteHosAcc = $_POST['paqueteHosAcc'];
   if ($paqueteHosAcc == "FUERA DE PAQUETE"){
     $efdp= "UPDATE vasegurobd.tb_accidentes SET estatusInterno = 'EGRESO FUERA DE PAQUETE' WHERE FolioAccidente  = '$foAcc'";
    mysqli_query($link,$efdp) or die (mysqli_error($link));
   }else {


    // ESPECIFICAR ESTATUS INTERNO
     $efdp1= "UPDATE vasegurobd.tb_accidentes SET estatusInterno = 'ALTA' WHERE FolioAccidente  = '$foAcc'";
     mysqli_query($link,$efdp1) or die (mysqli_error($link));

    }

    $pqmonto = explode("(", $paqueteHosAcc);
    $nombrePaquete = $pqmonto[0];
    $montoPaquete = rtrim($pqmonto[1], ")");
    $pqIVA = $montoPaquete * 1.16;

     $pa= "UPDATE vasegurobd.tb_accidentes SET paqueteHosAcc = '$paqueteHosAcc', paquetePrecio ='$montoPaquete', paquetePrecioIVA = '$pqIVA' WHERE FolioAccidente  = '$foAcc'";
    mysqli_query($link,$pa) or die (mysqli_error($link));
        
        

            
    ?>
    <script>

nivel = localStorage.getItem('nivel');
       if(nivel == "2"){
      alert("ARCHIVOS SUBIDOS, EN REVISION");
      window.location= "../forms/detallesAccidenteHos.php?idAcc=<?php echo $idAcc?>" ;     
       }if(nivel == "4"){
        alert("EGRESO REPORTADO ARCHIVOS SUBIDOS <?php echo $sub."/".$subT; ?>");
         window.location= "../forms/modificarAccidente.php?idAcc=<?php echo $idAcc?>" ;   

 }
    
      
        </script>
      <?php
    
 
 mysqli_close($link); 

?>


