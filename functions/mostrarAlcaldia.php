<?php
  

  include("phpfunctions.php");
  $pdo = conexion();

$keyword = utf8_encode('%'.$_POST['palabra'].'%');
$estado = $_POST['estado'];

$sql = "SELECT DISTINCT AlcaldiaMunicipio FROM vasegurobd.cat_cp WHERE AlcaldiaMunicipio LIKE '$keyword' AND Estado = '$estado' LIMIT 0, 5";
$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$alcaldia_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['AlcaldiaMunicipio']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_item(\''.str_replace("'", "\'", $milista['AlcaldiaMunicipio']).'\')"  >'.$alcaldia_nombre.'</ul>';
}
 
mysqli_close($pdo);
?>