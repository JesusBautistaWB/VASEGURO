<center>
<img src="../images/loading.gif" width="700" hight="700">
</center>
<?php
include("phpfunctions.php");
$link = con();

$fechaRepor= $_POST['fechaHoy'];
$nombreUsuario = $_POST['nombreUSuario'];
$idUsuario= $_POST['idUsuario'];
$appPaRepor = rtrim($_POST['appPaRepor']);
$appMaRepor = rtrim($_POST['appMaRepor']);
$nombreRepor = rtrim($_POST['nombreRepor']);
//$correoReportante = $_POST['correoReportante'];
$estabilidad = $_POST['estabilidadAccidentado'];
$puestoReportante = $_POST['puestoReportante'];
$telefonoReportante = $_POST['telefonoReportante'];
$appPaAcc = rtrim($_POST['appPaAcc']);
$appMaAcc = rtrim($_POST['appMaAcc']);
$nombreAcc = rtrim($_POST['nombreAcc']);
$poblacionAccidentado = ltrim($_POST['poblacionAccidentado']);
$fechaNacimientonAccidentado = $_POST['fechaNacimientoAccidentado'];
$generoAccidentado = $_POST['generoAccidentado'];
$gradoEscolarAccidentado = $_POST['gradoEscolaridadAccidentado'];
$entidadAccidentado = $_POST['entidadAccidentado'];
$alcaldiaAccidentado = $_POST['alcaldiaAccidentado'];
$coloniaAccidentado = $_POST['coloniaAccidentado'];
$cpAccidentado = $_POST['cpAccidentado'];
$calleAccidentado = $_POST['calleAccidentado'];
$descReportante = trim($_POST['descReportante']);
$fechaAccidenteReportante = $_POST['fechaAccidenteReportante'];
$horaAccidenteReportante = $_POST['horaAccidenteReportante'];
//$regionDelCuerpoAfectada = $_POST['regionDelCuerpoAfectada'];
$hospital = $_POST['idHospital'];
$tipoDeAccidente = $_POST['tipoDeAccidente'];
$lugarAccidenteIn = $_POST['lugarAcc'];
$lugarAccidente = $_POST['lugarAccidente'];
//$escuelaAccidentado = $_POST['escuelaAccidentado'];
$appResponsable = rtrim($_POST['appResponsable']);
$apmResponsable = rtrim($_POST['apmResponsable']);
$nombreResponsable = rtrim($_POST['nombreResponsable']);
$telefonoResponsable = $_POST['telefonoResponsable'];
$telefonoResponsablefijo = $_POST['telefonoResponsablefijo'];
//$correoResponsable = $_POST['correoResponsable'];
$idEscuela = $_POST['idEscuela'];
$estadoCivil = $_POST['estadoCivil'];



$calleEscuela = $_POST['calleEscuela'];
$alcaldiaEscuela = $_POST['alcaldiaEscuelaAccidentado'];
$cpEscuela = $_POST['cpEscuela'];
$id_hos = $_POST['id_hos'];
//echo $id_hos;


$telefonoEscuela = $_POST['telefonoEscuela'];
$correoEscuela = $_POST['correoEscuela'];
$coloniaEscuela = $_POST['coloniaEscuela'];

$dirEscRepor  = $calleEscuela.', '.$alcaldiaEscuela.', '.$coloniaEscuela.', '.$cpEscuela.', '.$telefonoEscuela;
$der = utf8_encode($dirEscRepor);

//echo $dirEscRepor;
$riEx = $_POST['rieSelec'];
$apro = $_POST['aproAcc'];
$actividadAccidente = $_POST['actividadAccidente'];
/* $sin = $_POST['sintomas'];
$intensidad = $_POST['intensidad'];
$regionRDCA = $_POST['regionesRDCA'];
*/
$lesionProbableInicial = $_POST['lesionProbableInicial'];
$tipoDeEventoInicial = $_POST['tipoDeEventoInicial'];
$periodoDeCobertura = $_POST['periodoDeCobertura'];
$regionPrincipal = $_POST['regionPrincipal'];
$notasAcc = $_POST['notasAcc'];

$dialectoAcc = $_POST['dialectoAcc'];


$dialectoAccES = $_POST['dialectoAccES'];
$indigenaAcc = $_POST['indigenaAcc'];
$curpAcc = $_POST['curpAcc'];
$tipoLlamada = $_POST['tipoLlamada'];
$tipoLesion = $_POST['tipoLesion'];


if($dialectoAcc == "NO" ){
    $dialectoAccES = "NINGUNO";
    

}



//$sintomas = implode(",", $sin);
$estatus ="";

date_default_timezone_set('America/Mexico_City');
$time = time();
$hora = date("H:i:s", $time);
//echo $hora;
$fechaHoraAccidente = $fechaAccidenteReportante." ".$horaAccidenteReportante;

$from = new DateTime($fechaNacimientonAccidentado);
$to   = new DateTime('today');
$edad= $from->diff($to)->y;

//CALCULAR CUANTOS REGISTROS DE ACCIDENTE HA REALIZADO EL USUARIO ACTUAL EL DIA DE HOY PARA GENERAR ID

$fechaHoy = date('Y-m-d')."%";

$rowsbyuser = "SELECT * FROM vasegurobd.tb_accidentes WHERE idUsAu = '$idUsuario' AND FolioAccidente != '' AND fechaRepor LIKE '$fechaHoy' ";
		$rbu=mysqli_query($link,$rowsbyuser); 
        $numero = mysqli_num_rows($rbu) +1;

//CALCULAR ID DE ACCIDENTADO, CONTANDO TODOS LOS REGISTROS EXISTENTES +1
//$accdo = "SELECT * FROM vasegurobd.tb_accidentado ";
        //$abu=mysqli_query($link,$accdo); 

        $fechaID = date('YYYY')."%";
$naccdo = $appPaAcc[0].$appMaAcc[0].$nombreAcc[0].$fechaHoy[8].$fechaHoy[9].$fechaHoy[5].$fechaHoy[6].$fechaID[2].$fechaID[3].$hora[0].$hora[1].$hora[2].$hora[3].$hora[4].$hora[5].$hora[6].$hora[7].$hora[8];
        //$naccdo = mysqli_num_rows($abu) + 1;



if($numero <10){
    
    $numero = "0".$numero;
}


 
//BUSCAR DUPLICADOS 
$dup = "SELECT * FROM vasegurobd.tb_accidentado WHERE  curpAcc='$curpAcc' AND FechaHoraAccidenteA LIKE '$fechaHoy'";
		$dupp=mysqli_query($link,$dup); 
        $dupl = mysqli_num_rows($dupp);


//OBTENER INICIALES 
    
$iniciales ="";
      
$in = "SELECT * FROM vasegurobd.tb_usuarios WHERE login = '$idUsuario' ";
  $in2=mysqli_query($link,$in); 
  while($mostrar=mysqli_fetch_array($in2)){ 
    
      $iniciales =  $mostrar['inUs'];
                
 }


 

if($dupl > 0){
   $estatus = "2"; 
   $folio = $iniciales.$fechaHoy[8].$fechaHoy[9].$fechaHoy[5].$fechaHoy[6].$fechaID[2].$fechaID[3].$hora[0].$hora[1].$numero;
       $folio1 = str_replace("-", "", $folio);  
       $folioAccidente = str_replace("%", "", $folio1);
} else{
    
  if ($apro == "SI"){

       
       $estatus = "3";
       $folio = $iniciales.$fechaHoy[8].$fechaHoy[9].$fechaHoy[5].$fechaHoy[6].$fechaID[2].$fechaID[3].$hora[0].$hora[1].$numero;
       $folio1 = str_replace("-", "", $folio);  
       $folioAccidente = str_replace("%", "", $folio1);
    
} else {
 
    $estatus = "4";
    $folio = $iniciales.$fechaHoy[8].$fechaHoy[9].$fechaHoy[5].$fechaHoy[6].$fechaID[2].$fechaID[3].$hora[0].$hora[1].$numero;
    $folio1 = str_replace("-", "", $folio);  
    $folioAccidente = str_replace("%", "", $folio1);

        }  
}

mkdir("../confirmaciones_egreso/".$folioAccidente, 0777);


$sql = "INSERT INTO vasegurobd.tb_accidentes
(FolioAccidente,appPaRepor, appMaRepor, nombreRepor, FolioAccidentado , idusuario, idRDCA,idTipoDeAccidente, idEstatus,  idRiesgoEx, idEscuela, idHospital, idHospitalCosto,lugarAccIn, 
idLugarAccidente, HospitalCosto, HospitalIVA, HospitalTOTAL, estabilidad, puestoReportante, telefonoReportante, idUsAu, apRes, amRes, nombreRes,telFiRes, telCelRes, fechaHoraAccidente, 
actividadAcc, sintomas, intensidadAccidente, regionRDCA, lesionProbableInicial, tipoDeEventoInicial,
 periodoDeCobertura, descRepor, correoReportante, poblacionAccidentado, dirEscRepor, correoEscuela, regionPrincipal, notasAcc,
 dialectoAcc, dialectoAccES, indigenaAcc, estatusInterno, envioAcc, numHospital, tipoLlamada, tipoLesion)
  VALUES 
('$folioAccidente', (Upper('$appPaRepor')), (upper('$appMaRepor')), (upper('$nombreRepor')), '$naccdo', '$idUsuario', '$regionDelCuerpoAfectada', '$tipoDeAccidente', '$estatus', '$riEx',
 '$idEscuela', '$hospital', '0','$lugarAccidenteIn', '$lugarAccidente', '0', '0', '0', '$estabilidad', '$puestoReportante', '$telefonoReportante','$idUsuario',
 (upper('$appResponsable')),(upper('$apmResponsable')),(upper('$nombreResponsable')),'$telefonoResponsablefijo','$telefonoResponsable','$fechaHoraAccidente','$actividadAccidente','$sintomas',
 '$intensidad','$regionRDCA','$lesionProbableInicial','$tipoDeEventoInicial','$periodoDeCobertura','$descReportante','$correoReportante',
  '$poblacionAccidentado', '$dirEscRepor', '$correoEscuela', '$regionPrincipal','$notasAcc','$dialectoAcc','$dialectoAccES','$indigenaAcc',
   'REGULAR', 'NO ENVIADO', '$id_hos', '$tipoLlamada', '$tipoLesion')";
 echo $sql;


$accidentado = "INSERT INTO vasegurobd.tb_accidentado 
(FolioAccidentado, PrimerApellidoA, SegundoApellidoA, NombreA, FechaNacimientoA, SexoA, 
GradoEscolarA, EdadA, idCP, CalleA, FechaHoraAccidenteA, estado, AlcaldiaMunicipio, Colonia, curpAcc, estadoCivil)
 VALUES ('$naccdo',(upper('$appPaAcc')),(upper('$appMaAcc')),(upper('$nombreAcc')),'$fechaNacimientonAccidentado','$generoAccidentado',
 '$gradoEscolarAccidentado','$edad','$cpAccidentado','$calleAccidentado','$fechaHoraAccidente','$entidadAccidentado',
 '$alcaldiaAccidentado','$coloniaAccidentado','$curpAcc','$estadoCivil')";

echo $accidentado;
/*

LESIONES


$lesPR= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,
FolioAccidenteLes)
VALUES('$regionDelCuerpoAfectada','$regionRDCA','$sintomas','$intensidad','$naccdo','$folioAccidente')";
mysqli_query($link,$lesPR) or die (mysqli_error($link));


$A= "LESION EN ".$regionDelCuerpoAfectada.", ".$regionRDCA." REFIERE ".
$sintomas."  CON INTENSIDAD EN GRADO ".$intensidad;


// LESIONES INSERTADAS MULTIPLES
$regionDelCuerpoAfectada1 = $_POST['regionDelCuerpoAfectada1'];
$sin1 = $_POST['sintomas1'];
$intensidad1 = $_POST['intensidad1'];
$regionRDCA1 = $_POST['regionesRDCA1'];
$sintomas1 = implode(",", $sin1);
$B="";
if($regionDelCuerpoAfectada1 != ""){
$les1= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
VALUES('$regionDelCuerpoAfectada1','$regionRDCA1','$sintomas1','$intensidad1','$naccdo','$folioAccidente')";
mysqli_query($link,$les1) or die (mysqli_error($link));

$B= ", LESION EN ".$regionDelCuerpoAfectada1.", ".$regionRDCA1." REFIERE ".$sintomas1." CON INTENSIDAD EN GRADO ".$intensidad1;

}


$regionDelCuerpoAfectada2 = $_POST['regionDelCuerpoAfectada2'];
$sin2 = $_POST['sintomas2'];
$intensidad2 = $_POST['intensidad2'];
$regionRDCA2 = $_POST['regionesRDCA2'];
$sintomas2 = implode(",", $sin2);

$C="";

if($regionDelCuerpoAfectada2 != ""){
    $les2= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada2','$regionRDCA2','$sintomas2','$intensidad2','$naccdo','$folioAccidente')";
    mysqli_query($link,$les2) or die (mysqli_error($link));

    $C=", LESION EN ".$regionDelCuerpoAfectada2.", ".$regionRDCA2." REFIERE ".
    $sintomas2."  CON INTENSIDAD EN GRADO ".$intensidad2;
    }
    


$regionDelCuerpoAfectada3 = $_POST['regionDelCuerpoAfectada3'];
$sin3 = $_POST['sintomas3'];
$intensidad3 = $_POST['intensidad3'];
$regionRDCA3 = $_POST['regionesRDCA3'];
$sintomas3 = implode(",", $sin3);
$D="";
if($regionDelCuerpoAfectada3 != ""){
    $les3= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada3','$regionRDCA3','$sintomas3','$intensidad3','$naccdo','$folioAccidente')";
    mysqli_query($link,$les3) or die (mysqli_error($link));

    $D=", LESION EN ".$regionDelCuerpoAfectada3.", ".$regionRDCA3." REFIERE ".
    $sintomas3." CON INTENSIDAD EN GRADO ".$intensidad3;
    }
    

$regionDelCuerpoAfectada4 = $_POST['regionDelCuerpoAfectada4'];
$sin4 = $_POST['sintomas4'];
$intensidad4 = $_POST['intensidad4'];
$regionRDCA4 = $_POST['regionesRDCA4'];
$sintomas4 = implode(",", $sin4);
$E="";

if($regionDelCuerpoAfectada4 != ""){
    $les4= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada4','$regionRDCA4','$sintomas4','$intensidad4','$naccdo','$folioAccidente')";
    mysqli_query($link,$les4) or die (mysqli_error($link));

    $E=", LESION EN ".$regionDelCuerpoAfectada4.", ".$regionRDCA4." REFIERE ".
    $sintomas4." CON INTENSIDAD EN GRADO ".$intensidad4;
    }

$regionDelCuerpoAfectada5 = $_POST['regionDelCuerpoAfectada5'];
$sin5 = $_POST['sintomas5'];
$intensidad5 = $_POST['intensidad5'];
$regionRDCA5 = $_POST['regionesRDCA5'];
$sintomas5 = implode(",", $sin5);
$F="";
if($regionDelCuerpoAfectada5 != ""){
    $les5= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada5','$regionRDCA5','$sintomas5','$intensidad5','$naccdo','$folioAccidente')";
    mysqli_query($link,$les5) or die (mysqli_error($link));

    $F=", LESION EN ".$regionDelCuerpoAfectada5.", ".$regionRDCA5." REFIERE ".
    $sintomas5." CON INTENSIDAD EN GRADO ".$intensidad5;
    
    }

    $regionDelCuerpoAfectada6 = $_POST['regionDelCuerpoAfectada6'];
    $sin6 = $_POST['sintomas6'];
    $intensidad6 = $_POST['intensidad6'];
    $regionRDCA6 = $_POST['regionesRDCA6'];
    $sintomas6 = implode(",", $sin6);
    $G="";

 if($regionDelCuerpoAfectada6 != ""){
        $les6= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
        VALUES('$regionDelCuerpoAfectada6','$regionRDCA6','$sintomas6','$intensidad6','$naccdo','$folioAccidente')";
        mysqli_query($link,$les6) or die (mysqli_error($link));
        $G=", LESION EN ".$regionDelCuerpoAfectada6.", ".$regionRDCA6." REFIERE ".
        $sintomas6."  CON INTENSIDAD EN GRADO ".$intensidad6;
        
        }


        $regionDelCuerpoAfectada7 = $_POST['regionDelCuerpoAfectada7'];
        $sin7 = $_POST['sintomas7'];
        $intensidad7 = $_POST['intensidad7'];
        $regionRDCA7 = $_POST['regionesRDCA7'];
        $sintomas7 = implode(",", $sin7);
        $H="";

if($regionDelCuerpoAfectada7 != ""){
            $les7= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
            VALUES('$regionDelCuerpoAfectada7','$regionRDCA7','$sintomas7','$intensidad7','$naccdo','$folioAccidente')";
            mysqli_query($link,$les7) or die (mysqli_error($link));

            $H=", LESION EN ".$regionDelCuerpoAfectada7.", ".$regionRDCA7." REFIERE ".
            $sintomas7." CON INTENSIDAD EN GRADO ".$intensidad7;
            
            }

    
     $regionDelCuerpoAfectada8 = $_POST['regionDelCuerpoAfectada8'];
     $sin8 = $_POST['sintomas8'];
     $intensidad8 = $_POST['intensidad8'];
     $regionRDCA8 = $_POST['regionesRDCA8'];
     $sintomas8 = implode(",", $sin8);
     $I="";

 if($regionDelCuerpoAfectada8 != ""){
             $les8= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
            VALUES('$regionDelCuerpoAfectada8','$regionRDCA8','$sintomas8','$intensidad8','$naccdo','$folioAccidente')";
            mysqli_query($link,$les8) or die (mysqli_error($link));

            $I=", LESION EN ".$regionDelCuerpoAfectada8.", ".$regionRDCA8." REFIERE ".
            $sintomas8." CON INTENSIDAD EN GRADO ".$intensidad8;
                
                }


                $regionDelCuerpoAfectada9 = $_POST['regionDelCuerpoAfectada9'];
                $sin9 = $_POST['sintomas9'];
                $intensidad9 = $_POST['intensidad9'];
                $regionRDCA9 = $_POST['regionesRDCA9'];
                $sintomas9 = implode(",", $sin9);
                $J="";

if($regionDelCuerpoAfectada9 != ""){
              $les9= "INSERT INTO vasegurobd.tb_lesionesaccidentado 
              (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
               VALUES('$regionDelCuerpoAfectada9','$regionRDCA9','$sintomas9','$intensidad9','$naccdo','$folioAccidente')";
               mysqli_query($link,$les9) or die (mysqli_error($link));

               $J=", LESION EN ".$regionDelCuerpoAfectada9.", ".$regionRDCA9." REFIERE ".
            $sintomas9." CON INTENSIDAD EN GRADO ".$intensidad9;
                       
                       }


$enunciado = $A." ".$B." ".$C." ".$D." ".$E." ".$F." ".$G." ".$H." ".$I." ".$J;
$enqu= "UPDATE vasegurobd.tb_accidentes SET enunciadoLes = '$enunciado' WHERE FolioAccidente ='$folioAccidente' ";
               */                       
                                  

mysqli_query($link,$sql) or die (mysqli_error($link));
mysqli_query($link,$accidentado) or die (mysqli_error($link));
//mysqli_query($link,$enqu) or die (mysqli_error($link));

$idLDP ="";
$idCon="SELECT idAcc FROM vasegurobd.tb_accidentes WHERE FolioAccidente ='$folioAccidente'";
 
$result=mysqli_query($link,$idCon);

while($mostrar=mysqli_fetch_array($result)){
    $idLDP = $mostrar['idAcc'];
}   



?>

<script type="text/javascript">
 if((localStorage.getItem('nivel') == "1" || localStorage.getItem('nivel') == "4"  )){
        alert("ACCIDENTE APROBADO Y REGISTRADO, VAYA A LA SECCION SIGUIENTE PARA SEGUIMIENTO");
          window.location= "../forms/detallesAccidente.php?idAcc=<?php echo $idLDP; ?>" ; 
          //window.location= "../forms/detallesAccidente.php?idAcc=<?php echo $idLDP; ?>" ;     
      }
    


if((localStorage.getItem('nivel') == "5" )){
        alert("ACCIDENTE REGISTRADO POR MEDICO");
        window.location= "../forms/detallesAccidenteMedV.php?idAcc=<?php echo $idLDP; ?>" ; 
          //Window.location= "../forms/adminMedicosIn.php" ;     
      }


if((localStorage.getItem('nivel') == "6" )){
        alert("ACCIDENTE REGISTRADO POR ANALISTA DE SINIESTROS");
         window.location= "../forms/adminAuxMedIn.php" ;   
         //window.location= "../forms/adminAuxMedIn.php" ;    
      }
</script>
<?php
mysqli_close($link);


?>


  
