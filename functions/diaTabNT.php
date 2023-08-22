<?php
  
function conexion() { 
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


$pdo = conexion();
$foAcc= $_POST['palabra'];

$sql = "SELECT distinct idDP, claveDP, NOMBRE, ACC.idAcc
FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos DIA, vasegurobd.tb_accidentes ACC  
 WHERE PD.claveDP = DIA.CATALOG_KEY 
 AND FolioAccidenteDP = '$foAcc'
 AND ACC.FolioAccidente = '$foAcc' 
 AND PD.tipoDP = 'D' ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();


echo '<table>';

foreach ($lista as $milista) {

    echo "<tr>
    <td ><b>".$milista['claveDP']."</b></td> 
    <td><b> ".$milista['NOMBRE']."</b> </td>
   
    </tr>";
}
echo '</table>';
 ?>
