<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$foAcc= $_POST['palabra'];

$sql = "SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' AND estadoSolicitud = 'APROBADA' ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();

echo '<table><thead><tr>
<td ><b>CONCEPTO</b></td> 
<td><b> COSTO</b> </td>
<td> ESTATUS </td>
<td> HOSPITAL </b> </td>

<td> COMENTARIO</td>
<td> RESPUESTA</td>
<td> FECHA SOLICITUD</td>
<td> FECHA RESPUESTA</td>
</tr></thead>';

$total = "";
foreach ($lista as $milista) {
    echo '
   <tr>
    <td class="ace"><b>'.$milista['conceptoServicio'].'</b></td>';
    



        echo ' <td class ="';

        if ($milista['costoServicio'] < 50000 ){
            echo 'pen';
        }

        elseif ($milista['costoServicio'] >= 50000 AND $milista['costoServicio'] < 100000){
            echo 'enhos';
        }
        
        elseif ($milista['costoServicio'] >= 100000){
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
   
   
   echo '<td class="enhos"> <b>'.$milista['hospitalOrigen'].'</b> </td>';

   
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


if ($milista['estadoSolicitud'] == 'APROBADA'){
    $total = $total + $milista['costoServicio'];
}

echo '<td> <b>'.$milista['fechaSolicitud'].'</b> </td>'; 

if ($milista['fechaRespuesta'] == ''){
    echo '<td class="dup"> <b> EN ESPERA </b> </td>';
}else{
    echo '<td> <b>'.$milista['fechaRespuesta'].'</b> </td>';  
}

    
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
';
 ?>
