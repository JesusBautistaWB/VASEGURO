<?php
include("phpfunctions.php");
$link = con();

$folio= $_GET['folio'];
$id = $_GET['ids'];
$ids = explode(",", $id);
$idLe = count($ids);


for($i= 0; $i<=$idLe; $i++) {
          
  $apid= "UPDATE vasegurobd.tb_rutasarchivos SET estado = 'APROBADA' WHERE idRuta ='$ids[$i]' ";  
  $result=mysqli_query($link,$apid);        
  
}

       $filestab = "UPDATE vasegurobd.tb_accidentes SET idEstatus = '6', estatusInterno = 'ALTA'
         WHERE FolioAccidente ='$folio'";
         
          mysqli_query($link,$filestab) or die (mysqli_error($link)); 

          $idLDP ="";
          $idCon="SELECT idAcc FROM vasegurobd.tb_accidentes WHERE FolioAccidente ='$folio'";
          
          $result=mysqli_query($link,$idCon);
          
          while($mostrar=mysqli_fetch_array($result)){
              $idLDP = $mostrar['idAcc'];
          }   
                 

 
 mysqli_close($link); 

?>
<script>
   alert("ACCIDENTE EGRESADO");
          history.back();
          reload();

  </script>


