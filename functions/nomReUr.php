<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$keyword = $_POST['palabra'].'%';
$sql = "SELECT *  FROM vasegurobd.cat_nombres WHERE Nombre LIKE (:keyword) LIMIT 0, 10";
$query = $pdo->prepare($sql); 
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	// Colocaremos negrita a los textos
	$nom = str_replace($_POST['palabra'], '<b>'.$_POST['palabra'].'</b>', $milista['Nombre']);
	// Aqu�, agregaremos opciones
    echo '<ul onclick="set_itemNOMREUR(\''.str_replace("'", "\'", $milista['Nombre']).'\')"  >'.$nom.'</ul>';
}

mysqli_close($pdo);
 
?>