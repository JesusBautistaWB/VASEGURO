<?php


function conexion() {

     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}

$pdo = conexion();
$keyword = utf8_encode('%'.$_POST['palabra'].'%');
$num = $_POST['num'];

$sql = "SELECT CONCAT( CATALOG_KEY,'   ', NOMBRE) AS NOMBRE FROM vasegurobd.cat_diagnosticos  WHERE CONCAT( CATALOG_KEY,'   ', NOMBRE) LIKE (:keyword) LIMIT 0, 15";
$query = $pdo->prepare($sql); 
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$diagnostico_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['NOMBRE']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_itemDIA'.$_POST['num'].'(\''.str_replace("'", "\'", $milista['NOMBRE']).'\')"  >'.$diagnostico_nombre.'</ul>
	<br>';
}
 