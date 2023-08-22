<?php
  
function conexion() { 
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


$pdo = conexion();
$foAcc= $_POST['palabra'];

$sql = "SELECT * FROM vasegurobd.tb_rutasarchivos 
 WHERE folioAcc = '$foAcc'";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();


echo '<table>
<tr>
<thead>

<td>ID</td>
<td>Fecha de Carga</td>

<td><b>ARCHIVO</b></td>
<td>TIPO</td>
<td>TIPO DE DOCUMENTO</td>
<td>Servicio Adicional</td>
<td>Estado</td>
<td></td>


</thead>
</tr>';

foreach ($lista as $milista) {

    echo "
   
    <tr>
    
    <td>".$milista['idRuta']."</td>
    <td>".$milista['fechaDeCarga']."</td>
    
    <td><a href='".$milista['ruta']."' >".$milista['tipo']."</td>
    <td>".$milista['tipo']."</td>
    <td>".$milista['tipoDocumento']."</td>
    <td>".$milista['idSA']."</td>
    <td class='";
    if($milista['estado'] == "APROBADO"){ echo "ace"; }
    if($milista['estado'] == "RECHAZADO"){ echo "rec"; }
 
   
   echo "'>".$milista['estado']."</td>";
if($milista['estado'] == "RECHAZADO"){

echo 
"<td><a href='cambiararchivo.php?idf=".$milista['idRuta']."'>CAMBIAR ARCHIVO</a></td>";
} else{
    echo "<td></td>";
}

  "</tr>";
}
echo '</table>';

 ?>
