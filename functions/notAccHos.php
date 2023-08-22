<?php

$hospital = ltrim($_POST['hospital']);

include("phpfunctions.php");
 
$conexion= con();

		$sql="SELECT * FROM vasegurobd.tb_accidentes WHERE idHospital ='$hospital' AND idEstatus ='3';";
		$result=mysqli_query($conexion,$sql);
        $nueAcc = mysqli_num_rows($result);

    
  echo "<span class='textSectionRED'> NUEVOS(".$nueAcc.")</span>";
mysqli_close($conexion);
?>
 