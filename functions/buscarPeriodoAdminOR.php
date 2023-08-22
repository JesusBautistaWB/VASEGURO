<?php      
include("phpfunctions.php");
$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];
$date2 = "";
if($fechaFin != ''){
$date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
}


		$conexion = con();
		$sql="SELECT idAcc, ACCT.FolioAccidente,appPaRepor, appMaRepor, nombreRepor,telefonoReportante, descRepor, 
        fechaRepor, PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, FechaNacimientoA,
        poblacionAccidentado, EdadA, SexoA, ACT.Colonia,ACT.AlcaldiaMunicipio, ACT.idCP, idLugarAccidente, lugarAccIn,
        GradoEscolarA, regionPrincipal,
         nombreEscuela, calleEscuela, alcaldiaEscuela, ESC.colonia, cpescuela, CalleA,
         ACT.idCP, apRes, amRes, nombreRes, telFiRes,telCelRes, tipoDeEventoInicial,
         idHospital ,FechaNacimientoA, ACCT.idEstatus, diagnosticosAcc, procedimientosAcc,
         diagnosticosLista, fechaHoraAccidente, correoReportante, enunciadoLes, montosErogados,
         resultadosEncuesta, documentosFaltantes, observacionesQueja, reservaTecnica, montosErogadosRT,
         tipoDeAtencion, tipoDeCobertura, tipoDeTramite, quejaAccidente, comentarioAccidente, honorariosMedicos,
         montosErogadosHM, ACCT.folioSiniestro, dirEscRepor, notasAcc, estatusInterno, envioAcc, indigenaAcc,estadoCivil,
          dialectoAcc, dialectoAccEs, curpAcc, ACCT.correoEscuela, tipoLlamada, paqueteHosAcc, 
          idTipoDeAccidente, tiempoGenerandoSiniestro, fechaEgreso,paquetePrecio, paquetePrecioIVA
        FROM vasegurobd.tb_accidentado ACT ,
        vasegurobd.tb_accidentes ACCT, 
        vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
         
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela 
        AND fechaRepor BETWEEN '$fechaIn' AND '$date2' 
        ORDER BY fechaRepor DESC
        ;";
       
        

       $result=mysqli_query($conexion,$sql);
       $row_cnt = mysqli_num_rows($result);

    ?>



<table border="1" id="adminTable">



<tr>
<thead style = "background-color: darkblue; font-size: 9px;">

<td style = "background-color: #a9d896;" colspan = "6"></td>
<td colspan = "3">NO. DE REPORTE</td>
<td colspan = "2">DEL CONTACTO DE LA PERSONA QUE REPORTA</td>
<td style = "background-color: #a9d896;" colspan = "3"></td>
<td colspan = "3">NOMBRE COMPLETO DE LA PERSONA ACCIDENTADA</td>
<td style = "background-color: #a9d896;" colspan = "4"></td>
<td colspan = "4">DOMICILIO COMPLETO DEL ACCIDENTADO</td>

<td  colspan = "3">ETNIA</td>
<td style = "background-color: #a9d896;" colspan='2'></td>
<td  colspan = "3">NOMBRE COMPLETO DEL PADRE, MADRE O TUTOR RESPONSABLE DEL ACCIDENTADO</td>
<td  colspan="2">TELEFONO DE LOCALIZACIÓN DE LA PERSONA ACCIDENTADA</td>
<td style = "background-color: #a9d896;" colspan = "3"></td>
<td  colspan = "4">DOMICILIO COMPLETO DE LA ESCUELA</td>
<td style = "background-color: #a9d896;" colspan = "52"></td>


</thead>
</tr>
<tr>
     <thead>
     <td><b>ELIMINAR</b></td>
     <td><b>EDITAR</b></td>
     <td>ESTATUS</td>
 
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
    <td>ESTADO CIVIL</td>
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

    <td>ESTATUS INTERNO</td>
    <td>SEGUIMIENTO TIPIFICACION</td>
    <td>TIPO DE TRAMITE</td>
    <td>PROBABLE TIPO DE LESION</td>
    <td>QUEJA</td>
    <td>COMENTARIOS</td>
    <td>NOTAS</td>
    <td>TIPO DE LLAMADA</td>
    <td>PAQUETE</td>   
    <td>FECHA FOLIO SINIESTRO</td>   
    <td>USUARIO FOLIO SINIESTRO</td> 
    <td>TIEMPO GENERANDO SINIESTRO(Minutos)
    </td>
   
    
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
            <td><?php echo $mostrar['estadoCivil'] ?></td>
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
            <td><b><?php 
            if($mostrar['paquetePrecio'] == ""){
             $pqt= explode("$",$mostrar['paqueteHosAcc']);
             $pq = $pqt[1];
 
 $pq1 = rtrim($pq,")");
 $pq2 = ltrim($pq1,"(");

 echo "$ ".$pq2;
            } else { echo $mostrar['paquetePrecio']; }
            
            ?></b></td>
            <td><?php
            if($mostrar['paquetePrecio'] == ""){
           $pq3 = $pq2+($pq2*0.16);
           echo "$ ".$pq3;
            } else { echo $mostrar['paquetePrecioIVA']; }
                       ?></td>
                        <td><b><?php echo $mostrar['honorariosMedicos'] ?></b></td>
            <td><b><?php echo $mostrar['tipoDeAtencion'] ?></b></td>
           
            <td class='<?php 
            
            
            if ($mostrar['estatusInterno'] =="REGULAR"){ echo "ace"; }
            if ($mostrar['estatusInterno'] =="PRUEBA"){ echo "enhos"; }
          
              
              
              ?>'><?php

                  echo $mostrar['estatusInterno'];

              ?></td>
            <td><?php echo $mostrar['seguimientTipificacion'] ?></td>
            <td><b><?php echo $mostrar['tipoDeTramite'] ?></b></td>
            
            <td><b><?php echo $mostrar['tipoLesion'] ?></b></td>
            <td><b><?php echo $mostrar['quejaAccidente'] ?></b></td>
            <td><b><?php echo $mostrar['comentarioAccidente'] ?></b></td>
       
            <td><b><?php echo $mostrar['notasAcc'] ?></b></td>
            
            <td><b><?php echo $mostrar['tipollamada'] ?></b></td>
            <td><b><?php echo $pqt[0]; ?></b></td>
            <?php
            $fa = $mostrar['FolioAccidente'];
            
            siniestroFo($fa); ?>
             <td><b><?php if($mostrar['tiempoGenerandoSiniestro'] ==""){ } else { echo $mostrar['tiempoGenerandoSiniestro']; } ?></b></td>
            
		</tr>
        
	<?php 
	}
	 ?>
    </table>