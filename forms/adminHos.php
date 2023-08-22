
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Hospital Admin VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityHos.js"></script>
      
</head>
<body>
    <div class="header">
    <center>         
       <?php
         echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
        <span class='titleHeader'> ACCIDENTES ENTRANTES</span>";
   include("../functions/phpfunctions.php");
    menuHos();
    ?>
   </center>
    </div>
      <div id="wrapper">
      <div class="limiter">
          
				<div class="container-login100" style="background:#708090;">


                <div class="col-2">
                  <label><input id="nombreHospital" name="nombreHospital" type="text" readonly></label>
                </div>
                <div class="col-2">
          <label>
          <input   name="idHos" id="idHos" type="hidden" readonly>
          <script>
          document.getElementById("idHos").value = localStorage.getItem('idHos');
          </script>
              </label> 
       
             
      </div>




                    <script>
              
            $('#nombreHospital').val(localStorage.getItem("nombreUsuario"));
                    
            var hospital = localStorage.getItem("nombreUsuario");
            var idHos = localStorage.getItem("idHos");
            $.ajax({

			url: '../functions/hospitalUsuario.php',
			type: 'POST',
			data: {hospital:hospital,idHos:idHos},
			success:function(data){
                
				$('#tablaAccidentesHos').show(); 
                $('#tablaAccidentesHos').html(data);
				
                
			}
		});
                    
                    
                    </script>
 
      
       <div id="div1">
       
	<table border="1" id="tablaAccidentesHos" name="tablaAccidentesHos">
        
        
 
            <script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
                
      
</script>
    
           </table>
 
     

  </div>
          </div>
          </div>
    </div>

</body>
       
</html>
