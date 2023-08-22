
<html lang="en-US">
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  
  <title>VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityAdmin.js"></script>
      
</head> 
<div class="header">
   
      
            
   <?php 
echo "<img src='../images/ATLAS1.PNG' height='60'  width=650'> <br>
<span class='titleHeader'>   COMPLETAR DATOS DEL ACCIDENTE </span>";  
include("../functions/phpfunctions.php");
menuAdmin();
?>


</div>
    
    
  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#708090;">
 
     

  <form action ="../functions/insertarDatosPendientes.php" method="post" id="accform" name="accform">
<body>
    
<?php 
    $idAcc = $_GET['idAcc'];
		$conexion = con();
      
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, ACT.FolioAccidentado,
    telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, 
    idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus, nombreUrgAmb,
    PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, 
    FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes, correoReportante, dirEscRepor
    FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
    WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
    AND idAcc = '$idAcc' AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1";
         
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
            
         
        
    ?>
  
     
       <div class="col-2"><label>Folio Accidente:
       <input type="text" id="folio" name="folio" value="<?php echo $mostrar['FolioAccidente']?>" style="border: none" readonly></label></div>
      <div class="col-2"><label>Folio Accidentado:
      <input type="text" id="folioACDO" name="folioACDO" value="<?php echo $mostrar['FolioAccidentado']?>" style="border: none" readonly></label></div>
      
       <div clas="col-1">
      <span class="accdet" style="font-size: 10px; text-align: left; margin-left: 20; margin-right: 20;" >A CONTINUACION ENCONTRARA LOS CAMPOS CON LA INFORMACION FALTANTE DE UN ACCIDENTE QUE FUE APROBADO DEBIDO A LA URGENCIA QUE REPRESENTABA.
          EL SISTEMA ESTA PROGRAMADO PARA PERMITIRLE COMPLETAR LOS DATOS CON LA MAYOR FACILIDAD.</span>
      </div>
      <div class="col-1"></div>
            <div class="col-3">
          <label>
          <input   name="idUsuario" id="idUsuario" style="border: none" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
       
        <div class="col-3">
           <label>
               <input id="nombreUsuario" name="nombreUSuario" style="border: none" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-3">
      
              <label>
          <input  style="border: none" placeholder="<?php 
  $fechaActual = date('Y-m-d');
  
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>
      
     
       <div class="col-1">
            <span class="textSectionPEN" >
						 DATOS DEL REPORTANTE  <br>
					</span>
  </div> 
  
      <div class="col-2">
    <label>
    1. PERSONA QUE REPORTA EL ACCIDENTE:
    </label>
      <label style="color: black;"><?php echo $mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor'] ; ?>
      </label>
          
  </div> 
 
       <div class="col-2">
    <label>
     2. PUESTO: 
      <input   name="puestoReportante" value="<?php echo $mostrar['puestoReportante']; ?>" readonly> 
    </label>
           
    
    </div>
    <div class="col-2"> 
    <label>
3. TELEFONO (10 digitos): 
      <input  name="telefonoReportante"  value="<?php echo $mostrar['telefonoReportante']; ?>" type="tel"  
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  
      maxlength="10" minlength="10"  readonly>
    </label>
    </div>

    <div class="col-2"> 
    <label>
4. CORREO ELECTRONICO DEL REPORTANTE: 
      <input  name="correoReportante"  value="<?php echo $mostrar['correoReportante']; ?>" readonly>
    </label>
    </div>
  
      
     
      <div class="col-1">
            <span class="textSectionPEN">
						 DATOS DE LA PERSONA ACCIDENTADA <br>
					</span>
  </div> 
      
     
  <div class="col-2">
    <label>
    5. NOMBRE DE LA PERSONA ACCIDENTADA:<br>

         <label style="color: black;"><?php echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'] ; ?></label>
     
        <br><br>
    </label>
  </div> 
        <div class="col-2">
    <label>
      6. TIPO DE POBLACION DEL ACCIDENTADO/A:
      <select id="poblacionAccidentado" name="poblacionAccidentado" required>
        <option value="">SELECCIONE UNA OPCION</option>
          <option>ALUMNADO</option>
        <option>DOCENTE</option>
        <option>TRABAJADOR EDUCATIVO</option>
          <option>SERVIDOR PUBLICO</option>
          <option>PRESTADOR DE SERVICIOS</option>
          
      </select>
      
    </label> 
  </div>
      
     <div class="col-3">
    <label>
     <label for="start">7. FECHA DE NACIEMIENTO DEL ACCIDENTADO/A: </label>
<input type="date"  name="fechaNacimientoAccidentado" required>
    </label>
  </div> 
      
       <div class="col-3">  
    <label>
    8. SEXO DEL ACCIDENTADO/A: 
           </label>
     
         <fieldset>
  
             <input type="radio" name="generoAccidentado" value="FEMENINO" required> <span class="textOption">FEMENINO</span>
    
   </fieldset>
        <fieldset>
            <input type="radio" name="generoAccidentado" value="MASCULINO" required> <span class="textOption">MASCULINO</span>
              
        </fieldset>
<br><br><br><br>
           
  </div>
      
           <div class="col-3">
    <label>
      9. GRADO ESCOLAR DEL ACCIDENTADO/A: 
      <select id="gradoEscolaridadAccidentado" name ="gradoEscolaridadAccidentado" required>
      <option value="">SELECCIONE UNA OPCION</option>
          <option>MATERNAL 1</option>
          <option>MATERNAL 2</option>
          <option>MATERNAL 3</option>
        <option>PREESC 1</option>
          <option>PREESC 2</option>
          <option>PREESC 3</option>
        <option>PRIM 1</option>
          <option>PRIM 2</option>
          <option>PRIM 3</option>
          <option>PRIM 4</option>
          <option>PRIM 5</option>
          <option>PRIM 6</option>
          <option>SEC 1</option>
          <option>SEC 2</option>
          <option>SEC 3</option>
          <option>BACH 1</option>
          <option>BACH 2</option>
          <option>BACH 3</option>
          <option>BACH 4</option>
          <option>BACH 5</option>
          <option>BACH 6</option> 

          <option>COCINERO</option>
          <option>JARDINERO</option>
          <option>SECRETARIA</option>
          <option>INTENDENCIA</option>
         
          
          <option>DOCENTE</option>
         
          
          <option>OTRO</option>
          <option>DOCENTE ESPECIALISTA</option>
          <option>PSICOLOGO ESCOLAR (NO CUBIERTO)</option>
          <option>MEDICO ESCOLAR (NO CUBIERTO)</option>
          <option>PREFECTO</option>
          <option>BIBLIOTECARIA</option>
          <option>MONITORES</option>
          
          <option>COORDINADORES ESCOLARES</option>
          <option>PROMOTORES</option>
          <option>ASESORES DE PROGRAMA</option>
          <option>AUXILIAR ADMINISTRATIVO</option>
          
          
          
          <option>TALLERISTAS</option>
          <option>ENFERMERA ESCOLAR (NO CUBIERTO)</option>
          <option>ODONTOLOGO ESCOLAR (NO CUBIERTO)</option>
          <option>ORIENTADOR EDUCATIVO</option>
          <option>CAP LAB 1</option>
          <option>CAP LAB 2</option>
          <option>CAP LAB 3</option>  

          
          <option>DIRECTOR /A</option>
          <option>SUBDIRECTOR /A</option>
          <option>TRABAJO SOCIAL</option>


          <option>COORDINADOR DE PROYECTO</option>
          <option>SUPERVISOR DE ZONA</option>
          <option>LACTANTE 1</option>
          <option>LACTANTE 2</option>
          <option>LACTANTE 3</option>
          <option>CONTRALOR ESCOLAR</option>
      </select>
    
    </label> 
  </div>
      
          <div class="col-1">
            <span class="textSectionPEN">
						 DOMICILIO DEL ACCIDENTADO/A <br>
					</span>
  </div> 
      
    
         <div class="col-2">
                <label>
      10. ENTIDAD FEDERATIVA:
     <input placeholder="ESTADO DONDE RECIDE EL ACCIDENTADO" id="entidadAccidentado" name="entidadAccidentado" autocomplete="off" type="text" onkeyup="autocompletarEstado()" required/></label>
         <span class="listautocomp">
					<ul id="lista_estado"></ul>  
					</span>  
   
  </div>
      

  
      <div class="col-2">
   <label>
      11. ALCALDIA/MUNICIPIO DEL ACCIDENTADO/A:
     <input placeholder="ALCALDIA DONDE RECIDE EL ACCIDENTADO" id="alcaldiaAccidentado" name="alcaldiaAccidentado" autocomplete="off" type="text" onkeyup="autocompletarAlcaldia()" required/></label>
         <span class="listautocomp">
					<ul id="lista_id"></ul>  
					</span>        
  </div> 
          
      <div class="col-2">
     <label>
         
     12. COLONIA DEL  ACCIDENTADO:
     <input placeholder="COLONIA DONDE RECIDE EL ACCIDENTADO" id="coloniaAccidentado" name="coloniaAccidentado" autocomplete="off" type="text" onkeyup="autocompletarColonia()" required/></label>
         <span class="listautocomp">
					<ul id="lista_colonia"></ul>  
					</span> 
           
           
  </div>
      
      
  <div class="col-2">
    <label>
      13. CODIGO POSTAL:   
      <input placeholder="INGRESE EL CODIGO POSTAL DEL ACCIDENTADO"  id="cpAccidentado" name="cpAccidentado" required>
         
    </label>
  </div> 
      
       
      
      
  
        
     
      <div class="col-2">
    <label>
      14 CALLE Y NUMERO:
          
      <input placeholder="INGRESE SU DIRECCION CON NUMERO Y DETALLES"  name="calleAccidentado" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            
    </label>
  </div> 
      
        <div class="col-1">
            <span class="textSectionPEN">
						DETALLES DEL ACCIDENTE <br>
					</span>
  </div> 

  <div class="col-1">
    <label>
     15. DESCRIPCION DEL ACCIDENTE:
          
      <textarea  name="descReportante" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="500"  required> </textarea>
            
    </label>
  </div> 
  <div class="col-3">
      
      <label>
 16. LESION PROBABLE INICIAL:<br>
  <select id = "lesionProbableInicial" name = "lesionProbableInicial" required>
  <?php 
                        $conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                        $conexion -> set_charset("utf8");
                        $hosAl = "SELECT *  FROM vasegurobd.cat_lesionprobableinicial ORDER by nombreLesionPro ASC";
                        $result3=mysqli_query($conexion,$hosAl);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option>".$milista['nombreLesionPro']."</option>";
                                     }
   
                                        ?>

  </select>
</label> 
       
 </div>

 <div class="col-3">
      
      <label>
 17. TIPO DE EVENTO INICIAL:<br>
  <select id = "tipoDeEventoIniciaL" name = "tipoDeEventoInicial" required>
  <?php                                   
                        $tdei = "SELECT *  FROM vasegurobd.cat_tipodeeventoinicial ORDER by nombreEvento ASC";
                        $resulttdei=mysqli_query($conexion,$tdei);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
                        
		                             while($milista=mysqli_fetch_array($resulttdei)){
                                         
                                     echo "<option>".$milista['nombreEvento']."</option>";
                                     }
   
                                        ?>
  </select>
</label> 
       
 </div>




 <div class="col-3">
      
      <label>
 18. PERIODO DE COBERTURA:<br>
  <select id = "periodoDeCobertura" name = "periodoDeCobertura" required>
  <?php                                   
                        $pdc = "SELECT *  FROM vasegurobd.cat_periododecobertura ORDER by nombrePeriodoDeCobertura ASC";
                        $resultpdc=mysqli_query($conexion,$pdc);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
                        
		                             while($milista=mysqli_fetch_array($resultpdc)){
                                         
                                     echo "<option>".$milista['nombrePeriodoDeCobertura']."</option>";
                                     }
   
                                        ?>

  </select>
</label> 
       
 </div>






  <div class="col-3" id="acti1">
      
      <label>
 18. ACTIVIDAD REALIZADA:<br>
  <select id = "actividadAccidente" name = "actividadAccidente" required>
  <?php                                   
                        $acc = "SELECT *  FROM vasegurobd.cat_actividadrealizada ORDER by nombreActividad ASC";
                        $resultacc=mysqli_query($conexion,$acc);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
                        
		                             while($milista=mysqli_fetch_array($resultacc)){
                                         
                                     echo "<option>".$milista['nombreActividad']."</option>";
                                     }
   
                                        ?>
      
    
  </select>
</label> 
       
 </div>
      
    
        
      <div class="col-3">
    <label>
      19. TIPO DE ACCIDENTE: 
      <select id = "tipoDeAccidente" name = "tipoDeAccidente" onchange="mostrarTipoAccidente()" required>
      <?php                                   
                        $tda = "SELECT *  FROM vasegurobd.cat_tipodeaccidente ORDER by nombreTipoDeAccidente ASC";
                        $resulttda=mysqli_query($conexion,$tda);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
                        
		                             while($milista=mysqli_fetch_array($resulttda)){
                                         
                                     echo "<option>".$milista['nombreTipoDeAccidente']."</option>";
                                     }
   
                                        ?>
        
      </select>
    </label> 
  </div>
      
      
      
      <div class="col-3">
    <label>
     20. LUGAR DONDE OCURRIO EL ACCIDENTE: 
      <select id="lugarAcc" name="lugarAcc" required>
      <option value="">LUGAR DONDE OCURRIO</option>
      <?php                                   
                        $li = "SELECT *  FROM vasegurobd.cat_lugarinicial ORDER by nombreLugarIn ASC";
                        $resultli=mysqli_query($conexion,$li);
                         
                        
		                             while($milista=mysqli_fetch_array($resultli)){
                                         
                                     echo "<option>".$milista['nombreLugarIn']."</option>";
                                     }
   
                                        ?>
        </select>
    
      <select id = "lugarAccidente" name = "lugarAccidente" onchange="mostrarIdLugarAcc()" required>
          <option value="">21. LUGAR ESPECIFICO DONDE OCURRIO</option>
          <?php                                   
                        $luacc = "SELECT *  FROM vasegurobd.cat_lugaraccidente ORDER by nombreLugarAccidente ASC";
                        $resultlluacc=mysqli_query($conexion,$luacc);
                         
                        
		                             while($milista=mysqli_fetch_array($resultlluacc)){
                                        
                                     echo "<option>".$milista['nombreLugarAccidente']."</option>";
                                     }
   
                                        ?>
         
      </select>
    </label> 
  </div>
      
                 <div class="col-3">
    <label>   
<input  type="hidden" name="idRDCA" id="idRDCA" readonly />
    </label>           
  </div>
      
                    <div class="col-3">
    <label>
<input  type="hidden" name="idTipoAccidente" id="idTipoAccidente" readonly />
    </label>
  </div>
      
          <div class="col-3">
    <label>
<input type="hidden" name="idLugarAccidente" id="idLugarAccidente" readonly />
    </label>
  </div>
      
  <?php lesionesMultiples(); ?>    
  

 
       <div class="col-1">
            <span class="textSectionPEN">
					22. ESCUELA DE PROCEDENCIA<br>
					</span>
           <label style="color: black;"><?php echo $mostrar['nombreEscuela']; ?></label>
           <label>DIRECCION INDICADA POR EL REPORTANTE: </label>
           
           <label style="color: black;">
           <?php echo $mostrar['dirEscRepor']; ?></label>
  </div>  
      
      <div class="col-1">
            <span class="textSectionPEN">
					23. RESPONSABLE DEL ACCIDENTADO<br>
					</span>
  </div> 
      
      <script>

$('#tabHosBa').on('click','tr',function(){
  var dato = $(this).find('td').eq(0).text();    
    $('#idHospital').show();
    $('#idHospital').val(dato);
});
</script>
      
   <div class="col-2">
    <label>
     24. RESPONSABLE DEL ACCIDENTADO/A:
        
      <input placeholder="APELLIDO PATERNO" id="appResponsable" name="appResponsable" autocomplete="off" onkeyup="appRes();"  required>
            <span class="listautocomp">
					<ul id="lista_appRes"></ul>  
					</span>  
      <input placeholder="APELLIDO MATERNO" id="apmResponsable" name="apmResponsable" autocomplete="off" onkeyup="apmRes();" required>
         <span class="listautocomp">
					<ul id="lista_apmRes"></ul>  
					</span>  
      <input placeholder="NOMBRE(S)"  id="nombreResponsable" name="nombreResponsable" autocomplete="off" onkeyup="nombreRes();" required> 
         <span class="listautocomp">
					<ul id="lista_nombreRes"></ul>  
					</span>  
    </label>
  </div>     <div class="col-2">
    <label>

25. TELEFONO (10 DIGITOS): 
      <input placeholder="TELEFONO MOVIL" name="telefonoResponsable" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  
      id="telefonoResponsable" type="tel"  maxlength="10"   required><br>   
      <input placeholder="TELEFONO FIJO"  name="telefonoResponsablefijo" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  
      id="telefonoResponsablefijo" type="tel"  maxlength="10"  required ><br> 
    </label>
  </div> 
  <div class="col-1">
        <label style="color: darkred;">
     ¿EN QUE ESTADO SE ENCUENTRA EL ACCIDENTE? 
    
      <select id = "estatusAcc" name = "estatusAcc"  required>
          <option value="">26. SELECCIONE UNA OPCION</option>
        <option value="3">APROBADO</option>
          <option value ="4">RECHAZADO</option>

      </select>
    </label> 
  </div>
     
      
      <div class="col-submit">
    <button class="submitbtn" onclick="aprobar();">ACTUALIZAR DATOS</button>
  </div>
  
  </form>
            <?php                  
	
      
        }
	 ?>
  </div>
          
          
            <script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
                
          
</script>

      </div>
    </div>
</body>
    
      
</html>