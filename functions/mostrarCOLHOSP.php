<?php
include("phpfunctions.php");
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
	
    echo $milista['colonia'];
}
 
?>