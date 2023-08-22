
<?php
include("phpfunctions.php");
$link = con();  

$hospital= $_REQUEST['hospital'];

$sql="SELECT
idHospital AS Hospital, COUNT(idHospital) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN cat_estatus ON tb_accidentes.idEstatus=cat_estatus.idEstatus
WHERE idHospital = '$hospital'
GROUP BY idHospital ORDER BY Accidentes DESC";


$result=mysqli_query($link,$sql);   

        while($row=mysqli_fetch_array($result)){
    echo "['  (".$row['Accidentes'].") ".$row['Hospital']."', ".$row['Accidentes']."],";
  }



$sql1=mysqli_query($link,"SELECT * FROM vasegurobd.tb_accidentes WHERE idHospital = '$hospital' AND idEstatus = '3' "); 
        $numAcc1= mysqli_num_rows($sql1);  

$sql2=mysqli_query($link,"SELECT * FROM vasegurobd.tb_accidentes WHERE idHospital = '$hospital' AND idEstatus = '5' "); 
        $numAcc2= mysqli_num_rows($sql2);  

$sql3=mysqli_query($link,"SELECT * FROM vasegurobd.tb_accidentes WHERE idHospital = '$hospital' AND idEstatus = '6' "); 
        $numAcc3= mysqli_num_rows($sql3);        

        echo '<table>
        <thead><tr>
        <td>Tipo de Accidente</td>
        <td>Numero de registros</td>
        </tr></thead>
        <tr>
        <td>APROBADO</td>
        <td>'.$numAcc1.'</td>
        </tr><tr>
        <td>EN HOSPITAL</td>
        <td>'.$numAcc2.'</td>
        </tr><tr>
        <td>EGRESO</td>
        <td>'.$numAcc3.'</td>
        </tr>
        
        </table>';
      

 ?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">


google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      
            ['APROBADO','<?php echo $numAcc1; ?>'],
            ['EN HOSPITAL','<?php echo $numAcc2; ?>'],
            ['EGRESO','<?php echo $numAcc3; ?>'],
       
    ]);
    
    var options = {
        title: 'ACCIDENTES HOY',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}

</script>
<div id="piechart"></div>

<?php
mysqli_close($link);
?>
 
