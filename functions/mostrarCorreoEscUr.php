<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$keyword = $_POST['palabra'];

$sql = "SELECT * FROM vasegurobd.cat_escuelas WHERE nombreEscuela = '$keyword' Limit 0,1 ";
$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['idEscuela'];
}
 
mysqli_close($pdo);
?>