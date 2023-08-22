<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$foAcc= $_POST['palabra'];


$sql = "SELECT distinct idDP,claveDP, PRO_NOMBRE, ACC.idAcc 
FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_procedimientos PRO, vasegurobd.tb_accidentes ACC  
WHERE PD.claveDP = PRO.CATALOG_KEY
AND FolioAccidenteDP = '$foAcc'
AND ACC.FolioAccidente = '$foAcc' 
AND PD.tipoDP = 'P'
AND PD.idSerAD = ''";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();

echo '<table>';
foreach ($lista as $milista) {

    echo "<tr>
    <td ><b>".$milista['claveDP']."</b></td> 
    <td><b> ".$milista['PRO_NOMBRE']."</b> </td>
    <td><a href='../functions/elDP.php?idAcc=".
    $milista['idAcc']."&idDP=".$milista['idDP']."&foAcc=".$foAcc.
    "' ><img src='../images/delete.png' height='20'  width='20'></td>
   
    </tr>";
}
echo '</table>';
 ?>
