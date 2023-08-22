<?php
  include("phpfunctions.php");
$link = con();


$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];
$date2 = "";
if($fechaFin != ''){
$date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
}


$sql = "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE fechaRepor BETWEEN '$fechaIn' AND '$date2'";

$dupM=mysqli_query($link,$sql); 
$duplM = mysqli_num_rows($dupM);



$si = "SELECT folioAccidente FROM vasegurobd.tb_historialfoliosiniestro WHERE fechaCambio BETWEEN '$fechaIn' AND '$date2'";

$siq=mysqli_query($link,$si); 
$sic = mysqli_num_rows($siq);


$car = "SELECT folioAccidente FROM vasegurobd.tb_cartasgarantia WHERE fechaGeneracion BETWEEN '$fechaIn' AND '$date2'";

$carq=mysqli_query($link,$car); 
$carc = mysqli_num_rows($carq);

$nos = "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE folioSiniestro = '' AND fechaRepor BETWEEN '$fechaIn' AND '$date2'";

$nosq=mysqli_query($link,$nos); 
$nosc = mysqli_num_rows($nosq);


echo "<label style='color: black;'> $duplM</label><label> accidentes en el periodo <b>$fechaIn - $fechaFin</b> </label><br>";
echo "<label style='color: black;'> $sic </label><label> siniestros Asignados en el periodo <b>$fechaIn - $fechaFin</b> </label><br>";
echo "<label style='color: black;'> $carc </label><label> cartas generadas en el periodo <b>$fechaIn - $fechaFin</b> </label><br>";
echo "<label style='color: black;'> $nosc </label><label> accidentes sin siniestro en el periodo <b>$fechaIn - $fechaFin</b> </label><br>";

mysqli_close($link);
?>
 