<?php
include("../lib/conexionBD.php");
$id= $_REQUEST['id'];

$cnx= new PDO("mysql:host=".$host.";dbname=".$basedatos.";port=".$puerto, $user, $pass);
$res= $cnx->query("SELECT * FROM vasegurobd.tb_rutasarchivos WHERE idRuta = '$id' ");
$ruta = "";

foreach ($res as $row){
  $ruta=$row[ruta];
}

$resDel= $cnx->query("DELETE FROM vasegurobd.tb_rutasarchivos WHERE idRuta = '$id' ");

If (unlink($ruta)) {
  // file was successfully deleted
  ?>
  <script>

alert("ELIMINADO");
history.back();   
location.reload();  
</script>
<?php
} else {
  // there was a problem deleting the file
  ?>
<script>

alert("NO ELIMINADO");
history.back(); 
location.reload();

</script>

  <?php
}

 ?>
