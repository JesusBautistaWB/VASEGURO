<?php
include("phpfunctions.php");
$link = con();


// RECIBIR DATOS GENERALES
$fo = $_POST['foA'];



$sql = "UPDATE  vasegurobd.tb_accidentes
SET expediente = '0'
 WHERE FolioAccidente = '$fo'";

$apid= "UPDATE vasegurobd.tb_rutasarchivos SET estado = 'EN REVISION' WHERE folioAcc ='$fo' ";  
  $result=mysqli_query($link,$apid);    


mysqli_query($link,$sql) or die (mysqli_error($link));



mysqli_close($link);

?>

<script>

        history.back();     
      location.reload();    
   
</script>



  
