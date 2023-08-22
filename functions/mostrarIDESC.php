<?php
  include("phpfunctions.php");
  $pdo = conexion();
  
$keyword = $_POST['ne'];
$keyword1 = $_POST['ce'];
$sql = "SELECT idEscuela FROM vasegurobd.cat_escuelas WHERE nombreEscuela = '$keyword' AND claveEscuela = '$keyword1' Limit 0,1 ";
$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['idEscuela'];
}
 
?>