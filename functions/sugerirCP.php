<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$keyword = $_POST['cpCol'];
$sql = "SELECT *  FROM vasegurobd.cat_cp WHERE Colonia = '$keyword' LIMIT 0, 1";
$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo $milista['CP'];
}

mysqli_close($pdo);
?>
 