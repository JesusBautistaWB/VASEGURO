<?php   
include("phpfunctions.php");   
 $conexion = con();
 //ini_set('display_errors', 1);


 $fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];
$date2 = "";
if($fechaFin != ''){
$date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
}




 $sql="SELECT idEstatus, nombreEstatus, registrosTotal FROM vasegurobd.cat_estatus";
 $result=mysqli_query($conexion,$sql);    
 


?>

 <table id='acciEs'>
 <thead>
 
 <tr>
  <td></td>
 <td>CATEGORIA</td>
 <td> ACCIDENTES PERIODO</td>
</tr>
<tr><td colspan='3'> PERIODO <b> <?php echo $fechaIn."-".$fechaFin ?></b> </td></tr>
 </thead>

<?php
 while($row=mysqli_fetch_array($result)){
         echo "<tr>
         <td></td>
         <td>".$row['nombreEstatus']."</td>";
         esPeAcc($row['idEstatus'], $fechaIn, $fechaFin);
         //echo "<td class='pen'>".$row['registrosTotal']."</td>";
         echo "</tr>";
       }

 echo "</table>";
	 ?>
    
<script>
/**
 * Funcion para ordenar una tabla... tiene que recibir el numero de columna a
 * ordenar y el tipo de orden
 * @param int n
 * @param str type - ['str'|'int']
 */
function sortTable(n,type) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
alert(n);
alert(type);
  table = document.getElementById("acciEs");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
 
  /*Make a loop that will continue until no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare, one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
      /*check if the two rows should switch place, based on the direction, asc or desc:*/
      if (dir == "asc") {
        if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>