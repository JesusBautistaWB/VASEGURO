<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$keyword = $_POST['hosId'];
$sql = "SELECT  conNeurologia, conCirugiaGeneral, conCirugiaCardiotoracica, conCirugiaNeurologica, 
pediatria, cirugiaPlastica, odontologia, oftamologia, dermatologia, conTraumatologiaOrtopedia,
 procedimientosQuirurgicos, fisioterapiaRehabilitacion, conTomografia, conRayosX, mandaTCE, 
 ambulatorio, otorrino  FROM vasegurobd.cat_hospitales WHERE nombreClinicaHospital = '$keyword' Limit 0,1 ";
 echo "<center><b>".$keyword."</b> cuenta con lo siguiente:</center>";
$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
echo "<table>
<tr>
";
foreach ($lista as $milista) {
	if($milista['conNeurologia'] == 1){
    echo "<td><img src='../images/iconEsp/conNeurologia.png' width='50' height='50'><br><label>Neurologia</label><br></td>";
  }

  if($milista['conCirugiaGeneral'] == 1){
    echo "<td><img src='../images/iconEsp/conCirugiaGeneral.png' width='50' height='50'><br><label>Cirugia General</label><br></td>";
  }

  if($milista['conCirugiaCardiotoracica'] == 1){
    echo "<td><img src='../images/iconEsp/conCirugiaCardiotoracica.png' width='50' height='50'><br><label>Cirugia Cardiotoracica</label><br></td>";
  }

  if($milista['conCirugiaNeurologica'] == 1){
    echo "<td><img src='../images/iconEsp/conCirugiaNeurologica.png' width='50' height='50'><br><label>Cirugia Neurologica</label><br></td>";
  }
    
  if($milista['pediatria'] == 1){
    echo "<td><img src='../images/iconEsp/pediatria.png' width='50' height='50'><br><label>Pediatria</label><br></td>";
  }

  if($milista['cirugiaPlastica'] == 1){
    echo "<td><img src='../images/iconEsp/cirugiaPlastica.png' width='50' height='50'><br><label>Cirugia Plastica</label><br></td>";
  }

  if($milista['odontologia'] == 1){
    echo "<td><img src='../images/iconEsp/odontologia.png' width='50' height='50'><br><label>Odontologia</label><br></td>";
  }
  
  if($milista['oftamologia'] == 1){
    echo "<td><img src='../images/iconEsp/oftamologia.png' width='50' height='50'><br><label>Oftamologia</label><br></td>
    </tr><tr>";

  }

  if($milista['dermatologia'] == 1){
    echo "<td><img src='../images/iconEsp/dermatologia.png' width='50' height='50'><br><label>Dermatologia</label><br></td>";
    
  }
  

  if($milista['conTraumatologiaOrtopedia'] == 1){
    echo "<td><img src='../images/iconEsp/conTraumatologiaOrtopedia.png' width='50' height='50'><br><label>Traumatologia Ortopedia</label><br></td>
    
    ";
    
  }

  if($milista['procedimientosQuirurgicos'] == 1){
    echo "<td><img src='../images/iconEsp/procedimientosQuirurgicos.png' width='50' height='50'><br><label>Procedimientos Quirurgicos</label><br></td>";
    
  }

  if($milista['fisioterapiaRehabilitacion'] == 1){
    echo "<td><img src='../images/iconEsp/fisioterapiaRehabilitacion.png' width='50' height='50'><br><label>Fisioterapia Rehabilitacion</label><br></td>";
    
  }

  if($milista['conTomografia'] == 1){
    echo "<td><img src='../images/iconEsp/conTomografia.png' width='50' height='50'><br><label>Tomografia</label><br></td>";
    
  }

  if($milista['conRayosX'] == 1){
    echo "<td><img src='../images/iconEsp/conRayosX.png' width='50' height='50'><br><label>RayosX</label><br></td>
    ";
    
  }

  if($milista['mandaTCE'] == 1){
    echo "<td><img src='../images/iconEsp/mandaTCE.png' width='50' height='50'><br><label>TCE</label><br></td>";
    
  }

  if($milista['ambulatorio'] == 1){
    echo "<td><img src='../images/iconEsp/ambulatorio.png' width='50' height='50'><br><label>Ambulatorio</label><br></td>";
    
  }

  if($milista['otorrino'] == 1){
    echo "<td><img src='../images/iconEsp/otorrino.png' width='50' height='50'><br><label>Otorrinolaringologia</label><br></td>";
    
  }
    
    
    
}
echo "</tr></table>";
 
?>