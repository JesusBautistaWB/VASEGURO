<?php
 include("../functions/phpfunctions.php");
 $link= con();

$foAcc= $_REQUEST['foAcc'];
$usu = $_REQUEST['usu'];

$foAccdo ="";
 $queryaccdo="SELECT FolioAccidentado FROM vasegurobd.tb_accidentes WHERE FolioAccidente ='$foAcc'";
 
 $result=mysqli_query($link,$queryaccdo);
 
 while($mostrar=mysqli_fetch_array($result)){
     $foAccdo = $mostrar['FolioAccidentado'];
 } 



$sql = "DELETE FROM vasegurobd.tb_accidentes WHERE FolioAccidente = '$foAcc'";
mysqli_query($link,$sql) or die (mysqli_error($link));

$sql1 = "DELETE FROM vasegurobd.tb_lesionesaccidentado WHERE FolioAccidenteLes = '$foAcc'";
mysqli_query($link,$sql1) or die (mysqli_error($link));


$sql3 = "DELETE FROM vasegurobd.tb_pro_diag WHERE FolioAccidenteDP = '$foAcc'";
mysqli_query($link,$sql3) or die (mysqli_error($link));


$ultimaActualizacion = "INSERT INTO vasegurobd.tb_historialcambios (accidenteModificado, usuarioQueModifica, tipoDeModificacion)
VALUES ('$foAcc','$usu', 'ELIMINACION')";
mysqli_query($link,$ultimaActualizacion) or die (mysqli_error($link));

 
$sql4 = "DELETE FROM vasegurobd.tb_accidentado WHERE FolioAccidentado = '$foAccdo'";
mysqli_query($link,$sql4) or die (mysqli_error($link));
rmdir("../confirmaciones_egreso/".$foAcc, 0777);

    mysqli_close($link);


 ?>
<script>

alert("PROCEDIMIENTO O REGISTRO ELIMINADO");
 window.location= "../forms/adminAccidentesSuperAdmin.php" ;     
</script>