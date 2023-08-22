
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administracion VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityAdmin.js"></script>
    
    
     
</head>

<body>

     <div class="header">
  
    <center>         
       <?php 
         echo "<img src='../images/ATLAS1.PNG' height='60'  width='650'> <br>         
        <span class='titleHeader'>   AVISO DE ACCIDENTE | SUGERIR O APROBAR </span>";
   include("../functions/phpfunctions.php");
    menuAdmin();
    ?>
        
      <span class="login100-form-title"> APROBADOS</span>     
   </center>

    </div>
    
      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">

     
	
        
        <?php   
        $alcaldia="";
        $idAcc = $_GET['idAcc'];
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
      
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente,
           telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ACT.FolioAccidentado,
           idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, alcaldiaEscuela, ES.nombreEstatus,
           PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, tipoDeEventoInicial, periodoDeCobertura,
          FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, actividadAcc, descRepor, lesionProbableInicial, ACCT.folioSiniestro,
          regionPrincipal
           FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
         WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
        AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
  
		 ?>
        
      <form action ="../functions/sugerirHospitales.php?idAcc=<?php echo $mostrar['idAcc']; ?>" method="post" id="accHosF" name="accHosF">   
            <div class="col-3">
          <label>
          <input   name="idUsuario" id="idUsuario" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
     
      </div>
   
        <div class="col-3">
           <label>
               <input id="nombreUsuario" name="nombreUsuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>

      <div class="col-3">
      
              <label>
          <input  placeholder="<?php 
  $fechaActual = date('Y-m-d');
  
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>
      <div class="col-1"> <span class="textSectionNEW"><center><?php 
            echo " ID: ".$mostrar['idAcc']." | ".$mostrar['nombreEstatus']." | POR APROBAR  " ?></center></span></div>
     <div class="col-2"><span class="accdet"><?php echo "<br> <b>Nombre del Reportante:</b><br> ".$mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor']."<br><br>";  ?></span>span></div>   
          
          <div class="col-2"><span class="accdet"><?php echo "<b> Puesto de reportante:</b> <br>".$mostrar['puestoReportante']."<br><br>";  ?></span></div>
          <div class="col-2"><span class="accdet"><?php echo "<b>Telefono del reportante:</b> <br>".$mostrar['telefonoReportante'];  ?></span></div>
          <div class="col-2"><span class="accdet"><?php echo "<b>Fecha de accidente:</b><br> ".$mostrar['fechaRepor']; ?></span></div>
          <div class="col-1"><label><input type="hidden" id="foAcc" value="<?php echo $mostrar['FolioAccidentado'];  ?>" > </label></div>
         
         
          <script>


var palabra = $('#foAcc').val();
    
    $.ajax({
    url: '../functions/lesTabAcc.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#lestab').show();
      $('#lestab').html(data);
              
              
    }
  });
          </script>
<div class="col-1"> <span class="textSectionNEW"><center>DETALLES DEL ACCIDENTE</center></span></div> 
         
<div class="col-4"><span class="accdetRED"><?php echo "<br><b> Region principal afectada: </b><br>".$mostrar['regionPrincipal']; ?></span></div>

<div class="col-4"><span class="accdetRED"><?php echo "<br><b> Actividad realizada: </b><br>".$mostrar['actividadAcc']; ?></span></div>

<div class="col-4"><span class="accdetRED"><?php echo "<br><b> Tipo de Accidente: </b><br>".$mostrar['idTipoDeAccidente']; ?></span></div>

<div class="col-4"><span class="accdetRED"><?php echo "<br><b> Lugar donde ocurrio:</b><br> ".$mostrar['lugarAccIn'].", ".$mostrar['idLugarAccidente']; ?></span></div> 

<div class="col-1"><span class="accdetRED"><?php echo "<br><b> DESCRIPCION DE ACCIDENTE: </b><br>".$mostrar['descRepor']; ?></span></div>


<div class="col-3"><span class="accdetRED"><?php echo "<br> <b>Estabilidad del Accidentado:</b> <br> ".$mostrar['estabilidad'];  ?></span></div>
<div class="col-3"><span class="accdetRED"><?php echo "<br><b> LESION PROBABLE INICIAL: </b><br>".$mostrar['lesionProbableInicial']; ?></span></div>
<div class="col-3"><span class="accdetRED"><?php echo "<br><b> TIPO DE EVENTO INICIAL: </b><br>".$mostrar['tipoDeEventoInicial']; ?></span></div>
<div class="col-3"><span class="accdetRED"><?php echo "<br><b> PERIODO DE COBERTURA: </b><br>".$mostrar['periodoDeCobertura']; ?></span></div>



<div class="col-3"><span class="accdet"><?php echo "<br> <b> Escuela:</b> <br>".$mostrar['nombreEscuela']."<br>"; ?></span></div> 
<div class="col-2"><span class="accdet"><?php echo "<br> <b>Fecha y hora del Accidente: </b><br> ".$mostrar['fechaHoraAccidente'];  ?></span></div>
<div class="col-2"><span class="accdet"><?php  echo "<br><b> Hospital Seleccionado:</b> <br> ".$mostrar['idHospital']; ?></span></div>
<div class="col-1">

<span class="textSectionPEN"style="font-size: 14px;">LESIÓNES OCURRIDAS EN EL ACCIDENTE:</span>
<table id="lestab"></table></div>
          <div class="col-1"><br></div>
       <div class="col-1"> <span class="textSectionNEW"><center>DETALLES DEL ACCIDENTADO</center></span></div>    
         <div class="col-2"><span class="accdet"><?php  echo "<br><b>PERSONA ACCIDENTADA:</b> <br> ".$mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?></span></div> 
         <div class="col-2"><span class="accdet"><?php  echo "<br><b> GRADO ESCOLAR:</b> <br> ".$mostrar['GradoEscolarA']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php  echo "<br><b> PROCEDENCIA:</b> <br> ".$mostrar['estado']; ?></span></div>
          <div class="col-3"><span class="accdet"><?php  echo "<br><b> DOMICILIO:</b> <br> ".$mostrar['AlcaldiaMunicipio'].", ".$mostrar['Colonia'].", ".$mostrar['CalleA']; ?></span></div>
            <div class="col-3"><span class="accdet"><?php  echo "<br><b> FECHA DE NACIMIENTO: </b><br> ".$mostrar['FechaNacimientoA']; ?></span></div>
          <div class="col-1"><br></div>
          <div class="col-1"> <span class="textSectionNEW"><center>RESPONSABLE</center></span></div>  
          <div class="col-2"><span class="accdet"><?php  echo "<br><b> NOMBRE DE PERSONA RESPONSABLE:</b> <br> ".$mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes']; ?></span></div> 
          <div class="col-2"><span class="accdet"><?php  echo "<br><b>CONTACTO: </b> <br> ".$mostrar['telFiRes']." / ".$mostrar['telCelRes']; ?></span></div>
          <div class="col-1"> <span class="textSectionNEW"> SUGERIR HOSPITALES Y/O APROBAR</span></div>
           <div class="col-3">
                <label>SUGERENCIA 1:
     <input placeholder="SELECCIONE UN HOSPITAL" id="idHospital" name="idHospital" >
           </label>
  </div>  
          <div class="col-3">
                <label>SUGERENCIA 2:
     <input placeholder="SELECCIONE UN HOSPITAL" id="idHospital2" name="idHospital2" >
           </label>
  </div> 
          <div class="col-3">
      <center>  <button  class="submitbtn" type="button" onclick="borrarSugerencias()" style="width: 100; font-size: 12px;">BORRAR</button> </center>     
  </div> 
      
          <script>
          function borrarSugerencias(){
               $('#idHospital').val("");
               $('#idHospital2').val("");
              
          }
          </script>
      <div class="col-1">
            <center> <span class="textSection">SUGERENCIAS POR CERCANIA A LA DELEGACION DE LA ESCUELA</span> </center>
     </div>
	<table border="1">
	  
        <tr>
		     <thead>
			<td>HOSPITAL</td>
			<td>TELEFONO</td>
			<td>DIRECCION</td>
            <td></td>
            </thead>
        </tr>
              
          </table>
          <table border="1" id="tabSugHos" name="tabSugHos">
              
              
  <?php
        }
          
$hos = "SELECT *  FROM vasegurobd.cat_hospitales WHERE delegacionHospital = '$alcaldia' ";
          
		$result=mysqli_query($conexion,$hos);
       
		while($milista=mysqli_fetch_array($result)){

    echo '<tr>
    <td >'.$milista['nombreClinicaHospital'].'</td>
    <td >'.$milista['telefonoHospital'].'</td> 
    <td> '.$milista['calleHospital'].' </td>
    

    <td><a href="https://www.google.com/maps/place/'.$milista['calleHospital'].' '.$milista['delegacionHospiptal'].'" target="maps" > IR </a></td>
    
    </tr>';
   
        }
            ?>
        </table>          
    <script>

$('#tabSugHos').on('click','tr',function(){
  var dato = $(this).find('td').eq(0).text();    
   
    
    if(( $('#idHospital').val()) != "") {
        
    $('#idHospital2').show();
    $('#idHospital2').val(dato); 
    } else{
    $('#idHospital').show();
    $('#idHospital').val(dato);
        
    }
});
</script>
<div class="col-1">
      <label><br></label>
      </div>    
         <div class="col-4"> <center>
          <button id="th" class="submitbtn" type="button" onclick="todosHospitales()" style="width: 150; font-size: 12px;">VER TODOS LOS HOSPITALES</button> <br><br>
             <button id=qth class="submitbtn" type="button" onclick="quitarTH()" style="width: 150; font-size: 12px; display:none; background: darkred;">SALIR DE TODOS LOS HOSPITALES</button>
             </center>
          </div> 
     <div class="col-4"><center>
          <button id="bab" class="submitbtn" type="button" onclick="busquedaAvanzada()" style="width: 150; font-size: 12px;">BUSQUEDA <br>AVANZADA</button> <br><br>
         <button id="baEl" class="submitbtn" type="button" onclick="quitarBA()" style="width: 150; font-size: 12px; display:none; background: darkred;">OCULTAR FILTROS AVANZADOS</button>
    </center>
          </div>   
          
          <div class="col-4">
      <center>
          <button id="bPA" class="submitbtn" type="button" onclick="busquedaPorAlcaldia()" style="width: 150; font-size: 12px;">BUSQUEDA <br>POR ALCALDIA</button> <br><br>
         <button id="bPAO" class="submitbtn" type="button" onclick="" style="width: 150; font-size: 12px; display:none; background: darkred;">OCULTAR BUSQUEDA POR ALCALDIA</button>
       </center>
      
      </div>
      <div class="col-4">
      <center>
         <button id="ceBu" class="submitbtn" type="button" onclick="cerrarBusquedas()" style="width: 150; font-size: 12px;  background: darkred;">CERRAR BUSQUEDAS</button>
      <label><br><br></label>
        </center>
      
      </div>

         
         
      <div class="col-1">
      <label><br></label>
      </div> 
      <div class="col-1" id="buAl" style="display: none;">
      <label> A CONTINUACION ENCONTRARA UNA LISTA DONDE SE ENCUENTRAN TODAS LAS DELEGACIONES QUE TIENEN HOSPITALES,SELECCIONE UNA 
        Y POSTERIORMENTE ESCOJA UNO DE LOS HOSPITALES DE LA TABLA INFERIOR 
      <select id="seBuAl" name ="seBuAl" onchange="tabBuAlF()" style="font-size: 12px">
                    <?php 
                        $sb = "SELECT DISTINCT delegacionHospital FROM vasegurobd.cat_hospitales;";
                        $sbr=mysqli_query($conexion,$sb);
                         echo "<option value=''>Seleccione Municipio/Alcaldia</option>";
                        
		                             while($milista=mysqli_fetch_array($sbr)){
                            
	
                               echo "<option>".$milista['delegacionHospital']."</option>";
                                                                                }

                        ?>
                    </select></label>
                    <table id="tabAlBu" name="tabAlBu">
                     </table><label><br></label>

      </div>
      <script>

$('#tabAlBu').on('click','tr',function(){
  var dato = $(this).find('td').eq(0).text();    
    
  if(( $('#idHospital').val()) != "") {
        
        $('#idHospital2').show();
        $('#idHospital2').val(dato); 
        } else{
        $('#idHospital').show();
        $('#idHospital').val(dato);
            
        }
});
</script>
      
      
           <div class="col-2" id="todosHospitalesSelect" style="display: none;">
            <label>Si prefiere un hospital que no este en la sugerencia, seleccionelo aqui: 
                    <select id="selecHos" name ="selecHos" onchange="infoHospMul()"  style="font-size: 12px">
                    <?php 
                        $hosAl = "SELECT *  FROM vasegurobd.cat_hospitales ORDER by nombreClinicaHospital ASC";
                        $result3=mysqli_query($conexion,$hosAl);
                         echo "<option value=''>Seleccione Hospital</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                            
	
                               echo "<option>".$milista['nombreClinicaHospital']."</option>";
                                                                                }
 
    
                        ?>
                    </select>
    </label>
           
<script>
$('#selecHos').on('change',function(){
  var dato = $('#selecHos').val(); 
    
  if(( $('#idHospital').val()) == "") {
      
       
        $('#idHospital').val(dato);
        
  }
        else if(( $('#idHospital2').val()) == ""){
           
      
        $('#idHospital2').val(dato);
      
            
        }
});
</script>
           
  </div> 
      <div class="col-2">
        
          <span class="textOption" id="infoHos" name="infoHos" ></span>
     </div>
    
   
   
       <div class="col-1">
     </div>
  
         <div class="col-1" id="det" style="display: none;">
            <center> <span class="textOption"><br><br>SELECCIONE LAS CASILLAS CON LAS ESPECIALIDADES QUE EL ACCIDENTE PRECISE, 
            PRESIONE BUSCAR PARA VER LOS HOSPITALES QUE LAS TENGAN,Y POSTERIORMENTE, HAGA CLICK EN UNO PARA SELECCIONARLO.</span> </center>
     </div>
      
      <div class="col-2" style="display:none" id="ba">
      <label>
           <p><input type="checkbox" name="amb" id="amb" ><span class="textOption">Ambulatorio</span> </p>
           <p><input type="checkbox" name="ciCa" id="ciGa"><span class="textOption">Cirugia Cardiotoracica</span></p>
           <p><input type="checkbox" name="ciGe" id="ciGe"><span class="textOption">Cirugia General</span></p> 
           <p><input type="checkbox" name="ciNeu" id="ciNeu"><span class="textOption">Cirugia Neurologica</span></p> 
           <p><input type="checkbox" name="ciPl" id="ciPl"><span class="textOption">Cirugia Plastica</span></p> 
           <p><input type="checkbox" name="der" id="der" ><span class="textOption">Dermatologia</span> </p> 
           <p><input type="checkbox" name="tce" id="tce" ><span class="textOption">Enviar TCE</span> </p> 
           <p><input type="checkbox" name="fisReh" id="fisReh"><span class="textOption">Fisioterapia o Rehabilitacion</span></p> 
           
      </label>    
          
     </div>
      <div class="col-2" style="display:none" id="ba2">
          <label>
          <p><input type="checkbox" name="neu" id="neu"><span class="textOption" onclick="busquedaAvanzadaHos()" >Neurologia</span> </p> 
           
           <p><input type="checkbox" name="odo" id="odo"><span class="textOption">Odontologia</span> </p> 
           <p><input type="checkbox" name="oft" id="oft" ><span class="textOption">Oftamologia</span></p> 
           <p><input type="checkbox" name="ped" id="ped" ><span class="textOption">Pediatria</span> </p> 
           <p><input type="checkbox" name="proQui" id="proQui"><span class="textOption">Procedimientos Quirurgicos</span></p> 
          <p><input type="checkbox" name="rayx" id="rayx"><span class="textOption">Rayos X</span> </p> 
           <p><input type="checkbox" name="traOrt" id="traOrt" ><span class="textOption">Traumatologia y Ortopedia</span> </p> 
           <p><input type="checkbox" name="tom" id="tom" ><span class="textOption">Tomografia</span> </p>
          
           
            
          </label>  
     </div>
              

        <div id="baTab" class="col-1" style="display: none;">
         
         <button class="submitbtn" type="button" onclick="busquedaAvanzadaHos()" style="width: 90; height:30; font-size: 12px; margin-left: 20px;">BUSCAR</button> 
         <label><br></label>
         
          
          
          <table id="tabHosBa" border="1">
            
            </table>
            
      <label><br></label>
        
      <script>

$('#tabHosBa').on('click','tr',function(){
  var dato = $(this).find('td').eq(0).text();    
    
  if(( $('#idHospital').val()) != "") {
        
        $('#idHospital2').show();
        $('#idHospital2').val(dato); 
        } else{
        $('#idHospital').show();
        $('#idHospital').val(dato);
            
        }
});
</script>
          </div>
      <div class="col-1"></div>
 
       <div class="col-1">
            <span class="textSection">
					RESPONSABLE DEL ACCIDENTADO<br>
					</span>
  </div> 
    
      <div class="col-1"></div>    
<div class="col-1" >  
    <label>
      ¿SE APROBARA LA COBERTURA DE ESTE ACCIDENTE?: 
      </label>
         <fieldset>
  
 <p><input type="radio" name="aproAcc" id="siRE" value="SI" required>
    <span class="textOption">
						SI
					</span>
      </p>
          </fieldset><fieldset>
  <p><input type="radio" name="aproAcc" id="noRE" value="NO">
              <span class="textOption">
						 NO
					</span> </p>
              
        </fieldset>

      <br><br><br><br><br><br>
      <script>
 $('input#siRE').on('change', this, function(){
                 document.getElementById('riesgoExcluido').style.display = 'none'; 
              });
 $('input#noRE').on('change', this, function(){
                 document.getElementById('riesgoExcluido').style.display = 'inline'; 
              });

</script>
          
  </div>



  
  <div class="col-1" id= "riesgoExcluido" style="display: none">
                <label style="color: darkred;">¿Existe algun motivo o riesgo excluido para no aprobar este accidente?
                <select id="selecRE" name ="selecRE" style="heigh: 900px;" multiple onchange="poner_RE()">
    <?php                  
   
        $sqli="SELECT detallesRiesgoEx FROM vasegurobd.cat_riesgosexcluidos";
        $resultRE=mysqli_query($conexion,$sqli); 
      
        while($milista=mysqli_fetch_array($resultRE)){

            echo "<option style='font-size: 12px'  ><b> -> </b>".$milista['detallesRiesgoEx']."</option>";
        }

   ?>
   </select>
   <b>MOTIVO SELECCIONADO:
   <textarea id="rieSelec" name="rieSelec" style="width:100%; font-size: 14px; color: darkred;" rows="4" readonly> </textarea>
     </b>
   </label>

   <script>
function poner_RE()
{
  
document.accHosF.rieSelec.value=document.accHosF.selecRE.value;
}
</script>
           
  </div> 
    
      
      <div class="col-submit">
    <button class="submitbtn" onclick="aprobar();">ENVIAR</button>
  </div>
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>
