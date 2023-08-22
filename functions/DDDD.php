<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,300italic,400italic);

body{
  padding-top:15px;
  font-family: 'Open Sans', sans-serif;
	font-size:13px;
}

.tabla {
  margin: 0 auto;
}
.tabla thead {
  cursor: pointer;
  background: rgba(0, 0, 0, .2);
}
.tabla thead tr th { 
  font-weight: bold;
  padding: 10px 20px;
}
.tabla thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 55%;
}
.tabla thead tr th.headerSortUp,
.tabla thead tr th.headerSortDown {
  background: rgba(0, 0, 0, .2);
}
.tabla thead tr th.headerSortUp span {
  background-image: url('http://tablesorter.com/themes/blue/asc.gif');
}
.tabla thead tr th.headerSortDown span {
  background-image: url('http://tablesorter.com/themes/blue/desc.gif');
}
.tabla tbody tr td {
  text-align: center;
  padding: 10px 20px;
}
.tabla tbody tr td.align-left {
  text-align: left;
}
  </style>
<head>
<script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js"></script>
      <script id="rendered-js">
$(function () {
  $('#acciEs').tablesorter();
});
//# sourceURL=pen.js
    </script>
</head>
<?php   
include("phpfunctions.php");   
 $conexion = con();



 $fechaIn = "2022-10-27";
$fechaFin = "2022-10-27";
$date2 = "";
if($fechaFin != ''){
$date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
}




 $sql="SELECT idEstatus, nombreEstatus, registrosTotal FROM vasegurobd.cat_estatus";
 $result=mysqli_query($conexion,$sql);    
 


?>

 <table id="acciEs" class="tabla">
 <thead>
 
 <tr>
 <td>CATEGORIA</td>
 <td> ACCIDENTES PERIODO</td>
</tr>

 </thead>

<?php
 while($row=mysqli_fetch_array($result)){
         echo "<tr>
      
         <td>".$row['nombreEstatus']."</td>";
         //esPeAcc($row['idEstatus'], $fechaIn, $fechaFin);
         echo "<td class='pen'>".$row['registrosTotal']."</td>";
         echo "</tr>";
       }

 echo "</table>";
	 ?>
    
