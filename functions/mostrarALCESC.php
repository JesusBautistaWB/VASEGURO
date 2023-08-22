<?php
include("phpfunctions.php");
$pdo = conexion();
  
$keyword = $_POST['palabra'];
$keyword1 = $_POST['ce'];

if($keyword1 == ""){
    $sql = "SELECT alcaldiaEscuela FROM vasegurobd.cat_escuelas WHERE nombreEscuela = '$keyword'  Limit 0,1 ";
}else{
    $sql = "SELECT alcaldiaEscuela FROM vasegurobd.cat_escuelas WHERE nombreEscuela = '$keyword' AND claveEscuela = '$keyword1'  Limit 0,1 ";
}

$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['alcaldiaEscuela'];
}
 
?>