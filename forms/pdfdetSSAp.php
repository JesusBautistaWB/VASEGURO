<?php

$idAcc = $_GET['idAcc'];


date_default_timezone_set('America/Mexico_City');
$time = time();
$fecha = date("Y:m:d", $time);
$hora = date("H:i:s", $time);

$fechaSolicitud = $fecha." ".$hora;

$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
$conexion -> set_charset("utf8");

use Dompdf\Dompdf;
use Dompdf\Options;
include_once "../../dompdf/autoload.inc.php";

$options = new Options();
$options->set('enable-javascript', true);
$options->set('javascript-delay', 13500);
$options->set('enable-smart-shrinking', true);
$options->set('no-stop-slow-scripts', true);

$pdf= new Dompdf($options);

$html = file_get_contents("../forms/pdfSolicitudesAprobadasServicioAcc.php?idAcc='$idAcc'");

$pdf->loadHtml($html);
$pdf->setPaper("A4","landingpage");
$pdf->render();


$sql="Select * FROM vasegurobd.tb_accidentes WHERE idAcc=".$idAcc." LIMIT 0,1";
$result=mysqli_query($conexion,$sql);
$folio="";
		while($mostrar=mysqli_fetch_array($result)){
            
         $folio = $mostrar['FolioAccidente'];   
        }
$pdf->stream("SS-".$folio."-POLIZA MULTIPLES APROBADOS-".$fechaSolicitud);

?>