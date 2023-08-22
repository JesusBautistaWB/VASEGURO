<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$foAcc= $_POST['palabra'];

$sql = "SELECT *  FROM vasegurobd.tb_lesionesaccidentado WHERE FolioAccidenteLes = '$foAcc' ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();




foreach ($lista as $milista) {

    echo '
    , LESION EN <b>'.$milista['rdca'].' '.$milista['rdcaES'].'</b> REFIERE <b>'.$milista['sintomasLes'].' </b> INTENSIDAD EN GRADO <b>'.$milista['intensidadLes'].', ';
   

}

mysqli_close($pdo);
 ?>
