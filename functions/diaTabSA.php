<?php
include("phpfunctions.php");
$pdo = conexion();

$idSA= $_POST['palabra'];

$sql = "SELECT distinct idDP, claveDP, NOMBRE, pdcomen
FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos DIA, vasegurobd.tb_accidentes ACC  
 WHERE PD.claveDP = DIA.CATALOG_KEY 
 AND PD.idSerAd = '$idSA'
 AND PD.tipoDP = 'D' ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();


echo '<table>';

foreach ($lista as $milista) {

    echo "<tr>
    <td ><b>".$milista['claveDP']."</b></td> 
    <td><b> ".$milista['NOMBRE']."</b> </td>
    <td>".strtoupper($milista['pdcomen'])."</td>
    <td><a href='../functions/elDP.php?idAcc=".
    $milista['idAcc']."&idDP=".$milista['idDP']."&foAcc=".$foAcc.
    "' ><img src='../images/delete.png' height='20'  width='20'></td>
    
    </tr>";
}
echo '</table>';

 ?>
