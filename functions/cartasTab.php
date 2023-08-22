
<?php
  //ini_set('display_errors', 1);
  include("phpfunctions.php");
  $pdo = conexion();
$foAcc= $_POST['palabra'];

$sql = "SELECT * FROM vasegurobd.tb_cartasgarantia C, vasegurobd.tb_usuarios U
 WHERE folioAccidente = '$foAcc'
 AND C.idPersonaQueAutoriza = U.idusuario
  ORDER BY fechaGeneracion DESC ";

$query = $pdo->prepare($sql); 
$query->execute();



echo '<table id="adminTable">
<thead>
<tr>
<td>Numero de Carta</td>
<td>Fecha Generacion</td>
<td>DR. Que Autoriza</td>
<td>IDs Servicios Adicionales</td>
<td>Monto Para Hospital</td>
<td></td>
</tr>
</thead>';

$lista = $query->fetchAll();
foreach ($lista as $milista) {
    echo '

    <td><b>'.$milista['numeroCarta'].'</b></td>
    <td>'.$milista['fechaGeneracion'].'</td>
    <td><b>'.$milista['nombre'].'</b></td>
    <td >'.$milista['ids_ss'].'</td>
    <td >'.$milista['montoHos'].'</td>
    <td><a href='.$milista['gen'].' target="_blank">VER</a></td>
    
    
    </tr>';
  

}
echo "</table>";

 ?>

 <button style="background-color: darkblue;  width: 150px; font-size: 10;" type="button" onclick="descarga()">DESCARGAR HISTORIAL DE CARTAS</button>
 <a href="#" id="linka" style="display:none"></a>
<script>
 function descarga()
{
alert("SE DESCARGARA LA TABLA QUE SE MUESTRA EN PANTALLA");

    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('adminTable'); 
    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<a href[^>]*>|<\/a>/g, "");
    tab_text= tab_text.replace("&nbsp;", " ");
    tab_text= tab_text.replace("&NBSP;", " ");
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); 
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); 
    tab_text= tab_text.replace("«", ""); 
    tab_text= tab_text.replace("»", ""); 
    tab_text= tab_text.replace("“", ""); 
    tab_text= tab_text.replace("”", ""); 
    tab_text= tab_text.replace("„", ""); 
    tab_text= tab_text.replace("“", ""); 
    
    tab_text= tab_text.toUpperCase();
    var link = document.getElementById('link'),
        nombre = "historialCartas";

    //link.href='data:application/vnd.ms-excel,' + encodeURIComponent(tab_text);
    linka.href='data:application/vnd.ms-excel;base64,' + window.btoa(tab_text);
    linka.download=nombre;
    linka.click();
    
}


  </script>