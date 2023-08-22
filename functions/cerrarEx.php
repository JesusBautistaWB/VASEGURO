<?php
include("phpfunctions.php");
$link = con();


// RECIBIR DATOS GENERALES
$fo = $_POST['fo'];



$sql = "UPDATE  vasegurobd.tb_accidentes
SET expediente = '1'
 WHERE FolioAccidente = '$fo'";

$apid= "UPDATE vasegurobd.tb_rutasarchivos SET estado = 'APROBADO' WHERE folioAcc ='$fo' ";  
  $result=mysqli_query($link,$apid);    


mysqli_query($link,$sql) or die (mysqli_error($link));



mysqli_close($link);

?>

<script>

        history.back();     
      location.reload();    
   
</script>



  
