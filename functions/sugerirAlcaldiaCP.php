<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$col = $_POST['cpCol'];
$sql = "SELECT AlcaldiaMunicipio  FROM vasegurobd.cat_cp WHERE CP = ".$_POST['cp']." AND Colonia = '$col' LIMIT 0, 1 ";
$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['AlcaldiaMunicipio'];
}
 