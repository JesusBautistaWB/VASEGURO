<?php

include("phpfunctions.php");


$conexion = con();
		$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales;";
        

        echo "<table>
        <tr>
        <thead>
       <td>Folio Accidente</td>
       <td>Concepto</td>
       <td>Costo</td>
       <td>Estatus</td>
       <td>Hospital que solicita</td>
       <td>Medico Revisor</td>
       
       </thead>
   </tr>";

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr >
           
            
            </td>
            <td><?php echo $mostrar['folioAccidenteServicio'] ?></td> 
            <td><?php echo $mostrar['conceptoServicio'] ?></td>
           
            <td><b><?php echo $mostrar['costoServicio'] ?></b></td>
            <td><b><?php echo $mostrar['estadoSolicitud'] ?></b></td>
           
			
			<td><?php echo $mostrar['hospitalOrigen'] ?></td>
            <td><?php echo $mostrar['medicoRevisor'] ?></td>
            	
		</tr>






  <?php
      

}
echo "</table>";

?>
 