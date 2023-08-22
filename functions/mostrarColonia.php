
<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$keyword = utf8_encode('%'.$_POST['palabra'].'%');
$alcaldia = $_POST['alcaldia'];
$sql = "SELECT distinct Colonia FROM vasegurobd.cat_cp WHERE colonia  LIKE (:keyword) AND AlcaldiaMunicipio = (:alcaldia) LIMIT 0, 5";
$query = $pdo->prepare($sql); 
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->bindParam(':alcaldia', $alcaldia, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$colonia_nombre = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['Colonia']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_itemCOL(\''.str_replace("'", "\'", $milista['Colonia']).'\')"  >'.$colonia_nombre.'</ul>';
}
 
mysqli_close($pdo);
?>