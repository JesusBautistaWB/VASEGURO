<?php
  
  include("phpfunctions.php");
$pdo = conexion();

$keyword = $_POST['palabra'].'%';
$sql = "SELECT *  FROM vasegurobd.cat_nombres WHERE Nombre LIKE '$keyword' LIMIT 0, 5";
$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$apmRepor = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['Nombre']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_itemApmRepor(\''.str_replace("'", "\'", $milista['Nombre']).'\')"  >'.$apmRepor.'</ul>';
}
 