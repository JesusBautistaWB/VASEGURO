<?php
  include("phpfunctions.php");
$pdo = conexion();
$keyword = $_POST['cp'].'%';
$sql = "SELECT *  FROM vasegurobd.cat_cp WHERE CP LIKE '$keyword' LIMIT 0, 5";
$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo '<ul onclick="setDataFromCP(\''.str_replace("'", "\'", $milista['Colonia']).'\')"  >'.$milista['Colonia'].'</ul>';
}
 