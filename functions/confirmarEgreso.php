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


  // Count total files
 $countfiles = count($_FILES['file']['name']);
 $resultado = "";
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


        $filestab = "INSERT INTO vasegurobd.tb_rutasarchivos (ruta, usuarioCarga, tipo, estado, folioAcc, idSA, tipoDocumento)
         VALUES ('$archivo','$id','EGRESO', '', '$foAcc','', '$tipoDocumento')";
          mysqli_query($link,$filestab) or die (mysqli_error($link)); 
      $resultado = "1";
       
      $sql = "UPDATE vasegurobd.tb_accidentes SET idEstatus = '6' WHERE idAcc = '$idAcc'";
      
       // AGREGAR DIAGNOSTICOS
       
if($diagnostico != ""){
      $d1=substr($diagnostico, 0, 5);
      $dia1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$d1' ,'D','$foAcc')";
  
     mysqli_query($link,$dia1) or die (mysqli_error($link));
         
         }

if($diagnostico2 != ""){
      $d2=substr($diagnostico2, 0, 5);
      $dia2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$d2' ,'D','$foAcc')";
     mysqli_query($link,$dia2) or die (mysqli_error($link));
         
         }

if($diagnostico3 != ""){ 
      $d3=substr($diagnostico3, 0, 5);
      $dia3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
     VALUES('$d3' ,'D','$foAcc')";
     mysqli_query($link,$dia3) or die (mysqli_error($link));
         
         }
      

        
         if($procedimiento != ""){
               $p1=substr($procedimiento, 0, 5);
               $pro1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
              VALUES('$p1' ,'P','$foAcc')";
              mysqli_query($link,$pro1) or die (mysqli_error($link));
                  
                  }
         
         if($procedimiento2 != ""){
               $p2=substr($procedimiento2, 0, 5);
               $pro2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
              VALUES('$p2' ,'P','$foAcc')";
              mysqli_query($link,$pro2) or die (mysqli_error($link));
                  
                  }
         
         
                  if($procedimiento3 != ""){
                        $p3=substr($procedimiento3, 0, 5);
                        $pro3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP)
                       VALUES('$p3' ,'P','$foAcc')";
                       mysqli_query($link,$pro3) or die (mysqli_error($link));
                           
                           }

    $paqueteHosAcc = $_POST['paqueteHosAcc'];
    if ($paqueteHosAcc == "FUERA DE PAQUETE"){
      $efdp= "UPDATE vasegurobd.tb_accidentes SET estatusInterno = 'EGRESO FUERA DE PAQUETE' WHERE FolioAccidente  = '$foAcc'";
     mysqli_query($link,$efdp) or die (mysqli_error($link));
    }else {

      $efdp1= "UPDATE vasegurobd.tb_accidentes SET estatusInterno = 'ALTA' WHERE FolioAccidente  = '$foAcc'";
      mysqli_query($link,$efdp1) or die (mysqli_error($link));

     }

    
      $pa= "UPDATE vasegurobd.tb_accidentes SET paqueteHosAcc = '$paqueteHosAcc' WHERE FolioAccidente  = '$foAcc'";
     mysqli_query($link,$pa) or die (mysqli_error($link));
         
         

      mysqli_query($link,$sql) or die (mysqli_error($link));         
      }else{
        $resultado = "2";
      }
  }else{
    $resultado = "1";
  }





  }
  if ($resultado == "1"){
    ?>
    <script>

nivel = localStorage.getItem('nivel');
       if(nivel == "2"){
      alert("ARCHIVOS SUBIDOS EXITOSAMENTE, EGRESO REPORTADO");
      window.location= "../forms/adminHos.php" ;     
       }if(nivel == "4"){
        alert("EGRESO REPORTADO");
         window.location= "../forms/modificarAccidente.php?idAcc=<?php echo $idAcc?>" ;   

 }
    
      </script>
    <?php
    
     } elseif($resultado == "2"){
      ?>
      <script>
        if(nivel == "2"){
        alert("HA OCURRIDO UN ERROR, VERIFIQUE LA EXTENSION DE SUS ARCHIVOS Y SU CONEXION");
        window.location= "../forms/adminHos.php" ;    
        }if(nivel == "4"){
          alert("HA OCURRIDO UN ERROR, VERIFIQUE LA EXTENSION DE SUS ARCHIVOS Y SU CONEXION");
          window.location= "../forms/modificarAccidente.php?idAcc=<?php echo $idAcc?>" ; 

        }

          
        </script>
      <?php
    
     }
      
 mysqli_close($link); 

?>




