<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$foAcc= $_POST['palabra'];


$sql = "SELECT distinct idDP,claveDP, PRO_NOMBRE, ACC.idAcc 
FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_procedimientos PRO, vasegurobd.tb_accidentes ACC  
WHERE PD.claveDP = PRO.CATALOG_KEY
AND FolioAccidenteDP = '$foAcc'
AND ACC.FolioAccidente = '$foAcc' 
AND PD.tipoDP = 'P'";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();

echo '<table>';
foreach ($lista as $milista) {

    echo "<tr>
    <td ><b>".$milista['claveDP']."</b></td> 
    <td><b> ".$milista['PRO_NOMBRE']."</b> </td>
    
   
    </tr>";
}
echo '</table>';
 ?>
