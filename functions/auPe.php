<?php      
include("phpfunctions.php");
$conexion = con();

$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];

$sql="SELECT distinct  autorizacion FROM vasegurobd.tab_serviciosadicionales WHERE autorizacion != ''";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='auPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>AUTORIZACION</td>
<td># DE SA</td>
</tr>
<tr><td colspan='2'> PERIODO <b>$fechaIn - $fechaFin</b> </td></tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['autorizacion']."</td>";
        auConPe($row['autorizacion'], $fechaIn, $fechaFin);
        echo "</tr>";
      }

echo "</table>";
mysqli_close($conexion);
?>