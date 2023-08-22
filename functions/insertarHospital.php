<?php
  

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");

$idAcc= $_GET['idAcc'];
$nombreHospital = $_POST['nombreHospital'];



$idUsuario = "";
$iniciales = "";
$fechaAccidenteReportante ="";
$horaAccidenteReportante ="";

//FECHA HORA DEL ACCIDENTE
$fha = "SELECT * FROM vasegurobd.tb_accidentes WHERE idAcc = '$idAcc' ";
		$fehoacc=mysqli_query($link,$fha); 
        while($mostrar=mysqli_fetch_array($fehoacc)){
           
           $string = explode(" ", $mostrar['fechaHoraAccidente']);
           
           $fechaAccidenteReportante = $string[0];  
           $horaAccidenteReportante = $string[1];
            
           $idUsuario =  $mostrar['idUsAu'];
            
           
           
       }
//OBTENEMOS AL USUARIO QUE APROBO LA COBERTURA DEL ACCIDENTE


$in = "SELECT * FROM vasegurobd.tb_usuarios WHERE login = '$idUsuario' ";
		$in2=mysqli_query($link,$in); 
        while($mostrar=mysqli_fetch_array($in2)){
          
            $iniciales =  $mostrar['inUs'];
                      
       }

       

//CALCULAR CUANTOS REGISTROS DE ACCIDENTE HA REALIZADO EL USUARIO ACTUAL EL DIA DE HOY PARA GENERAR ID
$fechaHoy = date('Y-m-d')."%";
$rowsbyuser = "SELECT * FROM vasegurobd.tb_accidentes WHERE idUsAu = '$idUsuario' AND FolioAcciodente != '' AND fechaRepor LIKE '$fechaHoy' ";
		$rbu=mysqli_query($link,$rowsbyuser); 
        $numero = mysqli_num_rows($rbu) +1;
if($numero <10){
    
    $numero = "0".$numero;
}


   
   
      
//GENERAR EL FOLIO DE APROBACION
$hora = date("H:i:s", $time);
$fechaID = date('YYYY')."%";
$estatus = "3";
$folio = $iniciales.$fechaHoy[8].$fechaHoy[9].$fechaHoy[5].$fechaHoy[6].$fechaID[2].$fechaID[3].$hora[0].$hora[1].$numero;
$folio1 = str_replace("-", "", $folio);  
$folioAccidente = str_replace("%", "", $folio1);
        

$sql = "UPDATE vasegurobd.tb_accidentes SET idHospital = '$nombreHospital', idEstatus = 11, FolioAccidente ='$folioAccidente' WHERE idAcc = '$idAcc'";

// LESIONES INSERTADAS MULTIPLES
$regionDelCuerpoAfectada1 = $_POST['regionDelCuerpoAfectada1'];
$sin1 = $_POST['sintomas1'];
$intensidad1 = $_POST['intensidad1'];
$regionRDCA1 = $_POST['regionesRDCA1'];
$sintomas1 = implode(",", $sin1);

if($regionDelCuerpoAfectada1 != ""){
$les1= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
VALUES('$regionDelCuerpoAfectada1','$regionRDCA1','$sintomas1','$intensidad1','$naccdo','$folioAccidente')";
mysqli_query($link,$les1) or die (mysqli_error($link));

}


$regionDelCuerpoAfectada2 = $_POST['regionDelCuerpoAfectada2'];
$sin2 = $_POST['sintomas2'];
$intensidad2 = $_POST['intensidad2'];
$regionRDCA2 = $_POST['regionesRDCA2'];
$sintomas2 = implode(",", $sin2);

if($regionDelCuerpoAfectada2 != ""){
    $les2= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada2','$regionRDCA2','$sintomas2','$intensidad2','$naccdo','$folioAccidente')";
    mysqli_query($link,$les2) or die (mysqli_error($link));
    
    }
    


$regionDelCuerpoAfectada3 = $_POST['regionDelCuerpoAfectada3'];
$sin3 = $_POST['sintomas3'];
$intensidad1 = $_POST['intensidad3'];
$regionRDCA1 = $_POST['regionesRDCA1'];
$sintomas3 = implode(",", $sin3);

if($regionDelCuerpoAfectada3 != ""){
    $les3= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada3','$regionRDCA3','$sintomas3','$intensidad3','$naccdo','$folioAccidente')";
    mysqli_query($link,$les3) or die (mysqli_error($link));
    
    }

$regionDelCuerpoAfectada4 = $_POST['regionDelCuerpoAfectada4'];
$sin4 = $_POST['sintomas4'];
$intensidad4 = $_POST['intensidad4'];
$regionRDCA4 = $_POST['regionesRDCA4'];
$sintomas4 = implode(",", $sin4);

if($regionDelCuerpoAfectada4 != ""){
    $les4= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada4','$regionRDCA4','$sintomas4','$intensidad4','$naccdo','$folioAccidente')";
    mysqli_query($link,$les4) or die (mysqli_error($link));
    
    }

$regionDelCuerpoAfectada5 = $_POST['regionDelCuerpoAfectada5'];
$sin5 = $_POST['sintomas5'];
$intensidad5 = $_POST['intensidad5'];
$regionRDCA5 = $_POST['regionesRDCA5'];
$sintomas5 = implode(",", $sin5);

if($regionDelCuerpoAfectada5 != ""){
    $les5= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada5','$regionRDCA5','$sintomas5','$intensidad5','$naccdo','$folioAccidente')";
    mysqli_query($link,$les5) or die (mysqli_error($link));
    
    }
mysqli_query($link,$sql) or die (mysqli_error($link));

mysqli_close($link);


?>

<script>

        alert("HOSPITAL SELECCIONADO Y ENVIADO");
         window.location= "../forms/adminAccidentesESC.php" ;     
      
    

</script>


  
