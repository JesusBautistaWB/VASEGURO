
<?php
  
function conexion() { 
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


$pdo = conexion();
$pa= $_POST['palabra'];

$sql = "UPDATE  vasegurobd.tb_usuarios SET perfilActivo = '0' WHERE login = '$pa' ";

$query = $pdo->prepare($sql); 
$query->execute();

?>
