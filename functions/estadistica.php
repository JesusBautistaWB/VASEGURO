<?php 

include("phpfunctions.php");
ini_set('display_errors', 1);

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

	?>