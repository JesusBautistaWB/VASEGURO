<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$escuela = utf8_encode($_POST['escuela']);
$sql = "SELECT * FROM vasegurobd.cat_escuelas WHERE nombreEscuela = '$escuela' LIMIT 0,1";

$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo "Direccion de la Escuela: <label style='color: black;'>".$milista['ciudadEscuela'].", ".$milista['alcaldiaEscuela'].", ".$milista['calleEscuela']."</label>";
}

mysqli_close($pdo);
?>
 