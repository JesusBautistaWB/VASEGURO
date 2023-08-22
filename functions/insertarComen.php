<?php
  

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");

$idCo= $_REQUEST['idCo'];
$idAcc= $_REQUEST['idAcc'];

 $co = "";
 $coAc = "";

$sqlco = "SELECT comentarioAccidente FROM vasegurobd.tb_accidentes WHERE FolioAccidente = '$idAcc' ";
$result=mysqli_query($link,$sqlco);

  while($mostrar=mysqli_fetch_array($result)){
$co = $mostrar['comentarioAccidente'];
  }

$sqlcol = "SELECT motivoLlamada FROM vasegurobd.tb_llamadas WHERE id_Llamada= '$idCo' ";
$resultco=mysqli_query($link,$sqlcol);

  while($mostrar=mysqli_fetch_array($resultco)){
$coAc = $mostrar['motivoLlamada'];
  }



   

$sql = "UPDATE vasegurobd.tb_accidentes SET comentarioAccidente = '$co+$coAc' WHERE FolioAccidente = '$idAcc'";


mysqli_query($link,$sql) or die (mysqli_error($link));

$sqles = "UPDATE vasegurobd.tb_llamadas SET estatus = 'SI' WHERE id_Llamada= '$idCo'";


mysqli_query($link,$sqles) or die (mysqli_error($link));

mysqli_close($link);


?>

<script>

        alert("COMENTARIO AGREGADO");
        window.location= "../forms/adminLlamadas.php" ;     
      
    

</script>


  
