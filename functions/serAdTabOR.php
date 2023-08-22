<head>

<script type="text/javascript" src="js/jquery-3.5.1.js"></script>

</head>
<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$foAcc= $_POST['palabra'];

$sql = "SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' ORDER BY fechaSolicitud DESC ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();

echo '<table id="tablaSerAd"><thead><tr>
<td></td>
<td>ID</td>
<td ><b>CONCEPTO</b></td> 
<td><b> COSTO</b> </td>
<td> ESTATUS </td>
<td> HOSPITAL </b> </td>

<td> COMENTARIO</td>
<td> RESPUESTA</td>
<td> FECHA SOLICITUD</td>
<td> FECHA RESPUESTA</td>
<td> DATOS COMPLETOS</td>
</tr></thead>';

$total = "";
foreach ($lista as $milista) {
    echo '
   <tr>';

   if ($milista['estadoSolicitud'] == 'APROBADA' AND $milista['estadoDatos'] == "SI" ){
  echo '<td > <input type="checkbox"></td>';
   }else{
       echo '<td></td>';
   }

echo '
   <td class="ace">'.$milista['id_servicio'].'</td>
    <td>'.$milista['conceptoServicio'].'</td>';
    

        echo ' <td class ="';

        if ($milista['costoServicio'] < 100000 ){
            echo 'pen';
        }

        elseif ($milista['costoServicio'] >= 100000 AND $milista['costoServicio'] < 200000){
            echo 'enhos';
        }
        
        elseif ($milista['costoServicio'] >= 200000){
            echo 'dup';
        }
        
        
        
       echo '"><b>$ '.$milista['costoServicio'].'</b> </td>';
 
    
    
    
if ($milista['estadoSolicitud'] == 'APROBADA'){
    echo ' <td class="pen"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}

if ($milista['estadoSolicitud'] == 'NUEVO') {
    echo ' <td class="ace"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}
if ($milista['estadoSolicitud'] == 'RECHAZADA'){
    echo ' <td class="rec"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}
   
   
   echo '<td> <b>'.$milista['hospitalOrigen'].'</b> </td>';

   
    if ($milista['comentarioAcc'] == ''){
        echo '<td class="dup"> <b> SIN COMENTARIOS </b> </td>';
    }else{
        echo '<td> <b>'.$milista['comentarioAcc'].'</b> </td>';  
    }



    if ($milista['comentarioMed'] == ''){
        echo '<td class="egr"> <b> EN ESPERA </b> </td>';
    }else{
        echo '<td> <b>'.$milista['comentarioMed'].'</b> </td>';  
    }


if ($milista['estadoSolicitud'] == 'APROBADA' AND $milista['estadoDatos'] == 'SI' ){
    $total = $total + $milista['costoServicio'];
}

echo '<td> <b>'.$milista['fechaSolicitud'].'</b> </td>'; 

if ($milista['fechaRespuesta'] == ''){
    echo '<td class="dup"> <b> EN ESPERA </b> </td>';
}else{
    echo '<td> <b>'.$milista['fechaRespuesta'].'</b> </td>';  
}

echo '<td class=';
if ($milista['estadoDatos'] == 'SI' ){
    echo 'ace';
}else { echo 'rec'; }



 echo '> <b>'.$milista['estadoDatos'].'</b> </td>';
   echo '</tr>';
   

}

echo '</table>
<table><tr>
<td class="rec">TOTAL:</td>
<td class="';

if ($total < 50000 ){
    echo 'pen';
}

if ($total >= 50000){
    echo 'enhos';
}
if ($total >= 100000){
    echo 'rec';
}



echo '" style="font-size: 18px"> <b>$'.$total.'</b></td>

</tr></table>
<br>

';
 ?>
 