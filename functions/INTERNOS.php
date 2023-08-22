<head>

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script src="../forms/js/numeroALetras.js" type="text/javascript"></script> 
</head>
<?php
  
function conexion() { 
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


$pdo = conexion();


$sql = "SELECT folioAccidenteServicio AS Folio, COUNT(*) folioAccidenteServicio, AC.idEstatus, AC.estatusInterno
FROM vasegurobd.tab_serviciosadicionales, vasegurobd.tb_accidentes AC
WHERE folioAccidenteServicio = AC.FolioAccidente
group by folioAccidenteServicio ORDER BY folioAccidenteServicio";

$query = $pdo->prepare($sql); 
$query->execute();


$lista = $query->fetchAll();

foreach ($lista as $milista) {
    echo $milista['Folio']."-".$milista['folioAccidenteServicio']."-".$milista['idEstatus']."-".$milista['estatusInterno']."<br>";
$f = $milista['Folio'];
    $query = $pdo->prepare("UPDATE vasegurobd.tb_accidentes SET estatusInterno ='SOLICITUD DE SERVICIO' WHERE FolioAccidente ='$f' "); 
$query->execute();

  

}


$sql1 = "SELECT FolioAccidente, idEstatus, estatusInterno, paqueteHosAcc
FROM vasegurobd.tb_accidentes
WHERE idEstatus = '6'";

$query = $pdo->prepare($sql1); 
$query->execute();


$lista1 = $query->fetchAll();

foreach ($lista1 as $milista) {
  $f1 = $milista['FolioAccidente'];
if( $milista['paqueteHosAcc'] == "FUERA DE PAQUETE"){
    $query = $pdo->prepare("UPDATE vasegurobd.tb_accidentes SET estatusInterno ='EGRESO FUERA DE PAQUETE' WHERE FolioAccidente ='$f1' "); 
$query->execute();
} else {



    if( $milista['estatusInterno'] == "SOLICITUD DE SERVICIO"){
        
    } else {
        $query = $pdo->prepare("UPDATE vasegurobd.tb_accidentes SET estatusInterno ='ALTA' WHERE FolioAccidente ='$f1' "); 
        $query->execute();

    }
   

}
  

}


