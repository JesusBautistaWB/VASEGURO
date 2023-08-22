<?php ob_start(); ?>
<html >
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">

  <style>
h4, h5 {
    margin:3;
    font: 80% sans-serif;

}
table, th, td {
  border: 1px solid black;
    border-collapse: collapse;
    font-size:12px;
    font: 60% sans-serif;
    width: 100%;
}
.noborder{
    border: 1px solid white;

}
.textTiny {
    font: 70% sans-serif;
    text-align: justify;
    font-size: 12px;
    
}
.textTinyEn, ul {
    text-align: left;
    font-size: 12px;
    font: 60% sans-serif;
    
}

title{
font-size: 13px;

}

ul {
  
    font-size:12px;
    font: 70% sans-serif;
    width: 100%;
}
</style>
   
     
</head>
<body>
      <img src="../images/encabezado.png" height="90" width="650">
     
  
        <?php      
        $id = $_GET['idSS'];
        $folio = $_GET['idAcc'];
       
        
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");

        $ids = explode(",", $id);
        $idLe = count($ids);
       
       $nomMed = "";
       $telMed = "";
       $corrMed = "";
       $cedMed = "";
        for($i= 0; $i<=$idLe; $i++) {
          $sqlSS="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]'";
          
          $resultSS=mysqli_query($conexion,$sqlSS);
          while($mostrarSS=mysqli_fetch_array($resultSS)){
              $sum= $sum + $mostrarSS['costoServicio'];
              $nomMed = $mostrarSS['medicoAt']." ".$nomMed;
              $telMed = $mostrarSS['telefonoMed']." ".$telMed;
              $corrMed = $mostrarSS['correoMed']." ".$corrMed;
              $cedMed = $mostrarSS['cedulaMedico']." ".$cedMed;
          }
               
        }

        $C="";
        if($sum <= 49999){ $C = "1"; } 
        if($sum >= 50000 AND $sum <= 99999){ $C = "2"; }
        if($sum <= 100000){ $C = "1"; }

          
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, fechaHoraAccidente, sintomas, actividadAcc, 
        regionRDCA, intensidadAccidente, nombreUrgAmb, procedimientosLista, tipoDeEventoInicial,
            telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ciudadEscuela, alcaldiaEscuela, calleEscuela, cpescuela, telefonoEscuela, 
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
            PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, SexoA, AlcaldiaMunicipio, ACT.Colonia, CalleA, diagnosticosLista, 
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes,FechaNacimientoA, poblacionAccidentado,
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
       <center>
      
        


<div class="col-2">
    <table style="border: hidden">
        <tr>
            <td >
            <center>
 <h5> <b>AUTORIZACION </b> </h5>
<h5> Poliza de Accidentes Personales "ESCOLAR" 2021</h5>
        </center>
        </td>
        
<td style="border: hidden">
<table width="30%" >
<tr> 
    <td>No. De Reporte:</td><td><?php echo $mostrar['FolioAccidente']; ?></td>
</tr>
<tr>
    <td>Siniestro:</td><td><?php echo $mostrar['folioSiniestro']; ?></td>
</tr>
<tr>
    <td>Folio:  </td><td>C <?php echo $numCar."/".$C; ?></td> 
</tr>

</table> 


</td>
        </tr>

        </table>

</div> 



<div class="col-1"> 
         
     <table>
               <td style="background: #BBB7B8;"><b>No. Poliza:</b></td>
                   <td><b>Hospital/Clínica:</b> <?php echo $mostrar['idHospital']; ?></td>
                   <td><b>Fecha: </b><?php echo $mostrar['fechaRepor']; ?></td>
                   </table>
            

    </div> 
    


           
           <div class="1">
               
           <label style="font-size: 14px"><b><i>Agradecemos la atención que se brinde al Alumno(a) y/o Personal Administrativo</i></b></label>
        
        </div>
    
     <div class="col-1">
         <table >
         <tr>
                <td colspan="6" style="background: #BBB7B8;"><b>DATOS DEL ASEGURADO</b></td>
                         
               </tr>
               <tr>
                   <td colspan="6">Atender al Alumno/ Docente/ Administrativo:
                        <?php  echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?></td>
                         
               </tr>
       
               <tr>
                   <td ><?php echo "Sexo:".$mostrar['SexoA']; ?></td>
                   <td><?php 
                    $from = new DateTime($mostrar['FechaNacimientoA']);
                    $to   = new DateTime('today');
                    $edad= $from->diff($to)->y;
                     echo "Edad:".$edad." años";  
                       ?></td>
                   
                 
                   <td colspan="2">F.Nac:  <?php echo $mostrar['FechaNacimientoA']; ?>  </td>
                    <td>Grado: <?php echo $mostrar['GradoEscolarA']; 
                    
                    ?> </td><td>
<?php 

echo $mostrar['poblacionAccidentado'];

?>   
  </td> </tr>   
 <tr>
                 <td colspan="2"><b>¿De acuerdo a su cultura se considera indigena?</b> <br>
                 <?php echo $mostrar['indigenaAcc']; ?>
                 </td>
                 
                
                 <td colspan="2"><b>¿Habla alguna lengua indigena?</b> <br>
                 <?php echo $mostrar['dialectoAcc']; ?>
                 </td>
               
                 <td colspan="2"><b>¿Que lengua indigena habla?</b> <br>
                 <?php echo $mostrar['dialectoAccES']; ?>
                 </td>
                 
                 </tr>
                
                 <tr>
               <td colspan="6"><b>CURP:</b>
                <?php  echo $mostrar['curpAcc']; ?><br><br></td>
               </tr>

      
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
                    <td colspan="3">Delegacion: <?php echo $mostrar['AlcaldiaMunicipio']; ?></td>  
                </tr>
              
                <tr>
                <td colspan="2">Correo:<?php echo $mostrar['correoResponsable']?> </td>
                <td colspan="2">Telefono: <?php echo $mostrar['telFiRes']?></td>
                <td colspan="2">Telefono Celular: <?php echo $mostrar['telCelRes']?></td>
                    
                    </tr>
              <tr>
           <td colspan="6" style="background: #BBB7B8;"><b>DATOS DE LA ESCUELA</b></td>
</tr>
               <tr>
               
               <td colspan="6"><b>Nombre de la escuela: </b><?php echo $mostrar['nombreEscuela']; ?></td>
               </tr>
               <tr>
                   <td colspan="6">Domicilio: <?php 
                   $dir = explode(", ",  $mostrar['dirEscRepor'] );
                   echo $dir[0];
                   ?></td>
                   
               </tr>
                   <tr>

                   <td colspan="2"><b>Delegación: <?php echo $mostrar['alcaldiaEscuela']; ?></b></td>
                   <td >CP: <?php echo $mostrar['cpescuela']; ?></td>
                   <td >Telefono: <?php echo $mostrar['telefonoEscuela']; ?></td>
                   <td colspan="2">Correo electronico <br>:<?php echo $mostrar['correoEscuela']?> </td>
                      
                   </tr>
         
          <tr>
               <td colspan="6"><b>Lugar, fecha, hora del accidente: CDMX <?php echo $mostrar['idLugarAccidente'].", ".$mostrar['fechaHoraAccidente']; ?></b></td>
               </tr>
               <tr>
                   <td colspan="6"><b>Causa del accidente:  </b><?php echo $mostrar['descRepor'];?> <br><br> </td>
                
                </tr>
            
                <tr>
                   <td colspan="1">CIE 10  </td>
                   <td colspan="2"> <?php echo $mostrar['diagnosticosAcc'];?> </td>

                   <td colspan="1">CPT  </td>
                   <td colspan="2"> <?php echo $mostrar['procedimientosAcc'];?>  </td>
                
                </tr>
                
               

            <?php

        }
            
             

echo "<tr>
<td colspan='6'>Monto autorizado para Hospital : $<b>".$sum."</b>  <br><br> </td>

</tr>
<tr>
<td colspan='6'>Estudios autorizados :   <br><br> </td>

</tr>
<tr>
<td colspan='6' style='background: #BBB7B8;'><b>HONORARIOS AUTORIZADOS</b></td>
 </tr>

 <tr> 
 <td>CONSULTA</td>
 <td colspan='3'>";
 $sumCON = "0";
 for($i= 0; $i<$idLe; $i++) {
    $sqlCON="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'CONSULTA'";
    $resultCON=mysqli_query($conexion,$sqlCON);
    while($mostrarCON=mysqli_fetch_array($resultCON)){
        echo strtoupper($mostrarCON['comentarioAcc']).'+';
        $sumCON= $sumCON + $mostrarCON['costoServicio'];
    }     
  }
 echo"</td>
 <td><b>AUTORIZADO</b></td>
 <td>$".$sumCON."</td>
 </tr>

 <tr> 
 <td>CIRUJANO</td>
 <td colspan='3'>";
 $sumCI = "0";
 for($i= 0; $i<$idLe; $i++) {
    $sqlCI="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'CIRUJANO'";
    $resultCI=mysqli_query($conexion,$sqlCI);
    while($mostrarCI=mysqli_fetch_array($resultCI)){
        echo strtoupper($mostrarCI['comentarioAcc']).'+';
        $sumCI= $sumCI + $mostrarCI['costoServicio'];
    }     
  }
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>$".$sumCI."</td>
 </tr>

 <tr> 
 <td>ANESTESIOLOGO</td>
 <td colspan='3'>";
 $sumAN = "0";
 for($i= 0; $i<$idLe; $i++) {
    $sqlAN="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'ANESTESIOLOGO'";
    $resultAN=mysqli_query($conexion,$sqlAN);
    while($mostrarAN=mysqli_fetch_array($resultAN)){
        echo strtoupper($mostrarAN['comentarioAcc']).'+';
        $sumAN= $sumAN + $mostrarAN['costoServicio'];
    }     
  }
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>$".$sumAN."</td>
 </tr>

 <tr> 
 <td>AYUDANTE</td>
 <td colspan='3'>";
 $sumAY = "0";
 for($i= 0; $i<$idLe; $i++) {
    $sqlAY="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'AYUDANTE'";
    $resultAY=mysqli_query($conexion,$sqlAY);
    while($mostrarAY=mysqli_fetch_array($resultAY)){
        echo strtoupper($mostrarAY['comentarioAcc']).'+';
        $sumAY= $sumAY + $mostrarAY['costoServicio'];
    }     
  }


 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>$".$sumAY."</td>
 </tr>

 <tr> 
 <td>OTRO</td>
 <td colspan='3'>";
 $sumOT = "0";
 for($i= 0; $i<$idLe; $i++) {
    $sqlOT="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'OTRO'";
    $resultOT=mysqli_query($conexion,$sqlOT);
    while($mostrarOT=mysqli_fetch_array($resultOT)){
        echo strtoupper($mostrarOT['comentarioAcc']).'+';
        $sumOT= $sumOT + $mostrarOT['costoServicio'];
    }     
  }

 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>$".$sumOT."</td>
 </tr>

 <tr> 
 <td>TERAPIAS</td>
 <td colspan='3'>";
 $sumTE = "0";
 for($i= 0; $i<$idLe; $i++) {
    $sqlTE="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'TERAPIA'";
    $resultTE=mysqli_query($conexion,$sqlTE);
    while($mostrarTE=mysqli_fetch_array($resultTE)){
        echo strtoupper($mostrarTE['comentarioAcc']).'+';
        $sumTE= $sumTE + $mostrarTE['costoServicio'];
    }     
  }


 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>$".$sumTE."</td>
 </tr>

 <tr> 
 <td>MEDICAMENTOS</td>
 <td colspan='3'>";
 $sumME = "0";
 for($i= 0; $i<$idLe; $i++) {
    $sqlME="SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE id_servicio ='$ids[$i]' AND conceptoServicio = 'MEDICAMENTOS'";
    $resultME=mysqli_query($conexion,$sqlME);
    while($mostrarME=mysqli_fetch_array($resultME)){
        echo strtoupper($mostrarME['comentarioAcc']).'+';
        $sumME= $sumME + $mostrarME['costoServicio'];
    }     
  }
 echo "</td>
 <td><b>AUTORIZADO</b></td>
 <td>".$sumME."</td>
 </tr>
";


             echo "<tr><td colspan='5' style='background: #BBB7B8;'>TOTAL</td><td style='background: #C4F5C5'>$".$sum."</td></tr>";
 


            
                    echo "
                    <tr>
                    <td colspan='6' style='background: #BBB7B8;'><b>DATOS DEL MEDICO</b></td>
                     </tr> 
                    
                    
                    
                    <tr>
                    <td ><b>Nombre:</b></td>
                    <td colspan='2'>".$nomMed."</td>
                    <td> <b>Telefono:</b></td>
                    <td colspan='2'>".$telMed."</td></tr>
                   
                    <tr>

                    <td>
                    <b>DOMICILIO:</b></td>
                    <td colspan='2'>".$mostrarDM['hospitalOrigen']."</td>
                    <td><b>FECHA</b></td> 
                    <td colspan='2'>".$mostrarDM['fechaRespuesta']."</td>
                    </tr> 

                    <tr>
                    <td ><b>Especialidad:</b></td>
                    <td></td>
                
                    <td >CEDULA:</td>
                    <td>".strtoupper($cedMed)."</td>
                 
                  
                    <td>Correo:</td>
                    <td>".$corrMed."</td>
                    </tr> 
                    
                    ";
    
                    
                



        $sql2="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, fechaHoraAccidente, sintomas, actividadAcc, 
        regionRDCA, intensidadAccidente, nombreUrgAmb, procedimientosLista, tipoDeEventoInicial,
            telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ciudadEscuela, alcaldiaEscuela, calleEscuela, cpescuela, telefonoEscuela, 
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
            PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, SexoA, AlcaldiaMunicipio, ACT.Colonia, CalleA, diagnosticosLista, 
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes,FechaNacimientoA, poblacionAccidentado,
            ACCT.correoEscuela, ACCT.correoResponsable, descRepor, dirEscRepor, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc,
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

		$result2=mysqli_query($conexion,$sql2);
		while($mostrar=mysqli_fetch_array($result2)){
?>
        
          
             
               <tr>

               <td colspan="2">Persona que autoriza:<br><br><br></td>
               <td colspan="2"><b>Dra. Maria del Refugio Lee Garcia. <br> Cedula Profesional: 1751046</b></td>
               <td colspan="2"><b><?php echo $mostrar['medicoRevisor'];?><br><br><br></b></td>
          



               </tr>
               <tr>
               <td colspan="6">
             <ol>
                 <li><b> Esta carta de autorizacion solo ampara accidentes por actividades dentro y fuera de la escuela, participando en algun 
                     evento programando y supervisado por la escuela.</b>
                 </li>
                 <li><b>Esta carta de autorizacion tiene 24h de vigencia y es valida unicamente para el Hospital o Clinica de referencia.</b></li>
                 <li><b>Enviar facturas en un plazo no mayor a 5 dias a la fecha de atencion.</b></li>
            </ol>
            
            </td>
               
               </tr>
<tr>
    <td colspan="6"><center><b>GASTOS PERSONALES A CARGO DEL ASEGURADO</b></center></td>
</tr>
<tr>
    <td colspan="6">NOTAS:</td>
</tr>

<tr>
    <td colspan="6">OBSERVACIONES: <?php echo $mostrar['observacionesMed'];?>
        <br>
       
      DX:<?php echo $mostrar['diagSAMed'];?>
        <br>
        
        TRATAMIENTO: <?php echo $mostrar['tratSAMed'];?>
        <br>
        
    </td>

</tr>
<tr>
    <td colspan="6">SEGUROS ATLAS AL 800 8 36 22 42/ 55 54 48 48 14</td>
    
</tr>
        </table>
        <table>
<?php
          }
         
          ?>





               </table>
           </div>
     
           </center>

      

           
           
        
          
              
          
        

</body>
       
</html>

<?php
$html = ob_get_clean();
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


