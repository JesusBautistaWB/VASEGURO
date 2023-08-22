<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$alcaldia = $_POST['alcaldia'];
$colonia = $_POST['colonia'];

$sql = "SELECT CP FROM vasegurobd.cat_cp WHERE AlcaldiaMunicipio = '$alcaldia' AND Colonia = '$colonia' LIMIT 0, 1";
$query = $pdo->prepare($sql); 

$query->execute();

$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['CP'];
}
 mysqli_close($pdo);
?>