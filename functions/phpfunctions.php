<?php

function con(){
  
  $link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
  $link -> set_charset("utf8");  



  return $link;
}
function conexion(){
  return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

}

function accidentesTotales(){
  $link = con();
 
  $duT= "SELECT * FROM vasegurobd.tb_accidentes";
     $dupT=mysqli_query($link,$duT); 
     $duplT = mysqli_num_rows($dupT);
echo "(".$duplT.")";

}

function estadisticas(){

$fechaHoy = date('Y-m-d')."%";
    $mes = date('m');

    $link = con();
    
    
    $to= "SELECT * FROM vasegurobd.tb_accidentes";
		$tod=mysqli_query($link,$to); 
        $todos= mysqli_num_rows($tod);  
    
    $ap= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus in ('3','11')";
		$apr=mysqli_query($link,$ap); 
        $aprobados = mysqli_num_rows($apr); 
  
    
    $re= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus in ('2','4','12')";
		$rec=mysqli_query($link,$re); 
        $rechazados = mysqli_num_rows($rec);
    
    ///////////////////// DATOS POR TIPO DE ESTATUS PARA ESTADISTICAS ////////////////
    
    
    $nu= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='1' AND fechaRepor LIKE '$fechaHoy'";
    $nuM= "SELECT *FROM vasegurobd.tb_accidentes WHERE idEstatus ='1' AND MONTH(fechaRepor) = '$mes'";
    $nuT= "SELECT *FROM vasegurobd.tb_accidentes WHERE idEstatus ='1'";

    $nueT=mysqli_query($link,$nuT); 
    $nueM=mysqli_query($link,$nuM); 
    $nue=mysqli_query($link,$nu); 

        $nuevos = mysqli_num_rows($nue);
        $nuevosM = mysqli_num_rows($nueM);
        $nuevosT = mysqli_num_rows($nueT);

    $nues= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$nuevos', registrosMes = '$nuevosM', registrosTotal = '$nuevosT' WHERE idEstatus ='1'";
    
    $nue=mysqli_query($link,$nues); 
    
    ////////////////////

     $du= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='2' AND fechaRepor LIKE '$fechaHoy'";
     $duM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='2' AND MONTH(fechaRepor) = '$mes'";
     $duT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='2'";


        $dup=mysqli_query($link,$du); 
        $dupM=mysqli_query($link,$duM); 
        $dupT=mysqli_query($link,$duT); 
        

        $dupl = mysqli_num_rows($dup);
        $duplM = mysqli_num_rows($dupM);
        $duplT = mysqli_num_rows($dupT);

    $dupli= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$dupl', registrosMes ='$duplM', registrosTotal = '$duplT' WHERE idEstatus ='2'";
    $duplic=mysqli_query($link,$dupli);   

    //////////////////////
    
    
    $apro= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='3' AND fechaRepor LIKE '$fechaHoy' ";
    $aproM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='3' AND MONTH(fechaRepor) = '$mes' ";
    $aproT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='3' ";
    

        $aprob=mysqli_query($link,$apro);
        $aprobM=mysqli_query($link,$aproM);
        $aprobT=mysqli_query($link,$aproT); 
        

        $aprbd = mysqli_num_rows($aprob);
        $aprbdM = mysqli_num_rows($aprobM);
        $aprbdT = mysqli_num_rows($aprobT);

    $aprbdo= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$aprbd', registrosMes = '$aprbdM', registrosTotal = '$aprbdT' WHERE idEstatus ='3' ";
    $sql=mysqli_query($link,$aprbdo);  
    

    ////////////////////////

    $aproes= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='11' AND fechaRepor LIKE '$fechaHoy' ";
    $aproesM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='11' AND MONTH(fechaRepor) = '$mes' ";
    $aproesT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='11' ";


        $aprobes=mysqli_query($link,$aproes);
        $aprobesM=mysqli_query($link,$aproesM); 
        $aprobesT=mysqli_query($link,$aproesT); 

        $aprbdes = mysqli_num_rows($aprobes);
        $aprbdesM = mysqli_num_rows($aprobesM);
        $aprbdesT = mysqli_num_rows($aprobesT);
        
    
    $aprbdoes= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$aprbdes', registrosMes = '$aprbdesM', registrosTotal = '$aprbdesT' WHERE idEstatus ='11' ";
    $sql123=mysqli_query($link,$aprbdoes);

    
    ///////////////////////////

   $rech= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='4' AND fechaRepor LIKE '$fechaHoy'";
   $rechM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='4' AND MONTH(fechaRepor) = '$mes'";
   $rechT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='4'";


        $rechresult=mysqli_query($link,$rech);
         $rechresultM=mysqli_query($link,$rechM); 
         $rechresultT=mysqli_query($link,$rechT);  
        

        $rechrows = mysqli_num_rows($rechresult);
        $rechrowsM = mysqli_num_rows($rechresultM);
        $rechrowsT = mysqli_num_rows($rechresultT);


    $rectab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$rechrows', registrosMes = '$rechrowsM', registrosTotal = '$rechrowsT' WHERE idEstatus ='4' ";
    $sql2=mysqli_query($link,$rectab);

    ////////////////////////
    
  $enhos= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='5' AND fechaRepor LIKE '$fechaHoy'";
  $enhosM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='5' AND MONTH(fechaRepor) = '$mes'";
  $enhosT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='5'";

        $enhosresult=mysqli_query($link,$enhos); 
        $enhosresultM=mysqli_query($link,$enhosM); 
        $enhosresultT=mysqli_query($link,$enhosT); 
        
        $enhosrows = mysqli_num_rows($enhosresult);
        $enhosrowsM = mysqli_num_rows($enhosresultM);
        $enhosrowsT = mysqli_num_rows($enhosresultT);


    $enhostab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$enhosrows', registrosMes = '$enhosrowsM', registrosTotal = '$enhosrowsT' WHERE idEstatus ='5' ";
    $sql3=mysqli_query($link,$enhostab); 
    /////////////////////////
    
$egreso= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='6' AND fechaRepor LIKE '$fechaHoy'";
$egresoM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='6' AND MONTH(fechaRepor) = '$mes'";
$egresoT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='6' ";

    
$egresoresult=mysqli_query($link,$egreso); 
$egresoresultM=mysqli_query($link,$egresoM); 
$egresoresultT=mysqli_query($link,$egresoT); 

    $egresorows = mysqli_num_rows($egresoresult);
    $egresorowsM = mysqli_num_rows($egresoresultM);
    $egresorowsT = mysqli_num_rows($egresoresultT);


    $egresotab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$egresorows', registrosMes = '$egresorowsM', registrosTotal = '$egresorowsT' WHERE idEstatus ='6' ";
    $sql4=mysqli_query($link,$egresotab);  

    /////////////////////////
    
    $fin= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='7' AND fechaRepor LIKE '$fechaHoy' ";
    $finM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='7' AND MONTH(fechaRepor) = '$mes' ";
    $finT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='7' ";

        $finresult=mysqli_query($link,$fin); 
        $finresultM=mysqli_query($link,$finM); 
        $finresultT=mysqli_query($link,$finT); 


        $finrows = mysqli_num_rows($finresult);
        $finrowsM = mysqli_num_rows($finresultM);
        $finrowsT = mysqli_num_rows($finresultT);

    $fintab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$finrows', registrosMes = '$finrowsM', registrosTotal = '$finrowsT' WHERE idEstatus ='7' ";
    $sql5=mysqli_query($link,$fintab); 

    //////////////////

    
    $sub= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='8' AND fechaRepor LIKE '$fechaHoy' ";
    $subM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='8' AND MONTH(fechaRepor) = '$mes'";
    $subT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='8'  ";

        $subresult=mysqli_query($link,$sub); 
        $subresultM=mysqli_query($link,$subM); 
        $subresultT=mysqli_query($link,$subT); 


    $subrows = mysqli_num_rows($subresult);
    $subrowsM = mysqli_num_rows($subresultM);
    $subrowsT = mysqli_num_rows($subresultT);

    $subtab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$subrows', registrosMes = '$subrowsM', registrosTotal = '$subrowsT' WHERE idEstatus ='8' ";
    $sql6=mysqli_query($link,$subtab);
    ////////////////

    $rev= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='10' AND fechaRepor LIKE '$fechaHoy'";
    $revM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='10' AND MONTH(fechaRepor) = '$mes'";
    $revT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='10' ";


        $revresult=mysqli_query($link,$rev); 
        $revresultM=mysqli_query($link,$revM); 
        $revresultT=mysqli_query($link,$revT); 


        $revrows = mysqli_num_rows($revresult);
        $revrowsM = mysqli_num_rows($revresultM);
        $revrowsT = mysqli_num_rows($revresultT);

    $revtab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$revrows', registrosMes = '$revrowsM', registrosTotal = '$revrowsT' WHERE idEstatus ='10' ";
    $sql7=mysqli_query($link,$revtab); 

    //////////////

    
        $reces= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='12' AND fechaRepor LIKE '$fechaHoy'";
        $recesM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='12' AND MONTH(fechaRepor) = '$mes'";
        $recesT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='12'";

        $recesresult=mysqli_query($link,$reces); 
        $recesresultM=mysqli_query($link,$recesM);
        $recesresultT=mysqli_query($link,$recesT);  

        $recesrows = mysqli_num_rows($recesresult);
        $recesrowsM = mysqli_num_rows($recesresultM);
        $recesrowsT = mysqli_num_rows($recesresultT);

    $recestab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$revrows', registrosMes = '$recesrowsM', registrosTotal = '$recesrowsT' WHERE idEstatus ='12' ";
    $sql8=mysqli_query($link,$recestab);    
    
    ////////////

    $pen= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='9' AND fechaRepor LIKE '$fechaHoy'";
    $penM= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='9' AND MONTH(fechaRepor) = '$mes'";
    $penT= "SELECT * FROM vasegurobd.tb_accidentes WHERE idEstatus ='9' ";

        $penresult=mysqli_query($link,$pen); 
        $penresultM=mysqli_query($link,$penM); 
        $penresultT=mysqli_query($link,$penT); 


        $penrows = mysqli_num_rows($penresult);
        $penrowsM = mysqli_num_rows($penresultM);
        $penrowsT = mysqli_num_rows($penresultT);

    $pentab= "UPDATE vasegurobd.cat_estatus SET registrosDia ='$penrows', registrosMes = '$penrowsM', registrosTotal = '$penrowsT' WHERE idEstatus ='9' ";
    $sql9=mysqli_query($link,$pentab);

    mysqli_close($link);

    
} 

function menuEnc($name){
?>

<img src='../images/ATLAS1.PNG' height='75'  width='500' style='float: left ; margin-left: 8%;'> 

    
     <center>

    <nav class="menu">
        
	<ul class="active">
     

       <li style="font-size: 20px; color: darkblue;" ><u><b><?php echo $name; ?></b></u></li>            
       <li title="INGRESE UN NUEVO ACCIDENTE DESDE LLAMADA"><a href="../forms/formAccidentadoAcc.php"><b>NUEVO</b></a></li>
       <li title="Busque e Ingrese archivos de encuesta"><a href="../forms/adminAccidentesEncuesta.php"><b>BUSCADOR</b></a></li>
              <li ><a href="../forms/preguntasFre.php">AYUDA ◊ </a></li>
              <li class="last-child"><a href="#" onclick="salir();"> <b>CERRAR SESION</b></a></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
      
              
            
        </ul>
                <a class="toggle-nav" href="#">&#9776;</a>
      
      </nav>
         </center>     


<?php
}

function menuEst(){
  ?>
  <nav class="menu">
          
          <ul class="active">
             
        
               
          <li><a href="../forms/inicioAdmin.php">INICIO</a></li>
                <li ><a href="../forms/preguntasFre.php">AYUDA ◊ </a></li>
                <li class="last-child"><a href="#" onclick="salir();"> <b>CERRAR SESION</b></a></li>
        
                
              
          </ul>
                  <a class="toggle-nav" href="#">&#9776;</a>
        
        </nav>
           </center>     
  
  
  <?php
  }
  

function menuAdmin($name){
    ?>
       <img src='../images/ATLAS1.PNG' height='75'  width='500' style='float: left ; margin-left: 8%;'> 
    
     <center>

    <nav class="menu">
        
	<ul class="active">
     

       <li style="font-size: 20px; color: darkblue;" ><u><b><?php echo $name; ?></b></u></li>
	<li><a href="">INICIO</a></li>
    <li title="INGRESE UN NUEVO ACCIDENTE DESDE LLAMADA"><a href="../forms/formAccidentadoAcc.php"><b>NUEVO</b></a></li>
     
            
        <li title="ADMINISTRE LOS ACCIDENTES REGISTRADOS Y HAGA BUSQUEDAS ESPECIFICAS ENTRE ESTOS"><a href="../forms/adminAccidentes.php">ACCIDENTES <?php accidentesTotales(); ?> </a></li>

        <li onclick="supad();" style="color:#2C4A9A" title="ADMINISTRE Y EDITE LOS ACCIDENTES(OPCION SOLO PARA SUPER USUARIOS)"><b>SUPER ADMIN</b></li>
        <li title="REGISTRE Y ADMINISTRE LLAMADAS CUYA FINALIDAD NO SEA ADMINISTRAR ACCIDENTES"><a href="../forms/adminLlamadas.php"><b>LLAMADAS</b></a></li>
        <li title="OBTENGA AYUDA RESPUESTAS A PREGUNTAS FRECUENTES SOBRE EL FUNCIONAMIENTO DEL SISTEMA"><a href="../forms/preguntasFre.php">AYUDA ◊ </a></li>
        <li class="last-child" title="SALIR DEL SISTEMA SEMEDIC"><a href="#" onclick="salir();"> <b>CERRAR SESION</b></a></li>

		<script>
          function supad(){

            var opcion = confirm("Para continuar a esta seccion, debe tener abierta una sesion de super usuario. De lo contrario, su sesion sera cerrada.");
    if (opcion == true) {
        window.location= "../forms/adminAccidentesSuperAdmin.php";
	} else {
	    
	}
          }

    
              
         
          </script>
        
      
	</ul>
        	<a class="toggle-nav" href="#">&#9776;</a>

</nav>
   </center>     


<?php

}

function menuEsc(){
 
?>
     <center>
 
    <nav class="menu">
        
	<ul class="active">
     

       <li><a href="../forms/inicioEsc.php">INICIO</a></li>
	<li><a href="../forms/formAccidentadoAccB.php">NUEVO</a></li>
        <li><a href="../forms/adminAccidentesESC.php">SEGUIMIENTO</a></li>
		
        <li><a href="#" onclick="salir();"><b>CERRAR SESIÓN</b></a></li>
		     
      
	</ul>
        	<a class="toggle-nav" href="#">&#9776;</a>

</nav>
   </center> 


<?php 


}

function menuMedAux(){
 
  ?>
       <center>
   
      <nav class="menu">
          
    <ul class="active">
    <li><a href="../forms/inicioMedAux.php">INICIO</a></li>
    <li><a href="../forms/adminAuxMedIn.php">SOLICITUDES</a></li>
    <li><a href="../forms/formAccidentadoAccAux.php">NUEVO</a></li>     
    <li><a href="../forms/adminAccidentesMedAux.php">ACCIDENTES</a></li> 
          <li><a href="#" onclick="salir();"><b>CERRAR SESIÓN</b></a></li>
           
        
    </ul>
            <a class="toggle-nav" href="#">&#9776;</a>
  
  </nav>
     </center> 
  
  
  <?php 
  
  
  }


  function menuAtlas(){
 
    ?>
         <center>
     
        <nav class="menu">
            
      <ul class="active">
         
    
           <li><a href="../forms/inicioAtlas.php">INICIO</a></li>
           <li><a href="../forms/adminSegAt.php">ACCIDENTES</a></li>
           <li><a href="#" onclick="salir();"><b>CERRAR SESIÓN</b></a></li>
           
        
           </ul>
                   <a class="toggle-nav" href="#">&#9776;</a>
         
         </nav>
            </center> 
         
         
         <?php 
         }

function menuMed($name){
 
  ?>
       <img src='../images/ATLAS1.PNG' height='75'  width='500' style='float: left ; margin-left: 8%;'> 
    
    <center>

   <nav class="menu">
       
 <ul class="active">
    

      <li style="font-size: 20px; color: darkred;" ><u><b><?php echo $name; ?></b></u></li>
         <li><a href="">INICIO</a></li>
         <li><a href="../forms/formAccidentadoAccM.php">NUEVO</a></li>
    <li><a href="../forms/adminMedicosIn.php">SOLICITUDES</a></li>
    <li><a href="../forms/adminAccidentesMed.php">ACCIDENTES</a></li>
    <li><a href="../forms/adminCartasMed.php">CARTAS</a></li>
    <li><a href="../forms/adminMedicosHospitales.php">HOSPITALES</a></li>
 
      
          <li><a href="#" onclick="salir();"><b>CERRAR SESIÓN</b></a></li>
           
        
    </ul>
            <a class="toggle-nav" href="#">&#9776;</a>
  
  </nav>
     </center> 
  
  
  <?php 
  }
function menuHos(){
?>    

 <center>
 
    <nav class="menu">
        
	<ul class="active">
     

       <li><a href="../forms/inicioHos.php">INICIO</a></li>
	<li><a href="../forms/adminHos.php">ACCIDENTES ENTRANTES</a></li>
  <li><a href="../forms/adminSolHos.php">SOLICITUDES</a></li>
       
		
        <li><a href="#" onclick="salir();"><b>CERRAR SESIÓN</b></a></li>
		     
      
	</ul>
        	<a class="toggle-nav" href="#">&#9776;</a>

</nav>
   </center> 


<?php    
}
function excelAdmin(){
       
        $time = time();
        $fechaHoy = date('Y-m-d', $time);
        $hora = date("H-i-s", $time);
        $fechaID = $fechaHoy." ".$hora;
        $fechaName = str_replace("-", "", $fechaHoy);
      
      
?>

<div id="div1">
	<table border="1">

		<tr>
        <thead style = "background-color: darkblue; font-size: 9px;">
        
        <td style = "background-color: #32275a;" colspan = "5"></td>
        <td colspan = "3"><b>NOMBRE DE QUIEN REPORTA</b></td>
        <td colspan = "2"><b>DEL CONTACTO DE LA PERSONA  QUE REPORTA</b></td>
        <td style = "background-color: #32275a;" colspan = "9"></td>
        <td colspan = "3"><b>NOMBRE COMPLETO DE LA PERSONA ACCIDENTADA</b></td>
        <td colspan = "4"></td>
        <td style = "background-color: #32275a;" colspan = "5"><b>DATOS ESCUELA</b></td>
        <td colspan = "4"></td>
        <td style = "background-color: #32275a;" colspan = "5"><b>DATOS DE QUIEN REPORTA</b></td>
        <td colspan = "25"></td>
    
    
    </thead>
		</tr>
		<tr>
		     <thead>
            
             <td>NO. DE REPORTE</td>
            <td>NO. DE SINIESTRO</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
            <td>NOMBRE(S)</td>
			<td>CORREO ELECTRONICO</td>
			<td>TELEFONO</td>
            <td></td>
             <td></td>
             <td></td>
			<td>DESCRIPCION DEL SINIESTRO</td>
            <td></td>
             <td></td>
             <td></td>
			<td>FECHA REPORTE</td>
            <td>HORA  REPORTE</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
            <td>TIPO DE POBLACION</td>
            <td>EDAD</td>
            <td>SEXO</td>
            <td>GRADO ESCOLAR</td>
            <td>NOMBRE DE LA ESCUELA</td>
            <td>CALLE Y NUMERO</td>
            <td>ALCALDIA</td>
            <td>COLONIA</td>
            <td>C.P.</td>
            <td>CALLE Y NUMERO</td>
            <td>COLONIA</td>
            <td>ALCALDIA</td>
            <td>C.P.</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
			<td>TELEFONO(FIJO)</td>
            <td>TELEFONO (CEL)</td>
            <td>REGION DEL CUERPO</td>
            <td>HOSPITAL</td>
            <td>DIAGNOSTICO</td>
            <td>TIPO DE ACCIDENTE</td>
            <td>MONTOS EROGADOS</td>
            <td>RESULTADO ENCUENTA</td>
            <td>DOCUMENTOS FALTANTES</td>
            <td>OBSERVACIONES</td>
            <td>FECHA DE NACIMIENTO</td>
            <td>CIE 10</td>
            <td>CPT</td>
            <td>FECHA DE EGRESO</td>
            <td>FECHA DE ACCIDENTE</td>
            <td>HORA ACCIDENTE</td>
            <td style = "font-size: 9px;">LUGAR DONDE OCURRIO EL ACCIDENTE</td>
            <td>RESERVA TECNICA</td>
            <td>MONTO EROGADOS</td>
            <td>HONORARIOS MEDICOS</td>
            <td>MONTO EROGADO</td>
            <td>TIPO DE ATENCION</td>
            <td>TIPO DE COBERTURA </td>
            <td>TIPO DE TRAMITE</td>
            <td>QUEJA</td>
            <td>COMENTARIO</td>
            <td>SINIESTRO</td>
                
			
			</thead>
		</tr>
        <?php      
		$conexion = con();
		$sql="SELECT idAcc, ACCT.FolioAccidente,appPaRepor, appMaRepor, nombreRepor,telefonoReportante, descRepor, 
        fechaRepor, PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus,
        poblacionAccidentado, EdadA, SexoA, 
        GradoEscolarA,
         nombreEscuela, calleEscuela, alcaldiaEscuela, ESC.colonia, cpescuela, CalleA,
         ACT.idCP, apRes, amRes, nombreRes, telFiRes,telCelRes,
         idHospital ,FechaNacimientoA, ACCT.idEstatus,
         
        fechaHoraAccidente, correoReportante, enunciadoLes
        FROM vasegurobd.tb_accidentado ACT ,
        vasegurobd.tb_accidentes ACCT, 
        vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
         
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela  ORDER BY fechaRepor DESC;";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
      
        <td></td>
         
        <?php 
              if ($mostrar['FolioAccidente'] ==""){ echo "<td class='rec'><b>NO DISPONIBLE</b> </td>";
             }else{ echo "<td  class='ace' ><b>".$mostrar['FolioAccidente']."</b> </td>";
             }
              
                
                
                ?>
        
        
        
        <td><?php echo $mostrar['appPaRepor'] ?></td>
        <td><?php echo $mostrar['appMaRepor'] ?></td>
        <td><?php echo $mostrar['nombreRepor'] ?></td>
        <td><b><?php echo $mostrar['correoReportante'] ?></b></td>
        <td><?php echo $mostrar['telefonoReportante'] ?></td>
        <td colspan = "7"><?php echo $mostrar['enunciadoLes'] ?></td>
            <td><?php 
            $times = explode(" ",  $mostrar['fechaRepor'] );
            echo $times[0];
           ?></td> 
            <td><?php echo $times[1]; ?></td>

            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
            <td><?php echo $mostrar['SegundoApellidoA'] ?></td>
            <td><?php echo $mostrar['NombreA'] ?></td>
            <td><?php echo $mostrar['poblacionAccidentado'] ?></td>
            <td><?php echo $mostrar['EdadA'] ?></td>
            <td><?php echo $mostrar['SexoA'] ?></td>
            <td><?php echo $mostrar['GradoEscolarA'] ?></td>
            <td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php echo $mostrar['calleEscuela'] ?></td>
            <td><?php echo $mostrar['alcaldiaEscuela'] ?></td>
            <td><?php echo $mostrar['colonia'] ?></td>
            <td><?php echo $mostrar['cpescuela'] ?></td>
            <td><?php echo $mostrar['CalleA'] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $mostrar['apRes'] ?></td>
            <td><?php echo $mostrar['amRes'] ?></td>
            <td><?php echo $mostrar['nombreRes'] ?></td>
            <td><?php echo $mostrar['telFiRes'] ?></td>
            <td><?php echo $mostrar['telCelRes'] ?></td>
            <td><b>......</b></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b><?php echo $mostrar['FechaNacimientoA'] ?></b></td>
            <td><b><a href= ''>VER DIAGNOSTICOS</a></b></td>
            <td><b><a href= ''>VER PROCEDIMIENTOS</a></b></td>
            <td><b><?php echo $mostrar['fechaEgreso'] ?></b></td>
            <td><b><?php 
            $time = explode(" ",  $mostrar['fechaHoraAccidente'] );
            echo $time[0];
           ?></b></td>
            <td><b><?php echo $time[1];  ?></b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td ><b><a href= ''>VER LESIONES</a></b></td>
            
		</tr>
        
	<?php 
	}
	 ?>
   
            
    
           </table>
 
     

  </div>
        
          </div>
          </div>
    </div>
</body>
       


<?php
mysqli_close($conexion); 
}
function diagnosticosMultiples(){
?>  
<div class="col-1">
           <center> <button type="button"
            style="width: 150; font-size: 12px; background: darkred;"
             id="agDia" name="agDia">
				CLICK PARA AGREGAR DIAGNOSTICOS<br>
                    </button></center>
                    </div>
                    <script>
  
  
  $('#agDia').on('click',function(){
    document.getElementById('diaList').style.display = 'block'; 
   
  
  });
 
  </script>
  <div class="col-1" id="diaList" name="diaList" style="display: none;"> 
          <label> 
  <input id="diagnostico" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico" 
  autocomplete ="off"
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO();">
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico"> </ul>  
                    </span> 


                    <label> 
  <input id="diagnostico2" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico2" 
  autocomplete ="off"
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO2();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico2"> </ul>  
                    </span>

                    <label> 
  <input id="diagnostico3" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico3" 
  autocomplete ="off"
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO3();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico3"> </ul>  
                    </span>

                    <label> 
  <input id="diagnostico4" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico4" 
  autocomplete ="off"
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO4();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico4"> </ul>  
                    </span>
    
                    <label> 
  <input id="diagnostico5" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico5" 
  autocomplete ="off"
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO5();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico5"> </ul>  
                    </span>

                    <label> 
  <input id="diagnostico6" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico6"
  autocomplete ="off" 
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO6();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico6"> </ul>  
                    </span>

                    
          </div> 


<?php 
}
function procedimientosMultiples(){
?>  
<div class="col-1">

<center> <button type="button"
            style="width: 150; font-size: 12px; background: darkblue;"
            id="agPro" name="agPro">
				CLICK PARA AGREGAR PROCEDIMIENTOS<br>
                    </button></center>
            
          </div>
          <script>
  
  
  $('#agPro').on('click',function(){
    document.getElementById('proceInputs').style.display = 'block'; 
   
  
  });
 
  </script>
          <div class="col-1" id="proceInputs" name="proceInputs" style="display: none;" >
          <label> 
  <input id="procedimiento" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
  name="procedimiento" 
  autocomplete ="off"
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO();">
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento"></ul>  
                    </span>
                    
    
                    <label> 
  <input id="procedimiento2" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"
    name="procedimiento2"  
    autocomplete ="off"
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO2();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento2"></ul>  
                    </span>
                    

                    <label> 
  <input id="procedimiento3" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
    name="procedimiento3" 
    autocomplete ="off"
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO3();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento3"></ul>  
					</span>

                    <label> 
  <input id="procedimiento4" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
    name="procedimiento4" 
    autocomplete ="off"
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO4();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento4"></ul>  
					</span>
    
                    <label> 
  <input id="procedimiento5" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
    name="procedimiento5" 
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO5();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento5"></ul>  
					</span>

                    <label> 
  <input id="procedimiento6" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
    name="procedimiento6" 
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO6();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento6"></ul>  
					</span>

          </div> 


<?php 

} 

function lesionesMultiples() {
?> 

<div class="col-3" id="re1" ><label style="font-size: 24px;"> LESIÓNES</label>
  
           <label>REGION DEL CUERPO AFECTADA: 
                    <select id ="regionDelCuerpoAfectada" name = "regionDelCuerpoAfectada" onchange="mostrarIdRDCA()" required>
                    <?php 
                        $conexion = con();
                        $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                        $result3=mysqli_query($conexion,$hosAl);
                         echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option>".$milista['nombreRDCA']."</option>";
                                     }
   
                                        ?>
                    </select>
               
                       <select id="regionesRDCA" name="regionesRDCA" required>
                           <option value="">SELECCIONE REGION ESPECIFICA </option>
                
                        </select>
    </label>
   
  </div> 
  

 <div class="col-3" id="sin1">
  
            <label>SINTOMAS
           <p><input type="checkbox" name="sintomas[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
           <p><input type="checkbox" name="sintomas[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
           <p><input type="checkbox" name="sintomas[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
            <p><input type="checkbox" name="sintomas[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
            <p><input type="checkbox" name="sintomas[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
            <p><input type="checkbox" name="sintomas[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
            <p><input type="checkbox" name="sintomas[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                                      
          </label>
          
     </div>  
      <div class="col-3" id="int1" >
      <label>INTENSIDAD
         <select id = "intensidad" name = "intensidad" required>
          <option value="">SELECCIONE UNA OPCION</option>
       
          <option>LEVE</option>
          <option>MODERADO</option>
          <option>SEVERO</option> 
          
             
        
      </select>  
          <br><br><br>
          
          </label>
             
      </div>


<div class="col-1">
  <center>
    
    <button class="submitbtn" type="button" id="btnL1" style="width: 180; font-size: 12px;" onclick="agregarLesion()">AGREGAR MÁS LESIONES </button><BR>
    
    
  </center>
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


  <div class="col-4" id="re2" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN </label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada1" name = "regionDelCuerpoAfectada1" onchange="mostrarRegionesRDCA1()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA1" name="regionesRDCA1">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
       
         <div class="col-4" id="sin2" style="display: none;" >
              <label>SINTOMAS
             <p><input type="checkbox" name="sintomas1[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
             <p><input type="checkbox" name="sintomas1[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
             <p><input type="checkbox" name="sintomas1[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas1[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas1[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas1[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas1[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                    
            </label>
            
       </div>  
        <div class="col-4" id="int2" style="display: none;">
        <label>INTENSIDAD
           <select id = "intensidad1" name = "intensidad1" >
            <option value="">SELECCIONE UNA OPCION</option>
            <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
               
          
        </select>  
            <br><br>
            <br>
            </label>
              
        </div>
        <div class="col-4" id="botLes2" style="display: none;"><center>
        <button type="button" id="btnLe1" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
        <button type="button" id="btnLe1A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
      <label><br></label>
  
      <script>
  
  $('#btnLe1').on('click',function(){
    document.getElementById('re2').style.display = 'none'; 
    document.getElementById('sin2').style.display = 'none';  
    document.getElementById('int2').style.display = 'none'; 
    document.getElementById('btnLe1').style.display = 'none'; 
    document.getElementById('btnLe1A').style.display = 'none'; 
    
    document.getElementById('btnL1').style.display = 'inline-block'; 
  
    document.getElementById('regionDelCuerpoAfectada1').selectedIndex = 0;
    document.getElementById('regionesRDCA1').selectedIndex = 0;
    document.getElementById('intensidad1').selectedIndex = 0; 
    $('#sintomas1 input[type=checkbox]').prop("checked", false);
  
  });
  
  $('#btnLe1A').on('click',function(){
    document.getElementById('re3').style.display = 'inline-block'; 
    document.getElementById('sin3').style.display = 'inline-block';  
    document.getElementById('int3').style.display = 'inline-block'; 
    document.getElementById('quitarLe2').style.display = 'inline-block'; 
  
     document.getElementById('btnLe2').style.display = 'inline-block'; 
    document.getElementById('btnLe2A').style.display = 'inline-block'; 
  
    document.getElementById('btnLe1').style.display = 'none'; 
    document.getElementById('btnLe1A').style.display = 'none'; 
    document.getElementById('btnL1').style.display = 'none'; 
   
  
   
  
  });
  
  
  
  
  </script>
      </div>
        
        <div class="col-4" id="re3" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN</label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada2" name = "regionDelCuerpoAfectada2" onchange="mostrarRegionesRDCA2()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA2" name="regionesRDCA2">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
        
         <div class="col-4" id="sin3" style="display: none;">
              <label>SINTOMAS
             <p><input type="checkbox" name="sintomas2[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
             <p><input type="checkbox" name="sintomas2[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
             <p><input type="checkbox" name="sintomas2[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas2[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas2[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas2[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas2[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                      
            </label>
            
       </div>  
        <div class="col-4" id="int3" style="display: none;">
        <label>INTENSIDAD
           <select id = "intensidad2" name = "intensidad2" >
            <option value="">SELECCIONE UNA OPCION</option>
            <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
               
          
        </select>  
            <br><br><br>
            
            </label>
            
        </div>
        <div class="col-4" id="quitarLe2" style="display: none;">
        
        <center>
        <button type="button" id="btnLe2" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
        <button type="button" id="btnLe2A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
      <label><br><br></label>
      <script>
  $('#btnLe2').on('click',function(){
    document.getElementById('re3').style.display = 'none'; 
    document.getElementById('sin3').style.display = 'none';  
    document.getElementById('int3').style.display = 'none'; 
    document.getElementById('btnLe2').style.display = 'none'; 
    document.getElementById('btnLe2A').style.display = 'none'; 
  
    document.getElementById('btnLe1').style.display = 'inline-block'; 
    document.getElementById('btnLe1A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada2').selectedIndex = 0;
    document.getElementById('regionesRDCA2').selectedIndex = 0;
    document.getElementById('intensidad2').selectedIndex = 0; 
    $('#sintomas2 input[type=checkbox]').prop("checked", false);
  
  });
  
  $('#btnLe2A').on('click',function(){
    document.getElementById('re4').style.display = 'inline-block'; 
    document.getElementById('sin4').style.display = 'inline-block';  
    document.getElementById('int4').style.display = 'inline-block'; 
    document.getElementById('quitarLe3').style.display = 'inline-block'; 
    document.getElementById('btnLe3').style.display = 'inline-block'; 
    document.getElementById('btnLe3A').style.display = 'inline-block'; 
  
    document.getElementById('btnLe2').style.display = 'none'; 
    document.getElementById('btnLe2A').style.display = 'none'; 
  });
  </script>
      </div>


        <div class="col-4" id="re4"style="display: none;">
          <label style="color: darkred; font-size: 24px;">LESIÓN</label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada3" name = "regionDelCuerpoAfectada3" onchange="mostrarRegionesRDCA3()">
                      <?php 
                          $conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                          $conexion -> set_charset("utf8");
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA3" name="regionesRDCA3">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
    
  
   <div class="col-4" id="sin4" style="display: none;">
              <label>SINTOMAS
             <p><input type="checkbox" name="sintomas3[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
             <p><input type="checkbox" name="sintomas3[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
             <p><input type="checkbox" name="sintomas3[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas3[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas3[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas3[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas3[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                   
            </label>
            
       </div>  
        <div class="col-4" id="int4" style="display: none;" >
        <label>INTENSIDAD
           <select id = "intensidad3" name = "intensidad3" >
            <option value="">SELECCIONE UNA OPCION</option>
            <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
               
          
        </select>  
        <br><br><br>
            
            </label>
               
        </div>
        <div class="col-4" id="quitarLe3" style="display: none;">
        <center>
        <button type="button" id="btnLe3" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
        <button type="button" id="btnLe3A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
      <label><br><br></label>
      <script>
  $('#btnLe3').on('click',function(){
    document.getElementById('re4').style.display = 'none'; 
    document.getElementById('sin4').style.display = 'none';  
    document.getElementById('int4').style.display = 'none'; 
    document.getElementById('btnLe3').style.display = 'none'; 
    document.getElementById('btnLe3A').style.display = 'none'; 
  
    document.getElementById('btnLe2').style.display = 'inline-block'; 
    document.getElementById('btnLe2A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada3').selectedIndex = 0;
    document.getElementById('regionesRDCA').selectedIndex = 0;
    document.getElementById('intensidad3').selectedIndex = 0; 
    $('#sintomas2 input[type=checkbox]').prop("checked", false);
  
  });
  
  $('#btnLe3A').on('click',function(){
    document.getElementById('re5').style.display = 'inline-block'; 
    document.getElementById('sin5').style.display = 'inline-block';  
    document.getElementById('int5').style.display = 'inline-block'; 
    document.getElementById('quitarLe4').style.display = 'inline-block'; 
    document.getElementById('btnLe4').style.display = 'inline-block'; 
    document.getElementById('btnLe4A').style.display = 'inline-block'; 
  
  
    document.getElementById('btnLe3').style.display = 'none'; 
    document.getElementById('btnLe3A').style.display = 'none'; 
  });
   
  </script>
      </div>
  
        <div class="col-4" id="re5" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN</label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada4" name = "regionDelCuerpoAfectada4" onchange="mostrarRegionesRDCA4()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA4" name="regionesRDCA4">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
    
  
   <div class="col-4" id="sin5" style="display: none;">
            <label>SINTOMAS
             <p><input type="checkbox" name="sintomas4[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
             <p><input type="checkbox" name="sintomas4[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
             <p><input type="checkbox" name="sintomas4[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas4[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas4[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas4[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas4[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                  
            </label>
            
       </div>  
        <div class="col-4" id="int5" style="display: none;" >
        <label>INTENSIDAD
           <select id = "intensidad4" name = "intensidad4" >
            <option value="">SELECCIONE UNA OPCION</option>
            <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
                  
        </select>  
             <br><br>
            </label>
               
        </div>
        <div class="col-4" id="quitarLe4" style="display: none;">
        <center>
        <button type="button" id="btnLe4" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR </button> <br><br>
        <button type="button" id="btnLe4A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
        
        <label><br><br></label>
        <script>
  
  
  $('#btnLe4').on('click',function(){
    document.getElementById('re5').style.display = 'none'; 
    document.getElementById('sin5').style.display = 'none';  
    document.getElementById('int5').style.display = 'none'; 
    document.getElementById('btnLe4').style.display = 'none'; 
    document.getElementById('btnLe4A').style.display = 'none'; 
  
    document.getElementById('btnLe3').style.display = 'inline-block'; 
    document.getElementById('btnLe3A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada4').selectedIndex = 0;
    document.getElementById('regionesRDCA4').selectedIndex = 0;
    document.getElementById('intensidad4').selectedIndex = 0; 
    $('#sintomas3 input[type=checkbox]').prop("checked", false);
  
  });
  
  $('#btnLe4A').on('click',function(){
    document.getElementById('re6').style.display = 'inline-block'; 
    document.getElementById('sin6').style.display = 'inline-block';  
    document.getElementById('int6').style.display = 'inline-block'; 
    document.getElementById('quitarLe5').style.display = 'inline-block'; 
    document.getElementById('btnLe5').style.display = 'inline-block'; 
    document.getElementById('btnLe5A').style.display = 'inline-block'; 
   
   
    document.getElementById('btnLe4').style.display = 'none'; 
    document.getElementById('btnLe4A').style.display = 'none';  
  });
  </script>
     
      </div>
  
        <div class="col-4" id="re6" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN</label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada5" name = "regionDelCuerpoAfectada5" onchange="mostrarRegionesRDCA5()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA5" name="regionesRDCA5">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
    
  
   <div class="col-4" id="sin6" style="display: none;">
              <label>SINTOMAS
             <p><input type="checkbox" name="sintomas5[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
             <p><input type="checkbox" name="sintomas5[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
             <p><input type="checkbox" name="sintomas5[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas5[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas5[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas5[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas5[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                   
            </label>
            
       </div>  
        <div class="col-4" id="int6" style="display: none;" >
        <label>INTENSIDAD
           <select id = "intensidad5" name = "intensidad5" >
           <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
                  
        </select>  
             <br><br>
            </label>
              
        </div>
        <div class="col-4" id="quitarLe5" style="display: none;">
        <center>
        <button type="button" id="btnLe5" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
        <button type="button" id="btnLe5A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
      <label><br><br></label>
      <script>
  $('#btnLe5').on('click',function(){
    document.getElementById('re6').style.display = 'none'; 
    document.getElementById('sin6').style.display = 'none';  
    document.getElementById('int6').style.display = 'none'; 
    document.getElementById('btnLe5').style.display = 'none'; 
    document.getElementById('btnLe5A').style.display = 'none';
   
  
    document.getElementById('btnLe4').style.display = 'inline-block'; 
    document.getElementById('btnLe4A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada5').selectedIndex = 0;
    document.getElementById('regionesRDCA5').selectedIndex = 0;
    document.getElementById('intensidad5').selectedIndex = 0; 
    $('#sintomas5 input[type=checkbox]').prop("checked", false);
     
  });

    $('#btnLe5A').on('click',function(){

    document.getElementById('re7').style.display = 'inline-block'; 
    document.getElementById('sin7').style.display = 'inline-block';  
    document.getElementById('int7').style.display = 'inline-block'; 
    document.getElementById('quitarLe6').style.display = 'inline-block'; 

    document.getElementById('btnLe6').style.display = 'inline-block';
    document.getElementById('btnLe6A').style.display = 'inline-block';  
   
   
    document.getElementById('btnLe5').style.display = 'none'; 
    document.getElementById('btnLe5A').style.display = 'none'; 
   
  });
 
  
  
  
  </script>
      </div>
      
      <div class="col-4" id="re7" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN </label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada6" name = "regionDelCuerpoAfectada6" onchange="mostrarRegionesRDCA6()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA6" name="regionesRDCA6">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
    
  
   <div class="col-4" id="sin7" style="display: none;">
              <label>SINTOMAS
             <p><input type="checkbox" name="sintomas6[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
             <p><input type="checkbox" name="sintomas6[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
             <p><input type="checkbox" name="sintomas6[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas6[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas6[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas6[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas6[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                      
            </label>
            
       </div>  
        <div class="col-4" id="int7" style="display: none;" >
        <label>INTENSIDAD
           <select id = "intensidad6" name = "intensidad6" >
           <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
                  
        </select>  
             <br><br>
            </label>
              
        </div>
        <div class="col-4" id="quitarLe6" style="display: none;">
        <center>
        <button type="button" id="btnLe6" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
        <button type="button" id="btnLe6A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
      <label><br><br></label>
      <script>

  $('#btnLe6').on('click',function(){
    document.getElementById('re7').style.display = 'none'; 
    document.getElementById('sin7').style.display = 'none';  
    document.getElementById('int7').style.display = 'none'; 
    document.getElementById('btnLe6').style.display = 'none'; 
    document.getElementById('btnLe6A').style.display = 'none';
   
  
    document.getElementById('btnLe5').style.display = 'inline-block'; 
    document.getElementById('btnLe5A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada6').selectedIndex = 0;
    document.getElementById('regionesRDCA6').selectedIndex = 0;
    document.getElementById('intensidad6').selectedIndex = 0; 
    $('#sintomas6 input[type=checkbox]').prop("checked", false);

  });

  $('#btnLe6A').on('click',function(){

document.getElementById('re8').style.display = 'inline-block'; 
document.getElementById('sin8').style.display = 'inline-block';  
document.getElementById('int8').style.display = 'inline-block'; 
document.getElementById('quitarLe7').style.display = 'inline-block'; 

document.getElementById('btnLe7').style.display = 'inline-block';
document.getElementById('btnLe7A').style.display = 'inline-block';  


document.getElementById('btnLe6').style.display = 'none'; 
document.getElementById('btnLe6A').style.display = 'none'; 

});

  
  </script>
      </div>
      
<div class="col-4" id="re8" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN</label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada7" name = "regionDelCuerpoAfectada7" onchange="mostrarRegionesRDCA7()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA7" name="regionesRDCA7">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
    
  
   <div class="col-4" id="sin8" style="display: none;">
              <label>SINTOMAS
             <p><input type="checkbox" name="sintomas7[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
             <p><input type="checkbox" name="sintomas7[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
             <p><input type="checkbox" name="sintomas7[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas7[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas7[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas7[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas7[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                      
            </label>
            
       </div>  
        <div class="col-4" id="int8" style="display: none;" >
        <label>INTENSIDAD
           <select id = "intensidad7" name = "intensidad7" >
           <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
                  
        </select>  
             <br><br>
            </label>
              
        </div>
        <div class="col-4" id="quitarLe7" style="display: none;">
        <center>
        <button type="button" id="btnLe7" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
        <button type="button" id="btnLe7A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
      <label><br><br></label>
      <script>

  $('#btnLe7').on('click',function(){
    document.getElementById('re8').style.display = 'none'; 
    document.getElementById('sin8').style.display = 'none';  
    document.getElementById('int8').style.display = 'none'; 
    document.getElementById('btnLe7').style.display = 'none'; 
    document.getElementById('btnLe7A').style.display = 'none';
   
  
    document.getElementById('btnLe6').style.display = 'inline-block'; 
    document.getElementById('btnLe6A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada7').selectedIndex = 0;
    document.getElementById('regionesRDCA7').selectedIndex = 0;
    document.getElementById('intensidad7').selectedIndex = 0; 
    $('#sintomas7 input[type=checkbox]').prop("checked", false);

  });

  
  $('#btnLe7A').on('click',function(){

document.getElementById('re9').style.display = 'inline-block'; 
document.getElementById('sin9').style.display = 'inline-block';  
document.getElementById('int9').style.display = 'inline-block'; 
document.getElementById('quitarLe8').style.display = 'inline-block'; 

document.getElementById('btnLe8').style.display = 'inline-block';
document.getElementById('btnLe8A').style.display = 'inline-block';  


document.getElementById('btnLe7').style.display = 'none'; 
document.getElementById('btnLe7A').style.display = 'none'; 

});
  
  </script>
      </div>



     
<div class="col-4" id="re9" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN </label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada8" name = "regionDelCuerpoAfectada8" onchange="mostrarRegionesRDCA8()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA8" name="regionesRDCA8">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
    
  
   <div class="col-4" id="sin9" style="display: none;">
              <label>SINTOMAS
              <p><input type="checkbox" name="sintomas8[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
              <p><input type="checkbox" name="sintomas8[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
              <p><input type="checkbox" name="sintomas8[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas8[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas8[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas8[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas8[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                      
            </label>
            
       </div>  
        <div class="col-4" id="int9" style="display: none;" >
        <label>INTENSIDAD
           <select id = "intensidad8" name = "intensidad8" >
           <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
                  
        </select>  
             <br><br>
            </label>
              
        </div>
        <div class="col-4" id="quitarLe8" style="display: none;">
        <center>
        <button type="button" id="btnLe8" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
        <button type="button" id="btnLe8A" style="width: 80px; height: 20px;  background:#246355; font-size: 10px;">AGREGAR + </button>
                                      </center>
      <label><br><br></label>
      <script>

  $('#btnLe8').on('click',function(){
    document.getElementById('re9').style.display = 'none'; 
    document.getElementById('sin9').style.display = 'none';  
    document.getElementById('int9').style.display = 'none'; 
    document.getElementById('btnLe8').style.display = 'none'; 
    document.getElementById('btnLe8A').style.display = 'none';
   
  
    document.getElementById('btnLe7').style.display = 'inline-block'; 
    document.getElementById('btnLe7A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada8').selectedIndex = 0;
    document.getElementById('regionesRDCA8').selectedIndex = 0;
    document.getElementById('intensidad8').selectedIndex = 0; 
    $('#sintomas8 input[type=checkbox]').prop("checked", false);

  });

  $('#btnLe8A').on('click',function(){

document.getElementById('re10').style.display = 'inline-block'; 
document.getElementById('sin10').style.display = 'inline-block';  
document.getElementById('int10').style.display = 'inline-block'; 
document.getElementById('quitarLe9').style.display = 'inline-block'; 

document.getElementById('btnLe9').style.display = 'inline-block';
 


document.getElementById('btnLe8').style.display = 'none'; 
document.getElementById('btnLe8A').style.display = 'none'; 

});
  

  
  </script>
      </div>


<div class="col-4" id="re10" style="display: none;"><label style="color: darkred; font-size: 24px;">LESIÓN </label>
             <label>REGION DEL CUERPO AFECTADA: 
                      <select id ="regionDelCuerpoAfectada9" name = "regionDelCuerpoAfectada9" onchange="mostrarRegionesRDCA9()">
                      <?php 
                          $conexion = con();
                          $hosAl = "SELECT *  FROM vasegurobd.cat_regiondelcuerpoafectada ORDER by nombreRDCA ASC";
                          $result3=mysqli_query($conexion,$hosAl);
                           echo "<option value=''>SELECCIONE UNA PARTE DEL CUERPO</option>";
                          
                                   while($milista=mysqli_fetch_array($result3)){
                                           
                                       echo "<option>".$milista['nombreRDCA']."</option>";
                                       }
     
                                          ?>
                      </select>
                 
                         <select id="regionesRDCA9" name="regionesRDCA9">
                             <option value="">SELECCIONE REGION ESPECIFICA </option>
                  
                          </select>
      </label>
     
    </div> 
    
  
   <div class="col-4" id="sin10" style="display: none;">
              <label>SINTOMAS
              <p><input type="checkbox" name="sintomas9[]" value="DOLOR"><span class="textOption">DOLOR</span> </p> 
              <p><input type="checkbox" name="sintomas9[]" value="INFLAMACION"><span class="textOption">INFLAMACION</span> </p> 
              <p><input type="checkbox" name="sintomas9[]" value="VOMITO"><span class="textOption">VOMITO</span></p>
              <p><input type="checkbox" name="sintomas9[]" value="SANGRADO"><span class="textOption">SANGRADO</span></p> 
              <p><input type="checkbox" name="sintomas9[]" value="ESPASMO"><span class="textOption">ESPASMO</span></p> 
              <p><input type="checkbox" name="sintomas9[]" value="INMOVILIDAD"><span class="textOption">INMOVILIDAD</span></p> 
              <p><input type="checkbox" name="sintomas9[]" value="NO ESPECIFICADO"><span class="textOption">NO ESPECIFICADO</span></p> 
                    
            </label>
            
       </div>  
        <div class="col-4" id="int10" style="display: none;" >
        <label>INTENSIDAD
           <select id = "intensidad9" name = "intensidad9" >
           <option>LEVE</option>
            <option>MODERADO</option>
            <option>SEVERO</option> 
                  
        </select>  
             <br><br>
            </label>
              
        </div>
        <div class="col-4" id="quitarLe9" style="display: none;">
        <center>
        <button type="button" id="btnLe9" style="width: 80px; height: 20px; background: darkred; font-size: 10px;"> QUITAR  </button> <br><br>
       
                                      </center>
      <label><br><br></label>
      <script>

  $('#btnLe9').on('click',function(){
    document.getElementById('re10').style.display = 'none'; 
    document.getElementById('sin10').style.display = 'none';  
    document.getElementById('int10').style.display = 'none'; 
    document.getElementById('btnLe9').style.display = 'none'; 
  
   
  
    document.getElementById('btnLe8').style.display = 'inline-block'; 
    document.getElementById('btnLe8A').style.display = 'inline-block'; 
    
  
    document.getElementById('regionDelCuerpoAfectada9').selectedIndex = 0;
    document.getElementById('regionesRDCA9').selectedIndex = 0;
    document.getElementById('intensidad9').selectedIndex = 0; 
    $('#sintomas9 input[type=checkbox]').prop("checked", false);

  });



  
  </script>
      </div>



<?php
} 
function procedimientosEgreso(){
?>
 <div class="col-1" id="proceInputs" name="proceInputs"  >
   
 <label> Escriba al menos 1 procedimiento </label> 
          <label> 
  <input id="procedimiento" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
  name="procedimiento" 
  autocomplete="off"
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO();" required>
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento"></ul>  
                    </span>
  <label>
    <input id="p1" name="p1"
    autocomplete="off"
    placeholder="COMENTARIO" style="
    background-color: white;
    color: black;
    font-size: 9px;">
  </label>
                    
    
                    <label> 
  <input id="procedimiento2" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"
    name="procedimiento2"  
    autocomplete="off"
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO2();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento2"></ul>  
                    </span>
                    <label>
    <input id="p2" name="p2"
    autocomplete="off"
    placeholder="COMENTARIO" style="
    background-color: white;
    color: black;
    font-size: 9px;">
  </label>

                    <label> 
  <input id="procedimiento3" 
  autocomplete="off"
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
    name="procedimiento3" 
  placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE"  
  onkeyup="autocompletarPROCEDIMIENTO3();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_procedimiento3"></ul>  
					</span>
          <label>
    <input id="p3" name="p3"
    autocomplete="off"
    placeholder="COMENTARIO" style="
    background-color: white;
    color: black;
    font-size: 9px;">
  </label>
          </div>

          <?php
} 

function procedimientosEgresoEDIT($idsa){

  $conexion = con();
                          $sql = "SELECT distinct idDP,claveDP, PRO_NOMBRE, pdcomen
                          FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_procedimientos PRO
                          WHERE PD.claveDP = PRO.CATALOG_KEY
                          AND PD.tipoDP = 'P'
                          AND PD.idSerAD = '$idsa' LIMIT 0,3";
                          $result=mysqli_query($conexion,$sql);
                          $prorows = mysqli_num_rows($result);

                          $inputsFaltantes = 3-$prorows;
                          
                          $i ="1"; 
                          $j ="3"; 
                                   while($milista=mysqli_fetch_array($result)){
  ?>
   <div class="col-1" id="proceInputs" name="proceInputs"  >
     
   <label> Escriba al menos 1 procedimiento </label> 
            <label> 
    <input id="procedimiento<?php echo $i; ?>" 
    style="
    border:none;
      border-bottom: 1px solid #1890ff;
      background-color: #A8D3EF;
      color: darkblue;
      font-size: 12px;
      padding: 5px 10px;
      outline: none;"  
    name="procedimiento<?php echo $i; ?>" 
    autocomplete="off"
    placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE" 
    value="<?php echo $milista['claveDP']." ".$milista['PRO_NOMBRE'] ?>" 
    onkeyup="autocompletarPROCEDIMIENTOE(<?php echo $i; ?>);" required>
            </label> 
            <span class="listautocomp">
            <ul id="lista_procedimiento<?php echo $i; ?>"></ul>  
                      </span>
    <label>
      <input id="p<?php echo $i; ?>" name="p<?php echo $i; ?>"
      autocomplete="off"
      placeholder="COMENTARIO" style="
      background-color: white;
      color: black;
      font-size: 9px;"
      value="<?php echo $milista['pdcomen'] ?>"
      >
    </label>
            </div>
            <?php
      $i = $i+1;      
  }
  
  $if= $inputsFaltantes;
  for ($k = 1; $k <= $inputsFaltantes; $k++) {
    ?>
 <div class="col-1" id="proceInputs" name="proceInputs"  >
     
              <label> 
      <input id="procedimiento<?php echo $if; ?>" 
      style="
      border:none;
        border-bottom: 1px solid #1890ff;
        background-color: #A8D3EF;
        color: darkblue;
        font-size: 12px;
        padding: 5px 10px;
        outline: none;"  
      name="procedimiento<?php echo $if; ?>" 
      autocomplete="off"
      placeholder="ESCRIBA UN PROCEDIMIENTO Y SELECCIONE" 
      value="" 
      onkeyup="autocompletarPROCEDIMIENTOE(<?php echo $if; ?>);">
              </label> 
              <span class="listautocomp">
              <ul id="lista_procedimiento<?php echo $if; ?>"></ul>  
                        </span>
      <label>
        <input id="p<?php echo $if; ?>" name="p<?php echo $if; ?>"
        autocomplete="off"
        placeholder="COMENTARIO" style="
        background-color: white;
        color: black;
        font-size: 9px;"
        value="<?php echo $milista['pdcomen']; ?>"
        >
      </label>
              </div>

    <?php

    $if= $if+1;
}
}
function diagnosticosEgreso(){
  
?>
 <div class="col-1" id="diaList" name="diaList" > 
 <label> Escriba al menos 1 diagnostico </label> 
          <label> 
  <input id="diagnostico" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico" 
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO();" 
  autocomplete="off"
  required>
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico"> </ul>  
                    </span> 
<label>
    <input id="d1" name="d1"
    placeholder="COMENTARIO" style="
    background-color: white;
    color: black;
    font-size: 9px;"
      autocomplete="off">
  </label>
                    <label> 
  <input id="diagnostico2" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico2" 
  autocomplete="off"
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO2();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico2"> </ul>  
                    </span>
                    <label>
    <input id="d2" name="d2"
    placeholder="COMENTARIO"
    autocomplete="off" style="
    background-color: white;
    color: black;
    font-size: 9px;">
  </label>
                    <label> 
  <input id="diagnostico3" 
  autocomplete="off"
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico3" 
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICO3();" >
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico3"> </ul>  
                    </span>
                    <label>
    <input id="d3" name="d3"
    autocomplete="off"
    placeholder="COMENTARIO" style="
    background-color: white;
    color: black;
    font-size: 9px;">
  </label>
                    </div>

<?php
} 

function diagnosticosEgresoEDIT($idsa){

  $conexion = con();
                          $sql = "SELECT distinct idDP, claveDP, NOMBRE, pdcomen
                          FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos DIA
                           WHERE PD.claveDP = DIA.CATALOG_KEY 
                           AND PD.tipoDP = 'D'
                           AND PD.idSerAD = '$idsa' LIMIT 3";
                          $result=mysqli_query($conexion,$sql);
                          $prorows = mysqli_num_rows($result);

                          $inputsFaltantes = 3-$prorows;
                          
                          $i ="1"; 
                          $j ="3"; 
                          
                                   while($milista=mysqli_fetch_array($result)){
                                     
                                      
?>
 <div class="col-1" id="diaList" name="diaList" > 
 <label> Escriba al menos 1 diagnostico </label> 
          <label> 
  <input id="diagnostico<?php echo $i; ?>" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico<?php echo $i; ?>" 
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICOE(<?php echo $i; ?>);" 
  value="<?php echo $milista['claveDP']." ".$milista['NOMBRE']; ?>"
  autocomplete="off">
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico<?php echo $i; ?>"> </ul>  
                    </span> 
<label>
    <input id="d<?php echo $i; ?>" name="d<?php echo $i; ?>"
    placeholder="COMENTARIO" style="
    background-color: white;
    color: black;
    font-size: 9px;"
  value="<?php echo $milista['pdcomen']; ?>"

      autocomplete="off">
  </label>
                                   </div>

<?php
$i= $i+1;
 }

 $if= $inputsFaltantes;
 for ($k = 1; $k <= $inputsFaltantes; $k++) {
   ?>
<div class="col-1" id="diaList" name="diaList" > 
 <label> Escriba al menos 1 diagnostico </label> 
          <label> 
  <input id="diagnostico<?php echo $if; ?>" 
  style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #F6D0D0;
    color: darkred;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
  name="diagnostico<?php echo $if; ?>" 
  placeholder="ESCRIBA UN DIAGNOSTICO Y SELECCIONE"  
  onkeyup="autocompletarDIAGNOSTICOE(<?php echo $if; ?>);" 
  value="<?php echo $milista['claveDP']." ".$milista['NOMBRE']; ?>"
  autocomplete="off">
          </label> 
          <span class="listautocomp">
					<ul id="lista_diagnostico<?php echo $if; ?>"> </ul>  
                    </span> 
<label>
    <input id="d<?php echo $if; ?>" name="d<?php echo $if; ?>"
    placeholder="COMENTARIO" style="
    background-color: white;
    color: black;
    font-size: 9px;"
  value="<?php echo $milista['pdcomen']; ?>"

      autocomplete="off">
  </label>
                                   </div>

   <?php

   $if= $if+1;
}
} 

function archivosPorTipo(){
	$conexion = con();

$sqlF="SELECT * FROM vasegurobd.cat_archivos WHERE fueradepaquete = '1';";
          
          
          $resultF=mysqli_query($conexion,$sqlF);
          while($mostrar=mysqli_fetch_array($resultF)){
  echo "<div class='col-3'>
  <span class='accdet'>".$mostrar['cat_nomArchivo']."</span>
  <center>
  
  <input type='file' name='".$mostrar['name']."[]' id='".$mostrar['name']."' multiple>
  
  </center>
  <label><br></label>
  </div>";
  
          }
  
} 



function selectEstadoCivil(){
	$conexion = con();

$sqlE="SELECT * FROM vasegurobd.cat_estadocivil ORDER BY estadoCivil ASC;";
          
echo "<div class='col-1'>
<label> SELECCIONE EL ESTADO CIVIL:
<select name='estadoCivil' id='estadoCivil' required>
<option value=''>Seleccione una opcion</option>
";    
          $resultE=mysqli_query($conexion,$sqlE);
          while($mostrar=mysqli_fetch_array($resultE)){
  echo "
  <option>".$mostrar['estadoCivil']."</option>";
  
          }
  echo "</select> </label></div>";
  
} 


function tablaAdmin(){
?>
<table border="1" >



<tr>
<thead style = "background-color: darkblue; font-size: 9px;">

<td style = "background-color: #a9d896;" colspan = "7"></td>
<td colspan = "3">NO. DE REPORTE</td>
<td colspan = "2">DEL CONTACTO DE LA PERSONA QUE REPORTA</td>
<td style = "background-color: #a9d896;" colspan = "3"></td>
<td colspan = "3">NOMBRE COMPLETO DE LA PERSONA ACCIDENTADA</td>
<td style = "background-color: #a9d896;" colspan = "4"></td>
<td colspan = "4">DOMICILIO COMPLETO DEL ACCIDENTADO</td>

<td  colspan = "3">ETNIA</td>
<td style = "background-color: #a9d896;" ></td>
<td  colspan = "3">NOMBRE COMPLETO DEL PADRE, MADRE O TUTOR RESPONSABLE DEL ACCIDENTADO</td>
<td  colspan="2">TELEFONO DE LOCALIZACIÓN DE LA PERSONA ACCIDENTADA</td>
<td style = "background-color: #a9d896;" colspan = "3"></td>
<td  colspan = "4">DOMICILIO COMPLETO DE LA ESCUELA</td>
<td style = "background-color: #a9d896;" colspan = "51"></td>


</thead>
</tr>
<tr>
     <thead>
     <td><b>ELIMINAR</b></td>
     <td><b>EDITAR</b></td>
     <td>ESTATUS</td>
     <td>ESTATUS INTERNO</td>
     <td>ENVIO</td>
     <td>NO. DE REPORTE</td>
    <td>NO. DE SINIESTRO</td>
    <td>APELLIDO PATERNO</td>
    <td>APELLIDO MATERNO</td>
    <td>NOMBRE(S)</td>
    <td>CORREO ELECTRONICO</td>
    <td>TELEFONO</td>

    <td>DESCRIPCION DEL SINIESTRO</td>            

    <td>FECHA REPORTE</td>
    <td>HORA  REPORTE</td>
    <td>PATERNO</td>
    <td>MATERNO</td>
    <td>NOMBRE</td>
    <td>FECHA DE NACIMIENTO</td>
   
    <td>EDAD</td>
    <td>SEXO</td>
    <td>TIPO DE POBLACION</td>
   
    <td>CALLE Y NUMERO</td>
    <td>COLONIA</td>
    <td>ALCALDIA</td>
    <td>C.P.</td>

   
   
    <td>DE ACUERDO A SU CULTURA ¿SE CONSIDERA INDÍGENA?</td>
    <td>¿HABLA ALGUNA LENGUA INDÍGENA?</td>
    <td>¿QUE LENGUA INDÍGENA HABLA?</td>
    <td>CURP</td>

    <td>APELLIDO PATERNO</td>
    <td>APELLIDO MATERNO</td>
    <td>NOMBRE(S)</td>
    <td></td>
    <td></td>


    <td>TIPO DE COBERTURA </td>
    <td>GRADO ESCOLAR</td>

    <td>NOMBRE DE LA ESCUELA</td>
    <td>CALLE Y NUMERO</td>
    
    <td>COLONIA</td>
    <td>ALCALDIA</td>
    <td>C.P.</td>
    <td>TELEFONO DE LA ESCUELA</td>

    <td>REGION DEL CUERPO</td>
    <td>DIAGNOSTICO MEDICO</td>
    <td>HOSPITAL AL CUAL FUE CANALIZADO</td>
    
 
   
    <td>TIPO DE ACCIDENTE</td>

    <td>RESULTADO DE ENCUESTA</td>
    <td>DOCUMENTOS FALTANTES</td>
    <td>OBSERVACIONES</td> 
    <td>CIE 10</td>
    
    <td>CPT</td>
    <td>FECHA DE ALTA</td>
    <td>FECHA DE ACCIDENTE</td>
    <td>HORA ACCIDENTE</td>

    <td style = "font-size: 9px;">LUGAR DONDE OCURRIO EL ACCIDENTE</td>
    <td>RESERVA TECNICA</td>
    
    <td>MONTO EROGADO S/ IVA</td>
  
    
    <td>MONTO EROGADO C/ IVA</td>
    <td>HONORARIOS MEDICOS</td>


    <td>TIPO DE ATENCION</td>
    <td>ESTATUS (ALTA, EN TRATAMIENTO MEDICO)</td>
    <td>SEGUIMIENTO TIPIFICACION</td>
    <td>TIPO DE TRAMITE</td>
    <td>PROBABLE TIPO DE LESION</td>
    <td>QUEJA</td>
    <td>COMENTARIOS</td>
    <td>NOTAS</td>
    <td>TIPO DE LLAMADA</td>
    <td>PAQUETE</td>   
   
    
    </thead>
</tr>



    <?php
		


		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
        <td><a href="eliminarAccidente.php?foAcc=<?php echo $mostrar['FolioAccidente'] ?>" 
        onclick="return confirm('Este proceso ELIMINA el registro del accidente, asi como directorios y datos asociados como procedimientos, lesiones y diagnosticos. ¿Desea continuar? ')" ><img src='../images/delete.png' height='20'  width='20' ></a></td>
        <td><a href="modificarAccidente.php?idAcc=<?php echo $mostrar['idAcc'] ?>" ><img src='../images/edit.png' height='20'  width='20' ></a></td>
     

        <td class='<?php 
              if ($mostrar['idEstatus'] =="12"){ echo "rec"; }
              if ($mostrar['idEstatus'] =="11"){ echo "ace"; }
              if ($mostrar['idEstatus'] =="2"){ echo "rec"; } 
              if ($mostrar['idEstatus'] =="4"){ echo "rec"; } 
              if ($mostrar['idEstatus'] =="5"){ echo "enhos"; } 
              if ($mostrar['idEstatus'] =="3"){ echo "ace"; }
              if ($mostrar['idEstatus'] =="1"){ echo "nuevo"; } 
              if ($mostrar['idEstatus'] =="9"){ echo "pen"; }
              if ($mostrar['idEstatus'] =="6"){ echo "egr"; }
              if ($mostrar['idEstatus'] =="13"){ echo "penrev"; }
              if ($mostrar['idEstatus'] =="7"){ echo "fin"; }
                
                
                ?>'><?php 
                
                    echo $mostrar['nombreEstatus'];

                ?></td>
        
        <td class='<?php 
            
            
              if ($mostrar['estatusInterno'] =="REGULAR"){ echo "ace"; }
              if ($mostrar['estatusInterno'] =="PRUEBA"){ echo "enhos"; }
            
                
                
                ?>'><?php

                    echo $mostrar['estatusInterno'];

                ?></td>
 <td class='<?php 
            
            
            if ($mostrar['envioAcc'] =="NO ENVIADO"){ echo "rec"; }
            if ($mostrar['envioAcc'] =="ENVIADO"){ echo "fin"; }
          
              
              
              ?>'><?php echo $mostrar['envioAcc'] ?></td>



        
         
        <?php 
              if ($mostrar['FolioAccidente'] ==""){ echo "<td class='rec'><b>NO DISPONIBLE</b> </td>";
             }else{ echo "<td  class='ace' ><b>".$mostrar['FolioAccidente']."</b> </td>";
             }
                ?>
        
        <td class='<?php 
                        
            if ($mostrar['folioSiniestro'] ==""){ echo "rec"; } 
            else{ echo "ace"; }
                            
              ?>'><?php echo $mostrar['folioSiniestro'] ?></td>
        
        <td><?php echo $mostrar['appPaRepor'] ?></td>
        <td><?php echo $mostrar['appMaRepor'] ?></td>
        <td><?php echo $mostrar['nombreRepor'] ?></td>

        <td><b><?php
        
            echo $mostrar['correoEscuela'];
     
        
        
        ?></b></td>


        <td><?php echo $mostrar['telefonoReportante'] ?></td>
        <td ><?php echo $mostrar['descRepor'] ?></td>
            <td><?php 
            $times = explode(" ",  $mostrar['fechaRepor'] );
            echo $times[0];
           ?></td> 
            <td><?php echo $times[1]; ?></td>

            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
            <td><?php echo $mostrar['SegundoApellidoA'] ?></td>
            <td><?php echo $mostrar['NombreA'] ?></td>
            <td><?php echo $mostrar['FechaNacimientoA'] ?></td>
            
            <td><?php echo $mostrar['EdadA'] ?></td>
            <td><?php echo $mostrar['SexoA'] ?></td>
            <td><?php echo $mostrar['poblacionAccidentado'] ?></td>
            
          


            <td><?php echo $mostrar['CalleA'] ?></td>
            <td><?php echo $mostrar['Colonia'] ?></td>
            <td><?php echo $mostrar['AlcaldiaMunicipio'] ?></td>
            <td><?php echo $mostrar['idCP'] ?></td>
            
            
              
            <td><?php echo $mostrar['indigenaAcc'] ?></td>
            <td><?php echo $mostrar['dialectoAcc'] ?></td>
            <td><?php echo $mostrar['dialectoAccEs'] ?></td>
            <td><?php echo $mostrar['curpAcc'] ?></td>


            <td><?php echo $mostrar['apRes'] ?></td>
            <td><?php echo $mostrar['amRes'] ?></td>
            <td><?php echo $mostrar['nombreRes'] ?></td>


            <td><?php echo $mostrar['telFiRes'] ?></td>
            <td><?php echo $mostrar['telCelRes'] ?></td>
          
            <td><b><?php echo $mostrar['tipoDeCobertura'] ?></b></td>
            <td><?php echo $mostrar['GradoEscolarA'] ?></td>

            <td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php
            
            
            $dir = explode(", ",  $mostrar['dirEscRepor'] );
            echo $dir[0];
            ?></td>
            <td><?php echo $dir[2]; ?></td>
            <td><?php echo $dir[1]; ?></td>
            <td><?php echo $dir[3]; ?></td>
            <td><?php echo $dir[4]; ?></td>


            <td><?php echo $mostrar['regionPrincipal'] ?></td>
            <td><?php echo $mostrar['diagnosticosLista'] ?></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td>
            
            <td><b><?php echo $mostrar['idTipoDeAccidente'] ?></b></td>

            <td><b><?php echo $mostrar['resultadosEncuesta'] ?></b></td>
            <td><b><?php echo $mostrar['documentosFaltantes'] ?></b></td>
            <td><b><?php echo $mostrar['observacionesQueja'] ?></b></td>
            <td><?php echo $mostrar['diagnosticosAcc'] ?></td>
            <td ><?php echo $mostrar['procedimientosAcc'] ?></td>
            <td><b><?php echo $mostrar['fechaEgreso'] ?></b></td>
            <td><b><?php 
            $time = explode(" ",  $mostrar['fechaHoraAccidente'] );
            echo $time[0];
           ?></b></td>
            <td><b><?php echo $time[1];  ?></b></td>



           
            <td><b><?php echo $mostrar['idLugarAccidente'].", ".$mostrar['lugarAccIn'] ?></b></td>
            <td><b><?php echo $mostrar['reservaTecnica'] ?></b></td>
            <td><b><?php //echo $mostrar['montosErogados']
             $pqt= explode("$",$mostrar['paqueteHosAcc']);
             $pq = $pqt[1];
 
 $pq1 = rtrim($pq,")");
 $pq2 = ltrim($pq1,"(");

 echo "$ ".$pq2;
            
            ?></b></td>
            
          
            
            <td><?php
           

           $pq3 = $pq2+($pq2*0.16);
           
           echo "$ ".$pq3;
                       ?></td>
                       <td><b><?php echo $mostrar['honorariosMedicos'] ?></b></td>
            <td><b><?php echo $mostrar['tipoDeAtencion'] ?></b></td>
            <td></td>
            <td></td>
            <td><b><?php echo $mostrar['tipoDeTramite'] ?></b></td>
            
            <td><b><?php echo $mostrar['tipoLesion'] ?></b></td>
            <td><b><?php echo $mostrar['comentarioAccidente'] ?></b></td>
       
            <td><b><?php echo $mostrar['notasAcc'] ?></b></td>
            <td></td>
            <td><b><?php echo $mostrar['tipollamada'] ?></b></td>
            <td><b><?php echo $pqt[0]; ?></b></td>

            
		</tr>
        
	<?php 
	}
	 ?>
    </table>
<?php
}



function archivosPorTipoSA(){
	$conexion = con();

$sqlF="SELECT * FROM vasegurobd.cat_archivos;";
          
          
          $resultF=mysqli_query($conexion,$sqlF);
          while($mostrar=mysqli_fetch_array($resultF)){
  echo "<div class='col-3'>
  <span class='accdet'>".$mostrar['cat_nomArchivo']."</span>
  <center>
  
  <input type='file' name='".$mostrar['name']."[]' id='".$mostrar['name']."' multiple>
  
  </center>
  <label><br></label>
  </div>";
  
          }
  
}


function selectEncuesta($encAc){
	$conexion = con();

$sqlE="SELECT encuesta FROM vasegurobd.cat_encuesta WHERE encuesta != ''";
if ($encAc == ""){ $encAc = "MUY SATISFACTORIA"; }
          
echo "

<select name='resultadoEncuesta' id='resultadoEncuesta'>
<option >".$encAc."</option>

";    
          $resultE=mysqli_query($conexion,$sqlE);
          while($mostrar=mysqli_fetch_array($resultE)){
  echo "
  <option>".$mostrar['encuesta']."</option>";
  
          }
  echo "</select> ";
  
} 



function selectTip($segTip){
	$conexion = con();

$sqlE="SELECT * FROM vasegurobd.cat_segtipi;";

if($segTip == ""){$segTip = "NORMAL";}
          
echo "

<select name='segTip' id='segTip' >
<option >".$segTip."</option>
";    
          $resultE=mysqli_query($conexion,$sqlE);
          while($mostrar=mysqli_fetch_array($resultE)){
  echo "
  <option value='".$mostrar['idsegtipi']."'>".$mostrar['idsegtipi']."-".$mostrar['tipificacion']."-"."</option>";
  
          }
  echo "</select> ";
  
}


function selectPaquete($idhos, $paAc){
	$conexion = con();

$sqlE="SELECT paqueteCosto, totalCosto, costo FROM vasegurobd.cat_costohospital WHERE nombreHospitalCosto = '$idhos' ORDER BY paqueteCosto ASC";
          
echo "

<select name='montosErogados' id='montosErogados' onChange='setIVA(value,1000);'>
<option >".$paAc."</option>
<option>FUERA DE PAQUETE</option>
";    
          $resultE=mysqli_query($conexion,$sqlE);
          while($mostrar=mysqli_fetch_array($resultE)){
  echo "

  <option value='".$mostrar['costo']."'><b>PAQUETE".$mostrar['paqueteCosto']." $(".$mostrar['costo'].")</b></option>";
  
          }
  echo "</select> ";
  
}


function siniestroFo($foAcc){
	$conexion = con();


$sqlFS="SELECT * FROM vasegurobd.tb_historialfoliosiniestro WHERE folioAccidente = '$foAcc' LIMIT 0,1 ";
          

          $resultFS=mysqli_query($conexion,$sqlFS);
          while($mostrar=mysqli_fetch_array($resultFS)){

  echo " <td>".$mostrar['fechaCambio']."</td>
  <td>".$mostrar['usuarioQueCambia']."</td>";
  
          }

  
}

function espCar($id){
	$conexion = con();

  $ids = explode(",", $id);
  $idLe = count($ids);
  
  $espMed = "";

  for($i= 0; $i<=$idLe; $i++){
    $sqlSS="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]'";      
    $resultSS=mysqli_query($conexion,$sqlSS);
    while($mostrarSS=mysqli_fetch_array($resultSS)){

        $espMed = $mostrarSS['especialidadMed']."+".$espMed;
       
    }             
           
    }

echo "<td>".rtrim($espMed, "+")."</td>";
  
}

function dxCar($id){
	$conexion = con();

  $ids = explode(",", $id);
  $idLe = count($ids);
  

  
$DCOM = "";
for($i= 0; $i<=$idLe; $i++) {
    $sqlPD="SELECT claveDP, idSerAd, NOMBRE, CATALOG_KEY, pdcomen
    FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos D
    WHERE PD.idSerAD = '$ids[$i]'
    AND PD.tipoDP = 'D'
    AND PD.claveDP = D.CATALOG_KEY"; 


    $resultPD=mysqli_query($conexion,$sqlPD);
    $i="1";
    while($mostrarPD=mysqli_fetch_array($resultPD)){
        $DCOM = strtoupper($DCOM."<br><b>".$mostrarPD['CATALOG_KEY']."-</b>".$mostrarPD['NOMBRE']."<br><i>(".$mostrarPD['pdcomen'].")</i><br>."); 
      $i = $i + 1;

    }
         
  }

echo "<td>".$DCOM."</td>";
  
}


function proCar($id){
	$conexion = con();

  $ids = explode(",", $id);
  $idLe = count($ids);
  

  
$PCOM = "";
for($i= 0; $i<=$idLe; $i++) {
  $sqlP="SELECT claveDP, idSerAd, PRO_NOMBRE, CATALOG_KEY, pdcomen
  FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_procedimientos P
  WHERE PD.idSerAD = '$ids[$i]'
  AND PD.tipoDP = 'P'
  AND PD.claveDP = P.CATALOG_KEY"; 


$i="1";
  $resultP=mysqli_query($conexion,$sqlP);
  while($mostrarP=mysqli_fetch_array($resultP)){
     

      $PCOM = strtoupper($PCOM."<br><b>".$mostrarP['CATALOG_KEY']."-</b>".$mostrarP['PRO_NOMBRE']."<i>(".$mostrarP['pdcomen'].")</i>."); 

$i = $i + 1;
  }
       
}

echo "<td>".$PCOM."</td>";
  
}


function numeroSolicitudes($foAcc){
	$conexion = con();


$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' AND estadoSolicitud = 'NUEVA' ";
$sqlT="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' ";
          

          $result=mysqli_query($conexion,$sql);
          $subrows = mysqli_num_rows($result);

          $resultT=mysqli_query($conexion,$sqlT);
          $subrowsT = mysqli_num_rows($resultT);

          echo "<b>".$subrows."</b> Solicitudes pendientes <br> <b>".$subrowsT."</b> Solicitudes en total.";
          mysqli_close($conexion);
}


function numeroSolicitudesP($foAcc){
	$conexion = con();


$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' AND estadoSolicitud = 'NUEVA' ";
          $result=mysqli_query($conexion,$sql);
          $subrows = mysqli_num_rows($result);

          echo "<b>".$subrows."</b> Solicitudes pendientes <br> <b>";

          mysqli_close($conexion);
}

function numeroSolicitudesPC($foAcc, $palabra){
	$conexion = con();


$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' AND estadoSolicitud = '$palabra' ";
          $result=mysqli_query($conexion,$sql);
          $subrows = mysqli_num_rows($result);

          echo "<b>".$subrows."</b> Solicitudes con estatus $palabra <br> <b>";

          mysqli_close($conexion);
}

function ultimaFecha($foAcc){
  
	$conexion = con();
        $fech = "SELECT * FROM vasegurobd.tab_serviciosadicionales 
        WHERE folioAccidenteServicio = '$foAcc' ORDER BY fechaSolicitud DESC LIMIT 0,1";

        $resultf=mysqli_query($conexion,$fech);
    
     
$fecha="";
$fechaR="";
$estado="";
        //ULTIMA FECHA DE SOLICITUD
       while($mostrar=mysqli_fetch_array($resultf)){
            $fecha = $mostrar['fechaSolicitud'];
            $fechaR = $mostrar['fechaRespuesta'];
            $estado = $mostrar['estadoSolicitud'];

         
            
        } 

diasTardanza($fecha, $estado, $fechaR); 
mysqli_close($conexion);
?>
<?php
}


function montoAprobado($foAcc){
	$conexion = con();

        $con = "SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' ";
        $result2=mysqli_query($conexion,$con);
        $total = "0";
//SUMATORIA
while($milista=mysqli_fetch_array($result2)){
  if ($milista['estadoSolicitud'] == 'APROBADA' AND $milista['estadoDatos'] == 'SI' ){
      $total = $total + $milista['costoServicio'];
      
  } 
}



$actMont="UPDATE vasegurobd.tb_accidentes 
SET montoAuSol = '$total' 
WHERE FolioAccidente = '$foAcc'"; 
//$result3=mysqli_query($conexion,$actMont); 
?>
<td class="<?php 
            if ($total < 100000 ){
                echo 'pen';
            }
            elseif ($total >= 100000 AND $total < 200000){
                echo 'enhos';
            }
            elseif ($total >= 200000){
                echo 'dup';
            }
            ?>"><b>$<?php echo $total; ?></b></td>

<?php 
mysqli_close($conexion);

}

function montoAprobadoTotal(){
	$conexion = con();

        $con = "SELECT * FROM vasegurobd.tab_serviciosadicionales ";
        $result2=mysqli_query($conexion,$con);
        $total = "0";
//SUMATORIA
while($milista=mysqli_fetch_array($result2)){
  if ($milista['estadoSolicitud'] == 'APROBADA' AND $milista['estadoDatos'] == 'SI' ){
      $total = $total + $milista['costoServicio'];
      
  } 
}

echo "$ ".$total;

mysqli_close($conexion);

}






function accidentesHoy(){
  $link = con();
  $time = time();
  $fechaHoy = date('Y-m-d', $time);

  $du= "SELECT * FROM vasegurobd.tb_accidentes WHERE DATE(fechaRepor) = '$fechaHoy'";
     $dup=mysqli_query($link,$du); 
     $dupl = mysqli_num_rows($dup);
  echo "(".$dupl.")";

  mysqli_close($link);
}

function accidentesMes(){
  $link = con();
  $time = time();
  $fechaHoy = date('Y-m-d', $time);
  $mes = date('m');

  $duM= "SELECT * FROM vasegurobd.tb_accidentes WHERE MONTH(fechaRepor) = '$mes'";
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "(".$duplM.")";
     mysqli_close($link);
}

function esPeAcc($estatus, $fechaIn, $fechaFin){
  $link = con();
  $date2 = "";
  if($fechaFin != ''){
  $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
  }
  

  $duM= "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE idEstatus = '$estatus' AND fechaRepor BETWEEN '$fechaIn' AND '$date2'";
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "<td class = 'pen'><b>".$duplM."</b></td>";
     mysqli_close($link);
}

function peAcc($fechaIn, $fechaFin){
  $link = con();
  $date2 = "";
  if($fechaFin != ''){
  $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
  }
  

  $duM= "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE fechaRepor BETWEEN '$fechaIn' AND '$date2'";
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "<label style='color: darkblue;'>$duplM</label><label> ACCIDENTES EN EL PERIODO <b>$fechaIn - $fechaFin</b></label>";
     mysqli_close($link);
}

function esPeHos($hos, $fechaIn, $fechaFin){
  $link = con();
  $date2 = "";
  if($fechaFin != ''){
  $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
  }
  

  $duM= "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE numHospital = '$hos' AND fechaRepor BETWEEN '$fechaIn' AND '$date2'";
  
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "<td style = 'pen'><b>".$duplM."</b></td>";
     mysqli_close($link);
  
}

function esHos($hos){
  $link = con();

  $duM= "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE numHospital = '$hos'";
  
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "<td  class='pen'><b>".$duplM."</b></td>";
     mysqli_close($link);
  
}

function esPeSi($usu, $fechaIn, $fechaFin){
  $link = con();
  $date2 = "";
  if($fechaFin != ''){
  $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
  }
  

  $duM= "SELECT folioAccidente FROM vasegurobd.tb_historialfoliosiniestro WHERE usuarioQueCambia = '$usu'AND folioSiniestro != '' AND fechaCambio BETWEEN '$fechaIn' AND '$date2'";
  
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "<td class = 'pen'><b>".$duplM."</b></td>";
     mysqli_close($link);
}

function esSi($usu){
  $link = con();
 

  $duM= "SELECT folioSiniestro FROM vasegurobd.tb_historialfoliosiniestro WHERE usuarioQueCambia = '$usu'";
  
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "<td class='pen'><b>".$duplM."</b></td>";
     mysqli_close($link);
}

function esPeUs($usu, $fechaIn, $fechaFin){
  $link = con();
  $date2 = "";
  if($fechaFin != ''){
  $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
  }
  

  $duM= "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE idUsuario = '$usu' AND fechaRepor BETWEEN '$fechaIn' AND '$date2'";
  
     $dupM=mysqli_query($link,$duM); 
     $duplM = mysqli_num_rows($dupM);
     echo "<td class = 'pen'><b>".$duplM."</b></td>";
     mysqli_close($link);
  
}


function noCartas($foAcc){
  $link = con();
  

  $duM= "SELECT id_carta FROM vasegurobd.tb_cartasgarantia WHERE folioAccidente = '$foAcc'";
  $dupM=mysqli_query($link,$duM); 
  $duplM = mysqli_num_rows($dupM);

  return $duplM;
  mysqli_close($link);
}

function noCartasPE($foAcc, $fechaIn,$fechaFin){
  $link = con();
  $date2 = "";
  if($fechaFin != ''){
  $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
  }
  

  $duM= "SELECT id_carta FROM vasegurobd.tb_cartasgarantia WHERE folioAccidente = '$foAcc' AND fechaRepor BETWEEN '$fechaIn' AND '$date2'";
  $dupM=mysqli_query($link,$duM); 
  $duplM = mysqli_num_rows($dupM);

  return $duplM;
  mysqli_close($link);
}



function accSiHos($hos){
  $link = con();
  

  $duM= "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE numHospital = '$hos'";
  $dupM=mysqli_query($link,$duM); 
  
$i="0";

  while($mostrar=mysqli_fetch_array($dupM)){
$no = noCartas($mostrar['FolioAccidente']);
    if ($no <1){ $i= $i+1; }
  }

  
     echo "<b>".$i."</b>";
     mysqli_close($link);
      }


function accSCHos($hos){
        $link = con();
        
      
        $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE ultimaCarta IS NULL AND idHos ='$hos'";
        $dupM=mysqli_query($link,$duM); 
        
      $duplM = mysqli_num_rows($dupM);

      echo "<td class = 'pen'><b>".$duplM."</b></td>";
      mysqli_close($link);
           mysqli_close($link);
}

function accSCHosPe($hos,$fechaIn, $fechaFin){
              $link = con();
              $date2 = "";
      if($fechaFin != ''){
      $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
      }
      
            
              $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE ultimaCarta IS NULL AND idHos ='$hos' AND fechaSolicitud BETWEEN '$fechaIn' AND '$date2' ";
              $dupM=mysqli_query($link,$duM); 
              
            $duplM = mysqli_num_rows($dupM);
     
            echo "<td class = 'pen'><b>".$duplM."</b></td>";
            mysqli_close($link);
                 mysqli_close($link);
      
                  }



      function accSAHos($hos, $estatus){
        $link = con();
        
      
        $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE idHos = '$hos' AND estadoSolicitud ='$estatus'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }

      function auCon($au){
        $link = con();
        
      
        $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE autorizacion = '$au'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }

      function auConPe($au, $fechaIn, $fechaFin){
        $link = con();
        $date2 = "";
      if($fechaFin != ''){
      $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
      }
      
        $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE autorizacion = '$au' AND fechaSolicitud BETWEEN '$fechaIn' AND '$date2' ";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }


    function subConPe($sub, $fechaIn, $fechaFin){
        $link = con();
        $date2 = "";
      if($fechaFin != ''){
      $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
      }
    
        $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE subsecuencia = '$sub' AND fechaSolicitud BETWEEN '$fechaIn' AND '$date2'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }


      function subCon($sub){
        $link = con();
        
      
        $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE subsecuencia = '$sub'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

           echo "<td>".$duplM."</td>";
           mysqli_close($link);
        
      }

      function usuCar($us){
        $link = con();
        
      
        $duM= "SELECT id_carta FROM vasegurobd.tb_cartasgarantia WHERE usuarioGen= '$us'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }

      function camUs($us){
        $link = con();
        
      
        $duM= "SELECT id_cambio FROM vasegurobd.tb_historialcambios WHERE usuarioQueModifica= '$us'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }

      function camUsPE($us, $fechaIn, $fechaFin){
        $link = con();
        $date2 = "";
      if($fechaFin != ''){
      $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
      }
    
        $duM= "SELECT id_cambio FROM vasegurobd.tb_historialcambios WHERE usuarioQueModifica = '$us' AND horaDeCambio BETWEEN '$fechaIn' AND '$date2'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }

      function usuCarPe($us, $fechaIn, $fechaFin){
        $link = con();
        $date2 = "";
        if($fechaFin != ''){
        $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
        }
      
        $duM= "SELECT id_carta FROM vasegurobd.tb_cartasgarantia WHERE usuarioGen= '$us' AND fechaGeneracion BETWEEN '$fechaIn' AND '$date2'";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }


      function accSAHosP($n,$hos, $estatus, $fechaIn, $fechaFin){

        $link = con();
        $date2 = "";
      if($fechaFin != ''){
      $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
      }
      
            
      
        $duM= "SELECT id_servicio FROM vasegurobd.tab_serviciosadicionales WHERE idHos = '$hos' 
        AND estadoSolicitud ='$estatus'  AND fechaSolicitud BETWEEN '$fechaIn' AND '$date2' ";
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

        echo "<td class = 'pen'><b>".$duplM."</b></td>";
           mysqli_close($link);
        
      }



function accSiHosPE($hos, $fechaIn, $fechaFin){
  $link = con();
  

  $duM= "SELECT FolioAccidente FROM vasegurobd.tb_accidentes WHERE numHospital = '$hos'";
  $dupM=mysqli_query($link,$duM); 
  
$i="0";
  while($mostrar=mysqli_fetch_array($dupM)){
$no = noCartasPE($mostrar['FolioAccidente'], $fechaIn, $fechaFin);
    if ($no <1){ $i= $i+1; }
  }
     echo "<b>".$i."</b>";
     mysqli_close($link);
  
}

function fs2($foAcc){
  $conexion = con();
  

  $con = "SELECT id_servicio, estadoSolicitud, estadoDatos, costoServicio FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' ";
  $result2=mysqli_query($conexion,$con);
  $total = "0";
//SUMATORIA
while($milista=mysqli_fetch_array($result2)){
if ($milista['estadoSolicitud'] == 'APROBADA' AND $milista['estadoDatos'] == 'SI' ){
$total = $total + $milista['costoServicio'];

} 
}



if ($total < 100000){
  echo "<label style='color: red'>PARA INGRESAR EL FOLIO DE SINIESTRO 2, EL MONTO AUTORIZADO PARA HOSPITAL DEBE SUPERAR $100,000 MXN</label><br>
  <label>MONTO ACTUAL AUTORIZADO:</label><label style='color: black'>$ $total </label>";
} else {
  echo "<label style='color: red'>PARA INGRESAR EL FOLIO DE SINIESTRO 2, EL MONTO AUTORIZADO PARA HOSPITAL DEBE SUPERAR $100,000 MXN</label><br>
  <label>MONTO ACTUAL AUTORIZADO:</label><label style='color: black'>$ $total </label>";
?>

<input placeholder="INGRESE FOLIO DEL SINIESTRO 2"   
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
      id="folioSiniestro2" name="folioSiniestro2"   
      
      value="<?php echo $mostrar['folioSiniestro2']; ?>">




<?php
}
     mysqli_close($link);
  
}




function hojaencuesta($foAcc){
  $link = con();
 
  $sqlhe= "SELECT ruta, fechaDeCarga FROM vasegurobd.tb_rutasarchivos WHERE tipo = 'HOJA ENCUESTA' AND folioAcc = '$foAcc'";
  
     $dupM=mysqli_query($link,$sqlhe); 
     $duplM = mysqli_num_rows($dupM);


     if ($duplM > 0){
     echo $duplM." Archivos asociados a este accidente
     <table>
     ";
     
     while($mostrar=mysqli_fetch_array($dupM)){

      echo " <tr>
      <td><a href='".$mostrar['ruta']."' target ='_blank'>".$mostrar['ruta']."</a></td>
      <td>".$mostrar['fechaDeCarga']."</td>
      <tr>";
              }
      echo "</table>";

     } else { echo "NO HAY ARCHIVOS DE HOJA DE ENCUESTA ASOCIADOS A ESTE ACCIDENTE";}

     mysqli_close($link);
  
}



function diasSol($fecha){

  $conexion = con();
  $time = time();
  $fechaHoy = date('Y-m-d', $time);
  $hora = date("H-i-s", $time);
  $fechaID = $fechaHoy." ".$hora;
  
  $con = "SELECT TIMEDIFF('$fechaID','$fecha') AS DateDiff   ";

  $result2=mysqli_query($conexion,$con);

  
//SUMATORIA
while($milista=mysqli_fetch_array($result2)){
echo " HACE ".$milista['DateDiff']." HORAS";

} 

mysqli_close($conexion);
}

function diasTardanza($fecha, $estado, $fechaR){

$conexion = con();
  date_default_timezone_set('america/mexico_city');
  $time = time();
  $fechaHoy = date('Y-m-d', $time);
  $hora = date("H-i-s", $time);
  $fechaID = $fechaHoy." ".$hora;

  if($estado == "NUEVO" OR $estado == "NUEVA" ){
    $con = "SELECT TIMEDIFF('$fechaID','$fecha') AS DateDiff ";
  } else {
    $con = "SELECT TIMEDIFF('$fechaR','$fecha') AS DateDiff ";
  }
  
  $result2=mysqli_query($conexion,$con);
  
//SUMATORIA
  while($milista=mysqli_fetch_array($result2)){

if($milista['DateDiff'] > 24){
  echo " <td class='rec'> Tiempo de respuesta:<br><b>".$milista['DateDiff']."</b> <br> Solicitado el:<br><b> ".$fecha."</b></td>"; }

if($milista['DateDiff'] < 2) {  
  echo " <td class='pen'>Tiempo de respuesta:<br><b>".$milista['DateDiff']."</b> <br> Solicitado el: <br><b>".$fecha."</b></td>";  }


if($milista['DateDiff'] >= 2 AND $milista['DateDiff'] <= 24 ) {  
  echo " <td class='enhos'>Tiempo de respuesta:<br><b>".$milista['DateDiff']."</b> <br> Solicitado el:<br><b> ".$fecha."</b></td>";  }
}

mysqli_close($conexion);
}


function chatMed($idSA, $tip){
  
	$conexion = con();
        $fech = "SELECT * FROM vasegurobd.tb_comentariosa
        WHERE idSA = '$idSA' ORDER BY fechaCom";

        $resultf=mysqli_query($conexion,$fech);
    ?>

<span class="textSection">MENSAJES</span>
        <label>
        
        <?php
while($mostrar=mysqli_fetch_array($resultf)){

  if ($mostrar['tipo'] == "M"){
echo "<label style=' color: darkred;'>";
  }elseif ($mostrar['tipo'] == "S"){
    echo "<label style=' color: darkgreen;'>";
      }

      
  echo "<label style='font-size: 10px; color: gray;'>".$mostrar['autorCom']."(".$mostrar['fechaCom'].")</label><br><b>".$mostrar['comentario']."</b><br><br>";
   echo "</right></label>";
 
} 


?> 

</label>
<label>
  <input 
  style="
    background-color: white;
    color: black;
    font-size: 9px;" placeholder="Escriba su mensaje" id="nuevoMensaje">

<button type="button" style="width: 100px; background-color: #6789DC;" onclick="enviarMensaje('<?php echo $tip; ?>')"> ENVIAR <img src="../images/send.png" width="17px" height="15px"> </button>
<button type="button" style="width: 135px; background-color: #6789DC;" onclick="actualizarMensajes('<?php echo $tip; ?>')"> ACTUALIZAR <img src="../images/refresh.png" width="13px" height="13px"> </button>
</label>
<?php
mysqli_close($conexion);
      }


function siniestro(){
?>
 <div class="col-1">
      <span class="textSectionRED">
     FOLIO DE SINIESTRO: </span>
     <span class="accdet">ADVERTENCIA: AL LLENAR ESTE APARTADO, EL ACCIDENTE PASARA AL ESTATUS FINALIZADO</span>
     <label>
      <input placeholder="INGRESE FOLIO DEL SINIESTRO"   
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color: #A8D3EF;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;"  
      id="folioSiniestro" name="folioSiniestro"   
      
      value="<?php ?>" >
      </label>
      </div>
      <div class="col-1">
    <label>
      TIEMPO PARA GENERAR SINIESTRO (Minutos): 
      <input id="tiempoS"
      style="
  border:none;
    border-bottom: 1px solid #1890ff;
    background-color:white;
    color: darkblue;
    font-size: 12px;
    padding: 5px 10px;
    outline: none;" 
       name="tiempoS"  
       type="number"
       min = "1"
       max = "60"
       value="<?php  ?>" >
    </label>
  </div> 

<?php
 } function serviciosAdicionales(){
  ?>

<div class="col-2">
  <label onclick="showCiru()" style="font-size: 13px; color: darkgreen;">><u>PROCEDIMIENTOS</u><img src='../images/plus.png' height='12'  width='12' ></label>
  <script>
    function showCiru(){
      document.getElementById('ciru').style.display = 'block';
      $('#ciru').prop('required', true);
      document.getElementById('ciruN').style.display = 'block';
      $('#ciruN').prop('required', true);
      document.getElementById('anesDiv').style.display = 'inline-block';
     
      document.getElementById('ayuDiv').style.display = 'inline-block';
    
      document.getElementById('anesNDiv').style.display = 'inline-block';
     
      document.getElementById('ayuNDiv').style.display = 'inline-block';
     
      document.getElementById('ayuDiv2').style.display = 'inline-block';
      
      document.getElementById('ayuNDiv2').style.display = 'inline-block';
     
      document.getElementById('closeCiru').style.display = 'inline-block';
     

    }    
    </script>

  <label>
  <input id="ciru" name="ciru" type="number" placeholder="$ MONTO DEL CIRUJANO" step="0.01" class="ciru" style="background: #8CE19F; color: black; font-size: 11px; display: none;">
  </label>
</div>
<div class="col-2">
  <label>
  <input id="ciruN" name="ciruN" placeholder="ESPECIFICACIONES DEL CIRUJANO" class="ciru" style="background: #8CE19F; color: black; font-size: 11px; display: none;">
  </label>
</div>      
              
<div class="col-2" id="anesDiv" style="display: none;">
  <label>ANESTESILOGO(MONTO):
  <input id="anes" name="anes" type="number" step="0.01" placeholder="$ MONTO" class="ciru"  style="background: #8CE19F; color: black; font-size: 11px;">
  </label>
</div>
<div class="col-2" id="anesNDiv" style="display: none;">
  <label>NOMBRE ANESTESILOGO:
  <input id="anesN" name="anesN" placeholder="ESPECIFICACIONES DEL ANESTESIOLOGO" class="ciru" style="background: #8CE19F; color: black; font-size: 11px;">
  </label>
</div>  

<div class="col-2" id="ayuDiv" style="display: none;">
  <label>AYUDANTE(MONTO):
  <input id="ayud" name="ayud" type="number" step="0.01" placeholder="$ MONTO" class="ciru"  style="background: #8CE19F; color: black; font-size: 11px;">
  </label>
</div>
<div class="col-2" id="ayuNDiv" style="display: none;">
  <label>NOMBRE AYUDANTE :
  <input id="ayudN" name="ayudN" placeholder="ESPECIFICACIONES DEL AYUDANTE" class="ciru" style="background: #8CE19F; color: black; font-size: 11px;">
  </label>
</div>  

<div class="col-2" id="ayuDiv2" style="display: none;">
  <label>AYUDANTE 2 (MONTO):
  <input id="ayud2" name="ayud2" type="number" step="0.01" placeholder="$ MONTO" class="ciru" style="background: #8CE19F; color: black; font-size: 11px;">
  </label>
</div>
<div class="col-2" id="ayuNDiv2" class="ciru" style="display: none;">
  <label>NOMBRE AYUDANTE 2:
  <input id="ayudN2" name="ayudN2" placeholder="ESPECIFICACIONES DEL AYUDANTE" class="ciru"  style="background: #8CE19F; color: black; font-size: 11px;">
  </label>
</div> 

<div class="col-2">
  
<label onclick="closeCiru()" id="closeCiru" style="color: red; font-size: 10px; display: none;"><u>CERRAR</u></label>

  </div>
  <div class="col-2">
  <script>
    function closeCiru(){
      document.getElementById('ciru').style.display = 'none';
      document.getElementById('ciru').value = "";
      $('#ciru').removeAttr("required");
      document.getElementById('ciruN').style.display = 'none';
      document.getElementById('ciruN').value = "";
      $('#ciruN').removeAttr("required");
      document.getElementById('anesDiv').style.display = 'none';
      document.getElementById('anesDiv').value = "";
      $('#anesDiv').removeAttr("required");
      document.getElementById('ayuDiv').style.display = 'none';
      document.getElementById('ayuDiv').value = "";
      $('#ayuDiv').removeAttr("required");
      document.getElementById('anesNDiv').style.display = 'none';
      document.getElementById('anesNDiv').value = "";
      $('#anesNDiv').removeAttr("required");
      document.getElementById('ayuNDiv').style.display = 'none';
      document.getElementById('ayuNDiv').value = "";
      $('#ayuNDiv').removeAttr("required");
      document.getElementById('ayuDiv2').style.display = 'none';
      document.getElementById('ayuDiv2').value = "";
      $('#ayuDiv2').removeAttr("required");
      document.getElementById('ayuNDiv2').style.display = 'none';
      document.getElementById('ayuNDiv2').value= "";
      $('#ayuNDiv2').removeAttr("required");
      document.getElementById('closeCiru').style.display = 'none';

      

    }    

    </script>
  </div>




<div class="col-2">
  <label onclick="showCon()" 
  style="font-size: 13px; color: darkgreen;">><u>CONSULTA</u><img src='../images/plus.png' height='12'  width='12' ></label>
  <label>
  <script>
    function showCon(){
      document.getElementById('consul').style.display = 'inline-block';
      document.getElementById('consulDet').style.display = 'inline-block';
      document.getElementById('closeConsul').style.display = 'inline-block';

    }    
    </script>


  <input id="consul" name="consul" class="consulta" type="number" step="0.01" placeholder="$ MONTO" style="background: #F4EF8B; color: black; font-size: 11px; display: none;">
  </label>
</div>
<div class="col-2">
  <label>
  <input id="consulDet" name="consulDet" class="consulta" placeholder="ESPECIFICACIONES" style="background: #F4EF8B; color: black; font-size: 11px; display: none;">
  </label>
</div>      
<div class="col-2">
  
<label onclick="closeConsul()" id="closeConsul" class="consulta" style="color: red; font-size: 10px; display: none;"><u>CERRAR</u></label>

  </div>
  <div class="col-2">
  <script>
    function closeConsul(){
      document.getElementById('consul').style.display = 'none';
      document.getElementById('consulDet').style.display = 'none';
      document.getElementById('closeConsul').style.display = 'none';

      document.getElementsByClassName("consulta")[0].style.display = 'none';
      document.getElementsByClassName("consulta")[0].value ="";

    }    

    </script>
  </div>



<div class="col-2">
  <label onclick="showMed()" 
  style="font-size: 13px; color: darkgreen;">><u>MEDICAMENTOS</u><img src='../images/plus.png' height='12'  width='12' ></label>
  <script>
    function showMed(){
      document.getElementById('medi').style.display = 'inline-block';
      document.getElementById('mediEs').style.display = 'inline-block';
      document.getElementById('closeMed').style.display = 'inline-block';

    }    
    </script>
  <label>
  <input id="medi" name="medi" type="number" step="0.01" placeholder="$ MONTO MEDICAMENTOS" style="background: #9AB1F2; color: black; font-size: 11px; display: none;">
  </label>
</div>
<div class="col-2">
  <label>
  <input id="mediEs" name="mediEs" placeholder="MEDICAMENTOS  (ESPECIFICAR CUALES):" style="background: #9AB1F2; color: black; font-size: 11px; display: none;">
  </label>
</div> 
<div class="col-2">
  
<label onclick="closeMed()" id="closeMed" style="color: red; font-size: 10px; display: none;"><u>CERRAR</u></label>

  </div>
  <div class="col-2">
  <script>
    function closeMed(){
      document.getElementById('medi').style.display = 'none';
      document.getElementById('mediEs').style.display = 'none';
      document.getElementById('closeMed').style.display = 'none';


    }    

    </script>
  </div>







<div class="col-2">
  <label onclick="showTer()" 
  style="font-size: 13px; color: darkgreen;">><u>TERAPIA</u><img src='../images/plus.png' height='12'  width='12' ></label>
  <script>
    function showTer(){
      document.getElementById('tera').style.display = 'inline-block';
      document.getElementById('teraDet').style.display = 'inline-block';
      document.getElementById('closeTer').style.display = 'inline-block';

    }    
    </script>

  <label>
  <input id="tera" name="tera" type="number" step="0.01" placeholder="$ MONTO" style="background: #F5C4D3; color: black; font-size: 11px; display: none;">
  </label>
</div>
<div class="col-2">
  <label>
  <input id="teraDet" name="teraDet" placeholder="ESPECIFICACIONES" style="background: #F5C4D3; color: black; font-size: 11px; display: none;">
  </label>
</div> 
<div class="col-2">
  
<label onclick="closeTer()" id="closeTer" style="color: red; font-size: 10px; display: none;"><u>CERRAR</u></label>

  </div>
  <div class="col-2">
  <script>
    function closeTer(){
      document.getElementById('tera').style.display = 'none';
      document.getElementById('teraDet').style.display = 'none';
      document.getElementById('closeTer').style.display = 'none';


    }    

    </script>
  </div>





<div class="col-2">
  <label onclick="showOt()" 
  style="font-size: 13px; color: darkgreen;">><u>OTRO</u><img src='../images/plus.png' height='12'  width='12' ></label>
  <script>
    function showOt(){
      document.getElementById('otro').style.display = 'inline-block';
      document.getElementById('otroDet').style.display = 'inline-block';
      document.getElementById('closeOt').style.display = 'inline-block';

    }    
    </script>


<label>
  <input id="otro" name="otro" type="number" step="0.01" placeholder="$ MONTO" style="background: white; color: black; font-size: 11px; display: none;">
  </label>
</div>
<div class="col-2">
  <label>
  <input id="otroDet" name="otroDet" placeholder="ESPECIFICACIONES" style="background: white; color: black; font-size: 11px; display: none;">
  </label>
</div> 
<div class="col-2">
  
<label onclick="closeOt()" id="closeOt" style="color: red; font-size: 10px; display: none;"><u>CERRAR</u></label>

  </div>
  <div class="col-2">
  <script>
    function closeOt(){
      document.getElementById('otro').style.display = 'none';
      document.getElementById('otroDet').style.display = 'none';
      document.getElementById('closeOt').style.display = 'none';


    }    

    </script>
  </div>


<?php
 }

 function formularioPrincipal(){
?>
<div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background-color: #A5B9EB" >
    <script>
function sendForm(){

  window.onkeypress = function(event) {
  if (event.which == 32) {
   return false;
  }
}



}

</script>
     
 <!-- TRAEMOS LA INFORMACION BASICA DEL USUARIO, YA QUE SE UTILIZARA POSTERIORMENTE PARA FOLIAR AL ACCIDENTE EN CASO DE APROBACION-->
  <form action ="../functions/insertarAccidente.php" method="post" 
  id="accform" name="accform" autocomplete="off" style=" gray; border-width: 1px; border-style: solid;"
  onsubmit="return confirm('Se enviara el accidente para su respectivo proceso. ¿Desea continuar?')">
      
            <div  class="col-3" >
          <label>
          <input style="border: none" name="idUsuario" id="idUsuario" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
       
        <div class="col-3">
           <label>
               <input style="border: none" id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-3" >
      
              <label>
          <input style="border: none" placeholder="<?php 
  $fechaActual = date('Y-m-d');
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>

      <div class="col-1"> 
            <span class="textSection" >
					<p>		
          </p> 
          <br>
				  </span>
      </div> 


      <div class="col-1">
    
    <label>
    <p align="center">
   GRACIAS POR LLAMAR AL PROGRAMA VA SEGURO PARA EFECTOS DE CALIDAD EN EL SERVICIO SU LLAMADA SERÁ GRABADA.
     CONSULTE NUESTRO AVISO DE PRIVACIDAD PARA LA PROTECCIÓN DE SUS DATOS PERSONALES EN 
     <a href="https://www.segurosatlas.com.mx/" target="_blank">WWW.SEGUROSATLAS.COM.MX</a></label>
     </p>
     <br>
     <p>
     <p align="center">Buen Día/Tarde/ Noche le atiende (Nombre y apellido del ejecutivo o ejecutiva) <BR><br>¿Con quién tengo el gusto?
     <br>¿En que le puedo ayudar? <BR>¿La persona lesionada se encuentra estable? 
     </p>
     
     </label>
     </div>



      <div class="col-1"> 
            <span class="textSection" >
         
				  	</span>
      </div> 

     
       <div class="col-1"> 
            <span class="textSection" >
					 DATOS DEL REPORTANTE 
					</span>

  </div> 

<br>

      
      <div class="col-2" >  
    <label>
     1. ESTADO DE ALERTA ¿ESTA CONSCIENTE?  
      </label>
         <fieldset>
  
 <input type="radio" name="estabilidadAccidentado" id="conc" value="CONCIENTE"  required>
    <span class="textOption">
				SI <br>
					</span>
      
          </fieldset>
        
          
          <fieldset>
  <input type="radio" name="estabilidadAccidentado"  id="incon" value="INCONCIENTE">
              <span class="textOption">
					NO <br><br>
					</span> 
          </fieldset>
          <script>
          
              $('input#incon').on('change', this, function(){
                    document.getElementById('btnAmbDiv').style.display = 'block'; 
 
              });

   	     $('input#conc').on('change', this, function(){
                 document.getElementById('ambulancias').style.display = 'none'; 
              });
              

          </script>
              
        

              <br><br><br><br>    
        
  </div>
<div class="col-1" id="btnAmbDiv" style="display: none;">
<label style="color: darkred;">

 1.¿SOLICITA SERVICIO DE AMBULANCIA? <br> 

  <button class="submitbtn" id="siAmb" type="button" style="width: 50px;"> SI </button>
  <button class="submitbtn" id="noAmb" type="button" style="background: darkred; width: 50px;"> NO </button>

</label>

            </div>
<script>
$('#siAmb').on('click', this, function(){
                     document.getElementById('ambulancias').style.display = 'block'; 
                     document.getElementById('accform').style.display = 'none'; 
  
               });

               $('#noAmb').on('click', this, function(){
                     document.getElementById('ambulancias').style.display = 'none'; 
                     document.getElementById('btnAmbDiv').style.display = 'none'; 

               });

</script>
        
<div class="col-2">
    <label>
    2. Nombre de la persona que reporta el accidente:
        
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



       <div class="col-2">
    <label>
    3. Puesto: 
 <select id="puestoReportante" name="puestoReportante"  required>
  <?php                                   
                         $conexion = con();
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
      
      
  <div class="col-2">
    <label>

4. Teléfono(10 digitos): 
      <input placeholder=" INGRESE 10 DIGITOS"  id="telefonoReportante" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      name="telefonoReportante" type="tel"  maxlength="10" minlength="10"   required>
    </label>
  </div>


  
     
     
      
          

  <div class="col-1">
            <span class="textSection">
						 DATOS DE LA PERSONA ACCIDENTADA <br>
					</span>
  </div> 
      
  <div class="col-1">
  <label style="font-size: 12px; color: darkred;">
  
  <li>SOLICITA PRIMERO EL NOMBRE Y LUEGO EL CURP PERO REGISTRA PRIMERO EL CURP, O BORRARA LA INFORMACIÓN QUE REGISTRES DEBAJO</LI>
</label>
    <label>
   5. CURP DEL ACCIDENTADO:
      
      <input type="text" placeholder="CURP"  id="curpAcc" name="curpAcc"  autocomplete="off" maxlength="18" minlength="18"
      onkeyup="auAlu();"
      oninput="auAlu();"
      required> 
         
    </label>
  </div> 
  <div class="col-1">
    <label id="curpInfo"></label>
                                    </div>
      
  <div class="col-2">
    <label>
    6.  NOMBRE DE LA PERSONA ACCIDENTADA(SIN ACENTOS):
      
      <input  placeholder="APELLIDO PATERNO"  id="appPaAcc" name="appPaAcc"  autocomplete="off" onkeyup="auAppAcci();" required>
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
     7. Tipo poblacion de accidentado/a:
      <select id="poblacionAccidentado" name="poblacionAccidentado" required>
        <option value="">SELECCIONE UNA OPCION</option>
        <option>ALUMNADO</option>
        <option>DOCENTE</option>
        <option>TRABAJADOR EDUCATIVO</option>
          <option>SERVIDOR PUBLICO</option>
          <option>PRESTADOR DE SERVICIOS</option>
         
          
      </select>
      <br><br>
    </label> 
  </div>
<?php selectEstadoCivil(); ?>
 

<div class="col-1">
  <label style="font-size: 12px; color: darkred;">
  <li>PARA PERSONAS MAYORES DE 16 AÑOS PREGUNTA EL ESTADO CIVIL, MENORES COLOCA SOLTERO/A.</li>
 
</label>
 </div>     
     <div class="col-3">
    <label>


    
     <label for="start">
     8. Fecha de nacimiento de accidentado/a: </label>
<input type="date"  id="fechaNacimientoAccidentado" name="fechaNacimientoAccidentado" onchange="edad();" oninput="edad();" max="<?php echo $fechaActual;?>" required>
    </label>

<script>
  function edad(){


    var fecha = $('#fechaNacimientoAccidentado').val();
              $.ajax({
  
              url: '../functions/calcularEdad.php',
              type: 'POST',
              data: {fecha:fecha},
              success:function(data){
                  
                  $('#edadCal').show(); 
                  $('#edadCal').val(data);
               
                  
              }
          });

  }
</script>
<label style="color: darkred; font-size: 10px;"> EDAD DEL ACCIDENTADO/A AL DIA DE HOY:
<input  id="edadCal" name = "edadCal"  style="font-size: 16px; color: black; background:#C6E7E8; border-radius: 15px;" readonly>
</label>
  </div> 
      
       <div class="col-3">  
    <label>
    9. Sexo del accidentado/a: 
           </label>
     
         <fieldset>
  
             <input type="radio" name="generoAccidentado" value="MUJER" required> <span class="textOption">MUJER</span>
    
   </fieldset>
        <fieldset>
            <input type="radio" name="generoAccidentado" value="HOMBRE" required> <span class="textOption">HOMBRE</span>
              
        </fieldset>
<br><br><br><br>
           
  </div>
      
           <div class="col-3">
    <label>
    10.  GRADO ESCOLAR DEL ACCIDENTADO/A: 
      <select id="gradoEscolaridadAccidentado" name ="gradoEscolaridadAccidentado" required>
          <option value="">SELECCIONE UNA OPCION</option>
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
            <span class="textSection">
						DOMICILIO DEL ACCIDENTADO/A <br>
          </span>
          <span class="accdet">SELECCIONAR UNICAMENTE VALORES DENTRO DE LA LISTA DE AUTOCOMPLETADO<br>
          <br><b>PROPORCIONE EL CODIGO POSTAL DEL DOMICILIO DEL MENOR,</b><br>
           Y SELECCIONE UNA COLONIA DE LA LISTA DE SUGERENCIAS QUE APARECERA
          </span>
  </div> 
  <script>
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>



  <div class="col-2">
    <label style="color: darkred"><b>
    11.  CODIGO POSTAL(5 DIGITOS):   </b>
      <input placeholder="INGRESE EL CODIGO POSTAL DEL ACCIDENTADO PARA OBTENER LOS SIGUIENTES DATOS" 
       id="cpAccidentado" maxlength="5" minlength="5"
       onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
        name="cpAccidentado" onkeyup="sugerirColoniaCP()" required/>
         
    </label>
    <span class="listautocomp">
    <ul id="lista_cpList"></ul> 
    </span>

  </div> 


  <div class="col-2">
     <label style="color: darkred">
         
    12. COLONIA DEL  ACCIDENTADO:
     <input placeholder="LLENE EL CODIGO POSTAL" id="coloniaAccidentado" name="coloniaAccidentado"
     style="font-size: 16px; color: black; background:#C6E7E8; border-radius: 15px;"
      autocomplete="off" type="text" onkeyup="autocompletarColonia()" onkeypress="return false;"
      required ></label>
         <span class="listautocomp">
					<ul id="lista_colonia"></ul>  
					</span> 
        
           
           
  </div>
    
         <div class="col-2">
                <label style="color: darkred">
    13.  ESTADO:
     <input placeholder="LLENE EL CODIGO POSTAL" id="entidadAccidentado" name="entidadAccidentado" autocomplete="off"
     style="font-size: 16px; color: black; background:#C6E7E8; border-radius: 15px;" onkeypress="return false;"
      type="text" onkeyup="autocompletarEstado()" required ></label>
         <span class="listautocomp">
					<ul id="lista_estado"></ul>  
					</span>  
   
  </div>
      

  
      <div class="col-2">
   <label style="color: darkred">
    14.  ALCALDIA/MUNICIPIO DEL ACCIDENTADO/A:
     <input placeholder="LLENE EL CODIGO POSTAL" id="alcaldiaAccidentado" name="alcaldiaAccidentado"
      autocomplete="off" type="text" onkeyup="autocompletarAlcaldia()" onkeypress="return false;"
      style="font-size: 16px; color: black; background:#C6E7E8; border-radius: 15px;"
      required></label>
         <span class="listautocomp">
					<ul id="lista_id"></ul>  
					</span>        
  </div> 
         
     
      <div class="col-2">
    <label>
    15.  CALLE Y NUMERO:
          
      <input placeholder="INGRESE SU DIRECCION CON NUMERO Y DETALLES"  name="calleAccidentado"  id="calleAccidentado"
       onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            
    </label>
  </div> 
      
        <div class="col-1">
            <span class="textSection">
					DETALLES DEL ACCIDENTE <br>
					</span>
  </div> 
      
          <div class="col-1">
    <label>
    16.	Descripción del Siniestro/Accidente (15 palabras como minimo): <br>
      <textarea  name="descReportante" 
      spellcheck="true"
      minlength="30"
      maxlength="5000"
      onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
      style ="width: 100%" required></textarea>
<BR></BR>
      <p align="left">1.- ¿DONDE ESTABA?
 </p>
 <p align="left">2.- ¿QUE ESTABA HACIENDO?
 </p>
 <p align="left">3.- ¿COMO SE ACCIDENTO?
 </p>
 <p align="left">4.- ¿QUE PARTE DEL CUERPO SE LESIONO?
 </p>
 <p align="left">5.- ¿QUE SINTOMAS PRESENTA?
 </p>
    </label>
   
  </div>   
      
      <div class="col-2">


    <label>
     <label for="start">
 <label style="font-size: 12px; color: darkred;"><br></br>
 SI EL ACCIDENTE FUE OTRO DIA: RECUERDA SOLO SE TIENE 72HRS PARA LA ACTIVACIÓN, PREGUNTAR: 
 <br>¿YA RECIBIÓ ATENCIÓN MÉDICA?</br> ¿DONDE RECIBIÓ ATENCIÓN MÉDICA?
</label>
  <BR></BR>   



     17. ¿Cuando ocurrio el siniestro(Fecha)?</label>
<input type="date"  name="fechaAccidenteReportante" max="<?php echo $fechaActual;?>" required><br><br> 
    </label>
  </div>   
      
      <div class="col-2">
    <label>
     <label for="start">
     18. ¿Cuando ocurrio el siniestro(Hora)?</label>
<input type="time"  name="horaAccidenteReportante" required><br> <br> 
    </label>
  </div>


  
  <div class="col-3" style="display: none;">
      
      <label>
 19. LESION PROBABLE INICIAL:<br>
  <select id = "lesionProbableInicial" name = "lesionProbableInicial" >
  <?php 
                        $conexion = con();
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
   <CENTER> <img src='../images/MIEMBOROS DEL CUERPO.png' height='250'  width='250'></CENTER>
  </div>
 <div class="col-3" >
    <label>
      20. REGION PRINCIPAL DEL CUERPO AFECTADA: 
      <select id="regionPrincipal" name ="regionPrincipal" required>
          <option value="">SELECCIONE UNA OPCION</option>
          <option>CABEZA</option>
          <option>MEDIA</option>
          <option>MIEMBROS SUPERIORES</option>
        <option>MIEMBROS INFERIORES</option>
        
             
      </select>
    
    </label> 
    </div>
  
 <div class="col-3" style="display: none;">
      
      <label>
 21. TIPO DE EVENTO INICIAL:<br>
  <select id = "tipoDeEventoIniciaL" name = "tipoDeEventoInicial">
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
 22. TRAMO DE COBERTURA:<br>
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
                        $luacc = "SELECT DISTINCT nombreLugarAccidente  FROM vasegurobd.cat_lugaraccidente ORDER by nombreLugarAccidente ASC";
                        $resultlluacc=mysqli_query($conexion,$luacc);
                         
                        
		                             while($milista=mysqli_fetch_array($resultlluacc)){
                                        
                                     echo "<option>".$milista['nombreLugarAccidente']."</option>";
                                     }
   
                                        ?>
         
      </select>
    </label> 
  </div>
  
 
  <?php //lesionesMultiples(); ?>  
  

     
      
   <div class="col-1">
            <span class="textSection">
					ESCUELA DEL ACCIDENTADO<br>
					</span>
  </div> 
      
  <div class="col-1">
  <span class="textSectionRED"><b>IMPORTANTE:</b> A CONTINUACION, INGRESE EL NOMBRE DE LA ESCUELA, SELECCIONANDOLO DE LA LISTA PREEDICTIVA QUE APARECERA DESPUES DE QUE INGRESE MAS DE 2 CARACTERES. 
SE RELLENARAN AUTOMATICAMENTE TODOS LOS CAMPOS SIGUIENTES, PERO PUEDE EDITARLOS EN CASO DE QUE NO COINCIDAN CON LA INFORMACION QUE POSEA.
LOS DATOS QUE INGRESE SE GUARDARAN UNICAMENTE PARA ESTE REGISTRO.</span> 
                                    </div>
<div class="col-2">
    <label>
  26.  NOMBRE DE ESCUELA:    
<input placeholder="ESCRIBA  Y SELECCIONE LA OPCION CORRECTA" id="escuela_id" name="escuela_id" autocomplete="off" type="text" onkeyup="autocompletarNOMESC();" required/>           </label>
      <span class="listautocomp">
					<ul id="lista_esc"></ul>  
					</span>
      </div>  

      <div class="col-2">
    <label style="font-size: 11px; color: darkred;">
  TAMBIEN PUEDE ENCONTRAR LA  ESCUELA, INGRESANDO LA CLAVE DEL CENTRO DE TRABAJO "CCT" A CONTINUACION(OPCIONAL):    
<input placeholder="ESCRIBA  LA CLAVE(OPCIONAL)" id="claEs" name="claEs" 
style="font-size: 12px; color: black; background:#C6E7E8; border-radius: 15px;" 
autocomplete="off" type="text" onkeyup="autocompletarCLAVEESC();" >           </label>
      <span class="listautocomp">
					<ul id="lista_escCla"></ul>  
					</span>
      </div> 
      
      
      <div class="col-1">

    <label>
  ESCUELA SELECCIONADA(SE REGISTRARA LA SIGUIENTE):    
<input   style="font-size: 12px; color: black; background:#C6E7E8; border-radius: 15px;" 
id="escuelaSel" name="escuelaSel"  required readonly>           </label>
      
      </div>  
      
     
   
      <div class="col-3">
    <label>
     27. CALLE Y NUMERO(SI NO ES CORRECTO PUEDE EDITARLO): 
      <input placeholder="CALLE Y NUMERO DE LA ESCUELA DEL ACCIDENTADO"  
      name="calleEscuela" id="calleEscuela" autocomplete="off" type="text" required>
      
         
    </label>
  </div>
       <div class="col-3">
    <label>
     28. ALCALDIA:
     <input placeholder="ALCALDIA A LA QUE PERTENECE LA ESCUELA" 
     id="alcaldiaEscuela" name="alcaldiaEscuelaAccidentado" autocomplete="off" type="text"  required>
       
    </label> 
  </div> 

  <div class="col-3">
    <label>
     29. COLONIA:
     <input placeholder="COLONIA A LA QUE PERTENECE" 
     id="coloniaEscuela" name="coloniaEscuela" autocomplete="off" type="text"  required>
       
    </label> 
  </div> 
      

      
       <div class="col-3">
    <label>
     30. CODIGO POSTAL:
          
      <input placeholder="CODIGO POSTAL DEL ACCIDENTADO" 
      id="cpEscuela" 
      maxlength="5" minlength="5"
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      name="cpEscuela"  required>
      
         
    </label>
  </div>
      
      <div class="col-3">
    <label>

31. Teléfono: 
      <input placeholder="TELEFONO DE LA ESCUELA" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      type="tel"  maxlength="10" minlength="10"
       id="telefonoEscuela" 
       name="telefonoEscuela"  required><br> 
    </label>
  </div>
      
  <div class="col-3">
    <label>
32. CORREO ELECTRONICO: 
      <input placeholder="CORREO DE LA ESCUELA"  id="correoEscuela" name="correoEscuela" type="email"   required>
    </label>
  </div>
      
            <div class="col-1">
           
              <label> 
     <input placeholder="Si ve este mensaje, debe seleccionar OBLIGATORIAMENTE un valor de la lista preedictiva de escuelas"
     style="font-size: 12px; color: darkgreen ; background:#CCFFCC; border-radius: 15px;" 
      id="idEscuela" name="idEscuela" autocomplete="off" onchange="valid();" onkeypress="return false;" required>
                                    </label>
                                    <script>

                           
    

                                      </script>
  </div>
      
   
        
      
       <div class="col-1">
            <span class="textSection">
					SELECCIONAR HOSPITAL O SUGERENCIA DE HOSPITAL<br>
					</span>
  </div> 
  
       <div class="col-1">
                <label> 
                33. Hospital SELECCIONADO:
     <input type="text" class="readonly" placeholder="SELECCIONE UNA SUGERENCIA O UN HOSPITAL DEL CATALOGO, CUANDO LO HAGA APARECERA AQUI " 
     style="font-size: 12px; color: black; background:#C6E7E8; border-radius: 15px;"
     id="idHospital" name="idHospital" onkeypress="return false;" 
     required/>
     
     <input type="number" class="readonly"
     id="id_hos" name="id_hos" 
     onkeypress="return false;"
     style="font-size: 12px; color: black; background:#C6E7E8; border-radius: 15px;" required/>
     <div class="col-1">
        
        <span class="textOption" id="infoEsp" name="infoEsp" ></span>
   </div>

     <script>
  $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>
           </label>
           <span class="accdet"><b>SUGERENCIAS DE HOSPITAL, SEGUN LA ALCALDIA DONDE SE UBICA LA ESCUELA</b></span>
  </div> 
     
	<table border="1">
	  
       </div> 

            
           
  <table id="tabSugHos" name="tabSugHos" border="1"></table>
  <div class="col-1" id="kmBus" style="display: none;">  
  <span class="accdet">SUGERENCIAS DE HOSPITAL, SEGUN LA CERCANIA POR KILOMETROS</span>
  <table id="tabSugHosKM" name="tabSugHosKM" border="1"></table>
                                    </div>              
    <script>

$('#tabSugHos').on('click','tr',function(){
  var dato = $(this).find('td').eq(0).text();    
    $('#idHospital').show();
    $('#idHospital').val(dato);

    $.ajax({


url: '../functions/idHos.php',
type: 'POST',
data: {hos:dato},
success:function(data){
   $('#id_hos').show(); 
   $('#id_hos').val(data); 

}
});

iconEsp2();

  });  

  $('#tabSugHosKM').on('click','tr',function(){
  var dato = $(this).find('td').eq(1).text();    
    $('#idHospital').show();
    $('#idHospital').val(dato);

    $.ajax({


url: '../functions/idHos.php',
type: 'POST',
data: {hos:dato},
success:function(data){
   $('#id_hos').show(); 
   $('#id_hos').val(data); 

}
});
iconEsp2();
  });  

</script>
<div class="col-1"> <center>
          <button id="buKM" class="submitbtn" type="button" onclick="mostrarHosKm()" 
          style="width: 280; font-size: 10px; background: #1758EE;">
          VER  LOS HOSPITALES MAS CERCANOS POR KM</button> <br>

          <button id="buKMCLO" class="submitbtn" type="button"
          onclick="quitarHosKm()" 
          style="width: 280; font-size: 10px; background: #B03850; display: none;">
          OCULTAR LOS HOSPITALES MAS CERCANOS POR KM</button>
          
          <br>
             </center>
          </div>
          <script>
            function mostrarHosKm(){
              document.getElementById('kmBus').style.display = 'inline-block';
              document.getElementById('buKMCLO').style.display = 'inline-block';
              document.getElementById('buKM').style.display = 'none';
            }
            function quitarHosKm(){
              document.getElementById('kmBus').style.display = 'none';
              document.getElementById('buKMCLO').style.display = 'none';
              document.getElementById('buKM').style.display = 'inline-block';
            }
            </script>



      
      <div class="col-1">
      <label><br></label>
      </div>    
         <div class="col-4"> <center>
          <button id="th" class="submitbtn" type="button" onclick="todosHospitales()" style="width: 150; font-size: 12px;">VER TODOS LOS HOSPITALES</button> <br><br>
             <button id="qth" class="submitbtn" type="button" onclick="quitarTH()" style="width: 150; font-size: 12px; display:none; background: darkred;">SALIR DE TODOS LOS HOSPITALES</button>
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
      <select id="seBuAl" name ="seBuAl" onchange="tabBuAlF()" >
                    <?php 
                        $sb = "SELECT DISTINCT delegacionHospital FROM vasegurobd.cat_hospitales 
                        WHERE tipodeServicio in('H','C')
                        ORDER BY delegacionHospital ASC;";
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
    $('#idHospital').show();
    $('#idHospital').val(dato);

    $.ajax({


url: '../functions/idHos.php',
type: 'POST',
data: {hos:dato},
success:function(data){
   $('#id_hos').show(); 
   $('#id_hos').val(data); 

}
});
iconEsp2();

});
</script>
      
      
           <div class="col-1" id="todosHospitalesSelect" style="display: none;">
            <label>Si prefiere un hospital que no este en la sugerencia, seleccionelo aqui: 
                    <select id="selecHos" name ="selecHos" onchange="infoHosp()" >
                    <?php 
                        $hosAl = "SELECT *  FROM vasegurobd.cat_hospitales where tipodeServicio in('H','C') ORDER by nombreClinicaHospital ASC";
                        $result3=mysqli_query($conexion,$hosAl);
                         echo "<option value=''>Seleccione Hospital</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                            
	
                               echo "<option>".$milista['nombreClinicaHospital']."</option>";
                                                                                }
 
                        
                        
                        ?>
                    </select>
    </label>
           
<script>
function poner_texto()
{
document.accform.idHospital.value=document.accform.selecHos.value;


}
</script>
</div>
<div class="col-1">
<center>
  <iframe src="https://www.google.com/maps/d/embed?mid=1X8UpnEPQ-zP0V6DTDkCK3j3kUU4jIRPB&ehbc=2E312F" width="700" height="350"></iframe></center>     
  </div> 
      <div class="col-2">
        <label>
          <span class="textOption" id="infoHos" name="infoHos" ></span>
  </label>
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
           <p><input type="checkbox" name="otor" id="otor" ><span class="textOption">Otorrinolaringologia</span> </p>
          
           
            
          </label>  
     </div>
              

        <div id="baTab" class="col-1" style="display: none;">
         
         <button class="submitbtn" type="button" onclick="busquedaAvanzadaHos()" style="width: 90; height:30; font-size: 12px; margin-left: 20px;">BUSCAR</button> 
         <label><br></label>
         
          
          
          <table id="tabHosBa" border="1">
            
            </table>
            
      <label><br></label>
      
          </div>
      <div class="col-1"></div>
 
       <div class="col-1">
            <span class="textSection">
					RESPONSABLE DEL ACCIDENTADO<br>
					</span>
  </div> 
      
      <script>

$('#tabHosBa').on('click','tr',function(){
  var dato = $(this).find('td').eq(0).text();    
    $('#idHospital').show();
    $('#idHospital').val(dato);

    $.ajax({


url: '../functions/idHos.php',
type: 'POST',
data: {hos:dato},
success:function(data){
   $('#id_hos').show(); 
   $('#id_hos').val(data); 

}
});

iconEsp2();
});
</script>

<div class="col-1">
      
      </div> 
      
   <div class="col-2">
    <label>
     34. Responsable Accidentado/a:
        
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
  </div>    
   <div class="col-2">
    <label>

35. Teléfono (10 DIGITOS): 
      <input placeholder="TELEFONO MOVIL" name="telefonoResponsable" id="telefonoResponsable" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      type="tel"  maxlength="10" minlength="10"   required><br>   
      <input placeholder="TELEFONO FIJO"  name="telefonoResponsablefijo" id="telefonoResponsablefijo" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      type="tel"  maxlength="10" minlength="10"   required ><br> <br>
    </label>
  </div> 

  <div class="col-1">
            <span class="textSection">
						ETNIA ACCIDENTADO <br>
					</span>
  </div> 

  <div class="col-1" >  
  <label>
    36.¿SE CONSIDERA INDIGENA?<br><br></label>
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
   37.¿HABLA LENGUA INDIGENA? <br></label>
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
  38.¿QUE LENGUA INDIGENA HABLA?<br>
  <select id = "dialectoAccES" name = "dialectoAccES">
  <?php 
                        $conexion = con();
                        $hosAl = "SELECT *  FROM vasegurobd.cat_dialectos ORDER by nombreDialecto ASC";
                        $result3=mysqli_query($conexion,$hosAl);
                         echo "<option value=''>NINGUNA</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option>".$milista['nombreDialecto']."</option>";
                                     }
   
                                        ?>

  </select>
</label>       


    
  </div> 

       <div class="col-1">
            <span class="textSection">
					APROBACION<br>
					</span>
  </div>  
  
      
     
      
       <div class="col-2" >  
    <label>
     39. ¿SE APROBARA LA COBERTURA DE ESTE ACCIDENTE?: 
      </label>
         <fieldset>
  
 <p><input type="radio" name="aproAcc" id="siRE"value="SI" required>
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
                 $('#selecRE').removeAttr("required");
              });
 $('input#noRE').on('change', this, function(){
                 document.getElementById('riesgoExcluido').style.display = 'inline'; 
                 $('#selecRE').prop("required", true);
              });

</script>
          
  </div>
  <div class="col-2">
    <label>
    40. NOTAS: 
      <textarea  name="notasAcc" 
      spellcheck="true"
      onkeypress="return validar(event)" 
      onpaste="return validar(event)" 
    > </textarea>
    </label>
  </div>

  <div class="col-1" >
      <label>41. A CONTINUACION SELECCIONE EL TIPO DE LLAMADA:
      <select id="tipoLlamada" name ="tipoLlamada"required>
                    <?php 
                        $tl = "SELECT * FROM vasegurobd.cat_tipollamada";
                        $tlr=mysqli_query($conexion,$tl);
                         //echo "<option value=''>Seleccione tipo de llamada</option>";
		                             while($milista=mysqli_fetch_array($tlr)){
                               echo "<option>".$milista['tipollamada']."</option>";
                                 }
                        ?>
                    </select></label>
                                                                              </div>

                                                                              <div class="col-1" >
      <label>42. A CONTINUACION SELECCIONE EL TIPO PROBABLE DE LESION:
      <select id="tipoLesion" name ="tipoLesion" required>
                    <?php 
                        $tle = "SELECT * FROM vasegurobd.cat_tipolesion";
                        $tler=mysqli_query($conexion,$tle);
                        echo "<option value=''>Seleccione un tipo probable de lesion</option>";
                         //echo "<option value=''>Seleccione tipo de llamada</option>";
		                             while($milista=mysqli_fetch_array($tler)){
                               echo "<option>".$milista['lesion']."</option>";
                                 }
                        ?>
                    </select></label>
                                                                              </div>

      

          <div class="col-2" id= "riesgoExcluido" style="display:  none;">
                <label style="color: darkred;">¿Riesgo excluido para no aprobar este accidente?
                <select id="selecRE" name ="selecRE"   onchange="poner_RE()">
    <?php                  
   
        $sqli="SELECT detallesRiesgoEx FROM vasegurobd.cat_riesgosexcluidos";
        $resultRE=mysqli_query($conexion,$sqli); 
        echo "<option style='font-size: 12px; ' value=''  >SELECCIONE UN MOTIVO</option>";
        while($milista=mysqli_fetch_array($resultRE)){

            echo "<option ><b> -> </b>".$milista['detallesRiesgoEx']."</option>";
            echo "--------------------";
        }
       

   ?>
   </select>
   <b> 41. MOTIVO SELECCIONADO:
   <textarea id="rieSelec" name="rieSelec" style="width:100%; font-size: 14px; color: darkred;" rows="4"  spellcheck="true" readonly> </textarea>
     </b>

    
   </label>

   <script>
function poner_RE()
{
  
document.accform.rieSelec.value=document.accform.selecRE.value;
}
</script>
           
  </div> 

  <div class="col-1">

    <label style="color: black;">
    <p align="center">
    Le recuerdo que debe acudir con el aviso
    <align="center" style="color:rgb(0,0,255);"> vigente</aling>
    <align="center" style="color:rgb(0,0,0);"> de accidente de seguros atlas con sello de la escuela, 
    firma de la autoridad educativa, folio,</ALING> <align="center" style="color:rgb(0,0,255);"><STRONG>
    nombre del hospital </aling></STRONG><align="center" style="color:rgb(0,0,0);">, debidamente requisitado sin tachaduras y en original.
     </aling>
     </p>
     <br>
     
     <p align="left">ALUMNOS
     </p>
     <br>
    
  
     <p align="left">1.- PADRE O TUTOR (DEBERÁ PRESENTAR IDENTIFICACIÓN OFICIAL VIGENTE CON FOTOCOPIA).
     </p>

     <p align="left">2.-Identificación vigente del menor o constancia de estudios.
     </p>
    
     
     <br>
     
       <p align="center"><align="left" style="color: rgb(0,0,255);">LA ATENCION ES GRATUITA</aling> EN CASO DE QUE LE QUIERAN REALIZAR ALGÚN COBRO FAVOR DE REPORTARLO DE INMEDIATO A ESTE NUMERO
     </p>
     <br>
     
     <p align="center">¿ALGO MÁS EN QUE PUEDA APOYARLO/A?<br>
LE ATENDIÓ .....
HASTA LUEGO
     </p>
     
     </label>
     </div>

     <div class="col-1"> 
            <span class="textSection" >
					<p>		
          EN CASO DE SER DOCENTE / ADMINISTRATIVO
          </p> 
        				  </span>
      </div> 

      <div class="col-1">

<label style="color: black;">
<p align="center">
LE INFORMO QUE AL SER UNA PÓLIZA DE ACCIDENTES NO INCLUYE GASTOS ADMINISTRATIVOS, 
ES DECIR EN CASO DE REQUERIR DOCUMENTACIÓN PARA TRAMITAR SU INCAPACIDAD LABORAL ESTA NO PODRÁ SER PROPORCIONADA
 </p>
<BR></BR>
 <p align="left">MAESTROS, SERVIDORES PUBLICOS Y PRESTADORES DE SERVICIOS
     </p>
     <br>
     
     <p align="left">1.- Identificación oficial del lesionado viegente con fotocopia.
     </p>
     <br>
     
     <p align="left">2.- Identificación laboral con fotografia vigente o constancia laboral.
     </p>

 </label>
 <div class="col-1"> 
            <span class="textSection" >
					<p>		
          CASOS PILARES
          </p> 
        				  </span>
      </div> 

      <label style="color: black;">
 <br>

 <p align="left">En el caso de Pilares deben llevar los siguientes documentos
 </p>

 <br>

 <p align="left">1.- AVISO DE ACCIDENTE DEBIDAMENTE REQUISITADO, EN ORIGINAL SIN TACHADURAS NI ENMENDADURAS CON FIRMA DEL COORDINADOR DE PROYECTO 
   <align="center" style="color: rgb(0,0,255);">SIN SELLO</aling>

 </p>

 <br>

 <p align="left">2.- IDENTIFICACIÓN DE PILARES VIGENTE O CONSTANCIA CON FIRMA
 </p>

 <br>

 <p align="left">3.- IDENTIFICACIÓN ESCOLAR DE LA PERSONA LESIONADA (ESC PÚBLICA DONDE CURSA REGULARMENTE)
 </p>

 <br>

 <p align="left">4.- IDENTIFICACIÓN OFICIAL DE PADRE O TUTOR VIGENTE CON FOTOCOPIA
 </p>

 </label>
 </div>
   

     
      <div class="col-submit">
    <button class="submitbtn" title="GUARDE EL ACCIDENTE REGISTRADO Y OBTENGA EL FOLIO PARA PROPOCIONAR">GUARDAR <img src="../images/save.ico" width = "15" height="15"></button>
  </div>
 
  </form>

  
  
  <form action ="../functions/folioUrgenciaAmb.php" method="post" >
  <div class="col-1" id="ambulancias" name="ambulanciasAcc" style="display: none;" >
  <span class="textSectionRED">SE REQUIERE AMBULANCIA</span>
  <div class="col-3">
          <label>
          <input   name="idUsuarioE" id="idUsuarioE" type="hidden"  readonly>
          <script>
          document.getElementById("idUsuarioE").value = localStorage.getItem('sessionValue');
          </script>
              </label>    
      </div>
        <div class="col-3">
           <label>
               <input id="nombreUsuarioE" name="nombreUSuarioE" type="hidden" readonly>
          <script>
          document.getElementById("nombreUsuarioE").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>
      </div>

      <div class="col-3">
      
              <label>
          <input  placeholder="<?php 
  $fechaActual = date('Y-m-d');
  echo $fechaActual;
                               ?>" name="fechaHoyE" id="fechaHoyE" type="hidden"  readonly>
       
          </label>
      
      </div>

      
      <label >
      Nombre de la persona accidentada(SIN ACENTOS): 
      
      <input placeholder="APELLIDO PATERNO"  id="aPaUrg" name="aPaUrg"  autocomplete="off" onkeyup="apUrg();" required>
         <span class="listautocomp">
					<ul id="lista_appAcciUrg"></ul>  
					</span>  
      <input placeholder="APELLIDO MATERNO"  id="aMaUrg" name="aMaUrg"  autocomplete="off" onkeyup="amUrg();" required>
         <span class="listautocomp">
					<ul id="lista_apmAcciUrg"></ul>  
					</span>  
      <input placeholder="NOMBRE(S)"  id="nombreUrg" name="nombreUrg"  autocomplete="off" onkeyup="nomUrg();" required>  
         <span class="listautocomp">
					<ul id="lista_nomUrg"></ul>  
					</span>  
         

 
  <label>
    <br><br>
    ¿SE CONSIDERA INDIGENA?<br><br></label>
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
   ¿HABLA LENGUA INDIGENA? <br></label>
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
  

 
  <label>
  ¿QUE LENGUA INDIGENA HABLA?<br>
  <select id = "dialectoAccES" name = "dialectoAccES">
  <?php 
                        $conexion = con();
                        $hosAl = "SELECT *  FROM vasegurobd.cat_dialectos ORDER by nombreDialecto ASC";
                        $result3=mysqli_query($conexion,$hosAl);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option>".$milista['nombreDialecto']."</option>";
                                     }
  
                                        ?>

  </select>
</label>       


    
  

    </label>
           <label style="color: red;">SELECCIONE UN SERVICIO DE AMBULANCIA:
                        <select id="ambNombre" name ="ambNombre" onchange="telefonoAmbulancia()" required>
                    <?php 
                       
                        $proAmb = "SELECT nombreClinicaHospital FROM vasegurobd.cat_hospitales WHERE tipoDeServicio = 'A' ;";
                        $resProAmb=mysqli_query($conexion,$proAmb);
                         echo "<option value=''>Seleccione Servicio de Ambulancia:</option>";
		                             while($milista=mysqli_fetch_array($resProAmb)){

                               echo "<option>".$milista['nombreClinicaHospital']."</option>";
                                                                                }
                                                                        
 
                        
                        
                        ?>
                    </select>

</label>
<label id="truIn" name="truIn" ></label>

<span class="textSectionRED"><b>IMPORTANTE:</b> A CONTINUACION, INGRESE EL NOMBRE DE LA ESCUELA, SELECCIONANDOLO DE LA LISTA PREEDICTIVA QUE APARECERA DESPUES DE QUE INGRESE MAS DE 2 CARACTERES. 
SE RELLENARAN AUTOMATICAMENTE TODOS LOS CAMPOS SIGUIENTES, PERO PUEDE EDITARLOS EN CASO DE QUE NO COINCIDAN CON LA INFORMACION QUE POSEA.
LOS DATOS QUE INGRESE SE GUARDARAN UNICAMENTE PARA ESTE REGISTRO.</span>    
           <label  style="color: red;">
    NOMBRE DE ESCUELA DE PROCEDENCIA:    
<input placeholder="ESCRIBA  Y SELECCIONE LA OPCION CORRECTA" id="escuelaid" name="escuelaid" 
autocomplete="off" type="text" onkeyup="autocompletarNOMESC1();" onchange="direccionEscuela()" required>           </label>
      <span class="listautocomp">
					<ul id="lista_escamb"></ul>  
					</span>
            
          <label id="dirEscu" name="dirEscu" ></label>
          <label>CORREO ESCUELA:                                                                    
          <input placeholder="Correo Escuela"  id="correoEsc" name="correoEsc"  autocomplete="off"  required>
          </label> 
          <label>
     CALLE Y NUMERO(SI NO ES CORRECTO PUEDE EDITARLO): 
      <input placeholder="CALLE Y NUMERO DE LA ESCUELA DEL ACCIDENTADO"  
      name="calleEscuelaUrg" id="calleEscuelaUrg" autocomplete="off" type="text" required>

    </label>

    <label>
     ALCALDIA:
     <input placeholder="ALCALDIA A LA QUE PERTENECE LA ESCUELA" 
     id="alcaldiaEscuelaUrg" name="alcaldiaEscuelaUrg" autocomplete="off" type="text"  required>
       
    </label> 
         
    <label>
     COLONIA:
     <input placeholder="COLONIA A LA QUE PERTENECE" 
     id="coloniaEscuelaUrg" name="coloniaEscuelaUrg" autocomplete="off" type="text"  required>
       
    </label>

    <label>
     CODIGO POSTAL:
          
      <input placeholder="CODIGO POSTAL DEL ACCIDENTADO" 
      id="cpEscuelaUrg" 
      maxlength="5" minlength="5"
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      name="cpEscuelaUrg"  required>
      
         
    </label>

    <label>

Teléfono: 
      <input placeholder="TELEFONO DE LA ESCUELA" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
      type="tel"  maxlength="10" minlength="10"
       id="telefonoEscuelaUrg" 
       name="telefonoEscuelaUrg"  required><br> 
    </label>


  
          
          
          <label style="color: red;">
      Nombre de la persona que reporta el accidente(SIN ACENTOS):
      
      <input placeholder="APELLIDO PATERNO"  id="apReUr" name="apReUr"  autocomplete="off" onkeyup="autoAPREUR();" required>
         <span class="listautocomp">
					<ul id="lista_apreur"></ul>  
					</span>  
      <input placeholder="APELLIDO MATERNO"  id="amReUr" name="amReUr"  autocomplete="off" onkeyup="autoAMREUR();" required>
         <span class="listautocomp">
					<ul id="lista_amreur"></ul>  
					</span>  
      <input placeholder="NOMBRE(S)"  id="nomReUr" name="nomReUr"  autocomplete="off" onkeyup="autoNOMREUR();" required>  
         <span class="listautocomp">
					<ul id="lista_nomreur"></ul>  
					</span>  
         
    </label>
          
    <label style="color: red;">
     Puesto: 
     <select id="puestoReportanteUr" name="puestoReportanteUr"  required>
  <?php                 
                        $pdc = "SELECT *  FROM vasegurobd.cat_puestos ORDER by nombrePuesto ASC";
                        $resultpdc=mysqli_query($conexion,$pdc);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
		                             while($milista=mysqli_fetch_array($resultpdc)){
                                         
                                     echo "<option>".$milista['nombrePuesto']."</option>";
                                     }
                                    
                                        ?>

  </select></label>
          
    <label style="color: red;">
     TELEFONO DEL REPORTANTE: 
      <input placeholder="INGRESE 10 DIGITOS" type ="tel" 
      onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  
      id="telReUr" name="telReUr" maxlength = "10" minlength="10" required> 
    </label>

    <label>
CORREO ELECTRONICO: 
      <input placeholder="CORREO DEL REPORTANTE"  name="correoReportante" type="email"   required>
    </label>

      <label>A CONTINUACION SELECCIONE EL TIPO DE LLAMADA:
      <select id="tipoLlamada" name ="tipoLlamada" >
                    <?php 
                        $tl = "SELECT * FROM vasegurobd.cat_tipollamada";
                        $tlr=mysqli_query($conexion,$tl);
                         echo "<option value=''>Seleccione tipo de llamada</option>";
                        
		                             while($milista=mysqli_fetch_array($tlr)){
                            
	
                               echo "<option>".$milista['tipollamada']."</option>";
                                                                                }
                                mysqli_close($conexion);

                        ?>
                    </select></label>
               

                                                                          
          
         <center><button style="width: 200px; background: darkred;" id="btnUrgAmb">GENERAR FOLIO URGENTE <img src="../images/save.ico" width = "15" height="15"></button></center> 
          <script>
          $('#btnUrgAmb').click(function (event)
                            {

    var opcion = confirm("A continuacion se generara un folio de emergencia y se le redigira a una pantalla donde podra continuar llenando los datos de este accidente. ¿Desea continuar?");
    if (opcion == true) {
      
	} else {
	    
	}
              
          });
          </script>
       <label>
       <br>
    </label>   
              
     <input placeholder="Identificador" id="idEscuelaAmb" name="idEscuelaAmb" autocomplete="off" type="hidden" />
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
<?php
 }

 function estadisticasIniciales(){
 ?>
 <div class="col-1">
          <label style="font-size: 30px;"><center> 
         
          <?php     
          setlocale(LC_TIME, "spanish");
          echo utf8_encode(strftime(" HOY ES %A, %d de %B de %Y "));

          ?>
         
          </center> </label> 

          <label style="font-size: 24px; color: green;"><center> 
         
          
        
         </center> </label> 
      </div>
      
      
      
       
      <div class="col-2" >
      
      <label> <input readonly style="background:  #05769d; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" 
           max="<?php echo date("Y-m-d",strtotime($fechaActual."+ 2 month")); ?>"
           min="<?php echo date("Y-m-d",strtotime($fechaActual."- 2 month")); ?>"
           style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoES()" >

  </label>
</div>

<div class="col-2">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #05769d; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" 
           max="<?php echo date("Y-m-d",strtotime($fechaActual."+ 2 month")); ?>"
           min="<?php echo date("Y-m-d",strtotime($fechaActual."- 2 month")); ?>"
           style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoES()">

  </label>
</div>

<div class="col-1" id="PRO">
  <label>
  <?php 
 $conexion = con();
$pr="SELECT AVG(tiempoAte) AS pro FROM vasegurobd.tab_serviciosadicionales";
$result=mysqli_query($conexion,$pr);   

while($row=mysqli_fetch_array($result)){
  echo "PROMEDIO DE TIEMPO EN ATENDER SOLICITUDES ADICIONALES:  <label style='color: black'>".date("d:i:s",$row['pro'])."</label>";

}
?>
</label>
</div>
<div class="col-1">
    <label id="totalesInfo"></label>
                                    </div>

<div class="col-1"><label id="labPer"></label></div>

<div class="col-3">
<label>ACCIDENTES</label>
</div>

<div class="col-3">
<label> ACCIDENTES POR HOSPITAL</label>
</div>

<div class="col-3">
<label> SINIESTROS </label>
</div>

     
      <div id="piechart3" class="col-3" style="overflow:auto;
    height: 500px;">

      <?php

$sql="SELECT idEstatus, nombreEstatus,registrosDia FROM vasegurobd.cat_estatus ORDER BY registrosDia DESC ";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='acciEs' style='border-collapse: separate; margin: 15px; 
padding: 5px;' border='1'><thead><tr>
<td>CATEGORIA</td><td>ACCIDENTES TOTAL</td></thead>";
while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row['nombreEstatus']."</td><td class='pen'> ".$row['registrosDia']."</td></tr>";
      }
echo "</table>";

   ?>


      </div>

   
    
      <div id="piechart6" class="col-3" style="overflow:auto;
    height: 500px; " >

      <?php

$sql="SELECT
 idHospital AS Hospital, COUNT(idHospital) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN cat_estatus ON tb_accidentes.idEstatus=cat_estatus.idEstatus
WHERE tb_accidentes.idEstatus <> 0 
AND MONTH(fechaRepor) = MONTH(current_date())
AND  DAY(fechaRepor) = DAY(current_date())
GROUP BY Hospital ORDER BY Accidentes DESC";

$result=mysqli_query($conexion,$sql);  
echo "

<table id='hosEs' style='border-collapse: separate; margin: 15px; 
padding: 5px;' border='1'><thead><tr>
<td>HOSPITAL</td><td>ACCIDENTES TOTALES</td></thead>";
while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row['Hospital']."</td>
        <td class='pen'> ".$row['Accidentes']."</td></tr>";
      }

echo "</table>";

   ?>




      </div>        


      <div id="piechart9" class="col-3" style="overflow:auto;
    height: 500px;">

      <?php

$sql="SELECT
usuarioQueCambia AS Usuario, COUNT(folioAccidente) AS Accidentes, fechaCambio
FROM vasegurobd.tb_historialfoliosiniestro
WHERE tb_historialfoliosiniestro.folioAccidente <> '' and folioSiniestro <> ''
AND MONTH(fechaCambio) = MONTH(current_date())
AND  DAY(fechaCambio) = DAY(current_date())
GROUP BY Usuario ORDER BY Accidentes DESC";


$result=mysqli_query($conexion,$sql);  
echo "
<table id='sinEs' style='border-collapse: separate; margin: 15px; 
padding: 5px;' border='1' ><thead><tr>
<td>USUARIO</td>
<td>SINIESTROS TOTALES</td>
</thead>";
while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row['Usuario']."</td>
        <td class='pen'> ".$row['Accidentes']."</td></tr>";
      }
echo "</table>";

   ?>
    
      </div>     
      
      <div class="col-3">
<label>ACCIDENTES POR USUARIO</label>
</div>

<div class="col-2">
<label>ESTATUS DE SOLICITUDES POR HOSPITAL</label>
</div>


  
      
      
      <div id="piechart12" class="col-3" style="overflow:auto;
    height: 500px;">

      <?php

$sql="SELECT
nombre, COUNT(FolioAccidente) AS Accidentes, fechaRepor
FROM vasegurobd.tb_accidentes
INNER JOIN tb_usuarios ON tb_accidentes.idusuario = tb_usuarios.login
AND MONTH(fechaRepor) = MONTH(current_date())
AND  DAY(fechaRepor) = DAY(current_date())
GROUP BY nombre ORDER BY Accidentes DESC;";

$result=mysqli_query($conexion,$sql);  
echo "

<table id='accUsEs' style='border-collapse: separate; margin: 15px;
padding: 5px;' border='1'><thead><tr>
<td>USUARIO</td><td>ACCIDENTES</td></thead>";
while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row['nombre']."</td>
        <td class='pen'> ".$row['Accidentes']."</td></tr>";
      }
echo "</table>";

   ?>



      </div>  
 
      <div  class="col-2" style="overflow:auto; height: 500px;">

      <?php

/*
$sql="SELECT idHospital, nombreClinicaHospital FROM vasegurobd.cat_hospitales";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='accSiPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>HOSPITAL</td><td>ACCIDENTES</td></thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombreClinicaHospital']."</td><td>";
        accSiHos($row['idHospital']);
        echo "</td></tr>";
      }

echo "</table>";
*/

$sql="SELECT distinct idHos, nombreClinicaHospital FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.cat_hospitales HO
WHERE SA.idHos = HO.idHospital";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='accSolEsPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>HOSPITAL</td>
<td>NUEVA</td>
<td>APROBADA</td>
<td>MAS INFORMACION</td>
<td>RECHAZADA</td>
<td>APROBADA PARCIALMENTE</td>
</tr>
</thead>";
$fechaActual = date('Y-m-d');

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombreClinicaHospital']."</td>";
        accSAHosP($row['nombreClinicaHospital'],$row['idHos'],'NUEVA',$fechaActual,$fechaActual);
        accSAHosP($row['nombreClinicaHospital'],$row['idHos'],'APROBADA',$fechaActual,$fechaActual);
        accSAHosP($row['nombreClinicaHospital'],$row['idHos'],'SE NECESITA MAS INFORMACION',$fechaActual,$fechaActual);
        accSAHosP($row['nombreClinicaHospital'],$row['idHos'],'RECHAZADA',$fechaActual,$fechaActual);
        accSAHosP($row['nombreClinicaHospital'],$row['idHos'],'APROBADA PARCIALMENTE',$fechaActual,$fechaActual);
        echo "</tr>";
      }

echo "</table>";
   ?>

      </div>  

      <div class="col-3">
<label>ACCIDENTES SIN CARTA POR HOSPITAL</label>
</div>

<div class="col-3">
<label>AUTORIZACION DE SERVICIO POR ESTADO</label>
</div>

<div class="col-3">
<label>SUBSECUENCIA DE SA </label>
</div>

      
      <div  class="col-3" style="overflow:auto; height: 500px;">
      <?php

$sql="SELECT distinct idHos, nombreClinicaHospital FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.cat_hospitales HO
WHERE SA.idHos = HO.idHospital";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='accSCPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>HOSPITAL</td>
<td># De Solicitudes sin Carta</td>
</tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombreClinicaHospital']."</td>";
        accSCHosPe($row['idHos'],'NUEVA',$fechaActual,$fechaActual);
        echo "</tr>";
      }

echo "</table>";
   ?>

      </div> 



      <div  class="col-3" style="overflow:auto; height: 500px;">
      <?php

$sql="SELECT distinct  autorizacion FROM vasegurobd.tab_serviciosadicionales WHERE autorizacion != ''";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='auPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>AUTORIZACION</td>
<td># DE SA</td>
</tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['autorizacion']."</td>";
        auConPe($row['autorizacion'],$fechaActual,$fechaActual);
        echo "</tr>";
      }

echo "</table>";
   ?>

      </div> 
      


      <div  class="col-3" style="overflow:auto; height: 500px;">
      <?php

$sql="SELECT distinct  subsecuencia FROM vasegurobd.tab_serviciosadicionales WHERE subsecuencia != ''";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='subPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>SUBSECUENCIA</td>
<td>#</td>
</tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['subsecuencia']."</td>";
        subConPe($row['subsecuencia'],$fechaActual,$fechaActual);
        echo "</tr>";
      }

echo "</table>";
   ?>

      </div> 

      <div class="col-3">
<label>CARTAS GARANTIA GENERADAS POR USUARIO</label>
</div>

<div class="col-3">
<label>MODIFICACIONES POR USUARIO</label>
</div>

<div class="col-3">
<label></label>
</div>

<div  class="col-3" style="overflow:auto; height: 500px;">
<?php

$sql="SELECT DISTINCT usuarioGen, nombre FROM vasegurobd.tb_cartasgarantia C, vasegurobd.tb_usuarios U
WHERE C.usuarioGen = U.login";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='carusPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>USUARIO</td>
<td># DE CARTAS GENERADAS</td>
</tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombre']."</td>";
        usuCar($row['usuarioGen']);
        echo "</tr>";
      }

echo "</table>";
   ?>
      </div> 

      <div  class="col-3" style="overflow:auto; height: 500px;">
<?php

$sql="SELECT DISTINCT usuarioQueModifica, nombre FROM vasegurobd.tb_historialcambios C, vasegurobd.tb_usuarios U
WHERE C.usuarioQueModifica = U.login";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='camUs' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>USUARIO</td>
<td># DE CAMBIOS</td>
</tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombre']."</td>";
       camUs($row['usuarioQueModifica']);
        echo "</tr>";
      }

echo "</table>";
   ?>
      </div> 










      <div>
      <iframe width="1024" height="800" src="https://datastudio.google.com/embed/reporting/de839cbe-c25b-4ff6-b523-7f5bce8950c0/page/p_74vamrb1qc" frameborder="0" style="border:0" style="overflow:hidden" allowfullscreen></iframe>
      </div> 
 

<?php
 }

 function archivoCar($cat, $foAcc){
        $link = con();
        
        $duM= "SELECT * FROM vasegurobd.tb_rutasarchivos WHERE tipoDocumento = '$cat' AND folioAcc = '$foAcc'";
        
        $dupM=mysqli_query($link,$duM); 
        $duplM = mysqli_num_rows($dupM);

if($duplM > 0){
  echo "<tr><td class='ace'>".$cat."</td><td class='pen'><b>$duplM ARCHIVO(S) RECIBIDO(S)</b></td></tr>";
}else{
  echo "<tr ><td >".$cat."</td><td class='enhos'><b>ARCHIVO(s) PENDIENTE(S)</b></td></tr>";
}
           
           mysqli_close($link);
        
      }
