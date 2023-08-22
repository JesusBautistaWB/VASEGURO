<html lang="en-US">
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  
    <title>Aviso de Accidente Escolar VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
    
    <script type="text/javascript">     
        if((localStorage.getItem('sessionValue') == "")){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
      
            
        }
    
    </script>
      
</head> 
    
<body>
    
 
    <div class="header">
  
    <center>         
       <?php 
         echo "<img src='../images/ATLAS1.PNG' height='60'  width='650'> <br>
        <span class='titleHeader'>   AVISO DE ACCIDENTE | REGISTRAR ACCIDENTE </span>";
   include("../functions/phpfunctions.php");
    menuEsc();
    ?>
   </center>

    </div>
    
    
    
  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#708090;">
 
  <form action ="../functions/insertarAccidenteESC.php" method="post" id="accform" name="accform">
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
               <input id="nombreEscuela" name="nombreEscuela" style="border: none" readonly>
          <script>
          document.getElementById("nombreEscuela").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-3">
      
              <label>
          <input style="border: none" placeholder="<?php 
  $fechaActual = date('Y-m-d');
  
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>
      
     
       <div class="col-1">
            <span class="textSection" >
						 DATOS DEL REPORTANTE  <br>
					</span>
  </div> 
  
    <div class="col-2" >  
    <label>
     1. ¿SE ENCUENTRA CONCIENTE EL ACCIDENTADO?<br>  <br>
      </label>
         <fieldset>
  
 <p><input type="radio" name="estabilidadAccidentado" id="conc" value="CONCIENTE" required>
    <span class="textOption">
				SI
					</span>
      </p> 
          </fieldset><fieldset>
  <p><input type="radio" name="estabilidadAccidentado" id="incon" value="INCONCIENTE" >
              <span class="textOption">
						 NO
					</span> </p>
         <script>
          
              $('input#incon').on('change', this, function(){
                 document.getElementById('ambulancias').style.display = 'block'; 
              });

  		$('input#conc').on('change', this, function(){
                 document.getElementById('ambulancias').style.display = 'none'; 
              });

          </script>
              
        </fieldset>

     
     <br><br><br>
  </div>
      <div class="col-2">
    <label>
    2. Persona que reporta el accidente:
        
  <input placeholder="APELLIDO PATERNO" id="appPaRepor" name="appPaRepor"  autocomplete="off" onkeyup="autocompletarApellidoPaterno();" required>
        <span class="listautocomp">
					<ul id="lista_appRepor"></ul>  
					</span>   
      <input placeholder="APELLIDO MATERNO" id="appMaRepor" name="appMaRepor" autocomplete="off" onkeyup="autocompletarApellidoMaterno();" required>
        <span class="listautocomp">
					<ul id="lista_apmRepor"></ul>  
					</span>   
     <input placeholder="NOMBRE(S)"  id="nombreRepor" name="nombreRepor"  autocomplete="off" onkeyup="autocompletarNombreRepor();" required>
        <span class="listautocomp">
					<ul id="lista_nombreRepor"></ul>  
					</span>   
       
    </label>
        
  </div> 
    
   <div class="col-1" id="ambulancias" name="ambulancias" style="display: none;"><span class="textSectionRED">SE REQUIERE AMBULANCIA</span>
      <label style="color: red;">HA INDICADO QUE EL ACCIDENTADO ESTA INCONCIENTE, CONTACTE CON SEMEDIC PARA GENERAR UN FOLIO DE URGENCIA Y SOLICITAR UN SERVICIO DE AMBULANCIA.<br>
      </label>

 <label style="color: black;">

	CDMX Y AREÁ METROPOLITANA: <b>55 55 43 55 55</b> <br>
	RESTO DE LA REPÚBLICA: <b>800 836 33 42</b>
 </label>

             </div>
        
        
       <div class="col-3">
    <label>
    3. Puesto: 
     <select id="puestoReportante" name="puestoReportante"  required>
  <?php                                   
                         $conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                         $conexion -> set_charset("utf8");
                        $pdc = "SELECT *  FROM vasegurobd.cat_puestos ORDER by nombrePuesto ASC";
                        $resultpdc=mysqli_query($conexion,$pdc);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
		                             while($milista=mysqli_fetch_array($resultpdc)){
                                         
                                     echo "<option>".$milista['nombrePuesto']."</option>";
                                     }
   
                                        ?>

  </select>
    </label>
           
  </div>
      
      
  <div class="col-3">
    <label>

4. Teléfono(10 digitos): 
      <input placeholder=" INGRESE 10 DIGITOS"  name="telefonoReportante" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  
      type="tel"  maxlength="10" minlength="10" required>
    </label>
  </div>
 
   

    
      
      
          <div class="col-1">
            <span class="textSection">
					 DOMICILIO DEL ACCIDENTADO/A <br>
					</span>
  </div> 
  <div class="col-1">
    <label>
    5.  CODIGO POSTAL:   
      <input placeholder="INGRESE EL CODIGO POSTAL DEL ACCIDENTADO"  id="cpAccidentado" name="cpAccidentado" required>
         
    </label>
  </div> 
    
         <div class="col-2">
                <label>
     6. ENTIDAD FEDERATIVA:
     <input placeholder="ENTIDAD FEDERATIVA DONDE RECIDE EL ACCIDENTADO" id="entidadAccidentado" name="entidadAccidentado" autocomplete="off" type="text" onkeyup="autocompletarEstado()" required/></label>
         <span class="listautocomp">
					<ul id="lista_estado"></ul>  
					</span>  
   
  </div>
      

  
      <div class="col-2">
   <label>
     7. ALCALDIA/MUNICIPIO DEL ACCIDENTADO/A:
     <input placeholder="ALCALDIA DONDE RECIDE EL ACCIDENTADO" id="alcaldiaAccidentado" name="alcaldiaAccidentado" autocomplete="off" type="text" onkeyup="autocompletarAlcaldia()" required/></label>
         <span class="listautocomp">
					<ul id="lista_id"></ul>  
					</span>        
  </div> 
          
      <div class="col-2">
     <label>
         
  8. COLONIA DEL  ACCIDENTADO:
     <input placeholder="COLONIA DONDE RECIDE EL ACCIDENTADO" id="coloniaAccidentado" name="coloniaAccidentado" autocomplete="off" type="text" onkeyup="autocompletarColonia()" required/></label>
         <span class="listautocomp">
					<ul id="lista_colonia"></ul>  
					</span> 
           
  </div>
      

  
      
      <div class="col-2">
    <label>
    9.  CALLE Y NUMERO:
          
      <input placeholder="INGRESE SU DIRECCION CON NUMERO Y DETALLES"  name="calleAccidentado" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            
    </label>
  </div> 



   
  <div class="col-1">
            <span class="textSection">
						 DATOS DE LA PERSONA ACCIDENTADA <br>
					</span>
  </div> 
   
      
      
  <div class="col-2">
    <label>
      10. NOMBRE DE LA PERSONA ACCIDENTADA(SIN ACENTOS):
      
      <input placeholder="APELLIDO PATERNO"  id="appPaAcc" name="appPaAcc"  autocomplete="off" onkeyup="auAppAcci();" required>
         <span class="listautocomp">
					<ul id="lista_appAcci"></ul>  
					</span>  
      <input placeholder="APELLIDO MATERNO"  id="appMaAcc" name="appMaAcc"  autocomplete="off" onkeyup="auApmAcci();" required>
         <span class="listautocomp">
					<ul id="lista_apmAcci"></ul>  
					</span>  
      <input placeholder="NOMBRE(S)"  id="nombreAcc" name="nombreAcc"  autocomplete="off" onkeyup="auNomAcci();" required>  
         <span class="listautocomp">
					<ul id="lista_nombreAcci"></ul>  
					</span>  
         
    </label>
  </div> 
        <div class="col-2">
    <label>
      11. Tipo poblacion de accidentado/a:
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
     <label for="start">9. Fecha de nacimiento de accidentado/a: </label>
<input type="date"  name="fechaNacimientoAccidentado" required>
    </label>
  </div> 
      
       <div class="col-3">  
    <label>
    12. Sexo del accidentado/a: 
           </label>
     
         <fieldset>
  
             <input type="radio" name="generoAccidentado" value="MUJER"  required> <span class="textOption">MUJER</span>
    
   </fieldset>
        <fieldset>
            <input type="radio" name="generoAccidentado" value="HOMBRE" required> <span class="textOption">HOMBRE</span>
              
        </fieldset>
            
<br><br><br><br>
           
  </div>
      
           <div class="col-3">
    <label>
      13. GRADO ESCOLAR DEL ACCIDENTADO/A: 
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
    <label>
   14. CURP DEL ACCIDENTADO:
      
      <input  placeholder="CURP"  id="curpAcc" name="curpAcc"  autocomplete="off" maxlength="18" minlength="18" required> 
         
    </label>
  </div> 

  <div class="col-2">
    <label>
15. CORREO ELECTRONICO DE LA ESCUELA: 
      <input placeholder="INGRESE EL CORREO ELECTRONICO DE SU INSTITUCION" id="correoEscuela" name="correoEscuela" type="email"   required>
    </label>
  </div>
      
            <div class="col-1">
     <input placeholder="Identificador" id="idEscuela" name="idEscuela" autocomplete="off" type="hidden"/>
  </div>
      
        <div class="col-1">
            <span class="textSection">
						DETALLES DEL ACCIDENTE <br>
					</span>
  </div> 
  <div class="col-3">
    <label>
    16.  Descripción del Siniestro/Accidente(15 palabras minimo): 
      <textarea  name="descReportante" 
      onkeyup="javascript:this.value=this.value.toUpperCase();" 
      maxlength="500" 
      maxlength="45"  
      required> </textarea> 
    </label>
  </div>   
      
      <div class="col-3">
    <label>
     <label for="start">
     17. ¿Cuando ocurrio el siniestro(Fecha)?</label>
<input type="date"  name="fechaAccidenteReportante"  required><br><br> 
    </label>
  </div>   
      
      <div class="col-3">
    <label>
     <label for="start">
     18. ¿Cuando ocurrio el siniestro(Hora)?</label>
<input type="time"  name="horaAccidenteReportante" required><br> <br> 
    </label>
  </div>
  <div class="col-3">
    <label>
      19. REGION PRINCIPAL DEL CUERPO AFECTADA: 
      <select id="regionPrincipal" name ="regionPrincipal" required>
          <option value="">SELECCIONE UNA OPCION</option>
          <option>CABEZA</option>
          <option>MEDIA</option>
          <option>MIEMBROS SUPERIORES</option>
        <option>MIEMBROS INFERIORES</option>
        
             
      </select>
    
    </label> 
  </div>
  <div class="col-3">
      
      <label>
  20.  LESION PROBABLE INICIAL:<br>
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
21. TIPO DE EVENTO INICIAL:<br>
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
      22. TRAMO DE COBERTURA: <br>
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
 23. ACTIVIDAD REALIZADA:<br>
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
     24. Tipo de lesión: 
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
      
      
      
      <div class="col-1">
    <label>
     25. Lugar donde ocurrio el accidente: 
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
          <option value="">LUGAR ESPECIFICO DONDE OCURRIO</option>
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
            <span class="textSection">
					RESPONSABLE DEL ACCIDENTADO<br>
					</span>
  </div> 
      
  
  
   <div class="col-2">
    <label>
     26. Responsable Accidentado/a:
        
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

27. Teléfono (10 DIGITOS): 
      <input placeholder="TELEFONO MOVIL"  name="telefonoResponsable" id="telefonoResponsable" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      type="tel"  maxlength="10" minlength="10"   required>   
        <input placeholder="TELEFONO FIJO"  name="telefonoResponsablefijo" id="telefonoResponsablefijo"
        onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
         type="tel"  maxlength="10" minlength="10"   required><br> 
    </label>
  </div> 

  <div class="col-1">
            <span class="textSection">
						ETNIA ACCIDENTADO <br>
					</span>
  </div> 
  <div class="col-1" >  
  <label>
    28.¿SE CONSIDERA INDIGENA?<br><br></label>
      </label>
         <fieldset>
  
 <p><input type="radio" name="indigenaAcc"  value="SI" required >
    <span class="textOption">
				SI
					</span>
      </p>
           
          </fieldset>
          
          <fieldset>
  <p><input type="radio" name="indigenaAcc"   value="NO">
              <span class="textOption">
					NO <br><br>
					</span> </p>
          </fieldset>


    <label>
   28.1.¿HABLA LENGUA INDIGENA? <br></label>
      </label>
         <fieldset>
  
 <p><input type="radio" name="dialectoAcc" id="diaSI" value="SI" required>
    <span class="textOption">
				SI
					</span>
      </p>
           
          </fieldset><fieldset>
  <p><input type="radio" name="dialectoAcc"  id="diaNO" value="NO">
              <span class="textOption">
					NO <br><br>
					</span> </p>
          
          
              
        </fieldset>
          <br><br><br><br>
  </div>

  <div class="col-1" id="dialectoPreguntas" >
  <label>
  28.1.2.¿QUE LENGUA INDIGENA HABLA?<br>
  <select id = "dialectoAccES" name = "dialectoAccES">
  <?php 
                        $conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                        $conexion -> set_charset("utf8");
                        $hosAl = "SELECT *  FROM vasegurobd.cat_dialectos ORDER by nombreDialecto ASC";
                        $result3=mysqli_query($conexion,$hosAl);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option>".$milista['nombreDialecto']."</option>";
                                     }
   
                                        ?>

  </select>
</label>       


    
  </div> 
  
      <div class="col-2">
    <label>
    29. NOTAS: 
      <textarea  name="notasAcc" 
      onkeyup="javascript:this.value=this.value.toUpperCase();" 
       > </textarea>
    </label>
  </div>
         
   
      
      
    
      
      <div class="col-submit">
    <button type="submit"  class="submitbtn" onclick="aprobar();">ENVIAR</button>
  </div>
  
  </form>
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