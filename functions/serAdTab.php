<head>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script src="../forms/js/numeroALetras.js" type="text/javascript"></script> 
</head>
<?php
  ini_set('display_errors', 1);
  include("phpfunctions.php");
  $pdo = conexion();
$foAcc= $_POST['palabra'];

$sql = "SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' ORDER BY fechaSolicitud DESC ";

$query = $pdo->prepare($sql); 
$query->execute();



echo '<left><label style="font-size: 14px; "> <br><b>

Instrucciones: Escriba el nombre del doctor que autorizara esta carta garantia,luego seleccione el numero de carta que se generara,
 y finalmente seleccione las solicitides apronadas que incluira en esta, los cuales son los que tiene una caja de seleccion en su primera columna en la tabla.

</b>
</label>
<label style="font-size: 16px;"><b><br>MEDICO QUE AUTORIZA:<br></b>
<select id="perAu" style="background: white; font-size: 13px; color: black;">
<option value="">SELECCIONE EL NOMBRE DEL MEDICO QUE AUTORIZA</option>';
$sqlMED = "SELECT * FROM vasegurobd.tb_usuarios WHERE tipo_usuario = 'M' ";

$queryM = $pdo->prepare($sqlMED); 
$queryM->execute();
$listaM = $queryM->fetchAll();
foreach ($listaM as $milista) {
echo "<option value=".$milista['idusuario'].">".$milista['nombre']."</option>";

}

echo '
</select>
<b>NUMERO DE CARTA:<br></b>
<select id="numCar" style="background: white; font-size: 13px; color: black;">
<option value="">SELECCIONE EL NUMERO DE CARTA</option>';
/*
$link = con();
$cartas ="SELECT DISTINCT numeroCarta FROM vasegurobd.tb_cartasgarantia WHERE folioAccidente = '$foAcc'";
$result=mysqli_query($link,$cartas);

while($mostrar=mysqli_fetch_array($result)){
    
$nc =$mostrar['numeroCarta'];
    for($i = 1; $i <= 10; $i++){
        if($i!=$nc){
            echo "<option>".$nc."</option>";
        }else{
            echo "<option>".$i."</option>";
        
        } 
    }

} */

for($i = 1; $i <= 10; $i++){
    
        echo "<option>".$i."</option>";
    
}
    
echo '
</select></label>
</left>
<label style="font-size: 16px;"> <b>MONTO AUTORIZADO PARA HOSPITAL: <br></b>
<input type="number" id="monAu" name="monAu"
style="background-color: white; font-size: 10px; color: black;"
placeholder="INGRESE EL MONTO AUTORIZADO PARA HOSPITAL" onkeyup="cont()">
</label>'

?>
<label style="font-size: 16px;"> <b>SI NO QUIERE QUE SALGAN ESTOS DATOS DE CLIC EN CERRAR ( IVA...), PERO SI QUIERE QUE SE VISUALICEN, SELECCIONE Y NO CIERRE ESTE ESPACIO<br></b>
<button type="button" style="background-color: darkgreen;  width: 150px" id="moih" onclick="mostrarivh()">IVA y Honorarios </button>
<table id="ivho" style="display: none;">
    <tr>
        <td>
        <label style="font-size:14;"><label>
     1.<b>¿INCLUYE IVA?  </b>
      </label>
         <fieldset>
  
 <input type="radio" name="iva" id="ivano" value="MÁS IVA">
    <span class="textOption">
				MÁS IVA<br>
					</span>
      
           
          </fieldset>
        
          
          <fieldset>
  <input type="radio" name="iva"  id="ivasi" value="INCLUYE IVA">
              <span class="textOption">
					INCLUYE IVA <br><br>
					</span> 
          </fieldset>
</td>
<td>
    <label style="font-size:14;">
     2.<b>¿INCLUYE HONORARIOS MEDICOS?</b>
      </label>
         <fieldset>
  
 <input type="radio" name="hono" id="hono" value="MÁS HONORARIOS">
    <span class="textOption">
				MÁS HONORARIOS MEDICOS<br>
					</span>
      
           
          </fieldset>
        
          
          <fieldset>
  <input type="radio" name="hono"  id="honosi" value="INCLUYE HONORARIOS MEDICOS">
              <span class="textOption">
					INCLUYE HONORARIOS MEDICOS <br><br>
					</span> 
          </fieldset>
          
</td></tr>
</table>
<button type="button" style="background-color: darkred;  width: 150px; font-size: 11; display: none;" id="ceih" onclick="cerrarivh()">Cerrar IVA y Honorarios</button>
<?php

echo '
<table id="tablaSerAd">
<thead>
<tr>
<td></td>
<td>ID</td>
<td ><b>CONCEPTO</b></td> 
<td>HONORARIOS($)</td>
<td> ESTATUS </td>
<td> HOSPITAL </td>
<td> COMENTARIO</td>
<td> RESPUESTA</td>
<td> FECHA SOLICITUD</td>
<td> FECHA RESPUESTA</td>
<td> DATOS COMPLETOS</td>
<td>CARTA</td>
</tr>
</thead>';

$total = "";
$lista = $query->fetchAll();
foreach ($lista as $milista) {
    echo '
   <tr>';

   if ($milista['estadoSolicitud'] == 'APROBADA' AND $milista['estadoDatos'] == "SI" ){
  echo '<td > <input type="checkbox" onclick="tosaf()"></td>';
   }else{
       echo '<td > <input type="checkbox" disabled></td>';
   }

echo '
   <td>'.$milista['id_servicio'].'</td>
    <td >'.$milista['conceptoServicio'].'</td>';
    

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
        
        
        
       echo '">'.$milista['costoServicio'].'</td>';
 
    
    
    
if ($milista['estadoSolicitud'] == 'APROBADA'){
    echo ' <td class="pen"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}

if ($milista['estadoSolicitud'] == 'APROBADA PARCIALMENTE'){
    echo ' <td class="pen"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}

if ($milista['estadoSolicitud'] == 'NUEVA') {
    echo ' <td class="ace"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}
if ($milista['estadoSolicitud'] == 'RECHAZADA'){
    echo ' <td class="rec"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}

if ($milista['estadoSolicitud'] == 'SE NECESITA MAS INFORMACION'){
    echo ' <td class="rec"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
}
   
   
   echo '<td > <b>'.$milista['hospitalOrigen'].'</b> </td>';

   
    if ($milista['comentarioAcc'] == ''){
        echo '<td class="dup"> <b> SIN COMENTARIOS </b> </td>';
    }else{
        echo '<td> <b>'.$milista['comentarioAcc'].'</b> </td>';  
    }



    if ($milista['comentarioMed'] == ''){
        echo '<td> <b>EN ESPERA </b></td>';
    }else{
        echo '<td> '.$milista['comentarioMed'].' </td>';  
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

echo '<td> <b>'.$milista['estadoDatos'].'</b> </td>';
 echo '<td><a href="'.$milista['urlCarta'].'"> VER CARTA <b>'.$milista['ultimaCarta'].'</b> </a> </td>'; 
   echo '</tr>';
  

}

echo '</table>
<div class="col-1">
<label style="font-size: 12px;"><b> TOTAL SOLICITUDES:</b>
<input id="tosa" style="
border:none;
  border-bottom: 1px solid #1890ff;
  background-color: #A8D3EF;
  color: darkblue;
  font-size: 12px;
  padding: 5px 10px;
  outline: none;"  readonly>
</label>
</div>

<div class="col-1">
<label style="font-size: 12px;"><b>TOTAL MONTO HOSPITAL:</b>
<input id="tomon" style="
border:none;
  border-bottom: 1px solid #1890ff;
  background-color: #A8D3EF;
  color: darkblue;
  font-size: 12px;
  padding: 5px 10px;
  outline: none;"  readonly>
</label>
</div>

<div class="col-1">
<label style="font-size: 12px;"><b>TOTAL:</b>
<input id="toto" style="
border:none;
  border-bottom: 1px solid #1890ff;
  background-color: #A8D3EF;
  color: darkblue;
  font-size: 12px;
  padding: 5px 10px;
  outline: none;"  readonly>
</label>
</div>


';

 ?>


<br>
<button type="button" style="background-color: darkgreen;  width: 150px" onclick="mostrarSerAd()">Generar Carta Garantia</button>
<br><br>


<script>
    function mostrarivh(){

        document.getElementById('ivho').style.display = 'inline-block';
        document.getElementById('moih').style.display = 'none';
        document.getElementById('ceih').style.display = 'inline-block';
}

function cerrarivh(){

document.getElementById('ivho').style.display = 'none';
document.getElementById('moih').style.display = 'inline-block';
document.getElementById('ceih').style.display = 'none';

document.querySelectorAll('[name=hono]').forEach((x) => x.checked=false);
document.querySelectorAll('[name=iva]').forEach((x) => x.checked=false);
}
      
      const inputNumero = document.querySelector("#inputNumero"),
	botonConvertir = document.querySelector("#botonConvertir"),
	salida = document.querySelector("#salida");


// Escuchar el click del botón
function letraNum(){
	// Obtener valor que hay en el input
	
}

letraNum();

function cont(){
    mon = $('#monAu').val();
    
    $('#tomon').val("$ "+mon);
    totales();

}


function tosaf()
      {
         
         //Guarda la tabla en una variable
         var table = document.getElementById('tablaSerAd');
      

        

         //Guarda los selects y inputs querySelectorAll crea un array de todos los items del DOM
         var inputCheck = table.querySelectorAll('input[type="checkbox"]');
        
         //Variable para guardar la cantidad de CheckBox seleccionados
         var numCheck = 0;

         //Array que contendra la descripcion de cada producto seleccionado
         var sum = 0.00;

         //Usa cualquier de las dos variables, inputCheck o selectAmount ya que contienen el mismo length
         for (var i = 0; i < inputCheck.length; i++)
         {
            //Usar variable con [i]
            if (inputCheck[i].checked  == true) //No es necesario poner == true (pero puedes usarlo)
            {
               
               //Guarda en el array la descripcion del producto Ejem: Producto 3
             
                sum = sum + parseFloat(table.rows[i+1].cells[3].innerHTML);
               //Guarda en el array la Cantidad del producto Ejem: 2
               //Consigue el value del producto
              
            
               numCheck = numCheck + 1; //Usar numCheck++; menos espacio
            }
         }
         
  var valor = parseFloat(sum);
       $('#tosa').val("$ "+valor);
totales();
        }

function totales(){
   var ts= $('#tosa').val();
   var tsn= ts.replace(/[^0-9]+/g, "");

   var tm= $('#tomon').val();
   var tmn= tm.replace(/[^0-9]+/g, "");
   total = (Math.floor(tsn))+(Math.floor(tmn));

   $('#toto').val("$ "+parseFloat(total));
}


 function mostrarSerAd()
      {
         
         //Guarda la tabla en una variable
         var table = document.getElementById('tablaSerAd');
         var perAu = document.getElementById('perAu');
         var mon = document.getElementById('monAu');
         mon = mon.value;
         monF = Number(mon).toFixed(2);

         var m = monF.split('.');

      

         perAu =perAu.value;
         var numCar = document.getElementById('numCar');
         numCar = numCar.value;

        

         //Guarda los selects y inputs querySelectorAll crea un array de todos los items del DOM
         var inputCheck = table.querySelectorAll('input[type="checkbox"]');
        
         //Variable para guardar la cantidad de CheckBox seleccionados
         var numCheck = 0;

         //Array que contendra la descripcion de cada producto seleccionado
         var ids = [];
         var sum = 0;

         //Usa cualquier de las dos variables, inputCheck o selectAmount ya que contienen el mismo length
         for (var i = 0; i < inputCheck.length; i++)
         {
            //Usar variable con [i]
            if (inputCheck[i].checked  == true) //No es necesario poner == true (pero puedes usarlo)
            {
               
               //Guarda en el array la descripcion del producto Ejem: Producto 3
               ids.push(table.rows[(i+1)].cells[1].innerHTML);
             
                sum = sum + parseFloat(table.rows[i+1].cells[3].innerHTML);
               //Guarda en el array la Cantidad del producto Ejem: 2
               //Consigue el value del producto
              
            
               numCheck = numCheck + 1; //Usar numCheck++; menos espacio
            }
         }
         //for (var i = 0; i < numCheck; i++){ alert("Esta por Vender: "  + ids[i]);}

         //alert(ids.join());
        
         var idToSend = ids.join();

         var pa = localStorage.getItem('sessionValue');

         var folio = "<?php echo $foAcc= $_POST['palabra']; ?>";

         if(perAu ==""  || idToSend == "" || numCar =="" || mon ==""){
            alert("DATOS FALTANTES PARA GENERAR POLIZA");
         }else{

       alert("Se generara la poliza correspondinete a las solicitudes aprobadas con los IDS: ("+idToSend+") correspondientes al Folio:  "+folio);
       
       let valor = sum;


	// Obtener la representación
	let letras = numeroALetras(m[0], {
		plural: "PESOS",
		singular: "PESO",
		centPlural: "CENTAVOS",
		centSingular: "CENTAVO"
	});

	// Y a la salida ponerle el resultado
    iva = $('input:radio[name=iva]:checked').val();
    hono = $('input:radio[name=hono]:checked').val();

    if(typeof iva === 'undefined'){ iva =""; }
    if(typeof hono === 'undefined'){ hono =""; }
var letrasM = letras+" "+m[1];
    window.open("../forms/pdfSolicitudServicioGroup.php?id="+idToSend+"&&folio="+folio+"&&perAu="+perAu+"&&numCar="+numCar+"&&mon="+monF+"&&lt= "+letrasM+"/100 M.N. "+iva+" "+hono+"&&pa="+pa);  
    history.back();     
    location.reload();
}

      }


     </script>
