<?php

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");

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
    
        


chmod("../confirmaciones_egreso/".$foAcc, 0777);
$directorio = "../confirmaciones_egreso/".$foAcc."/";


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
         VALUES ('$archivo','$id','EGRESO', 'EN REVISION', '$foAcc','', '$tipo')";
          mysqli_query($link,$filestab) or die (mysqli_error($link)); 
          ?><script> alert(<?php echo $name; ?>); </script>  <?php
         

       
      } 

    }
  }

  
  
          }


 






                
      $sql = "UPDATE vasegurobd.tb_accidentes SET idEstatus = '15' WHERE idAcc = '$idAcc'";
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

   
     $pa= "UPDATE vasegurobd.tb_accidentes SET paqueteHosAcc = '$paqueteHosAcc' WHERE FolioAccidente  = '$foAcc'";
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


