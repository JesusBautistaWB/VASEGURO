<?php
include("../functions/phpfunctions.php");
$idAcc = $_GET['idAcc'];

$conexion = con();



use Dompdf\Dompdf;
use Dompdf\Options;
include_once "../../dompdf/autoload.inc.php";

$options = new Options();


$pdf= new Dompdf($options);

$html = file_get_contents("pdfdetailsAcc.php?idAcc=".$idAcc);
$pdf->loadHtml($html);
$pdf->setPaper("A4","landingpage");
$pdf->render();


$sql="SELECT * FROM vasegurobd.tb_accidentes WHERE idAcc='$idAcc' LIMIT 0,1";
echo $sql;
$result=mysqli_query($conexion,$sql);
$folio="";
		while($mostrar=mysqli_fetch_array($result)){
            
         $folio = $mostrar['FolioAccidente'];   
        }

$pdf->stream($folio);

?>