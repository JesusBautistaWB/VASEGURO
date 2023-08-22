<?php


include("phpfunctions.php");
  $pdo = conexion();
$keyword = utf8_encode('%'.$_POST['palabra'].'%');
$num = $_POST['i'];

$sql = "SELECT CONCAT( CATALOG_KEY,'   ', NOMBRE) AS NOMBRE FROM vasegurobd.cat_diagnosticos  WHERE CONCAT( CATALOG_KEY,'   ', NOMBRE) LIKE (:keyword) LIMIT 0, 15";
$query = $pdo->prepare($sql); 
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$diagnostico_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['NOMBRE']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_itemDIA'.$_POST['i'].'(\''.str_replace("'", "\'", $milista['NOMBRE']).'\')"  >'.$diagnostico_nombre.'</ul>
	<br>';
}
 