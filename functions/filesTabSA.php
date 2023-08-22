<?php
include("phpfunctions.php");
$pdo = conexion();
$foAcc= $_POST['palabra'];
$ex= $_POST['ex'];


echo "<input value='$foAcc' id='fo' readonly style='display: none'>";
if ($ex=="0"){
$sqlC = "SELECT * FROM vasegurobd.cat_archivos";
$queryC = $pdo->prepare($sqlC); 
$queryC->execute();
$listaC = $queryC->fetchAll();
echo "
<table>";
foreach ($listaC as $milistaC) {

archivoCar($milistaC['cat_nomArchivo'], $foAcc);
}

echo '</table>
<br>
<button title="CIERRE EXPEDIENTE APROBANDO TODOS LOS ARCHIVOS Y OMITIENDO LAS CATEGORIAS FALTANTES" type="button"
 style="background-color: darkred;  width: 230px" onclick="cerrarEx()">CERRAR EXPEDIENTE</button>
<br><br>

';

} elseif($ex=="1"){
   echo "
   <table>
   <tr><td class='rec' style='font-size: 18px;'>EXPEDIENTE CERRADO</td></tr>
  </table>
  
   "; 

   echo '
<br>
<button title="CIERRE EXPEDIENTE APROBANDO TODOS LOS ARCHIVOS Y OMITIENDO LAS CATEGORIAS FALTANTES" type="button"
 style="background-color: darkgreen;  width: 230px" onclick="abrirEx()">REABRIR EXPEDIENTE</button>
<br><br>

';
}


$sql = "SELECT * FROM vasegurobd.tb_rutasarchivos 
 WHERE folioAcc = '$foAcc' ORDER BY tipoDocumento ASC";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();


echo '<table id="tabFiles" name="tabFiles">
<tr>
<thead>
<td>Aprobar</td>
<td>ID</td>
<td>Fecha de Carga</td>
<td>Cargado Por</td>
<td><b>ARCHIVO</b></td>
<td>TIPO</td>
<td>TIPO DE DOCUMENTO</td>
<td>Servicio Adicional</td>
<td>Estado</td>
<td></td>
<td></td>
</thead>
</tr>';

foreach ($lista as $milista) {

    echo "
   
    <tr>
    <td>";
    
    if($milista['estado'] == "APROBADO"){ echo "<input type='checkbox' checked>"; }
    else{ echo "<input type='checkbox'>"; }
    
    echo "</td>
    <td>".$milista['idRuta']."</td>
    <td>".$milista['fechaDeCarga']."</td>
    <td>".$milista['usuarioCarga']."</td>
    <td><a href='".$milista['ruta']."'  target='_blank'>VER ARCHIVO</td>
    <td>".$milista['tipo']."</td>
    <td class='penrev'>".$milista['tipoDocumento']."</td>
    <td>".$milista['idSA']."</td>
    <td class='";
     if($milista['estado'] == "APROBADO"){ echo "ace"; }
     if($milista['estado'] == "RECHAZADO"){ echo "rec"; }
  
    
    echo "'>".$milista['estado']."</td>
    <td><a href='../functions/eliminarArchivo.php?id=".$milista['idRuta']."'>Eliminar</a></td>
    <td><a href='cambiararchivoAdmin.php?idf=".$milista['idRuta']."'>CAMBIAR </a></td>
    </tr>";
}
echo '</table>
<br>
<button type="button" style="background-color: darkgreen;  width: 250px" onclick="enviarEgreso()">TERMINAR REVISION</button>
<br><br>

';

mysqli_close($pdo);
 ?>

<script>


function cerrarEx(){

   var fo = $('#fo').val();

$.ajax({
    url: '../functions/cerrarEx.php',
    type: 'POST',
    data: {fo:fo},
    success:function(data){
alert("EXPEDIENTE CERRADO, TODOS LOS ARCHIVOS APROBADOS");    
location.reload();    
    }
  });

} 

function abrirEx(){

var foA = $('#fo').val();

$.ajax({
 url: '../functions/abrirEx.php',
 type: 'POST',
 data: {foA:foA},
 success:function(data){
alert("EXPEDIENTE REABIERTO");    
location.reload();    
 }
});

}


function enviarEgreso()
      {
         
         //Guarda la tabla en una variable
         var table = document.getElementById('tabFiles');
      

         //Guarda los selects y inputs querySelectorAll crea un array de todos los items del DOM
         var inputCheck = table.querySelectorAll('input[type="checkbox"]');
        
         //Variable para guardar la cantidad de CheckBox seleccionados
         var numCheck = 0;

         //Array que contendra la descripcion de cada producto seleccionado
         var ids = []; // IDS DE RUTAS SELECCIONADOS
         var idsN = []; // IDS DE RUTAS NO SELECCIONADOS
         var sum = 0;
         var total = 0;

         //Usa cualquier de las dos variables, inputCheck o selectAmount ya que contienen el mismo length
         for (var i = 0; i < inputCheck.length; i++)
         {
            //Usar variable con [i]
            if (inputCheck[i].checked  == true) //No es necesario poner == true (pero puedes usarlo)
            {
               
               //Guarda en el array la descripcion del producto Ejem: Producto 3
               ids.push(table.rows[(i+2)].cells[1].innerHTML);
               numCheck = numCheck + 1; //Usar numCheck++; menos espacio
            } else {
                idsN.push(table.rows[(i+2)].cells[1].innerHTML);

            }

            total = total + 1;
         }
         //for (var i = 0; i < numCheck; i++){ alert("Esta por Vender: "  + ids[i]);}

         //alert(ids.join());
        
         var idToSend = ids.join();



         var folio = "<?php echo $foAcc= $_POST['palabra']; ?>";

         if(numCheck =="0" ){
            alert("NADA SELECCIONADO");
         }else{

            if(total == numCheck){
                alert("TODOS LOS ARCHIVOS HAN SIDO APROBADOS");
                window.location= "../functions/aprobacionTotal.php?folio="+folio+"&&ids="+idToSend;

            } else {

       alert("SE APROBARON: "+numCheck+" / "+total+" IDS:"+ ids + "NO:" + idsN);
       window.location= "../functions/verificarRutas.php?ids="+ids+"&&idn="+idsN; 
            }
        
         }

      }



    </script>