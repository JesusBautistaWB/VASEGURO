<?php
  

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");

$idAcc= $_GET['idAcc'];
$idUsuario = $_POST['idUsuario'];
$aproAcc = $_POST['aproAcc'];
$sug1= $_POST['idHospital'];
$sug2= $_POST['idHospital2'];
$selecRE = $_POST['selecRE'];


$hospitalesSugeridos = $sug1.",".$sug2;



if($aproAcc == "SI"){
$sql = "UPDATE vasegurobd.tb_accidentes SET hospitalesSugeridos = '$hospitalesSugeridos', idUsAu = '$idUsuario' WHERE idAcc = '$idAcc'";

  
}else{
$sql = "UPDATE vasegurobd.tb_accidentes SET idEstatus = '4', idUsAu = '$idUsuario', idRiesgoEx ='$selecRE' WHERE idAcc = '$idAcc'";   
    
}


mysqli_query($link,$sql) or die (mysqli_error($link));
mysqli_close($link);  


?>

<script>
 
        alert("HOSPITALES ENVIADOS, EN ESPERA DE SELECCION");
         window.location= "../forms/adminAccidentesESCAD.php" ;     
    
    
</script>


  
