<?php
  
  include("phpfunctions.php");
$pdo = conexion();

$keyword = $_POST['palabra'];
$sql = "SELECT * FROM vasegurobd.cat_regiondelcuerpoafectada WHERE nombreRDCA = '$keyword' Limit 0,1  ";
echo $keyword;
$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['idRDCA'];
}
 
?>