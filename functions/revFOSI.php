<?php


include("phpfunctions.php");
$pdo = conexion();
$keyword = utf8_encode('%'.$_POST['palabra'].'%');


$sql = "SELECT DISTINCT usuarioQueCambia FROM vasegurobd.tb_historialfoliosiniestro WHERE folioSiniestro != '' AND folioSiniestro = (:keyword)";
$query = $pdo->prepare($sql); 
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
echo $milista['usuarioQueCambia'];
	
}
 