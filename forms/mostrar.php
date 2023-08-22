<?php
  
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


function conexion() {
	//Declaramos el servidor, la BD, el usuario Mysql y Contraseña BD.

    
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}

$pdo = conexion();
$keyword = '%'.$_POST['palabra'].'%';
$sql = "SELECT * FROM cat_escuelas WHERE nombreEscuela LIKE (:keyword) ORDER BY idEscuela ASC";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$escuela_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['nombreEscuela']);
	// Aquì, agregaremos opciones
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $milista['nombreEscuela']).'\')">'.$escuela_nombre.'</li>';
}
?>