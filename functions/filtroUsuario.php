<?php
include("phpfunctions.php");
$estatus = $_POST['estatus'];

if($estatus == "TODOS"){
    $A = "";
}else{
    $A = " AND ES.nombreEstatus ='$estatus'";

}

$conexion = con();
		$sql="SELECT idAcc,ACCT.FolioAccidente,PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, 
        ACCT.idEstatus, nombreEscuela, idHospital, fechaHoraAccidente, fechaRepor, nombreUrgAmb , envioAcc 
        FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, 
        vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus 
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado 
        AND ACCT.idEscuela = ESC.idEscuela $A  ORDER BY fechaRepor DESC";
 

        echo "<table>
        <tr>
        <thead>
            <td>FOLIO DE APROBACION </td>
            <td>FECHA ACCIDENTE</td>
            <td>FECHA REPORTE</td>
            <td>ESTATUS</td>
			<td>APELLIDO PATERNO ACCIDENTADO/A</td>
			<td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
			<td>ESCUELA DE PROCEDENCIA</td>
            <td>HOSPITAL</td>
            <td>EXPORTAR</td>
            <td> SERVICIO ADICIONAL</td>
       
       </thead>
   </tr>";

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr >
            <td>
            <?php 
               echo "<a href='detallesAccidente.php?idAcc=".$mostrar['idAcc']."' method= 'GET'>".$mostrar['FolioAccidente']."</a>"; 
        ?>
            
            </td>
            <td><?php echo $mostrar['fechaHoraAccidente'] ?></td> 
            <td><?php echo $mostrar['fechaRepor'] ?></td>
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
                
                
                ?>'> <?php echo $mostrar['nombreEstatus'] ?></td>
            <td><b><?php echo $mostrar['PrimerApellidoA'] ?></b></td>
            <td><b><?php echo $mostrar['SegundoApellidoA'] ?></b></td>
            <td><b><?php 
                    
                    if($mostrar['NombreA'] == ""){
                        echo $mostrar['nombreUrgAmb'];
                    }else{
                     echo $mostrar['NombreA'];   
                    }
                    
                
                ?></b></td>
			
			<td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php echo $mostrar['idHospital'] ?></td>
            <td> 
               <?php if(($mostrar['FolioAccidente']) == "" 
               OR $mostrar['idEstatus'] =="9" 
               OR $mostrar['idEstatus'] =="4"
               OR $mostrar['idEstatus'] =="2"
               OR $mostrar['idEstatus'] =="12"
               ){
                  echo "NO DISPONIBLE";
            }else{
                if(($mostrar['envioAcc']) == "ENVIADO" ){
                 echo "<b>DESCARGA NO DISPONIBLE PARA ACCIDENTES YA ENVIADOS</b>" ;  

                }else{


                  echo "<a href='pdfdetailsAcc.php?idAcc=".$mostrar['idAcc']."' method='get'>Generar PDF</a>";
                }
            }
                
                ?> 

            </td>	
            <?php
            $nivel = $_REQUEST['nivel'];
            if($nivel == "4" || $nivel == "5"){ ?>
            
            <td><a href='solicitarServicioAdicionalMed.php?idAcc=<?php echo $mostrar['idAcc']; ?>'>
            <button class='submitbtn' class='submitbtn' style='font-size: 10px; width:120; background: #38A456'  >NUEVO SERVICIO <b>+</b></button></a></td>

            <?php 
            } 
            if($nivel == "1"){ 
            ?>
<td>NO DISPONIBLE</td>

<?php } ?>
		</tr>






  <?php
      

}
echo "</table>";

?>
 