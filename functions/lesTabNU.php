<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$foAcc= $_POST['palabra'];

$sql = "SELECT *  FROM vasegurobd.tb_lesionesaccidentado WHERE FolioAccidentadoLes = '$foAcc' ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();




foreach ($lista as $milista) {

    echo '<table><tr>
    <td> LESION EN </td>
    <td ><b>'.$milista['rdca'].'</b></td> 
    <td><b> '.$milista['rdcaES'].'</b> </td>
    <td> REFIERE </td>
    <td> <b>'.$milista['sintomasLes'].' </b> </td>
    <td>CON INTENSIDAD EN GRADO </td>
    <td> <b>'.$milista['intensidadLes'].'</b> </td>
    
    
    </tr></table>';
   

}
mysqli_close($pdo);
 ?>
