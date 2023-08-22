<?php
  
  include("phpfunctions.php");
$pdo = conexion();

$keyword = $_POST['palabra'];
$sql = "SELECT * FROM vasegurobd.cat_tipodeaccidente WHERE nombreTipoDeAccidente = '$keyword' Limit 0,1  ";
$query = $pdo->prepare($sql);

$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['idTipoDeAccidente'];
}
 
?>