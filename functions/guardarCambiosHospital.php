<?php
  

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");


// RECIBIR DATOS GENERALES
$idHospital = $_POST['idHospital'];
$nombre = $_POST['nombreClinicaHospital'];
$calle = $_POST['calleHospital'];
$delegacion = $_POST['delegacionHospital'];
$telefono = $_POST['telefonoHospital'];
$horario = $_POST['horarioAtencion'];
$referencias= $_POST['referenciasHospital'];
$correo = $_POST['Correo'];
$tipoDeServicio = $_POST['tipoDeServicio'];

//RECIBIR ESPECIALIDADES E INTERPRETARLAS A 0 Y 1

$conNeurologia = $_POST['conNeurologia'];
if($conNeurologia == "SI"){ $conNeurologia = "1"; } else {$conNeurologia = "0"; }
$conCirugiaGeneral = $_POST['conCirugiaGeneral'];
if($conCirugiaGeneral== "SI"){ $conCirugiaGeneral = "1"; } else {$conCirugiaGeneral = "0"; }
$conCirugiaCardiotoracica = $_POST['conCirugiaCardiotoracica'];
if($conCirugiaCardiotoracica == "SI"){ $conCirugiaCardiotoracica = "1"; } else {$conCirugiaCardiotoracica = "0"; }
$conCirugiaNeurologica= $_POST['conCirugiaNeurologica'];
if($conCirugiaNeurologica == "SI"){ $conCirugiaNeurologica= "1"; } else {$conCirugiaNeurologica = "0"; }
$pediatria = $_POST['pediatria'];
if($pediatria == "SI"){ $pediatria= "1"; } else {$pediatria = "0"; }
$cirugiaPlastica = $_POST['cirugiaPlastica'];
if($cirugiaPlastica == "SI"){ $cirugiaPlastica = "1"; } else {$cirugiaPlastica = "0"; }
$odontologia = $_POST['odontologia'];
if($odontologia == "SI"){ $odontologia = "1"; } else {$odontologia = "0"; }
$oftamologia = $_POST['oftamologia'];
if($oftamologia == "SI"){ $oftamologia = "1"; } else {$oftamologia = "0"; }
$dermatologia = $_POST['dermatologia'];
if($dermatologia == "SI"){ $dermatologia = "1"; } else {$dermatologia = "0"; }
$conTraumatologiaOrtopedia = $_POST['conTraumatologiaOrtopedia'];
if($conTraumatologiaOrtopedia == "SI"){ $conTraumatologiaOrtopedia = "1"; } else {$conTraumatologiaOrtopedia = "0"; }
$procedimientosQuirurgicos = $_POST['procedimientosQuirurgicos'];
if($procedimientosQuirurgicos == "SI"){ $procedimientosQuirurgicos= "1"; } else {$procedimientosQuirurgicos = "0"; }
$fisioterapiaRehabilitacion = $_POST['fisioterapiaRehabilitacion'];
if($fisioterapiaRehabilitacion== "SI"){ $fisioterapiaRehabilitacion = "1"; } else {$fisioterapiaRehabilitacion = "0"; }
$conTomografia = $_POST['conTomografia'];
if($conTomografia == "SI"){ $conTomografia = "1"; } else {$conTomografia = "0"; }
$RayosX = $_POST['conRayosX'];
if($RayosX == "SI"){ $RayosX = "1"; } else {$RayosX = "0"; }
$mandaTCE = $_POST['mandaTCE'];
if($mandaTCE == "SI"){ $mandaTCE = "1"; } else {$mandaTCE = "0"; }
$ambulatorio = $_POST['ambulatorio'];
if($ambulatorio == "SI"){ $ambulatorio = "1"; } else {$ambulatorio = "0"; }
$otorrino = $_POST['otorrino'];
if($otorrino == "SI"){ $otorrino = "1"; } else {$otorrino = "0"; }







$sql = "UPDATE  vasegurobd.cat_hospitales
SET nombreClinicaHospital = '$nombre', calleHospital = '$calle', 
delegacionHospital = '$delegacion', telefonoHospital ='$telefono',
referenciasHospital = '$referencias', horarioAtencion = '$horario',
Correo = '$correo', conNeurologia = '$conNeurologia', conCirugiaGeneral = '$conCirugiaGeneral',
conCirugiaCardiotoracica = '$conCirugiaCardiotoracica', conCirugiaNeurologica = '$conCirugiaNeurologica',
pediatria = '$pediatria', cirugiaPlastica = '$cirugiaPlastica', odontologia = '$odontologia',
oftamologia = '$oftamologia', dermatologia = '$dermatologia', conTraumatologiaOrtopedia = '$conTraumatologiaOrtopedia',
procedimientosQuirurgicos = '$procedimientosQuirurgicos', fisioTerapiaRehabilitacion = '$fisioterapiaRehabilitacion',
conTomografia = '$conTomografia', conRayosX = '$RayosX', mandaTCE = '$mandaTCE', ambulatorio = '$ambulatorio',
otorrino = '$otorrino', tipoDeServicio = '$tipoDeServicio'
 WHERE idHospital = '$idHospital'";




mysqli_query($link,$sql) or die (mysqli_error($link));



mysqli_close($link);

?>

<script>

        alert("DATOS ACTUALIZADOS");
        window.location= "../forms/adminMedicosHospitales.php" ;     
   
</script>



  
