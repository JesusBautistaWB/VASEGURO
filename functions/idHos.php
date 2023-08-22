<?php
  
include("phpfunctions.php");
$pdo = conexion();

$keyword = $_POST['hos'];
$sql = "SELECT idHospital FROM vasegurobd.cat_hospitales WHERE nombreClinicaHospital = '$keyword' Limit 0,1";
$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
  
foreach ($lista as $milista) {
	
    echo $milista['idHospital'];

}
 
?>