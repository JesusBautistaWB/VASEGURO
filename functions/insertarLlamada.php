<?php
  
  include("phpfunctions.php");
  $link = con();

$idUsuario= $_REQUEST['idUsuario'];
$nomUsuario= $_REQUEST['nomUsuario'];
$tipoLlamada= $_REQUEST['tipoLlamada'];
$foAccLlam= $_REQUEST['folioAccLlam'];
$motLl= $_REQUEST['motLl'];
$apRe= $_REQUEST['appPaRepor'];
$amRe= $_REQUEST['appMaRepor'];
$nombreRepor= $_REQUEST['nombreRepor'];
$idReg= $_REQUEST['idUsuario'];
$usuReg= $_REQUEST['nombreUsuario'];
 


   

$sql = "INSERT INTO vasegurobd.tb_llamadas 
(folioAccLlamada, 
motivoLlamada, tipoLlamada, 
apRepor, amRepor, nombreRepor, usuReg, idReg) 
VALUES ('$foAccLlam', '$motLl', '$tipoLlamada', '$apRe',
 '$amRe', '$nombreRepor','$usuReg', '$idReg');";


mysqli_query($link,$sql) or die (mysqli_error($link));

mysqli_close($link);


?>

<script>

        alert("Llamada registrada");
        window.location= "../forms/adminLlamadas.php" ;     
      
    

</script>


  
