<?php
  
  include("phpfunctions.php");
$pdo = conexion();

$keyword = utf8_encode('%'.$_POST['palabra'].'%');
$sql = "SELECT DISTINCT Estado FROM vasegurobd.cat_cp WHERE Estado LIKE '$keyword' LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$estado = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['Estado']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_itemES(\''.str_replace("'", "\'", $milista['Estado']).'\')"  >'.$estado.'</ul>';
}
 
