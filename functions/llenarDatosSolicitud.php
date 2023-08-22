<?php

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");


$id= $_REQUEST['medico'];
$idSA= $_REQUEST['idSA'];
$foAcc= $_REQUEST['foAcc'];
$costo = $_REQUEST['costo'];

$appPaAcc = $_POST['appPaAcc'];
$appMaAcc = $_POST['appMaAcc'];
$nombreAcc = $_POST['nombreAcc'];

$medicoAt= $appPaAcc." ".$appMaAcc." ".$nombreAcc;
$domicilioMed= $_REQUEST['domicilioMed'];
$telMed= $_REQUEST['telMed'];
$fechaMed= $_REQUEST['fechaHoy'];
$cedulaMed= $_REQUEST['cedulaMed'];
$correoMed= $_REQUEST['correoMed'];
 
$notasMed= $_REQUEST['notasMed'];  
$observacionesMed= $_REQUEST['observacionesMed'];


$diagnostico = $_POST['diagnostico'];
$d1c = $_POST['d1'];
$diagnostico2 = $_POST['diagnostico2'];
$d2c = $_POST['d2'];
$diagnostico3 = $_POST['diagnostico3'];
$d3c = $_POST['d3'];

$procedimiento = $_POST['procedimiento'];
$p1c = $_POST['p1'];
$procedimiento2 = $_POST['procedimiento2'];
$p2c = $_POST['p2'];
$procedimiento3 = $_POST['procedimiento3'];
$p3c = $_POST['p3'];
    
     

      $sql = "UPDATE vasegurobd.tab_serviciosadicionales SET medicoAt = '$medicoAt',
       domicilioMed = '$domicilioMed', telefonoMed = '$telMed', especialidadMed = '$especialidadMed',
        cedulaMedico = '$cedulaMed', fechaLlenadoDatos = '$fechaMed',
       correoMedico = '$correoMed', 
       observacionesMed = '$observacionesMed', estadoDatos = 'SI',  notasMed = '$notasMed', costoServicio = '$costo'
      WHERE id_servicio = '$idSA'";

    


        if($diagnostico != ""){
          $d1=substr($diagnostico, 0, 5);
          $dia1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP, idSerAd, pdcomen)
         VALUES('$d1' ,'D','$foAcc','$idSA','$d1c')";
         
         mysqli_query($link,$dia1) or die (mysqli_error($link));
             
             }
    
    if($diagnostico2 != ""){
          $d2=substr($diagnostico2, 0, 5);
          $dia2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP, idSerAd, pdcomen)
         VALUES('$d2' ,'D','$foAcc', '$idSA','$d2c')";
         mysqli_query($link,$dia2) or die (mysqli_error($link));
             
             }
    
    if($diagnostico3 != ""){ 
          $d3=substr($diagnostico3, 0, 5);
          $dia3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP, idSerAd, pdcomen)
         VALUES('$d3' ,'D','$foAcc', '$idSA','$d3c')";
         mysqli_query($link,$dia3) or die (mysqli_error($link));
             
             }
          
    
            
             if($procedimiento != ""){
                   $p1=substr($procedimiento, 0, 5);
                   $pro1= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP, idSerAd, pdcomen)
                  VALUES('$p1' ,'P','$foAcc', '$idSA', '$p1c')";
                  mysqli_query($link,$pro1) or die (mysqli_error($link));
                      
                      }
             
             if($procedimiento2 != ""){
                   $p2=substr($procedimiento2, 0, 5);
                   $pro2= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP, idSerAd, pdcomen)
                  VALUES('$p2' ,'P','$foAcc', '$idSA', '$p2c')";
                  mysqli_query($link,$pro2) or die (mysqli_error($link));
                      
                      }
             
             
                      if($procedimiento3 != ""){
                            $p3=substr($procedimiento3, 0, 5);
                            $pro3= "INSERT INTO vasegurobd.tb_pro_diag (claveDP, tipoDP, FolioAccidenteDP, idSerAd, pdcomen)
                           VALUES('$p3' ,'P','$foAcc','$idSA', '$p3c')";
                           mysqli_query($link,$pro3) or die (mysqli_error($link));
                               
                               }


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








      mysqli_query($link,$sql) or die (mysqli_error($link));     
    
/*
      include("../lib/conexionBD.php");

      $cnx= new PDO("mysql:host=".$host.";dbname=".$basedatos.";port=".$puerto, $user, $pass);
      
      
      $res= $cnx->query("SELECT DISTINCT claveDP, NOMBRE 
      FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos D 
      WHERE tipoDP = 'D' 
      AND PD.claveDP = D.CATALOG_KEY
      AND idSerAD IS NULL
      AND FolioAccidenteDP = '$foAcc' ");
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
      AND FolioAccidenteDP = '$foAcc' ");
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
      WHERE FolioAccidente =  '$foAcc'  ";
           mysqli_query($link,$dpAcc) or die (mysqli_error($link));
           */
           mysqli_close($link);
      







    ?>
    <script>
      alert("SOLICITUD ATENDIDA, ARCHIVO(S) AGREGADOS");
      history.back();     
      location.reload();
          
      </script>
   




