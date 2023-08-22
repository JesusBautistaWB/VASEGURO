<?php

function conexion() {
    
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}

$pdo = conexion();
$keyword = utf8_encode('%'.$_POST['palabra'].'%');
$sql = "SELECT DISTINCT nombreEscuela, claveEscuela FROM vasegurobd.cat_escuelas WHERE claveEscuela LIKE (:keyword) AND estatusEscuela = 'A' LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$escuela_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['nombreEscuela']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_itemESC(\''.str_replace("'", "\'", $milista['claveEscuela']."-".$milista['nombreEscuela']).'\')"  >'.$milista['claveEscuela']."-".$escuela_nombre.'</ul>';
}
 