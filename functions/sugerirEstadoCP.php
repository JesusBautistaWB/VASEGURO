<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$col = $_POST['cpCol'];
$cp = $_POST['cp'];
$sql = "SELECT estado  FROM vasegurobd.cat_cp WHERE CP = '$cp' AND Colonia = '$col' LIMIT 0, 1";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['estado'];
}
 