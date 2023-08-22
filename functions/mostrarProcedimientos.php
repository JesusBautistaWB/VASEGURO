<?php

include("phpfunctions.php");
  $pdo = conexion();
$key = utf8_encode('%'.$_POST['palabra'].'%');
$keyword = trim($key);
$num = $_POST['num'];
$sql = "SELECT CONCAT( CATALOG_KEY,' ', PRO_NOMBRE) AS PRO_NOMBRE FROM vasegurobd.cat_procedimientos  WHERE CONCAT( CATALOG_KEY,' ', PRO_NOMBRE) LIKE '$keyword' LIMIT 0, 15";
$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$procedimiento_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['PRO_NOMBRE']);

    echo '<ul onclick="set_itemPRO'.$_POST['num'].'(\''.str_replace("'", "\'", $milista['PRO_NOMBRE']).'\')"  >'.$procedimiento_nombre.'</ul><br>';
}
 