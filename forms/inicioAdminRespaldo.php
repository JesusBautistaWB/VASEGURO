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
      <script type="text/javascript" src="js/securityAdmin.js"></script>
<script type="text/javascript" src="js/loader.js"></script>

<script type="text/javascript">



google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChartMONTH);
google.charts.setOnLoadCallback(drawChartALL);
google.charts.setOnLoadCallback(drawCharthospital);
google.charts.setOnLoadCallback(drawChartMONTHhospital);
google.charts.setOnLoadCallback(drawChartALLhospital);
google.charts.setOnLoadCallback(drawChartSiniestros);
google.charts.setOnLoadCallback(drawChartMONTHSiniestros);
google.charts.setOnLoadCallback(drawChartALLSiniestros);
google.charts.setOnLoadCallback(drawChartAccidentes);
google.charts.setOnLoadCallback(drawChartMONTHAccidentes);
google.charts.setOnLoadCallback(drawChartALLAccidentes);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      <?php
        
    $conexion = con();
		$sql="SELECT idEstatus, nombreEstatus,registrosDia FROM vasegurobd.cat_estatus;";
		$result=mysqli_query($conexion,$sql);    
  
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['  (".$row['registrosDia'].") ".$row['nombreEstatus']."', ".$row['registrosDia']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'ACCIDENTES HOY',
        width: 900,
        height: 500,

       
    };
    

    echo "<table>";
    while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row['nombreEstatus']."', ".$row['registrosDia']."</td></tr>";
          }
echo "</table>";

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);

   
  
  
}

    
 function drawChartMONTH() {

    var dat2 = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      <?php
        
		$sql="SELECT idEstatus, nombreEstatus, registrosMes FROM vasegurobd.cat_estatus;";
    $result=mysqli_query($conexion,$sql);   
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        echo "['  (".$row['registrosMes'].") ".$row['nombreEstatus']."', ".$row['registrosMes']."],";
      }
  } 
 
      ?>
    ]);
    
    var option2 = {
        title: 'ACCIDENTES EN ESTE MES',
        width: 900,
        height: 500,
    };
    
    var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
    
    chart2.draw(dat2, option2);
}  

function drawChartALL() {

var dat3 = google.visualization.arrayToDataTable([
  ['Language', 'Rating'],
  <?php

$sql="SELECT idEstatus, nombreEstatus, registrosTotal FROM vasegurobd.cat_estatus;";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo "['  (".$row['registrosTotal'].") ".$row['nombreEstatus']."', ".$row['registrosTotal']."],";
  }
} 

  ?>
]);

var option3 = {
    title: 'ACCIDENTES EN TOTAL ',
    width: 900,
    height: 500,
};

var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));

chart3.draw(dat3, option3);
}  


function drawCharthospital() {

  var dat4 = google.visualization.arrayToDataTable([
  ['Language', 'Rating'],
  <?php
    
$sql="SELECT
idHospital AS Hospital, COUNT(idHospital) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN cat_estatus ON tb_accidentes.idEstatus=cat_estatus.idEstatus
WHERE MONTH(fechaRepor) = MONTH(current_date()) AND  DAY(fechaRepor) = DAY(current_date())
GROUP BY idHospital ORDER BY Accidentes DESC;";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo "['  (".$row['Accidentes'].") ".$row['Hospital']."', ".$row['Accidentes']."],";
  }
} 

  ?>
]);

var option4 = {
    title: 'TOTAL DE CASOS POR HOSPITAL DEL DIA',
    width: 950,
    height: 500,
};

var chart4 = new google.visualization.PieChart(document.getElementById('piechart4'));

chart4.draw(dat4, option4);
}


function drawChartMONTHhospital() {

var dat5 = google.visualization.arrayToDataTable([
  ['Language', 'Rating'],
  <?php
    
$sql="SELECT
idHospital AS Hospital, COUNT(idHospital) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN cat_estatus ON tb_accidentes.idEstatus=cat_estatus.idEstatus
WHERE MONTH(fechaRepor) = MONTH(current_date())
GROUP BY idHospital ORDER BY Accidentes DESC;";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo "['  (".$row['Accidentes'].") ".$row['Hospital']."', ".$row['Accidentes']."],";
  }
} 

  ?>
]);

var option5 = {
    title: 'TOTAL DE CASOS POR HOSPITAL DEL MES' ,
    width: 900,
    height: 500,
};

var chart5 = new google.visualization.PieChart(document.getElementById('piechart5'));

chart5.draw(dat5, option5);
}  

function drawChartALLhospital() {

var dat6 = google.visualization.arrayToDataTable([
  ['Language', 'Rating'],
  <?php
    
$sql="SELECT
idHospital AS Hospital, COUNT(idHospital) AS Accidentes 
FROM vasegurobd.tb_accidentes
INNER JOIN cat_estatus ON tb_accidentes.idEstatus=cat_estatus.idEstatus
WHERE tb_accidentes.idEstatus <> 0 
GROUP BY Hospital ORDER BY Accidentes DESC";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    
    echo "['(".$row['Accidentes'].") ".$row['Hospital']."', ".$row['Accidentes']."],";
    
  }
} 

  ?>
]);

var option6 = {
    title: 'TOTAL DE CASOS POR HOSPITAL',
    width: 1000,
    height: 500,
    
};

var chart6 = new google.visualization.PieChart(document.getElementById('piechart6'));

chart6.draw(dat6, option6);
} 

//inicio grafica de siniestros
function drawChartSiniestros() {

var dat7 = google.visualization.arrayToDataTable([
['Language', 'Rating'],
<?php
  
$sql="SELECT
usuarioQueCambia AS Usuario, COUNT(folioAccidente) AS Accidentes, fechaCambio
FROM vasegurobd.tb_historialfoliosiniestro
WHERE MONTH(fechaCambio) = MONTH(current_date()) AND  DAY(fechaCambio) = DAY(current_date()) and folioSiniestro <> ''
GROUP BY Usuario ORDER BY Accidentes ASC;";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
  echo "['  (".$row['Accidentes'].") ".$row['Usuario']."', ".$row['Accidentes']."],";
}
} 
?>
]);
var option7 = {
  title: 'TOTAL DE SINIESTROS POR USUARIO DEL DIA',
  width: 950,
  height: 500,
};
var chart7 = new google.visualization.PieChart(document.getElementById('piechart7'));
chart7.draw(dat7, option7);
}



function drawChartMONTHSiniestros() {
var dat8 = google.visualization.arrayToDataTable([
['Language', 'Rating'],
<?php
$sql="SELECT
usuarioQueCambia AS Usuario, COUNT(folioAccidente) AS Accidentes, fechaCambio
FROM vasegurobd.tb_historialfoliosiniestro
WHERE MONTH(fechaCambio) = MONTH(current_date())  and folioSiniestro <> ''
GROUP BY Usuario ORDER BY Accidentes DESC;";

$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
  echo "['  (".$row['Accidentes'].") ".$row['Usuario']."', ".$row['Accidentes']."],";
}
} 

?>
]);

var option8 = {
  title: 'TOTAL DE SINIESTROS POR USUARIO DEL MES' ,
  width: 900,
  height: 500,
};

var chart8 = new google.visualization.PieChart(document.getElementById('piechart8'));
chart8.draw(dat8, option8);
}  
function drawChartALLSiniestros() {
var dat9 = google.visualization.arrayToDataTable([
['Language', 'Rating'],
<?php
 
$sql="SELECT
usuarioQueCambia AS Usuario, COUNT(folioAccidente) AS Accidentes, fechaCambio
FROM vasegurobd.tb_historialfoliosiniestro
WHERE tb_historialfoliosiniestro.folioAccidente <> '' and folioSiniestro <> ''
GROUP BY Usuario ORDER BY Accidentes DESC;";

$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
  echo "['  (".$row['Accidentes'].") ".$row['Usuario']."', ".$row['Accidentes']."],";
  
}
} 

?>
]);

var option9 = {
  title: 'TOTAL DE SINIESTROS POR USUARIO',
  width: 1000,
  height: 500,
  
};

var chart9 = new google.visualization.PieChart(document.getElementById('piechart9'));

chart9.draw(dat9, option9);
} 



//inicio grafica registro accidentes


function drawChartAccidentes() {

var dat10 = google.visualization.arrayToDataTable([
['Language', 'Rating'],
<?php
  
$sql="SELECT
nombre, COUNT(FolioAccidente) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN tb_usuarios ON tb_accidentes.idusuario = tb_usuarios.login
WHERE MONTH(fechaRepor) = MONTH(current_date()) AND  DAY(fechaRepor) = DAY(current_date())
GROUP BY nombre ORDER BY Accidentes DESC;";
$result=mysqli_query($conexion,$sql);   
if($result->num_rows > 0){
while($row = $result->fetch_assoc()){
  echo "['  (".$row['Accidentes'].") ".$row['nombre']."', ".$row['Accidentes']."],";
}
} 

?>
]);

var option10 = {
  title: 'TOTAL DE ACCIDENTES POR USUARIO DEL DIA',
  width: 900,
  height: 500,
};

var chart10 = new google.visualization.PieChart(document.getElementById('piechart10'));

chart10.draw(dat10, option10);
}

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
   
    menuAdmin();
    ?>
  

    </div>
    
    
    
  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#708090;">
 
     
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
          <div class="col-1">
          <label style="font-size: 30px;"><center> 
         
          <?php     
          setlocale(LC_TIME, "spanish");
          echo utf8_encode(strftime(" HOY ES %A, %d de %B de %Y "));

          ?>
         
          </center> </label> 

          <label style="font-size: 24px; color: green;"><center> 
         
          <?php     
         
          // accidentesTotales(); echo "Accidentes Registrados en total.";//
          ?>
         
        <!--  </center> </label> 

          <label style="font-size: 24px; color: green;"><center>-->
         
         <?php     
        
         // accidentesMes(); echo strftime("Accidentes Registrados este %B.");//
         ?>
        
          <!-- </center> </label> 

         <label style="font-size: 24px; color: green;"><center> -->
         
         <?php     
        
         // accidentesHoy(); echo "Accidentes Registrados el dia de Hoy.";//
         ?>
        
         </center> </label> 
      </div>
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonHoy" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES HOY <?php accidentesHoy(); ?></button>
          </center>
          </div>
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonMes" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES ESTE MES <?php accidentesMes(); ?> </button>
          </center>
          </div>


          
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonTodos" style="width: 160px; font-size: 12px; background: darkblue;">TODOS<?php accidentesTotales(); ?></button>
          </center>
          </div>
       
        <!-- Display the pie chart -->
      <div id="piechart" style="display: none">
    <?php
 $conexion = con();
 $sql="SELECT idEstatus, nombreEstatus,registrosDia FROM vasegurobd.cat_estatus;";
 $result=mysqli_query($conexion,$sql);    
 

 echo "<table>";
 while($row = $result->fetch_assoc()){
         echo "<tr><td>".$row['nombreEstatus']."', ".$row['registrosDia']."</td></tr>";
       }
echo "</table>";

    ?>
    </div>
  
      <div id="piechart2" style="display: none"></div>
      <div id="piechart3"></div>

      

<P>

<div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonHoyhospital" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES HOY<?php accidentesHoy(); ?></button>
          </center>
          </div>
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonMeshospital" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES ESTE MES<?php accidentesMes(); ?></button>
          </center>
          </div>


          
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonTodoshospital" style="width: 160px; font-size: 12px; background: darkblue;">TODOS<?php accidentesTotales(); ?></button>
          </center>
          </div>

   
      <div id="piechart4" style="display: none"></div>
      <div id="piechart5" style="display: none"></div>
      <div id="piechart6"></div>        



      <P>

          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonHoysiniestros" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES HOY<?php accidentesHoy(); ?></button>
          </center>
          </div>
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonMessiniestros" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES ESTE MES<?php accidentesMes(); ?></button>
          </center>
          </div>
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonTodossiniestros" style="width: 160px; font-size: 12px; background: darkblue;">TODOS <?php accidentesTotales(); ?></button>
          </center>
          </div>

   
      <div id="piechart7" style="display: none"></div>
      <div id="piechart8" style="display: none"></div>
      <div id="piechart9"></div>        
      
      <P>
      <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonHoyA" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES HOY</button>
          </center>
          </div>
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonMesA" style="width: 160px; font-size: 12px; background: darkgreen;">ACCIDENTES ESTE MES</button>
          </center>
          </div>
          <div class="col-3">
          <center>
          <button type="button" class="submitbtn" id="botonTodosA" style="width: 160px; font-size: 12px; background: darkblue;">TODOS</button>
          </center>
          </div>

   
      <div id="piechart10" style="display: none"></div>
      <div id="piechart11" style="display: none"></div>
      <div id="piechart12"></div>  
 
      
      <div>
      <iframe width="1024" height="800" src="https://datastudio.google.com/embed/reporting/de839cbe-c25b-4ff6-b523-7f5bce8950c0/page/p_74vamrb1qc" frameborder="0" style="border:0" style="overflow:hidden" allowfullscreen></iframe>
      </div> 

      <script>
 $('#botonHoy').on('click', this, function(){
                 document.getElementById('piechart').style.display = 'block'; 
                 document.getElementById('piechart2').style.display = 'none'; 
                 document.getElementById('piechart3').style.display = 'none'; 
              });
 $('#botonMes').on('click', this, function(){
                 document.getElementById('piechart').style.display = 'none'; 
                 document.getElementById('piechart2').style.display = 'block'; 
                 document.getElementById('piechart3').style.display = 'none'; 
              });
 $('#botonTodos').on('click', this, function(){
                 document.getElementById('piechart').style.display = 'none'; 
                 document.getElementById('piechart2').style.display = 'none'; 
                 document.getElementById('piechart3').style.display = 'block'; 
              });
</script>
<script>
$('#botonHoyhospital').on('click', this, function(){
                 document.getElementById('piechart4').style.display = 'block'; 
                 document.getElementById('piechart5').style.display = 'none'; 
                 document.getElementById('piechart6').style.display = 'none'; 
              });
$('#botonMeshospital').on('click', this, function(){
                 document.getElementById('piechart4').style.display = 'none'; 
                 document.getElementById('piechart5').style.display = 'block'; 
                 document.getElementById('piechart6').style.display = 'none'; 
              });
$('#botonTodoshospital').on('click', this, function(){
                 document.getElementById('piechart4').style.display = 'none'; 
                 document.getElementById('piechart5').style.display = 'none'; 
                 document.getElementById('piechart6').style.display = 'block'; 
              });



</script>

<script>
$('#botonHoysiniestros').on('click', this, function(){
                 document.getElementById('piechart7').style.display = 'block'; 
                 document.getElementById('piechart8').style.display = 'none'; 
                 document.getElementById('piechart9').style.display = 'none'; 
              });
$('#botonMessiniestros').on('click', this, function(){
                 document.getElementById('piechart7').style.display = 'none'; 
                 document.getElementById('piechart8').style.display = 'block'; 
                 document.getElementById('piechart9').style.display = 'none'; 
              });
$('#botonTodossiniestros').on('click', this, function(){
                 document.getElementById('piechart7').style.display = 'none'; 
                 document.getElementById('piechart8').style.display = 'none'; 
                 document.getElementById('piechart9').style.display = 'block'; 
              });



</script>


<script>
$('#botonHoyA').on('click', this, function(){
                 document.getElementById('piechart10').style.display = 'block'; 
                 document.getElementById('piechart11').style.display = 'none'; 
                 document.getElementById('piechart12').style.display = 'none'; 
              });
$('#botonMesA').on('click', this, function(){
                 document.getElementById('piechart10').style.display = 'none'; 
                 document.getElementById('piechart11').style.display = 'block'; 
                 document.getElementById('piechart12').style.display = 'none'; 
              });
$('#botonTodosA').on('click', this, function(){
                 document.getElementById('piechart10').style.display = 'none'; 
                 document.getElementById('piechart11').style.display = 'none'; 
                 document.getElementById('piechart12').style.display = 'block'; 
              });



</script>



  </form>
  </div>
 </div>
</div>
</body>
    
      
</html>