<?php
  
  include("phpfunctions.php");
$link = con();

$comentario= $_REQUEST['palabra'];
$tipo= $_REQUEST['tipo'];
$us = $_REQUEST['us'];
$idSA = $_REQUEST['idSA'];


$sql = "INSERT INTO vasegurobd.tb_comentariosa (autorCom, idSA, comentario, tipo) VALUES ('$us','$idSA','$comentario','$tipo')";
mysqli_query($link,$sql) or die (mysqli_error($link));


$fech = "SELECT * FROM vasegurobd.tb_comentariosa
WHERE idSA = '$idSA' ORDER BY fechaCom";

$resultf=mysqli_query($link,$fech);



?>
<span class="textSection">MENSAJES</span>
        <label>
        
        <?php
while($mostrar=mysqli_fetch_array($resultf)){

  if ($mostrar['tipo'] == "M"){
echo "<label style=' color: darkred;'>";
  }elseif ($mostrar['tipo'] == "S"){
    echo "<label style=' color: darkgreen;'>";
      }

      
  echo "<label style='font-size: 10px; color: gray;'>".$mostrar['autorCom']."(".$mostrar['fechaCom'].")</label><br><b>".$mostrar['comentario']."</b><br><br>";
   echo "</right></label>";
 
} 


?> 

</label>
<label>
  <input 
  style="
    background-color: white;
    color: black;
    font-size: 9px;" placeholder="Escriba su mensaje" id="nuevoMensaje">

<button type="button" style="width: 100px; background-color: #6789DC;" onclick="enviarMensaje('<?php echo $tipo; ?>')"> ENVIAR <img src="../images/send.png" width="17px" height="15px"> </button>
<button type="button" style="width: 135px; background-color: #6789DC;" onclick="actualizarMensajes('<?php echo $tipo; ?>')"> ACTUALIZAR <img src="../images/refresh.png" width="13px" height="13px"> </button>
</label>