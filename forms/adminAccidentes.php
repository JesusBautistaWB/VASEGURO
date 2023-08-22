<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Aprobados VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityAdmin.js"></script>
 
</head>
  
<body>
    <div class="header">
  
    <center>         
       <?php  
   include("../functions/phpfunctions.php");
    menuAdmin("ADMINISTRADOR DE ACCIDENTES");
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background:#B7B9EB; ">
        
        <div class="col-3">
          <label>
          <input  class="ace" name="idUsuario" id="idUsuario" readonly> 
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
        <div class="col-3">
           <label>
               <input class="ace" id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>

      </div>

      <div class="col-3">
      
              <label>
          <input class="ace" value="<?php $fechaActual = date('Y-m-d'); echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      </div>
        <div class="col-1">
                <span class="accdet"> SELECCIONE UN PERIODO PARA FILTRAR LOS RESULTADOS, O BUSQUE POR FOLIO</span>
                </div>
                <div class="col-3">
      
      <label>
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white;"
value=" INGRESE EL FOLIO ESPECIFICO DEL ACCIDENTE QUE REQUIERA:">
  
  <input  placeholder="BUSQUEDA POR FOLIO" onkeyup="buscarFoSe()" onchange="buscarFoSe()"
  name="folioBus" id="folioBus" style="background: white; color: black; font-size: 12px">

  </label>
</div>
        <div class="col-3">
      
      <label> <input readonly style="background: #BC240C; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoSe()" >

  </label>
</div>

<div class="col-3">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #BC240C; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoSe()" >

  </label>
</div>
                <div class="col-1">
                <span class="accdet"> SELECCIONE EL FOLIO DE APROBACION PARA VISUALIZAR LOS DATOS CORRESPONDIENTES AL ACCIDENTE Y REALIZAR LAS ACCIONES QUE CORRESPONDA</span>
                </div>
 
         

      <div class="col-3">
      <label>
      
      <input readonly style="background: #4C51C2; font-size: 10px; color: white;"
value="RESULTADOS"> 
    
<input 
style="background: white; color: black; font-size: 10px"
placeholder="LOS RESULTADOS SE MOSTRARAN AQUI" id="total">

</label>
</div>

      <div class="col-3">
               <label> 
               <input readonly style="background: #4C51C2; font-size: 10px; color: white;"
value="FILTRO POR ESTATUS:"> 
               <select id="estatusSE" name="estatusSE" onchange="busquedaACC()" style="background: white; font-size: 16px; color: black; height: auto;">
               <?php 
                        $conexion = con();
                        $esta = "SELECT registrosTotal, nombreEstatus  FROM vasegurobd.cat_estatus ORDER by nombreEstatus ASC";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>SELECCIONE UNA CATEGORIA</option>
                         <option>TODOS</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option value=".$milista['registrosTotal'].">".$milista['nombreEstatus']."</option>";
                                     }
   
                                        ?>
      </select></label>
                </div>

                <div class="col-3" >
                
      <label>
     
    
      <input readonly style="background: #4C51C2; font-size: 10px; color: white;"
value="FILTRO POR HOSPITAL:"> 
               <select id="busHos" name="busHos" onchange="busquedaHosS()" style="background: white; font-size: 16px; color: black; height: auto;">
               <?php 
                        
                        $esta = "SELECT nombreClinicaHospital FROM vasegurobd.cat_hospitales;";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>SELECCIONE UN HOSPITAL</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option>".$milista['nombreClinicaHospital']."</option>";
                                     }
   mysqli_close($conexion);
                                        ?>
      </select>
 

  </label>
</div>


      


       <div id="div1">
       <script>
              
/*  
            var estatus = $('#estatusSE option:selected').text();
            var estatusT = $('#estatusSE option:selected').text();
            
            $('#labelNOM').val(estatusT);
              $.ajax({
  
              url: '../functions/filtroUsuario.php',
              type: 'POST',
              data: {estatus:estatus},
              success:function(data){
                  
                  $('#adminTable').show(); 
                  $('#adminTable').html(data);
               
                  
              }
          }); */

          function busquedaACC(){
            var nivel = localStorage.getItem('nivel');
            var estatus = $('#estatusSE option:selected').text();
            var estatusT = $('#estatusSE option:selected').text();
            $('#labelNOM').val(estatusT);

            var total = $('#estatusSE option:selected').val();
            $('#total').val(total+" Accidentes en la categoria "+estatus);

            alert(total+" RESULTADOS EN LA CATEGORIA "+ estatus);

            $.ajax({

url: '../functions/loadscreen.php',
type: 'POST',
data: {estatus:estatus},
success:function(data){
  $('#adminTable').show(data); 
  $('#adminTable').html(data);
  
  
}
});
           
          $.ajax({
          

          url: '../functions/filtroUsuario.php',
          type: 'POST',
          data: {estatus:estatus, nivel:nivel},
          success:function(data){
              
              $('#adminTable').show(); 
              $('#adminTable').html(data);
               
              
              
          }
      });

          }
                      
                      
                      </script>  
	<table border="1" id="adminTable" name="adminTable">

           </table>
 
     

  </div>

          </div>
          </div>
    </div>
</body>
       
</html>
