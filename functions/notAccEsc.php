<?php

$escuela = ltrim($_POST['escuela']);

include("phpfunctions.php");
  
$conexion = con();

		$sql="SELECT * FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
         WHERE ACCT.idEstatus = ES.idEstatus
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela AND nombreEscuela ='$escuela'  AND ACCT.FolioAccidente ='' ORDER BY fechaRepor DESC;";

		$result=mysqli_query($conexion,$sql);
        $nueAcc = mysqli_num_rows($result);



    
  echo "<span class='textSectionNEW'> PENDIENTES(".$nueAcc.")</span>";

    mysqli_con($conexion);    


?>
 