        <?php      
        $id = $_GET['ids'];
        $idn = $_GET['idn'];
       

        include("phpfunctions.php");
     
		$conexion = con();

        $ids = explode(",", $id);
        $idLe = count($ids);
        $idsn = explode(",", $idn);
        $idLen = count($idsn);
       
    

        for($i= 0; $i<=$idLe; $i++) {
          
          $apid= "UPDATE vasegurobd.tb_rutasarchivos SET estado = 'APROBADO' WHERE idRuta ='$ids[$i]' ";  
          $result=mysqli_query($conexion,$apid);        
          
        }

        for($i= 0; $i<=$idLen; $i++) {
          
          $apidn= "UPDATE vasegurobd.tb_rutasarchivos SET estado = 'RECHAZADO' WHERE idRuta ='$idsn[$i]' ";  
          $resultN=mysqli_query($conexion,$apidn);        
          
        }


        mysqli_close($conexion);




?>
<script>
  history.back();
location.reload();

  </script>


