<?php
  
function conexion() { 
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


$pdo = conexion();
$idDP= $_REQUEST['idDP'];
$idAcc= $_REQUEST['idAcc'];
$foAcc= $_REQUEST['foAcc'];

$sql = "DELETE FROM vasegurobd.tb_pro_diag WHERE idDP = '$idDP'";

$query = $pdo->prepare($sql); 
$query->execute();


include("../lib/conexionBD.php");

$cnx= new PDO("mysql:host=".$host.";dbname=".$basedatos.";port=".$puerto, $user, $pass);
$res= $cnx->query("SELECT DISTINCT claveDP, NOMBRE 
FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos D 
WHERE tipoDP = 'D' 
AND PD.claveDP = D.CATALOG_KEY
AND FolioAccidenteDP = '$FolioAccidente' ");
$datos=array();
$textD=array();

foreach ($res as $row){
  $datos[]=$row[claveDP].", ";
  $textD[]=$row[NOMBRE].", ";
}
$diag = implode($datos);
$diaString = utf8_encode(implode($textD));

echo $diaString;

$resPRO= $cnx->query("SELECT DISTINCT claveDP, PRO_NOMBRE
 FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_procedimientos P
 WHERE tipoDP = 'P' 
 AND PD.claveDP = P.CATALOG_KEY
AND FolioAccidenteDP = '$FolioAccidente' ");
$datosPRO=array();
$textP=array();

foreach ($resPRO as $row){
  $datosPRO[]=$row[claveDP].", ";
  $textP[]=$row[PRO_NOMBRE].", ";
}
$pro = implode($datosPRO);
$proString = utf8_encode(implode($textP));


 ?>
<script>

alert("PROCEDIMIENTO O REGISTRO ELIMINADO");
history.back();
   reload();        
</script>