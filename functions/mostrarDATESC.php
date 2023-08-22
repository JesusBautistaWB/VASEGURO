<?php
  



function conexion() {
	//Declaramos el servidor, la BD, el usuario Mysql y Contrase�a BD.

    
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}

$pdo = conexion();
$keyword = $_POST['palabra'];
$keyword1 = $_POST['ce'];
$sql = "SELECT * FROM vasegurobd.cat_escuelas WHERE nombreEscuela = (:keyword) AND claveEscuela = (:keyword1) Limit 0,1 ";

$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->bindParam(':keyword1', $keyword1, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['calleEscuela']." ".$milista['numeroEscuela'];
}
 
?>