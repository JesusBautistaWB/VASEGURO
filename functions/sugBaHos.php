<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$A="";
$neu= $_POST['neu']; if($neu == "1"){ $A = " conNeurologia = '$neu'"; } else { $A=""; }
$B="";
$ciGe= $_POST['ciGe']; if($ciGe == "1"){ $B = " AND conCirugiaGeneral = '$ciGe'"; } else { $B=""; }
$C="";
$ciGa= $_POST['ciGa']; if($ciGa == "1"){ $C = " AND conCirugiaCardiotoracica = '$ciGa'"; } else { $C=""; }
$D="";
$ciNeu= $_POST['ciNeu']; if($ciNeu == "1"){ $D = " AND conCirugiaNeurologica = '$ciNeu'"; } else { $D=""; }
$E="";
$ped= $_POST['ped']; if($ped == "1"){ $E = " AND pediatria = '$ped'"; } else { $E=""; }
$F="";
$ciPl= $_POST['ciPl']; if($ciPl == "1"){ $F = " AND cirugiaPlastica = '$ciPl'"; } else { $F=""; }
$G="";
$odo= $_POST['odo']; if($odo == "1"){ $G = " AND odontologia = '$odo'"; } else { $G=""; }
$H="";
$oft= $_POST['oft']; if($oft == "1"){ $H = " AND oftamologia = '$oft'"; } else { $H=""; }
$I="";
$der= $_POST['der']; if($der == "1"){ $I = " AND dermatologia = '$der'"; } else { $I=""; }
$J="";
$traOrt= $_POST['traOrt']; if($traOrt == "1"){ $J = " AND conTraumatologiaOrtopedia = '$traOrt'"; } else { $J=""; }
$K="";
$proQui= $_POST['proQui']; if($proQui == "1"){ $K = " AND procedimientosQuirurgicos = '$proQui'"; } else { $K=""; }
$L="";
$fisReh= $_POST['fisReh']; if($fisReh == "1"){ $L = " AND fisioterapiaRehabilitacion = '$fisReh'"; } else { $L=""; }
$M="";
$tom= $_POST['tom']; if($tom == "1"){ $M = " AND conTomografia = '$tom'"; } else { $M=""; }
$N="";
$rayx= $_POST['rayx']; if($rayx == "1"){ $N = " AND conRayosX = '$rayx'"; } else { $N=""; }
$O="";
$tce= $_POST['tce']; if($tce == "1"){ $O = " AND mandaTCE = '$tce'"; } else { $O=""; }
$P="";
$amb= $_POST['amb']; if($amb == "1"){ $P = " AND ambulatorio = '$amb'"; } else { $P=""; }
$Q="";
$otor= $_POST['otor']; if($otor == "1"){ $Q = " AND otorrino = '$otor'"; } else { $Q=""; }



$sqli = "SELECT *  FROM vasegurobd.cat_hospitales
 WHERE".$A."".$B."".$C."".$D."".$E."".$F."".$G."".$H."".$I."".$J."".$K."".$L."".$M."".$N."".$O."".$P."".$Q." AND tipodeServicio in('H','C') 
 ORDER by nombreClinicaHospital ASC";
$sql = str_replace("WHERE AND","WHERE",$sqli);


$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();

echo '<table border="1"><tr>
<thead>
<td>HOSPITAL</td>
<td>TELEFONO</td>
<td>DIRECCION</td>
<td>HORARIO</td>
<td>DELEGACIONES CERCANAS</td>
<td>REFERENCIAS</td>
<td></td>
</thead>
</tr>';

foreach ($lista as $milista) {

    echo '<tr>
    <td ><b>'.$milista['nombreClinicaHospital'].'</b></td>
    <td >'.$milista['telefonoHospital'].'</td> 
    <td> '.$milista['calleHospital'].' </td>
    <td> '.$milista['horarioAtencion'].' </td>
    <td> '.$milista['delegacionesAledanasHospital'].' </td>
    <td> '.$milista['referenciasHospital'].' </td>
    
    
    

    <td><a href="https://www.google.com/maps/place/'.$milista['calleHospital'].' '.$milista['delegacionHospiptal'].'" target="maps" > IR </a></td>
    
    </tr></table>';
   

}
 ?>