<?php
  
  include("phpfunctions.php");
$pdo = conexion();

$keyword = $_POST['palabra'];
$sql = "SELECT * FROM vasegurobd.tb_accidentado ADO, vasegurobd.tb_accidentes ACC
 WHERE curpAcc = '$keyword'
 AND ACC.FolioAccidentado = ADO.FolioAccidentado
  LIMIT 0, 1";
$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();

$nombre = "";
$ap = "";
$am = "";
$fecha="";
$calleAcc="";
$estado ="";
$alc="";
$s="";
$idCp="";
$apr="";
$apm="";
$nomr="";
$tfr="";
$tfc="";
foreach ($lista as $milista) {

	
echo " El CURP <label style='color: black;'>'$keyword'</label> pertenece a <u>".$milista['NombreA']." "
.$milista['PrimerApellidoA']." ".$milista['SegundoApellidoA']."</u><br> ULTIMO ACCIDENTE REGISTRADO:<label style='color: black;'> <b>".$milista['fechaRepor']."</b></label>";

$nombre = $milista['NombreA'];
$ap = $milista['PrimerApellidoA'];
$am = $milista['SegundoApellidoA'];
$fecha = $milista['FechaNacimientoA'];
$calleAcc = $milista['CalleA'];
$estado = $milista['estado'];
$alc = $milista['AlcaldiaMunicipio'];
$col = $milista['Colonia'];
$s = $milista['SexoA'];
$idCp = $milista['idCP'];
$dialectoAcc = $milista['dialectoAcc'];
$dialectoAccEs = $milista['dialectoAccEs'];
$indigenaAcc = $milista['indigenaAcc'];
$apr=$milista['apRes'];
$apm=$milista['amRes'];
$nomr=$milista['nombreRes'];
$tfr=$milista['telFiRes'];
$tfc=$milista['telCelRes'];

}

?>
<script>
	var nom = "<?php echo $nombre; ?>";

	if (nom == ""){

	}else{
	$('#nombreAcc').val("<?php echo $nombre; ?>");
	$('#appMaAcc').val("<?php echo $am; ?>");
	$('#appPaAcc').val("<?php echo $ap; ?>");
	$('#fechaNacimientoAccidentado').val("<?php echo $fecha; ?>");

	edad();
	$('#cpAccidentado').val("<?php echo $idCp; ?>");
	$('#calleAccidentado').val("<?php echo $calleAcc; ?>");
	$('#entidadAccidentado').val("<?php echo $estado; ?>");
	$('#alcaldiaAccidentado').val("<?php echo $alc; ?>");
	$('#coloniaAccidentado').val("<?php echo $col; ?>");
	$('#dialectoAccEs').val("<?php echo $dialectoAccEs; ?>");

	$('#appResponsable').val("<?php echo $apr; ?>");
	$('#apmResponsable').val("<?php echo $apm; ?>");
	$('#nombreResponsable').val("<?php echo $nomr; ?>");

	$('#telefonoResponsable').val("<?php echo $tfc; ?>");
	$('#telefonoResponsablefijo').val("<?php echo $tfr; ?>");

	<?php
if ($s == "HOMBRE"){
?>
 $("input[type='radio'][name='generoAccidentado'][value='HOMBRE']").prop('checked',true);
<?php } 
if ($s == "MUJER"){
?>

$("input[type='radio'][name='generoAccidentado'][value='MUJER']").prop('checked',true);
<?php } 

if ($indigenaAcc == "SI"){
?>

$("input[type='radio'][name='indigenaAcc'][value='SI']").prop('checked',true);
<?php } else{ ?>
	$("input[type='radio'][name='indigenaAcc'][value='NO']").prop('checked',true);
	<?php }  


if ($indigenaAcc == "SI"){
?>

$("input[type='radio'][name='indigenaAcc'][value='SI']").prop('checked',true);
<?php } else{ ?>
	$("input[type='radio'][name='indigenaAcc'][value='NO']").prop('checked',true);
	<?php } 

if ($dialectoAcc == "SI"){
		?>
		
		$("input[type='radio'][name='dialectoAcc'][value='SI']").prop('checked',true);
		<?php } else{ ?>
		$("input[type='radio'][name='dialectoAcc'][value='NO']").prop('checked',true);
			<?php }  ?>
		}
	</script>
 