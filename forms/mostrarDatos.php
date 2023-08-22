<?php
  
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');


function conexion() {
	//Declaramos el servidor, la BD, el usuario Mysql y Contraseña BD.

    
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}

$pdo = conexion();
$keyword = $_POST['palabra'];
$sql = "SELECT * FROM cat_escuelas WHERE nombreEscuela = (:keyword) ";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo  $milista['alcaldiaEscuela'];
}
?>