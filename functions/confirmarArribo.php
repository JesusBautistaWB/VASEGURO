<?php
  

  include("phpfunctions.php");
$link = con();

$idAcc= $_GET['idAcc'];
        

$sql = "UPDATE vasegurobd.tb_accidentes SET idEstatus = '5' WHERE idAcc = '$idAcc'";
mysqli_query($link,$sql) or die (mysqli_error($link));

mysqli_close($link);


?>

<script>
 nivel = localStorage.getItem('nivel');

 if(nivel == "2"){
        alert("ARRIBO REPORTADO");
         window.location= "../forms/adminHos.php" ;     
 }

 if(nivel == "4"){
        alert("ARRIBO REPORTADO");
         window.location= "../forms/modificarAccidente.php?idAcc=<?php echo $idAcc?>" ;   

 }
    

</script>


  
