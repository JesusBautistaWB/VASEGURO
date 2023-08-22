<?php
  include("phpfunctions.php");

$link = con();

$ambulancia = $_POST['ambNombre'];
$nombre = $_POST['nombreAccidentadoAmb'];
$dialectoAcc = $_POST['dialectoAcc'];
$dialectoAccES = $_POST['dialectoAccES'];
$indigenaAcc = $_POST['indigenaAcc'];


$escuelaAmb = $_POST['idEscuelaAmb'];
echo $escuelaAmb;
$correoEsc = $_POST['correoEsc'];
$idUsuario = $_POST['idUsuarioE'];
$aPaUrg = $_POST['aPaUrg'];
$aMaUrg = $_POST['aMaUrg'];
$nomUrg = $_POST['nombreUrg'];

$apReUr = $_POST['apReUr'];
$amReUr = $_POST['amReUr'];
$nomReUr = $_POST['nomReUr'];
$puReUr = $_POST['puestoReportanteUr'];
$telReUr = $_POST['telReUr'];
$correoReportante = $_POST['correoReportante'];

$calleEscuelaUrg = $_POST['calleEscuelaUrg'];
$alcaldiaEscuelaUrg = $_POST['alcaldiaEscuelaUrg'];
$cpEscuelaUrg = $_POST['cpEscuelaUrg'];
$tipollamada = $_POST['tipoLlamada'];


$telefonoEscuelaUrg = $_POST['telefonoEscuelaUrg'];
$coloniaEscuelaUrg = $_POST['coloniaEscuelaUrg'];


$dirEscRepor  = $calleEscuelaUrg.', '.$alcaldiaEscuelaUrg.', '.$coloniaEscuelaUrg.', '.$cpEscuelaUrg.', '.$telefonoEscuelaUrg;

date_default_timezone_set('America/Mexico_City');
$time = time();
$fechaHoy = date('Y-m-d', $time);
$hora = date("H:i:s", $time);

$fechaHoraAccidente = $fechaHoy." ".$hora;



$resultado = str_replace("-", "", $fechaHoy);

//CALCULAR CUANTOS REGISTROS DE ACCIDENTE HA REALIZADO EL USUARIO ACTUAL EL DIA DE HOY PARA GENERAR ID
$fechaHoy = date('Y-m-d')."%";
$rowsbyuser = "SELECT * FROM vasegurobd.tb_accidentes WHERE idUsAu = '$idUsuario' AND FolioAccidente != '' AND fechaRepor LIKE '$fechaHoy' ";
		$rbu=mysqli_query($link,$rowsbyuser); 
        $numero = mysqli_num_rows($rbu) +1;

if($numero <10){
    
    $numero = "0".$numero;
}

 //OBTENER INICIALES 
    
      $iniciales ="";
      
      $in = "SELECT * FROM vasegurobd.tb_usuarios WHERE login = '$idUsuario' ";
		$in2=mysqli_query($link,$in); 
        while($mostrar=mysqli_fetch_array($in2)){
          
            $iniciales =  $mostrar['inUs'];
                      
       }
 
    
    $fechaID = date('YYYY')."%";
    $estatus = "3";
    $folio = $iniciales.$fechaHoy[8].$fechaHoy[9].$fechaHoy[5].$fechaHoy[6].$fechaID[2].$fechaID[3].$hora[0].$hora[1].$numero;
    $folio1 = str_replace("-", "", $folio);  
    $folioAccidente = str_replace("%", "", $folio1);  

    
        
mkdir("../confirmaciones_egreso/".$folioAccidente, 0777);


//CALCULAR ID DE ACCIDENTADO, CONTANDO TODOS LOS REGISTROS EXISTENTES +1
$naccdo = $aPaUrg[0].$aMaUrg[0].$nomUrg[0].$fechaHoy[8].$fechaHoy[9].$fechaHoy[5].$fechaHoy[6].$fechaID[2].$fechaID[3].$hora[0].$hora[1].$hora[2].$hora[3].$hora[4].$hora[5];

$sql = "INSERT INTO vasegurobd.tb_accidentes(FolioAccidente, idEscuela, idusuario, idUsAu, servicioAmbulancia, idEstatus,
 fechaHoraAccidente, FolioAccidentado, appPaRepor, appMaRepor, 
nombreRepor, puestoReportante,telefonoReportante, correoReportante, dialectoAcc, dialectoAccES, indigenaAcc, correoEscuela, dirEscRepor, tipoLlamada)
 VALUES('$folioAccidente','$escuelaAmb','$idUsuario', '$idUsuario','$ambulancia','9','$fechaHoraAccidente','$naccdo',
 '$apReUr','$amReUr','$nomReUr','$puReUr','$telReUr','$correoReportante', '$dialectoAcc','$dialectoAccES','$indigenaAcc','$correoEsc','$dirEscRepor','$tipollamada')";
mysqli_query($link,$sql) or die (mysqli_error($link));

echo $sql;

$sql1 = "INSERT INTO vasegurobd.tb_accidentado(FolioAccidentado,PrimerApellidoA, SegundoApellidoA, NombreA) VALUES('$naccdo','$aPaUrg','$aMaUrg','$nomUrg')";
mysqli_query($link,$sql1) or die (mysqli_error($link));



$idLDP ="";
$idCon="SELECT idAcc FROM vasegurobd.tb_accidentes WHERE FolioAccidente ='$folioAccidente'";

$result=mysqli_query($link,$idCon);

while($mostrar=mysqli_fetch_array($result)){
    $idLDP = $mostrar['idAcc'];
}


?>

<script type="text/javascript">
       
       alert("ACCIDENTE REGISTRADO, FOLIO DE EMERGENCIA GENERADO EXITOSAMENTE");
       window.location= "../forms/llenarDatosPendientes.php?idAcc=<?php echo $idLDP; ?>";
</script>


  
