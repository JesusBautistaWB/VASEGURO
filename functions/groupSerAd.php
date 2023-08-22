<?php


$folio= $_REQUEST['folio'];
$id= $_REQUEST['id'];

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


$pdf= new Dompdf($options);

$html= file_get_contents("../forms/pdfSolicitudServicioGroup.php?id='$id'&&folio='$folio'");


$pdf->loadHtml($html);
$pdf->setPaper("A4","landingpage");
$pdf->render();
$pdf->stream("SS-".$folio."-".$id."-POLIZA-".$fechaSolicitud);




 ?>

