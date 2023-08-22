<?php 
include("../functions/phpfunctions.php");
$conexion =con();
ob_start(); ?>
<html lang="es-MX">
<head>
<meta http-equiv="Content-Type" content="text/html">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script src="js/numeroALetras.js" type="text/javascript"></script> 
  <style>
h4, h5 {
    margin:3;
    font: 80% sans-serif;

}
table, th, td{
  border: 1px solid black;
    border-collapse: collapse;
    font-size:12px;
    font: 60% sans-serif;
    width: 100%;
}

.noborder{
    border: 1px solid white;

}

textTiny{
    font: 70% sans-serif;
    text-align: justify;
    font-size: 12px;
    
}
textTinyEn, ul{
    text-align: left;
    font-size: 12px;
    font: 60% sans-serif;
    
}

title{
font-size: 13px;
}

ul{
    font-size:12px;
    font: 70% sans-serif;
    width: 100%;
}
</style>   
</head>
<body>
<img src="../images/encabezado.png" height="94" width="700"/>
<?php 
 $host= $_SERVER["HTTP_HOST"];
 $url= $_SERVER["REQUEST_URI"];
 $gen = "http://".$host."".$url;

      
        $id = $_GET['id'];
        $folio = $_GET['folio'];
        $perAu = $_GET['perAu'];
        $numCar = $_GET['numCar'];
        $pa = $_GET['pa'];
   
        $mon = $_GET['mon'];
        $montoLetra = "$".$mon." (".$_GET['lt'].")";

      

    $ids = explode(",", $id);
    $idLe = count($ids);
       $nomMed = "";
       $telMed = "";
       $corrMed = "";
       $espMed = "";
       $cedMed = "";
       $hosMed = "";
       $notasMed = "";
       $esAu = "";
       $gerCar = "INSERT INTO vasegurobd.tb_cartasgarantia (ids_ss, numeroCarta, idPersonaQueAutoriza, folioAccidente, montoHos, gen, usuarioGen)
        VALUES ('$id', '$numCar', '$perAu', '$folio','$mon','$gen','$pa')";
        $resultCar=mysqli_query($conexion,$gerCar);
    $sumcaa="0";
        for($i= 0; $i<=$idLe; $i++){
          $sqlSS="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]'";
          $atCar= "UPDATE vasegurobd.tab_serviciosadicionales SET ultimaCarta = '$numCar', urlCarta ='$gen' WHERE id_servicio ='$ids[$i]'";  
          $resultCar=mysqli_query($conexion,$atCar);        
          $resultSS=mysqli_query($conexion,$sqlSS);
          while($mostrarSS=mysqli_fetch_array($resultSS)){
              
if(($mostrarSS['conceptoServicio'] == "CIRUJANO") OR ($mostrarSS['conceptoServicio'] == "ANESTESIOLOGO") OR ($mostrarSS['conceptoServicio'] == "AYUDANTE") )
{ } else {
    
    $sumcaa= $sumcaa + $mostrarSS['costoServicio']; 
}

              $sum= $sum + $mostrarSS['costoServicio'];
              $nomMed = $mostrarSS['medicoAt']."+".$nomMed;
              $telMed = $mostrarSS['telefonoMed']."+".$telMed;
              $espMed = $mostrarSS['especialidadMed']."+".$espMed;
              $corrMed = $mostrarSS['correoMedico']."<br>".$corrMed;
              $cedMed = $mostrarSS['cedulaMedico']."<br>".$cedMed;
              $esAu = $mostrarSS['esAu']."<br>".$esAu;
              $hosMed = $mostrarSS['hospitalOrigen'];
              $notasMed = $mostrarSS['notasMed'];
          }             
        }

        $P = "";
        $PNUM = "";
        $PCOM = "";
        $D = "";
        $DNUM = "";
        $DCOM = "";
        for($i= 0; $i<=$idLe; $i++) {
            $sqlPD="SELECT claveDP, idSerAd, NOMBRE, CATALOG_KEY, pdcomen
            FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_diagnosticos D
            WHERE PD.idSerAD = '$ids[$i]'
            AND PD.tipoDP = 'D'
            AND PD.claveDP = D.CATALOG_KEY"; 

            $resultPD=mysqli_query($conexion,$sqlPD);
            while($mostrarPD=mysqli_fetch_array($resultPD)){
                $D = $mostrarPD['NOMBRE'].". ".$D; 
                $DNUM = $mostrarPD['CATALOG_KEY']."   ".$DNUM; 
                $DCOM = strtoupper($mostrarPD['pdcomen']."   ".$DCOM); 

            }
                 
          }

          for($i= 0; $i<=$idLe; $i++) {
            $sqlP="SELECT claveDP, idSerAd, PRO_NOMBRE, CATALOG_KEY, pdcomen
            FROM vasegurobd.tb_pro_diag PD, vasegurobd.cat_procedimientos P
            WHERE PD.idSerAD = '$ids[$i]'
            AND PD.tipoDP = 'P'
            AND PD.claveDP = P.CATALOG_KEY"; 

            $resultP=mysqli_query($conexion,$sqlP);
            while($mostrarP=mysqli_fetch_array($resultP)){
                $P = $mostrarP['PRO_NOMBRE'].". ".$P; 
                $PNUM = $mostrarP['CATALOG_KEY']."  ".$PNUM; 
                $PCOM = strtoupper($mostrarP['pdcomen']."  ".$PCOM); 

            }
                 
          }

          date_default_timezone_set('America/Mexico_City');
          $fechaActual = date('Y-m-d');


        $C="";
        if($mon <= 99999){ $C = "1"; }
        if($mon >= 100000 AND $sum <= 149999){ $C = "2"; }
        if($mon >= 150000){ $C = "3"; }

        $fechMed = "";
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, fechaHoraAccidente, sintomas, actividadAcc, 
        regionRDCA, intensidadAccidente, nombreUrgAmb, procedimientosLista, tipoDeEventoInicial, ESC.colonia,
            telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ciudadEscuela, alcaldiaEscuela, calleEscuela, cpescuela, telefonoEscuela, 
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
            PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, SexoA, AlcaldiaMunicipio, ACT.Colonia, CalleA, diagnosticosLista, 
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes,FechaNacimientoA, idcp, poblacionAccidentado,
            ACCT.correoEscuela, ACCT.correoResponsable, descRepor, dirEscRepor, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc, folioSiniestro,
            diagnosticosAcc, procedimientosAcc
            FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
            WHERE  ACCT.idEscuela=ESC.idEscuela 
            AND ES.idEstatus=ACCT.idEstatus 
            AND ACCT.FolioAccidentado=ACT.FolioAccidentado 
            AND ACCT.idEstatus= ES.idEstatus
            AND ACCT.idEscuela=ESC.idEscuela
            AND ES.idEstatus=ACCT.idEstatus
            AND ACCT.FolioAccidentado=ACT.FolioAccidentado   
            AND ACCT.FolioAccidente = '$folio' LIMIT 0,1";
          
		$result=mysqli_query($conexion,$sql);
		while($mostrar=mysqli_fetch_array($result)){
		 ?>
<div class="col-3">
<table style="border: hidden">
<tr>
<td><center>
<h5><b>AUTORIZACION</b></h5>
<h5>Poliza de Accidentes Personales "ESCOLAR" 2021</h5>
</center>
</td>    
<td style="border: hidden">
<table>
<tr>
<td>No. De Reporte:</td><td><?php echo $mostrar['FolioAccidente']; ?></td>
</tr>
<tr>
<td>Siniestro:</td><td><?php echo $mostrar['folioSiniestro']; ?></td>
</tr>
<tr>
<td>Folio:  </td><td>C <?php echo $C."/".$numCar; ?></td> 
</tr>

</table> 


</td>
        </tr>

        </table>

</div>



<div class="col-3"> 
         
     <table>
               <td colspan="1" style="background: #BBB7B8;" WIDTH="50" ><b>No. Poliza: E01-8-11-601641</b></td>
                   <td colspan="4"><b>Hospital/Clinica:</b> <?php echo $mostrar['idHospital'];
                   $hospi = $mostrar['idHospital'];
                   ?></td>
                   <td colspan="1"><b>Fecha: </b><?php 
                
                 // $f= explode(" ", $mostrar['fechaRepor']); 
                  echo $fechaActual;
                   
                   ?></td>
                   </table>
    </div> 
           <div class="1">
        <center>
           <label style="font-size: 14px"><b><i>Agradecemos la atención que se brinde al Alumno(a) y/o Personal Administrativo</i></b></label>
        </center>
        </div>
    
     <div class="col-1">
         <table >
         <tr>
                <td colspan="6" style="background: #BBB7B8;"><center><b>DATOS DEL ASEGURADO</b></center></td>
                         
               </tr>
               <tr>
                   <td colspan="6">Atender al Alumno/ Docente/ Administrativo:
                        <?php  echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?></td>
                         
               </tr>
       
               <tr>
                   <td><?php echo "Sexo:".$mostrar['SexoA']; ?></td>
                   <td><?php 
                    $from = new DateTime($mostrar['FechaNacimientoA']);
                    $to   = new DateTime('today');
                    $edad= $from->diff($to)->y;
                     echo "Edad:".$edad." años";  
                       ?></td>
                   
                 
                  
                    <td colspan>Grado: <?php echo $mostrar['GradoEscolarA']; 
                    
                    
                    ?> </td>
                         <td >Docente: </td>
<td colspan="2">
<?php 

/*echo $mostrar['poblacionAccidentado'];*/

?> 
Administrativo:  
  </td> </tr>   
<!--<tr>
                 <td colspan="2"><b>¿De acuerdo a su cultura se considera indigena?</b> <br>
                 <?php /*echo $mostrar['indigenaAcc']; */ ?>
                 </td>
                 
                
                 <td colspan="2"><b>¿Habla alguna lengua indigena?</b> <br>
                 <?php /*echo $mostrar['dialectoAcc'];*/ ?>
                 </td>
               
                 <td colspan="2"><b>¿Que lengua indigena habla?</b> <br>
                 <?php/* echo $mostrar['dialectoAccES'];*/ ?>
                 </td>
                 
                 </tr>
                    
                 <tr>
               <td colspan="6"><b>CURP:</b>
                <?php /* echo $mostrar['curpAcc']; */?><br></td>
               </tr>
   --> 
      
               <tr>
               <td colspan="6"><b>Nombre y firma del Padre o Madre (si el afectado es menor de edad):</b>
                <?php  echo $mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes']; ?><br><br></td>
               </tr>
            
             <tr>
                 <td colspan="6"><b>Domicilio del Asegurado afectado</b></td>
                 
                 </tr>
                 <tr> 
                 <td colspan="6"> Calle y número:  <?php echo $mostrar['CalleA']; ?></td>
                 </tr>
           
                <tr>
                    <td colspan="3">Colonia: <?php echo $mostrar['Colonia']; ?></td>
                    <td colspan="2">Alcaldia: <?php echo $mostrar['AlcaldiaMunicipio']; ?></td>  
                    <td colspan="1">CP: <?php echo $mostrar['idcp']; ?></td>  
                </tr>
              
                <tr>
                <td colspan="2">Correo:<?php echo $mostrar['correoResponsable']?> </td>
                <td colspan="2">Telefono: <?php echo $mostrar['telFiRes']?></td>
                <td colspan="2">Telefono Celular: <?php echo $mostrar['telCelRes']?></td>
                    
                    </tr>
              <tr>
           <td colspan="6" style="background: #BBB7B8;"><center><b>DATOS DE LA ESCUELA</b></center></td>
</tr>
               <tr>
               
               <td colspan="6"><b>Nombre de la escuela: </b><?php echo $mostrar['nombreEscuela']; ?></td>
               </tr>
               <tr>
                   <td colspan="4">Domicilio: <?php 
                   $dir = explode(", ",  $mostrar['dirEscRepor'] );
                   echo $dir[0];
                   ?></td>
                    <td colspan="2">Colonia: <?php 
                   echo $mostrar['colonia'];
                   ?></td>
                   
               </tr>
                   <tr>

                   <td colspan="2"><b>Alcaldia: <?php echo $mostrar['alcaldiaEscuela']; ?></b></td>
                   <td >CP: <?php echo $mostrar['cpescuela']; ?></td>
                   <td >Telefono: <?php echo $mostrar['telefonoEscuela']; ?></td>
                   <td colspan="2">Correo electronico: <br><?php echo $mostrar['correoEscuela']?> </td>
                      
                   </tr>
         
          <tr>
               <td colspan="6"><b>Lugar, fecha, hora del accidente: CDMX <?php echo $mostrar['idLugarAccidente'].", ".$mostrar['fechaHoraAccidente']; 
               $fechMed = $mostrar['fechaHoraAccidente']; 

               $f1= explode(" ", $fechMed); 
               
               ?></b></td>
               </tr>
               <tr nograp>
                   <td colspan="6" style="font-size: 9px"><b>Causa del accidente:  </b><?php echo $mostrar['descRepor'];?> <br><br> </td>
                
                </tr>
            
                <tr>
                   <td colspan="1">CIE 10  </td>
                   <td colspan="2"> <?php echo $DNUM;?> </td>

                   <td colspan="1">CPT  </td>
                   <td colspan="2"> <?php echo $PNUM;
                   } // FIN DEL PRIMER QUERY
                   
                   
                   ?>  </td>
                
                </tr>







                
            <?php

echo "<tr>
<td colspan='6'>Monto autorizado para Hospital :<br> <b>".$montoLetra."</td>

</tr>
<tr>
<td colspan='6'>Estudios autorizados : ".$esAu."  </td>

</tr>
<tr>
<td colspan='6' style='background: #BBB7B8;'><center><b>HONORARIOS AUTORIZADOS</b></center></td>
 </tr>

 <tr> 
 <td><b>CONSULTA</b></td>
 <td colspan='3'>";
 $sumCON = "0.00";
 $comCO = "";
 for($i= 0; $i<$idLe; $i++) {
    $sqlCON="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'CONSULTA'";
    $resultCON=mysqli_query($conexion,$sqlCON);
    while($mostrarCON=mysqli_fetch_array($resultCON)){
        //echo strtoupper($mostrarCON['comentarioAcc']).'+';
        $comCO = $comCO."+".$mostrarCON['comentarioAcc'];
        $sumCON= $sumCON + $mostrarCON['costoServicio'];
    }     
  }
  echo substr(strtoupper($comCO), 1);  
 echo"</td>
 <td><b>AUTORIZADO</b></td>
 <td>";
 
 if($sumCON >'0.00'){ echo "$".$sumCON; }
 echo "</td>
 </tr>

 <tr> 
 <td>CIRUJANO</td>
 <td colspan='3' >";
 $sumCI = "0.00";
 $comCI = "";
 for($i= 0; $i<$idLe; $i++) {
    $sqlCI="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'CIRUJANO'";
    $resultCI=mysqli_query($conexion,$sqlCI);
    while($mostrarCI=mysqli_fetch_array($resultCI)){
        //echo strtoupper($mostrarCI['comentarioAcc']).'+';
        $comCI = $comCI."+".$mostrarCI['comentarioAcc'];
        $sumCI= $sumCI + $mostrarCI['costoServicio'];
    }     
  }
  //echo substr(strtoupper($comCI), 1);  
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>";
 if($sumCI >'0.00'){ echo "$".$sumCI; }
 echo "</td>
 </tr>

 <tr> 
 <td>ANESTESIOLOGO</td>
 <td colspan='3'>";
 $sumAN = "0.00";
 $comAN="";

 for($i= 0; $i<$idLe; $i++) {
    $sqlAN="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'ANESTESIOLOGO'";
    $resultAN=mysqli_query($conexion,$sqlAN);
    while($mostrarAN=mysqli_fetch_array($resultAN)){
        //echo strtoupper($mostrarAN['comentarioAcc']).'+';
        $comAN = $comAN."+".$mostrarAN['comentarioAcc'];
        $sumAN= $sumAN + $mostrarAN['costoServicio'];
    }     
  }
//echo substr(strtoupper($comAN), 1);  
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>";
 
 if($sumAN >'0.00'){ echo "$".$sumAN; }
 echo "</td>
 </tr>

 <tr> 
 <td>AYUDANTE</td>
 <td colspan='3'>";
 $sumAY = "0.00";
 $comAY = "";
 for($i= 0; $i<$idLe; $i++) {
    $sqlAY="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'AYUDANTE'";
    $resultAY=mysqli_query($conexion,$sqlAY);
    while($mostrarAY=mysqli_fetch_array($resultAY)){
       // echo strtoupper($mostrarAY['comentarioAcc']).'+';
       $comAY = $comAY."+".$mostrarAY['comentarioAcc'];
        $sumAY= $sumAY + $mostrarAY['costoServicio'];
    } 
      
  }

  //echo substr(strtoupper($comAY), 1);  
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>";

 if($sumAY >'0.00'){ echo "$".$sumAY; }
 echo "</td>
 </tr>

 <tr> 
 <td><b>OTRO</b></td>
 <td colspan='3'>";
 $sumOT = "0.00";
 $comOT = "";
 for($i= 0; $i<$idLe; $i++) {
    $sqlOT="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'OTRO'";
    $resultOT=mysqli_query($conexion,$sqlOT);
    while($mostrarOT=mysqli_fetch_array($resultOT)){

        //echo strtoupper($mostrarOT['comentarioAcc']).'+';
        $comOT = $comOT."+".$mostrarOT['comentarioAcc'];
        $sumOT= $sumOT + $mostrarOT['costoServicio'];
    }
        
  }
  echo substr(strtoupper($comOT), 1); 
  
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>";
 if($sumOT >'0.00'){ echo "$".$sumOT; }
 echo "</td>
 </tr>

 <tr> 
 <td><b>TERAPIAS</b></td>
 <td colspan='3'>";
 $sumTE = "0.00";
 $comTE = "";
 for($i= 0; $i<$idLe; $i++) {
    $sqlTE="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'TERAPIA'";
    $resultTE=mysqli_query($conexion,$sqlTE);
    while($mostrarTE=mysqli_fetch_array($resultTE)){

      //echo strtoupper($mostrarTE['comentarioAcc']);
       $comTE = $comTE."+".$mostrarTE['comentarioAcc'];
        $sumTE= $sumTE + $mostrarTE['costoServicio'];
    } 
     
  }
  echo substr(strtoupper($comTE), 1);  

 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>";
 
 if($sumTE >'0.00'){ echo "$".$sumTE; }
 echo "</td>
 </tr>

 <tr> 
 <td><b>MEDICAMENTOS</b></td>
 <td colspan='3'>";
 $sumME = "0.00";
 $comME ="";
 for($i= 0; $i<$idLe; $i++) {

    $sqlME="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'MEDICAMENTOS'";
    $resultME=mysqli_query($conexion,$sqlME);
    while($mostrarME=mysqli_fetch_array($resultME)){
        //echo strtoupper($mostrarME['comentarioAcc']).'+';
        $comME = $comME."+".$mostrarME['comentarioAcc'];
        $sumME= $sumME + $mostrarME['costoServicio'];
    }     
    echo substr(strtoupper($comME), 1);
  }
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>";
 
 if($sumME >'0.00'){ echo "$".$sumME; }
 echo "</td>
 </tr>
";


  //  echo "<tr><td colspan='5' style='background: #BBB7B8;'><b>TOTAL</b></td><td style='background: #C4F5C5'>$".$sumcaa."</td></tr>";

            
                    echo "
                    <tr>
                    <td colspan='6' style='background: #BBB7B8;'><center><b>DATOS DEL MEDICO</b></center></td>
                     </tr> 
                    
                    
                    
                    <tr>
                    <td ><b>Nombre:</b></td>
                    <td colspan='2'>".rtrim($nomMed, "+")."</td>
                    <td> <b>Telefono:</b></td>
                    <td colspan='2'>".rtrim($telMed, "+")."</td></tr>
                   
                    <tr>

                    <td>
                    <b>DOMICILIO:</b></td>
                    <td colspan='2'>".$hospi."</td>
                    <td><b>FECHA</b></td> 
                    <td colspan='2'>".$f1[0]."</td>
                    </tr> 

                    <tr>
                    <td ><b>Especialidad:</b></td>
                    <td>".rtrim($espMed, "+")."</td>
                
                    <td >CEDULA:</td>
                    <td>".rtrim($cedMed, "+")."</td>
                 
                  
                    <td>Correo:</td>
                    <td>".rtrim($corrMed, "+")."</td>
                    </tr>";


        $sql2="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, fechaHoraAccidente, sintomas, actividadAcc, 
        regionRDCA, intensidadAccidente, nombreUrgAmb, procedimientosLista, tipoDeEventoInicial,
            telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ciudadEscuela, alcaldiaEscuela, calleEscuela, cpescuela, telefonoEscuela, 
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
            PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, SexoA, AlcaldiaMunicipio, ACT.Colonia, CalleA, diagnosticosLista, 
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes,FechaNacimientoA, poblacionAccidentado,
            ACCT.correoEscuela, ACCT.correoResponsable, descRepor, colonia, dirEscRepor, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc,
             conceptoServicio, costoServicio, medicoRevisor, observacionesMed, diagSAMed, tratSAMed, folioSiniestro
            FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC, vasegurobd.tab_serviciosadicionales SS
            WHERE  ACCT.idEscuela=ESC.idEscuela 
            AND ES.idEstatus=ACCT.idEstatus 
            AND ACCT.FolioAccidentado=ACT.FolioAccidentado 
            AND ACCT.idEstatus= ES.idEstatus 
            AND SS.folioAccidenteServicio = ACCT.FolioAccidente 
            AND ACCT.idEscuela=ESC.idEscuela 
            AND ES.idEstatus=ACCT.idEstatus 
            AND ACCT.FolioAccidentado=ACT.FolioAccidentado   
            AND SS.id_servicio in(".$id.") LIMIT 0,1";

?><tr>

               <td colspan="2">Persona que autoriza:</td>
               <td colspan="2">Dra. Maria del Refugio Lee Garcia. Cedula Profesional: 1751046</b></td>
               <td colspan="2"><b><?php

$sqlCed="SELECT nombre, cedula FROM vasegurobd.tb_usuarios WHERE idusuario ='$perAu'";
$resultCed=mysqli_query($conexion,$sqlCed);
while($mostrarCed=mysqli_fetch_array($resultCed)){
    echo ucwords(strtolower($mostrarCed['nombre']))."<br> Cedula Profesional: ".$mostrarCed['cedula'];
    
}
?><br><br></b></td>
          
               </tr>
               <tr style="border-bottom:0;">
               <td colspan="6" style="border-bottom:0; border-top;"> 
             <ol>
                 <li><b> Esta carta de autorizacion solo ampara accidentes por actividades dentro y fuera de la escuela, participando en algun 
                     evento programando y supervisado por la escuela.</b>
                 </li>
                 <li><b>Esta carta de autorizacion tiene 24h de vigencia y es valida unicamente para el Hospital o Clinica de referencia.</b></li>
                 <li><b>Enviar facturas en un plazo no mayor a 5 dias a la fecha de atencion.</b></li>
                 <center><b>GASTOS PERSONALES A CARGO DEL ASEGURADO</b></center>
                
            </ol>
            
            </td>
               
               </tr>
<tr style="border-bottom:0; border-top: 0;">
<?php 
//$result2=mysqli_query($conexion,$sql2);
//while($mostrar=mysqli_fetch_array($result2)){
?>
    <td colspan="6" style="border-bottom:0; border-top: 0;"><center><b></b>
</center></td>

</tr>
<tr>
    <td colspan="6" style="border-top:0; font-size: 9px">NOTA: <?php echo $notasMed; ?></td>
</tr>

<tr>
    <td colspan="6" style="border-bottom:0; border-top: 0;"><b>OBSERVACIONES</b>
    
    <?php 
    
    //echo $mostrar['observacionesMed'];
    
//}
    ?>
        <br>
</td>

</tr>
        <tr>
                   <td colspan="6" style="font-size: 9px; border-bottom:0; border-top: 0"><b>DIAGNOSTICO: </b><?php echo $DCOM;?> </td>
                
                </tr>
                <tr>
                   <td colspan="6" style="font-size: 9px; border-bottom:0; border-top: 0"><b>TRATAMIENTO: </b><?php echo $PCOM;?> </td>
                
                </tr>

              
        
    </td>

</tr>
<tr>
    <td colspan="6"><b>SEGUROS ATLAS AL 55 54 48 48 14 / 55 50 95 67 72 / 800 836 33 42 / 800 022 00 67</b></td>
    
</tr>
        </table>






               </table>
           </div>
     
           </center>

      

           
           
        
          
              
          
        

</body>
       
</html>

<?php
$html =ob_get_clean();
//echo $html;



date_default_timezone_set('America/Mexico_City');
$time = time();
$fecha = date("Y:m:d", $time);
$hora = date("H:i:s", $time);

$fechaSolicitud = $fecha." ".$hora;

require_once "../../dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();


$options = $dompdf ->getOptions();
$options->set(array('isRemoteEnabled' => true));

$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("SS-".$folio."-".$id."-POLIZA-".$fechaSolicitud, array("Attachment" => false));



?>


