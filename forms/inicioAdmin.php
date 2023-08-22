<html lang="en-US">
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <?php include("../functions/phpfunctions.php");
  estadisticas();
  ?> 
  <title>Aviso de Accidente VASEGURO</title>
  
 
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/security.js"></script>
<script type="text/javascript" src="js/loader.js"></script>

<script type="text/javascript">




function drawChartMONTHAccidentes() {

var dat11 = google.visualization.arrayToDataTable([
  ['Language', 'Rating'],
  <?php
    
$sql="SELECT
nombre, COUNT(FolioAccidente) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN tb_usuarios ON tb_accidentes.idusuario = tb_usuarios.login
WHERE MONTH(fechaRepor) = MONTH(current_date())
GROUP BY nombre ORDER BY Accidentes DESC;";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo "['  (".$row['Accidentes'].") ".$row['nombre']."', ".$row['Accidentes']."],";
  }
} 

  ?>
]);

var option11 = {
    title: 'TOTAL DE ACCIDENTES POR USUARIO DEL MES',
    width: 950,
    height: 555,
};

var chart11 = new google.visualization.PieChart(document.getElementById('piechart11'));

chart11.draw(dat11, option11);
}  

function drawChartALLAccidentes() {

var dat12 = google.visualization.arrayToDataTable([
['Language', 'Rating'],
<?php
  
$sql="SELECT
nombre, COUNT(FolioAccidente) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN tb_usuarios ON tb_accidentes.idusuario = tb_usuarios.login
GROUP BY nombre ORDER BY Accidentes DESC;";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
 // echo "['  (".$row['Accidentes'].") ".$row['usuario']."', ".$row['Accidentes']."],";
 echo "['  (".$row['Accidentes'].") ".$row['nombre']."', ".$row['Accidentes']."],";
}
} 

?>
]);

var option12 = {
  title: 'TOTAL DE ACCIDENTES POR USUARIO',
  width: 1000,
  height: 500,
  
};

var chart12 = new google.visualization.PieChart(document.getElementById('piechart12'));

chart12.draw(dat12, option12);
} 


</script>


<!--fin grafica de siniestros-->

<style type="text/css">>
iframe {
  overflow-x:hidden;
  overflow-Y:hidden;
}    

::-webkit-scrollbar {
    width: 0px;
    height: 0px;
}

</style> 
</head> 


      
<body>
    
 
    <div class="header">         
       <?php 
        echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
    <span class='titleHeader'>   AVISO DE ACCIDENTE </span>";  
   
    menuEst();
    ?>
  

    </div>
    
    
    
  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#21B80A;">
 
     
 <!-- TRAEMOS LA INFORMACION BASICA DEL USUARIO, YA QUE SE UTILIZARA POSTERIORMENTE PARA FOLIAR AL ACCIDENTE EN CASO DE APROBACION-->
  <form>
     
       <div class="col-1"></div>

      
            <div class="col-3">
          <label>
          <input   name="idUsuario" id="idUsuario" style="border: none;"  readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
              </div>
        <div class="col-3">
           <label>
               <input id="nombreUsuario" name="nombreUsuario" style="border: none;"  readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>
      </div>
      <div class="col-3">
      <label>
      <input  placeholder="<?php  $fechaActual = getdate('Y-m-d');
      echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy" style="border: none;"  readonly>
      </label>
      </div>
          <div class="col-1"><span class="textSection">BIENVENIDO AL SISTEMA DE AVISO DE ACCIDENTES | VASEGURO <br></span></div>
         


<?php estadisticasIniciales(); ?>

  </form>
  </div>
 </div>
</div>
</body>
    
      
</html>