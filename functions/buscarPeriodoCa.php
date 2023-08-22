<?php
include("phpfunctions.php");
$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];

$date2 = "";
if($fechaFin != ''){
$date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
}

$conexion = con();
		$sql="SELECT * FROM vasegurobd.tb_cartasgarantia C, vasegurobd.tb_usuarios U
        WHERE C.idPersonaQueAutoriza = U.idusuario
        AND fechaGeneracion BETWEEN '$fechaIn' AND '$date2' 
         ORDER BY fechaGeneracion DESC";
         $result=mysqli_query($conexion,$sql);
          $row_cnt = mysqli_num_rows($result);

          ?>

<table border="1">
    <tr>
        <td colspan="15" style = "background-color: #a9d896; color: #0F362D;" id="adminTable">
<?php echo "<b>".$row_cnt."</b> Cartas generadas entre el periodo: <b>".$fechaIn." a ".$fechaFin."</b>"; ?>
</td>
</tr>
</table>

<?php
        

        echo '<table id="adminTable">
        <thead>
        <tr>
        <td>Numero de Carta</td>
        <td> Folio Accidente </td>
        <td>Fecha Generacion</td>
        <td>DR. Que Autoriza</td>
        <td>IDs Servicios Adicionales</td>
        <td>Monto Para Hospital</td>
        <td>Especialidades</td>
<td>DX</td>
<td>PROCEDIMIENTOS</td>
        <td></td>
        </tr>
        </thead>';
		

  while($milista=mysqli_fetch_array($result)){
    echo '

    <td><b>'.$milista['numeroCarta'].'</b></td>
    <td><b>'.$milista['folioAccidente'].'</b></td>
    <td>'.$milista['fechaGeneracion'].'</td>
    <td class="ace">'.$milista['nombre'].'</td>
    <td >'.$milista['ids_ss'].'</td>
    <td > $'.$milista['montoHos'].'</td>';

    espCar($milista['ids_ss']);
    dxCar($milista['ids_ss']);
    proCar($milista['ids_ss']);
    echo '<td><a href='.$milista['gen'].' target="_blank">VER</a></td>
    
    
    </tr>';
      

}
echo "</table>";

?>
 