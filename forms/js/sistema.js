     function autocompletarAlcaldia() {
    

	var minimo_letras = 2; // minimo letras visibles en el autocompletar
         
	var palabra = $('#alcaldiaAccidentado').val();
    var estado = $('#entidadAccidentado').val();
      
	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarAlcaldia.php',
			type: 'POST',
			data: {palabra:palabra,estado:estado},
			success:function(data){
				$('#lista_id').show();
				$('#lista_id').html(data);
                
			}
		});
        
           
        
	} else {
		//ocultamos la lista
		$('#lista_id').hide();
	}
}

// Funcion Mostrar valores

function mostrarRE(){
    
    
    $.ajax({
       
			url: '../functions/mostrarRE.php',
			type: 'POST',
            data: {palabra:palabra},
			success:function(data){
				$('#selecRE').show(data);
				$('#selecRE').html(data);
                
                
			}
		}); 
 
    
    
}




   function sugerirHospitales(){
       
             var alcaldia = $('#alcaldiaEscuela').val();
    $.ajax({
        
    
			url: '../functions/sugHos.php',
			type: 'POST',
			data: {alcaldia:alcaldia},
			success:function(data){
				$('#tabSugHos').show(data); 
                $('#tabSugHos').html(data);
				
                
			}
		});
       
   }  


   function sugerirHospitalesKM(){
       
	var id = $('#idEscuela').val();
$.ajax({
   url: '../functions/sugHosKM.php',
   type: 'POST',
   data: {id:id},
   success:function(data){
	   $('#tabSugHosKM').show(data); 
	   $('#tabSugHosKM').html(data);
	   
	   
   }
});

}  

   function busquedaPeriodo(){
       
	var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();
	document.getElementById('generarExcel').style.display = 'inline'; 

	if(fechaIn != "" && fechaFin != ""){

$.ajax({


   url: '../functions/loadscreen.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});
	
$.ajax({


   url: '../functions/buscarPeriodoAdmin.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});

	}


}  


function busquedaENC(){
       
	var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();
	document.getElementById('generarExcel').style.display = 'inline'; 

	if(fechaIn != "" && fechaFin != ""){

$.ajax({


   url: '../functions/loadscreen.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});
	
$.ajax({


   url: '../functions/buscarPeriodoENC.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});

	}


}  


function busquedaPeriodoOR(){
       
	    
	var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();
	document.getElementById('generarExcel').style.display = 'inline'; 

	if(fechaIn != "" && fechaFin != ""){

$.ajax({


   url: '../functions/loadscreen.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});
	
$.ajax({


   url: '../functions/buscarPeriodoAdminOR.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});

	}

}  

function busquedaPeriodoSe(){
      
	
	var nivel = localStorage.getItem('nivel');

	var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();



	if(fechaIn != "" && fechaFin != ""){

		$.ajax({

			url: '../functions/loadscreen.php',
			type: 'POST',
			data: {fechaIn:fechaIn, fechaFin:fechaFin},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });

$.ajax({
   url: '../functions/buscarPeriodoSe.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin, nivel:nivel},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});

	}

}  

function busquedaPeriodoCa(){
      
	
	var nivel = localStorage.getItem('nivel');

	var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();

	if(fechaIn != "" && fechaFin != ""){

$.ajax({


			url: '../functions/loadscreen.php',
			type: 'POST',
			data: {fechaIn:fechaIn, fechaFin:fechaFin},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });
	
$.ajax({


   url: '../functions/buscarPeriodoCa.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin, nivel:nivel},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});


}  

}






function infoHosp(){
    
              var hos = $('#selecHos').val();
			  
    $.ajax({
        
    
			url: '../functions/infoHos.php',
			type: 'POST',
			data: {hos:hos},
			success:function(data){
                 $('#infoHos').show(); 
				 $('#infoHos').val(data); 
                 $('#infoHos').html(data); 
                 $('#idHospital').val(hos); 
   
			}
		});

	
$.ajax({


  url: '../functions/idHos.php',
  type: 'POST',
  data: {hos:hos},
  success:function(data){
	   $('#id_hos').show(); 
	   $('#id_hos').val(data); 

  }
});

iconEsp();

}

function iconEsp(){

	var hosId = $('#selecHos').val();
	

$.ajax({
        
    
	url: '../functions/infoEsp.php',
	type: 'POST',
	data: {hosId:hosId},
	success:function(data){
		 $('#infoEsp').show(); 
		 $('#infoEsp').val(data); 
		 $('#infoEsp').html(data); 
		

	}
});
}

function iconEsp2(){

	var hosId = $('#idHospital').val();
	

$.ajax({
        
    
	url: '../functions/infoEsp.php',
	type: 'POST',
	data: {hosId:hosId},
	success:function(data){
		 $('#infoEsp').show(); 
		 $('#infoEsp').val(data); 
		 $('#infoEsp').html(data); 
		

	}
});
}

function eiSE(){
    
	var hos = $('#estatusInternoSE').val();
	   $('#estatusInterno').val(hos); 

}



function hosSE(){
    
	var hos = $('#hosAccSel').val();
	   $('#hospitalAcc').val(hos); 

	   $.ajax({


		url: '../functions/idHos.php',
		type: 'POST',
		data: {hos:hos},
		success:function(data){
		   $('#id_hos').show(); 
		   $('#id_hos').val(data); 
		
		}
		});

}


function egSE(){
    
	var hos = $('#estatusSE').val();
	   $('#estatus').val(hos); 

  

}

function envioAccFU(){
    
	var hos = $('#envioAccSE').val();
	   $('#envioAcc').val(hos); 

  

}




function infoHospMul(){
    
	var hos = $('#selecHos').val();
$.ajax({


  url: '../functions/infoHos.php',
  type: 'POST',
  data: {hos:hos},
  success:function(data){
	   $('#infoHos').show(); 
	   $('#infoHos').val(data); 
	   $('#infoHos').html(data); 
	  

  }
});
}


  function mapHos(){
       
             var hospital = $('#idHospital').val();
    $.ajax({
        
    
			url: '../functions/mapsLoc.php',
			type: 'POST',
			data: {hospital:hospital},
			success:function(data){
                
				$('#locHos').show(); 
                $('#locHos').val(data); 
                $('#locHos').html(data);
				
                
			}
		});
       
   }  
        
  function llenarDatos() {
    
	minimo_letras = 2; // minimo letras visibles en el autocompletar
	var palabra = $('#alcaldiaAccidentado').val();
	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarColonia.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(response){
               $('.selector-colonia select').html(response).fadeIn();
			}
		});
	} else {
		//ocultamos la lista
		$('#alcaldiaEscuela').hide();
	}
}
    


     function autocompletarNOMESC() {
         
    $('#alcaldiaEscuela').val("");
   $('#calleEscuela').val("");
   $('#cpEscuela').val("");
	$('#telefonoEscuela').val("");
	$('#coloniaEscuela').val("");
	$('#escuelaSel').val("");
	$('#correoEscuela').val("");
	$('#escuelaSel').val("");
	$('#idEscuela').val("");
         
         
         
	var minimo_letras = 2; // minimo letras visibles en el autocompletar
	var palabra = $('#escuela_id').val();
      
	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
        
  
        
		$.ajax({
			url: '../functions/mostrarEscuela.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_esc').show();
				$('#lista_esc').html(data);
                
       
                
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_esc').hide();
	}
}


function set_item(opciones) {
	// Cambiar el valor del formulario input
	$('#alcaldiaAccidentado').val(opciones);
    $('#alcaldiaAccidentado').show();
 
	// ocultar lista de proposiciones
	$('#lista_id').hide();
    var palabra = $('#alcaldiaAccidentado').val();

}
    
// Funcion Mostrar valores
function set_itemESC(opciones) {
	// Cambiar el valor del formulario input

var data = opciones.split('-');
claveEsc = data[0];
nombreEsc = data[1];



	$('#escuela_id').val(opciones);
	
	$('#escuelaSel').val(nombreEsc);
   
	// ocultar lista de proposiciones
	$('#lista_esc').hide();
	$('#lista_escCla').hide();


	
    
    var palabra = nombreEsc;
	
	$.ajax({
       
		url: '../functions/mostrarIDESC.php',
		type: 'POST',
		data: {ce:claveEsc, ne:nombreEsc},
		success:function(data){
			$('#idEscuela').show();
			$('#idEscuela').val(data);
			
		}
	});

	
    $.ajax({
       
			url: '../functions/mostrarDATESC.php',
			type: 'POST',
			data: {palabra:palabra, ce:claveEsc},
			success:function(data){
				$('#calleEscuela').show();
				$('#calleEscuela').val(data);
                
			}
		}); 
    
    $.ajax({
       
			url: '../functions/mostrarALCESC.php',
			type: 'POST',
			data: {palabra:palabra, ce:claveEsc},
			success:function(data){
				$('#alcaldiaEscuela').show();
				$('#alcaldiaEscuela').val(data);
                $('#alcaldiaHos').show();
                $('#alcaldiaHos').val(data);
                
			}
		}); 
    
    $.ajax({
       
			url: '../functions/mostrarCPESC.php',
			type: 'POST',
			data: {palabra:palabra, ce:claveEsc},
			success:function(data){
				$('#cpEscuela').show();
				$('#cpEscuela').val(data);
                
			}
		});
    $.ajax({
       
			url: '../functions/mostrarTELESC.php',
			type: 'POST',
			data: {palabra:palabra, ce:claveEsc},
			success:function(data){
				$('#telefonoEscuela').show();
				$('#telefonoEscuela').val(data);
                
			}
		});
        

		$.ajax({
       
			url: '../functions/mostrarCORREOESC.php',
			type: 'POST',
			data: {palabra:palabra, ce:claveEsc},
			success:function(data){
				$('#correoEscuela').show();
				$('#correoEscuela').val(data);
                
			}
		});


      $.ajax({
       
			url: '../functions/mostrarCOLHOSP.php',
			type: 'POST',
			data: {palabra:palabra, ce:claveEsc},
			success:function(data){
				$('#coloniaHos').show();
				$('#coloniaHos').val(data);
				$('#coloniaEscuela').show();
				$('#coloniaEscuela').val(data);
                  sugerirHospitales();
				 sugerirHospitalesKM()
                tabHead();
                
			}
		});   
    
    
    
    
    $.ajax({
       
			url: '../functions/mostrarHOSPITALES.php',
			type: 'POST',
            data: {palabra:palabra},
			success:function(data){
				$('#selecHos').show(data);
				$('#selecHos').html(data);
              
                
			}
		}); 
 

   
}


     function autocompletarNOMESC1() {
         
         
	var minimo_letras = 2; // minimo letras visibles en el autocompletar
	var palabra = $('#escuelaid').val();
	
      
	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
        
  
        
		$.ajax({
			url: '../functions/mostrarEscuelas.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_escamb').show();
				$('#lista_escamb').html(data);
                
       
                
                
			}
		});
        
         
        
	} else {
		//ocultamos la lista
		$('#lista_id').hide();
	}
}

function set_itemESCS(opciones) {
   
	// Cambiar el valor del formulario input
	$('#escuelaid').val(opciones);
	
    
   
	// ocultar lista de proposiciones
	$('#lista_escamb').hide();
    
    
     var palabra = $('#escuelaid').val();
	 alert(palabra);
     $.ajax({
       
			url: '../functions/mostrarIDESCa.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#idEscuelaAmb').show();
				$('#idEscuelaAmb').val(data);
                
			}
		});

		
		$.ajax({
			url: '../functions/dirEsc.php',
			type: 'POST',
			data: {escuela:palabra},
			success:function(data){
				
				
				$('#dirEscu').html(data);

                
			}
		});




		$.ajax({
       
			url: '../functions/mostrarCORREOESC.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#correoEsc').show();
				$('#correoEsc').val(data);
                
			}
		});

		
		$.ajax({
       
			url: '../functions/mostrarALCESC.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#alcaldiaEscuelaUrg').show();
				$('#alcaldiaEscuelaUrg').val(data);
                
			}
		});

		$.ajax({
       
			url: '../functions/mostrarCALLEESC.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#calleEscuelaUrg').show();
				$('#calleEscuelaUrg').val(data);
                
			}
		});

		$.ajax({
       
			url: '../functions/mostrarCOLESC.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#coloniaEscuelaUrg').show();
				$('#coloniaEscuelaUrg').val(data);
                
			}
		});

		$.ajax({
       
			url: '../functions/mostrarCPESC.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#cpEscuelaUrg').show();
				$('#cpEscuelaUrg').val(data);
                
			}
		});
		$.ajax({
       
			url: '../functions/mostrarTELESC.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#telefonoEscuelaUrg').show();
				$('#telefonoEscuelaUrg').val(data);
                
			}
		});

		

}
   

function autocompletarEstado() {
    var palabra = $('#alcaldiaAccidentado').val("");
    var palabra = $('#coloniaAccidentado').val("");

	var minimo_letras = 2; // minimo letras visibles en el autocompletar
	var palabra = $('#entidadAccidentado').val();
      
	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarEstado.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_estado').show();
				$('#lista_estado').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_estado').hide();
	}
}

// Funcion Mostrar valores
function set_itemES(opciones) {
	// Cambiar el valor del formulario input
	$('#entidadAccidentado').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_estado').hide();
    

   
}



function autocompletarColonia() {
    var palabra = $('#coloniaAccidentado').val();
    var alcaldia = $('#alcaldiaAccidentado').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarColonia.php',
			type: 'POST',
			data: {palabra:palabra, alcaldia:alcaldia},
			success:function(data){
				$('#lista_colonia').show();
				$('#lista_colonia').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_colonia').hide();
	}
}

// Funcion Mostrar valores
function set_itemCOL(opciones) {
	// Cambiar el valor del formulario input
	$('#coloniaAccidentado').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_colonia').hide();
    
    var alcaldia = $('#alcaldiaAccidentado').val();
    var colonia = $('#coloniaAccidentado').val();
    
    
      $.ajax({
			url: '../functions/cpAcc.php',
			type: 'POST',
			data: {alcaldia:alcaldia, colonia:colonia},
			success:function(data){
				$('#cpAccidentado').show();
				$('#cpAccidentado').val(data);
                
			}
		});
    

   
}


function autocompletarApellidoPaterno() {
    
    var palabra = $('#appPaRepor').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/appRepor.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_appRepor').show();
				$('#lista_appRepor').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_appRepor').hide();
	}


	//compSesion();
}

// Funcion Mostrar valores
function set_itemAppRepor(opciones) {
	// Cambiar el valor del formulario input
	$('#appPaRepor').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_appRepor').hide();
   
}

function apUrg() {
    
    var palabra = $('#aPaUrg').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/apUrg.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_appAcciUrg').show();
				$('#lista_appAcciUrg').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_appAcciUrg').hide();
	}
}

// Funcion Mostrar valores
function set_itemApUrg(opciones) {
	// Cambiar el valor del formulario input
	$('#aPaUrg').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_appAcciUrg').hide();
   
}

function amUrg() {
    
    var palabra = $('#aMaUrg').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/amUrg.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_apmAcciUrg').show();
				$('#lista_apmAcciUrg').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_apmAcciUrg').hide();
	}
}

// Funcion Mostrar valores
function set_itemAmUrg(opciones) {
	// Cambiar el valor del formulario input
	$('#aMaUrg').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_apmAcciUrg').hide();
   
}

function nomUrg(){
    
    var palabra = $('#nombreUrg').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/nomUrg.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_nomUrg').show();
				$('#lista_nomUrg').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_nomUrg').hide();
	}
}

// Funcion Mostrar valores
function set_itemNomUrg(opciones) {
	// Cambiar el valor del formulario input
	$('#nombreUrg').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_nomUrg').hide();
   
}


function autocompletarApellidoMaterno() {
    
    var palabra = $('#appMaRepor').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/apmRepor.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_apmRepor').show();
				$('#lista_apmRepor').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_apmRepor').hide();
	}
}

// Funcion Mostrar valores
function set_itemApmRepor(opciones) {
	// Cambiar el valor del formulario input
	$('#appMaRepor').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_apmRepor').hide();
       
}


function autocompletarNombreRepor() {
    
    var palabra = $('#nombreRepor').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/nombreRepor.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_nombreRepor').show();
				$('#lista_nombreRepor').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_nombreRepor').hide();
	}
}

// Funcion Mostrar valores
function set_itemNomRepor(opciones) {
	// Cambiar el valor del formulario input
	$('#nombreRepor').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_nombreRepor').hide();
       
}


function auAppAcci() {
    
    var palabra = $('#appPaAcc').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/appAcc.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_appAcci').show();
				$('#lista_appAcci').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_appAcci').hide();
	}
}

// Funcion Mostrar valores
function set_itemAppAcc(opciones) {
	// Cambiar el valor del formulario input
	$('#appPaAcc').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_appAcci').hide();
       
}




function auApmAcci() {
    
    var palabra = $('#appMaAcc').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/apmAcc.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_apmAcci').show();
				$('#lista_apmAcci').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_apmAcci').hide();
	}
}

// Funcion Mostrar valores
function set_itemApmAcc(opciones) {
	// Cambiar el valor del formulario input
	$('#appMaAcc').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_apmAcci').hide();
       
}


function auNomAcci() {
    
    var palabra = $('#nombreAcc').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/nAcc.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_nombreAcci').show();
				$('#lista_nombreAcci').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_nombreAcci').hide();
	}
}

// Funcion Mostrar valores
function set_itemNomAcc(opciones) {
	// Cambiar el valor del formulario input
	$('#nombreAcc').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_nombreAcci').hide();
       
}

function appRes() {
    
    var palabra = $('#appResponsable').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/apRes.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_appRes').show();
				$('#lista_appRes').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_appRes').hide();
	}
}

// Funcion Mostrar valores
function set_itemApRes(opciones) {
	// Cambiar el valor del formulario input
	$('#appResponsable').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_appRes').hide();
    
         var alcaldia = $('#alcaldiaEscuela').val();
    $.ajax({
        
    
			url: '../functions/sugHos.php',
			type: 'POST',
			data: {alcaldia:alcaldia},
			success:function(data){
				$('#tabSugHos').show(data); 
                $('#tabSugHos').html(data);
				
                
			}
		});
       
}

function apmRes() {
    
    var palabra = $('#apmResponsable').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/amRes.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_apmRes').show();
				$('#lista_apmRes').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_apmRes').hide();
	}
}

// Funcion Mostrar valores
function set_itemAmRes(opciones) {
	// Cambiar el valor del formulario input
	$('#apmResponsable').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_apmRes').hide();
       
}

function nombreRes() {
    
    var palabra = $('#nombreResponsable').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/nomRes.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_nombreRes').show();
				$('#lista_nombreRes').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_nombreRes').hide();
	}
}

// Funcion Mostrar valores
function set_itemNomRes(opciones) {
	// Cambiar el valor del formulario input
	$('#nombreResponsable').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_nombreRes').hide();
       
}



function salir(){
    var result = confirm("¿DESEA SALIR DEL SISTEMA?");
if (result) {

	var pa = localStorage.getItem('sessionValue');

        window.location= "../functions/closeSession.php?pa="+pa;
		
}
        
}


function aprobar(){
    var result = confirm("¿DESEA ENVIAR LOS DATOS DE ESTE ACCIDENTE?");


        
}




function mostrarIdRDCA() {
   
    var palabra = $('#regionDelCuerpoAfectada').val();

		$.ajax({
			url: '../functions/mostrarIDRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#idRDCA').show();
				$('#idRDCA').val(data);
                
			}
		});
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA').show();
                $('#regionesRDCA').html(data);
                
                
			}
		});
	
}

function mostrarRegionesRDCA1() {
   
    var palabra = $('#regionDelCuerpoAfectada1').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA1').show();
                $('#regionesRDCA1').html(data);
                
                
			}
		});
	
}

function mostrarRegionesRDCA2() {
   
    var palabra = $('#regionDelCuerpoAfectada2').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA2').show();
                $('#regionesRDCA2').html(data);
                
                
			}
		});
	
}

function mostrarRegionesRDCA3() {
   
    var palabra = $('#regionDelCuerpoAfectada3').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA3').show();
                $('#regionesRDCA3').html(data);
                
                
			}
		});
	
}

function mostrarRegionesRDCA4() {
   
    var palabra = $('#regionDelCuerpoAfectada4').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA4').show();
                $('#regionesRDCA4').html(data);
                
                
			}
		});
	
}

function mostrarRegionesRDCA5() {
   
    var palabra = $('#regionDelCuerpoAfectada5').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA5').show();
                $('#regionesRDCA5').html(data);
                
                
			}
		});
	
}

function mostrarRegionesRDCA6() {
   
    var palabra = $('#regionDelCuerpoAfectada6').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA6').show();
                $('#regionesRDCA6').html(data);
                
                
			}
		});
	
}


function mostrarRegionesRDCA7() {
   
    var palabra = $('#regionDelCuerpoAfectada7').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA7').show();
                $('#regionesRDCA7').html(data);
                
                
			}
		});
	
}


function mostrarRegionesRDCA8() {
   
    var palabra = $('#regionDelCuerpoAfectada8').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA8').show();
                $('#regionesRDCA8').html(data);
                
                
			}
		});
	
}

function mostrarRegionesRDCA9() {
   
    var palabra = $('#regionDelCuerpoAfectada9').val();
    
      $.ajax({
			url: '../functions/regionesRDCA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#regionesRDCA9').show();
                $('#regionesRDCA9').html(data);
                
                
			}
		});
	
}












function mostrarTipoAccidente() {
   
    var palabra = $('#tipoDeAccidente').val();

		$.ajax({
			url: '../functions/mostrarIDTA.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#idTipoAccidente').show();
				$('#idTipoAccidente').val(data);
                
			}
		});	
    
  
	
}


function mostrarIdLugarAcc() {
    
    var palabra = $('#lugarAccidente').val();

		$.ajax({
			url: '../functions/mostrarIDLU.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#idLugarAccidente').show();
				$('#idLugarAccidente').val(data);
                
			}
		});
	
}

function generarFolioAmbulancia() {
    
    var idUsuario = $('#idUsuario').val();
    var ambulancia = $('#ambNombre').val();
    var aPaUrg = $('#aPaUrg').val();
    var aMaUrg = $('#aMaUrg').val();   
    var nomUrg = $('#nombreUrg').val();
    var apReUr = $('#apReUr').val();
    var amReUr = $('#amReUr').val();
    var nomReUr = $('#nomReUr').val();
    var puReUr = $('#puestoReportanteUr').val();
    var telReUr = $('#telReUr').val();
    var escuelaAmb = $('#idEscuelaAmb').val();

    
if(ambulancia == "" || aPaUrg == "" || nomUrg =="" || escuelaAmb =="" || nomUrg =="" ||apReUr =="" || puReUr =="" || telReUr =="" ){
alert("LLENE TODOS LOS DATOS DEL FORMULARIO DE EMERGENCIA PARA GENERAR UN FOLIO DE URGENCIA");
} else{
$.ajax({
			url: '../functions/folioUrgenciaAmb.php',
			type: 'POST',
			data: {idUsuario:idUsuario,ambulancia:ambulancia,escuelaAmb:escuelaAmb,aPaUrg:aPaUrg,aMaUrg:aMaUrg,nomUrg:nomUrg,apReUr:apReUr,amReUr:amReUr,nomReUr:nomReUr,puReUr:puReUr, telReUr:telReUr},
			success:function(data){
				window.location= "../forms/llenarDatosPendientes.php?idAcc=" ; 
                
			}
		});

}

    

}

function alertInfo(){
    


}
function tabHead(){
    document.getElementById('sugHosHead').style.display = 'inline-block';  
}

function busquedaAvanzada(){
	document.getElementById('ba').style.display = 'inline-block';
	document.getElementById('bab').style.background = 'darkgreen';
    document.getElementById('ba2').style.display = 'inline-block'; 
    document.getElementById('det').style.display = 'inline-block'; 
    //document.getElementById('baEl').style.display = 'block';
	document.getElementById('th').style.background = '#2C4A9A';
	document.getElementById('bPA').style.background = '#2C4A9A';
    //document.getElementById('qth').style.display = 'none';
    document.getElementById('todosHospitalesSelect').style.display = 'none'; 
	document.getElementById('baTab').style.display = 'block';
	document.getElementById('buAl').style.display = 'none'; 
	document.getElementById('infoHos').style.display = 'none';
    
    
}


function quitarBA(){
    document.getElementById('todosHospitalesSelect').style.display = 'none'; 
    document.getElementById('ba').style.display = 'none';
    document.getElementById('ba2').style.display = 'none';
    document.getElementById('det').style.display = 'none'; 
    document.getElementById('baEl').style.display = 'none';
    document.getElementById('th').style.display = 'block';
    document.getElementById('baTab').style.display = 'none';
    
}

function todosHospitales(){
    document.getElementById('todosHospitalesSelect').style.display = 'inline-block'; 
    //document.getElementById('qth').style.display = 'inline-block'; 
	document.getElementById('ba').style.display = 'none';
	document.getElementById('th').style.background = 'darkgreen';
	document.getElementById('bab').style.background = '#2C4A9A';
	document.getElementById('bPA').style.background = '#2C4A9A';
    document.getElementById('ba2').style.display = 'none'; 
    document.getElementById('det').style.display = 'none'; 
	document.getElementById('baEl').style.display = 'none'; 
	document.getElementById('baTab').style.display = 'none'; 
	document.getElementById('buAl').style.display = 'none'; 
}


function quitarTH(){
    document.getElementById('todosHospitalesSelect').style.display = 'none'; 
    document.getElementById('qth').style.display = 'none';  
    document.getElementById('infoHos').style.display = 'none'; 
    document.getElementById('bab').style.display = 'block';
   
    
}

function detallesAccidente(){
  
    document.getElementById('detallesAcc').style.display = 'inline-block'; 
    document.getElementById('detallesAccT').style.display = 'inline-block'; 
    document.getElementById('detallesAcc2').style.display = 'inline-block'; 
	document.getElementById('ocDetAcc').style.display = 'block';
	document.getElementById('lesArr').style.display = 'block';
    document.getElementById('buttonDetAcc').style.display = 'none';
    
   
    
}

function ocultarDetallesAccidente(){
  
    document.getElementById('detallesAcc').style.display = 'none'; 
    document.getElementById('detallesAccT').style.display = 'none';
    document.getElementById('detallesAcc2').style.display = 'none'; 
	document.getElementById('ocDetAcc').style.display = 'none';
	document.getElementById('lesArr').style.display = 'none';
    document.getElementById('buttonDetAcc').style.display = 'block';
    
   
    
}

function busquedaPorAlcaldia(){
  
	document.getElementById('buAl').style.display = 'block'; 
	document.getElementById('bPA').style.background = 'darkgreen'; 
	document.getElementById('bab').style.background = '#2C4A9A';
	document.getElementById('th').style.background = '#2C4A9A';

	document.getElementById('todosHospitalesSelect').style.display = 'none'; 
    document.getElementById('qth').style.display = 'none';  
    document.getElementById('infoHos').style.display = 'none'; 
	document.getElementById('bab').style.display = 'block';
	
	document.getElementById('todosHospitalesSelect').style.display = 'none'; 
    document.getElementById('ba').style.display = 'none';
    document.getElementById('ba2').style.display = 'none';
    document.getElementById('det').style.display = 'none'; 
    document.getElementById('baEl').style.display = 'none';
    document.getElementById('th').style.display = 'block';
    document.getElementById('baTab').style.display = 'none';
	
    
    
   
    
}

function cerrarBusquedas(){
	document.getElementById('todosHospitalesSelect').style.display = 'none'; 
    document.getElementById('qth').style.display = 'none';  
    document.getElementById('infoHos').style.display = 'none'; 
	document.getElementById('bab').style.display = 'block';
	
	document.getElementById('todosHospitalesSelect').style.display = 'none'; 
    document.getElementById('ba').style.display = 'none';
    document.getElementById('ba2').style.display = 'none';
    document.getElementById('det').style.display = 'none'; 
    document.getElementById('baEl').style.display = 'none';
    document.getElementById('th').style.display = 'block';
	document.getElementById('baTab').style.display = 'none';
	document.getElementById('buAl').style.display = 'none';
	document.getElementById('bab').style.background = '#2C4A9A';
	document.getElementById('th').style.background = '#2C4A9A';
	document.getElementById('bPA').style.background = '#2C4A9A';

}

function ambulancias(){
    if( $('#amb').is(':checked') ) {
    } else {   
    }
    
}

function traerNombre(){
   $('#nombreEscuela').val(localStorage.getItem("nombreUsuario"));
    
}

function busquedaAvanzadaHos(){
    var neu="";
    if( $('#neu').is(':checked') ) { neu = "1"; } else {     neu = "0"; }
    var ciGe="";
    if( $('#ciGe').is(':checked') ) { ciGe = "1"; } else {    ciGe = "0"; }
    var ciGa="";
    if( $('#ciGa').is(':checked') ) { ciGa = "1"; } else {    ciGa = "0"; }
    var ciNeu="";
    if( $('#ciNeu').is(':checked') ) { ciNeu = "1"; } else {    ciNeu = "0"; }
    var ped="";
    if( $('#ped').is(':checked') ) { ped = "1"; } else {    ped = "0"; }
    var ciPl="";
    if( $('#ciPl').is(':checked') ) { ciPl = "1"; } else {    ciPl = "0"; } 
    var odo="";
    if( $('#odo').is(':checked') ) { odo = "1"; } else {    odo = "0"; }
    var oft="";
    if( $('#oft').is(':checked') ) { oft = "1"; } else {    oft = "0"; }
    
    var der="";
    if( $('#der').is(':checked') ) { der = "1"; } else {    der = "0"; }
    var traOrt="";
    if( $('#traOrt').is(':checked') ) { traOrt = "1"; } else {    traOrt = "0"; }
    var proQui="";
    if( $('#proQui').is(':checked') ) { proQui = "1"; } else {    proQui = "0"; }
    var fisReh="";
    if( $('#fisReh').is(':checked') ) {fisReh = "1"; } else {    fisReh = "0"; }
    var tom="";
    if( $('#tom').is(':checked') ) { tom = "1"; } else {    tom = "0"; }  
    var rayx="";
    if( $('#rayx').is(':checked') ) {rayx = "1"; } else {    rayx = "0"; }
    var tce="";
    if( $('#tce').is(':checked') ) { tce = "1"; } else {    tce = "0"; }
    var amb="";
    if( $('#amb').is(':checked') ) { amb = "1"; } else {    amb = "0"; }
	var otor="";
    if( $('#otor').is(':checked') ) { otor = "1"; } else {    otor = "0"; }
    
    
    
    $.ajax({
        
    
			url: '../functions/sugBaHos.php',
			type: 'POST',
			data: {neu:neu,ciGe:ciGe,ciGa:ciGa,ciNeu:ciNeu,ped:ped,ciPl:ciPl,odo:odo,oft:oft, der:der, traOrt:traOrt, proQui:proQui, fisReh:fisReh, tom:tom, rayx:rayx, tce:tce, amb:amb, otor:otor},
			success:function(data){
				$('#tabHosBa').show(data); 
                $('#tabHosBa').html(data);
				
                
			}
		});
       


   }  





function autoAPREUR() {
      
    var palabra = $('#apReUr').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/apReUr.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_apreur').show();
				$('#lista_apreur').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_apreur').hide();
	}
}

// Funcion Mostrar valores
function set_itemAPREUR(opciones) {
	// Cambiar el valor del formulario input
	$('#apReUr').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_apreur').hide();
       
}

function autoAMREUR() {
    
    var palabra = $('#amReUr').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/amReUr.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_amreur').show();
				$('#lista_amreur').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_amreur').hide();
	}
}

// Funcion Mostrar valores
function set_itemAMREUR(opciones) {
	// Cambiar el valor del formulario input
	$('#amReUr').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_amreur').hide();
       
}

function autoNOMREUR() {
    
    var palabra = $('#nomReUr').val();
	var minimo_letras = 2; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/nomReUr.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_nomreur').show();
				$('#lista_nomreur').html(data);
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_nreur').hide();
	}
}

// Funcion Mostrar valores
function set_itemNOMREUR(opciones) {
	// Cambiar el valor del formulario input
	$('#nomReUr').val(opciones);
    
   
	// ocultar lista de proposiciones
	$('#lista_nomreur').hide();
       
}

function telefonoAmbulancia(){

    var ambulancia = $('#ambNombre').val();
    
      $.ajax({
			url: '../functions/telAmb.php',
			type: 'POST',
			data: {ambulancia:ambulancia},
			success:function(data){
				
				
				$('#truIn').html(data);

                
			}
		});

}


function direccionEscuela(){

    var escuela = $('#escuelaid').val();
    

}

function tabBuAlF(){

    var alcaldia = $('#seBuAl').val();
    $.ajax({
        
    
			url: '../functions/buAlHos.php',
			type: 'POST',
			data: {alcaldia:alcaldia},
			success:function(data){
				$('#tabAlBu').show(data); 
                $('#tabAlBu').html(data);
				
                
			}
		});

}
    
function agregarLesion(){
	document.getElementById('re2').style.display = 'inline-block'; 
    document.getElementById('sin2').style.display = 'inline-block';  
	document.getElementById('int2').style.display = 'inline-block'; 

	document.getElementById('botLes2').style.display = 'inline-block'; 
	document.getElementById('btnLe1').style.display = 'inline-block'; 
	document.getElementById('btnLe1A').style.display = 'inline-block'; 
	document.getElementById('btnL1').style.display = 'none'; 
	


}

function autocompletarDIAGNOSTICO() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#diagnostico').val();
	var num = '';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarDiagnosticos.php',
			type: 'POST',
			data: {palabra:palabra, num:num},
			success:function(data){
				$('#lista_diagnostico').show();
				$('#lista_diagnostico').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_diagnostico').hide();
	}
}

// Funcion Mostrar valores
function set_itemDIA(opciones) {
	// Cambiar el valor del formulario input
	$('#diagnostico').val(opciones);
    $('#diagnostico').show();
 
	// ocultar lista de proposiciones
	$('#lista_diagnostico').hide();
    var palabra = $('#diagnostico').val();

}

function autocompletarDIAGNOSTICOE(i) {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#diagnostico'+i).val();
	
	
	var num = '';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarDiagnosticosE.php',
			type: 'POST',
			data: {palabra:palabra, num:num, i:i},
			success:function(data){
				$('#lista_diagnostico'+i).show();
				$('#lista_diagnostico'+i).html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_diagnostico'+i).hide();
	}
}

// Funcion Mostrar valores
function set_itemDIA1(opciones) {
	// Cambiar el valor del formulario input
	$('#diagnostico1').val(opciones);
    $('#diagnostico1').show();
 
	// ocultar lista de proposiciones
	$('#lista_diagnostico1').hide();
    var palabra = $('#diagnostico1').val();

}


function autocompletarDIAGNOSTICO2() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#diagnostico2').val();
	var num = '2'; 
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarDiagnosticos.php',
			type: 'POST',
			data: {palabra:palabra,num:num},
			success:function(data){
				$('#lista_diagnostico2').show();
				$('#lista_diagnostico2').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_diagnostico2').hide();
	}
}

// Funcion Mostrar valores
function set_itemDIA2(opciones) {
	// Cambiar el valor del formulario input
	$('#diagnostico2').val(opciones);
    $('#diagnostico2').show();
 
	// ocultar lista de proposiciones
	$('#lista_diagnostico2').hide();
    var palabra = $('#diagnostico2').val();

}

function autocompletarDIAGNOSTICO3() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#diagnostico3').val();
	var num = '3';  
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarDiagnosticos.php',
			type: 'POST',
			data: {palabra:palabra,num:num},
			success:function(data){
				$('#lista_diagnostico3').show();
				$('#lista_diagnostico3').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_diagnostico33').hide();
	}
}

// Funcion Mostrar valores
function set_itemDIA3(opciones) {
	// Cambiar el valor del formulario input
	$('#diagnostico3').val(opciones);
    $('#diagnostico3').show();
 
	// ocultar lista de proposiciones
	$('#lista_diagnostico3').hide();
    var palabra = $('#diagnostico3').val();

}

function autocompletarDIAGNOSTICO4() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#diagnostico4').val();
	var num = '4';  
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarDiagnosticos.php',
			type: 'POST',
			data: {palabra:palabra,num:num},
			success:function(data){
				$('#lista_diagnostico4').show();
				$('#lista_diagnostico4').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_diagnostico4').hide();
	}
}

// Funcion Mostrar valores
function set_itemDIA4(opciones) {
	// Cambiar el valor del formulario input
	$('#diagnostico4').val(opciones);
    $('#diagnostico4').show();
 
	// ocultar lista de proposiciones
	$('#lista_diagnostico4').hide();
    var palabra = $('#diagnostico4').val();

}



function autocompletarDIAGNOSTICO5() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#diagnostico5').val();
	var num = '5';  
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarDiagnosticos.php',
			type: 'POST',
			data: {palabra:palabra,num:num},
			success:function(data){
				$('#lista_diagnostico5').show();
				$('#lista_diagnostico5').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_diagnostico5').hide();
	}
}

// Funcion Mostrar valores
function set_itemDIA5(opciones) {
	// Cambiar el valor del formulario input
	$('#diagnostico5').val(opciones);
    $('#diagnostico5').show();
 
	// ocultar lista de proposiciones
	$('#lista_diagnostico5').hide();
    var palabra = $('#diagnostico5').val();

}

function autocompletarDIAGNOSTICO6() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#diagnostico6').val();
    var num = '6';   
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarDiagnosticos.php',
			type: 'POST',
			data: {palabra:palabra,num:num},
			success:function(data){
				$('#lista_diagnostico6').show();
				$('#lista_diagnostico6').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_diagnostico6').hide();
	}
}

// Funcion Mostrar valores
function set_itemDIA6(opciones) {
	// Cambiar el valor del formulario input
	$('#diagnostico6').val(opciones);
    $('#diagnostico6').show();
 
	// ocultar lista de proposiciones
	$('#lista_diagnostico6').hide();
    var palabra = $('#diagnostico6').val();

}



function autocompletarPROCEDIMIENTO() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#procedimiento').val();
	var num = '';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarProcedimientos.php',
			type: 'POST',
			data: {palabra:palabra,num:num},
			success:function(data){
				$('#lista_procedimiento').show();
				$('#lista_procedimiento').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_procedimiento').hide();
	}
}

// Funcion Mostrar valores
function set_itemPRO(opciones) {
	// Cambiar el valor del formulario input
	$('#procedimiento').val(opciones);
    $('#procedimiento').show();
 
	// ocultar lista de proposiciones
	$('#lista_procedimiento').hide();
    var palabra = $('#procedimiento ').val();

}

function autocompletarPROCEDIMIENTO2() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#procedimiento2').val();
	var num = '2';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarProcedimientos.php',
			type: 'POST',
			data: {palabra:palabra, num:num},
			success:function(data){
				$('#lista_procedimiento2').show();
				$('#lista_procedimiento2').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_procedimiento2').hide();
	}
}

// Funcion Mostrar valores
function set_itemPRO2(opciones) {
	// Cambiar el valor del formulario input
	$('#procedimiento2').val(opciones);
    $('#procedimiento2').show();
 
	// ocultar lista de proposiciones
	$('#lista_procedimiento2').hide();
    var palabra = $('#procedimiento2 ').val();

}

function autocompletarPROCEDIMIENTO3() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#procedimiento3').val();
	var num = '3';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarProcedimientos.php',
			type: 'POST',
			data: {palabra:palabra, num:num},
			success:function(data){
				$('#lista_procedimiento3').show();
				$('#lista_procedimiento3').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_procedimiento3').hide();
	}
}

// Funcion Mostrar valores
function set_itemPRO3(opciones) {
	// Cambiar el valor del formulario input
	$('#procedimiento3').val(opciones);
    $('#procedimiento3').show();
 
	// ocultar lista de proposiciones
	$('#lista_procedimiento3').hide();
    var palabra = $('#procedimiento3 ').val();

}

function autocompletarPROCEDIMIENTO4() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#procedimiento4').val();
	var num = '4';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarProcedimientos.php',
			type: 'POST',
			data: {palabra:palabra, num:num},
			success:function(data){
				$('#lista_procedimiento4').show();
				$('#lista_procedimiento4').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_procedimiento4').hide();
	}
}

// Funcion Mostrar valores
function set_itemPRO4(opciones) {
	// Cambiar el valor del formulario input
	$('#procedimiento4').val(opciones);
    $('#procedimiento4').show();
 
	// ocultar lista de proposiciones
	$('#lista_procedimiento4').hide();
    var palabra = $('#procedimiento4 ').val();

}

function autocompletarPROCEDIMIENTO5() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#procedimiento5').val();
	var num = '5';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarProcedimientos.php',
			type: 'POST',
			data: {palabra:palabra, num:num},
			success:function(data){
				$('#lista_procedimiento5').show();
				$('#lista_procedimiento5').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_procedimiento5').hide();
	}
}

// Funcion Mostrar valores
function set_itemPRO5(opciones) {
	// Cambiar el valor del formulario input
	$('#procedimiento5').val(opciones);
    $('#procedimiento5').show();
 
	// ocultar lista de proposiciones
	$('#lista_procedimiento5').hide();
    var palabra = $('#procedimiento5 ').val();

}

function autocompletarPROCEDIMIENTO6() {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#procedimiento6').val();
	var num = '6';
      
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarProcedimientos.php',
			type: 'POST',
			data: {palabra:palabra, num:num},
			success:function(data){
				$('#lista_procedimiento6').show();
				$('#lista_procedimiento6').html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_procedimiento6').hide();
	}
}

// Funcion Mostrar valores
function set_itemPRO6(opciones) {
	// Cambiar el valor del formulario input
	$('#procedimiento6').val(opciones);
    $('#procedimiento6').show();
 
	// ocultar lista de proposiciones
	$('#lista_procedimiento6').hide();
    var palabra = $('#procedimiento6 ').val();

}


function autocompletarPROCEDIMIENTOE(i) {

	var minimo_letras = 2; // minimo letras visibles en el autocompletar   
	var palabra = $('#procedimiento'+i).val();
	var num = i;
    
	if (palabra.length >= minimo_letras) {
		$.ajax({
			url: '../functions/mostrarProcedimientosE.php',
			type: 'POST',
			data: {palabra:palabra,num:num},
			success:function(data){
				$('#lista_procedimiento'+i).show();
				$('#lista_procedimiento'+i).html(data);
                
			}
		});  
        
	} else {
		//ocultamos la lista
		$('#lista_procedimiento'+i).hide();
	}
}

// Funcion Mostrar valores
function set_itemPRO1(opciones) {
	// Cambiar el valor del formulario input
	$('#procedimiento1').val(opciones);
    $('#procedimiento1').show();
 
	// ocultar lista de proposiciones
	$('#lista_procedimiento1').hide();
    var palabra = $('#procedimiento1').val();

}


function sugerirColoniaCP() {
    
	var minimo_letras = 5; // minimo letras visibles en el autocompletar   
	var cp = $('#cpAccidentado').val();
      
	if (cp.length >= minimo_letras) {  
		
		$(document).ready(function(){
		  $('.toast').toast('show');
		});
		
	
      
	
		$.ajax({
			url: '../functions/sugerirColoniasCP.php',
			type: 'POST',
			data: {cp:cp},
			success:function(data){
				$('#lista_cpList').show();
				$('#lista_cpList').html(data);
                
			}
		});
        
	}else{
		$('#coloniaAccidentado').val("");	
		$('#entidadAccidentado').val("");
		$('#alcaldiaAccidentado').val("");
		
	}

		
           
        
	
}


function setDataFromCP(opciones) {
	// Cambiar el valor del formulario input
	$('#coloniaAccidentado').val(opciones);

    $('#coloniaAccidentado').show();
 
	// ocultar lista de proposiciones
	$('#lista_cpList').hide();

	
	var cpCol = $('#coloniaAccidentado').val();
	
	var cp = $('#cpAccidentado').val();
	


	
	





	$.ajax({
		url: '../functions/sugerirEstadoCP.php',
		type: 'POST',
		data: {cp:cp,cpCol:cpCol},
		success:function(data){
			$('#entidadAccidentado').val(data);
			$('#entidadAccidentado').show();
			
		}
	});
	
	$.ajax({
		url: '../functions/sugerirAlcaldiaCP.php',
		type: 'POST',
		data: {cp:cp,cpCol:cpCol},
		success:function(data){
			$('#alcaldiaAccidentado').val(data);
			$('#alcaldiaAccidentado').show();
			
		}
	});

}

function autocompletarCLAVEESC() {
         
    $('#alcaldiaEscuela').val("");
   $('#calleEscuela').val("");
   $('#cpEscuela').val("");
	$('#telefonoEscuela').val("");
	$('#coloniaEscuela').val("");
	$('#escuelaSel').val("");
	$('#correoEscuela').val("");
	$('#escuelaSel').val("");
	$('#idEscuela').val("");
         
         
         
	var minimo_letras = 2; // minimo letras visibles en el autocompletar
	var palabra = $('#claEs').val();
      
	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {
        
  
        
		$.ajax({
			url: '../functions/mostrarEscuelaCla.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#lista_escCla').show();
				$('#lista_escCla').html(data);
                
       
                
                
			}
		});
	} else {
		//ocultamos la lista
		$('#lista_escCla').hide();
	}
}


function idHosQuery(){
    
	var hos = $('#idHospital').val();
$.ajax({


  url: '../functions/idHos.php',
  type: 'POST',
  data: {hos:hos},
  success:function(data){
	   $('#id_hos').show(); 
	   $('#id_hos').val(data); 

  }
});
}

function buscarFolio() {
    

	var minimo_letras = 2; // minimo letras visibles en el autocompletar
         
	var palabra = $('#folioBus').val();
	var usu = $('#idUsuario').val();
	document.getElementById('generarExcel').style.display = 'none'; 
	document.getElementById('generarExcelALL').style.display = 'inline'; 
      
	//Contamos el valor del input mediante una condicional
	
		$.ajax({


			url: '../functions/buscarFolio.php',
			type: 'POST',
			data: {palabra:palabra, usu:usu},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}

function buscarFoSe() {
    

	var minimo_letras = 2; // minimo letras visibles en el autocompletar
         
	var palabra = $('#folioBus').val();
	var nivel = localStorage.getItem('nivel');
	//Contamos el valor del input mediante una condicional
	$.ajax({

		url: '../functions/loadscreen.php',
		type: 'POST',
		data: {palabra:palabra},
		success:function(data){
			$('#adminTable').show(data); 
			$('#adminTable').html(data);
			
			
		}
	 });
		$.ajax({


			url: '../functions/buscarFoSe.php',
			type: 'POST',
			data: {palabra:palabra, nivel:nivel},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}

function busquedaHos() {
    
	var palabra = $('#busHos option:selected').val();
	
	var usu = $('#idUsuario').val();
	document.getElementById('generarExcel').style.display = 'none'; 
	document.getElementById('generarExcelALL').style.display = 'inline'; 
	//Contamos el valor del input mediante una condicional

alert(palabra);

	
	$.ajax({


		url: '../functions/loadscreen.php',
		type: 'POST',
		data: {palabra:palabra},
		success:function(data){
			$('#adminTable').show(data); 
			$('#adminTable').html(data);
			
			
		}
	 });
	
	
		$.ajax({


			url: '../functions/buscarAccHos.php',
			type: 'POST',
			data: {palabra:palabra, usu:usu},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}

function busquedaEnc() {
    
	var palabra = $('#busEn option:selected').text();
	var usu = $('#idUsuario').val();
	document.getElementById('generarExcel').style.display = 'none'; 
	document.getElementById('generarExcelALL').style.display = 'inline'; 
	//Contamos el valor del input mediante una condicional


	$.ajax({


		url: '../functions/loadscreen.php',
		type: 'POST',
		data: {palabra:palabra},
		success:function(data){
			$('#adminTable').show(data); 
			$('#adminTable').html(data);
			
			
		}
	 });
	
		$.ajax({


			url: '../functions/buscarAccEnc.php',
			type: 'POST',
			data: {palabra:palabra, usu:usu},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}

function busquedaEsc() {
    
	var palabra = $('#busEsc option:selected').val();
	var palabraE = $('#busEsc option:selected').text();
	var usu = $('#idUsuario').val();
	alert("SE MUESTRAN ACCIDENTES OCURRIDOS EN LA ESCUELA: "+palabraE)
 
	document.getElementById('generarExcel').style.display = 'none';
	document.getElementById('generarExcelALL').style.display = 'inline';  
	//Contamos el valor del input mediante una condicional
	
		$.ajax({


			url: '../functions/buscarAccEsc.php',
			type: 'POST',
			data: {palabra:palabra, usu:usu},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}




function busquedaHosS(){
    
	var nivel = localStorage.getItem('nivel');
	var palabra = $('#busHos option:selected').text();

	//document.getElementById('generarExcelALL').style.display = 'inline';  
      
	//Contamos el valor del input mediante una condicional
	$.ajax({

		url: '../functions/loadscreen.php',
		type: 'POST',
		data: {nivel:nivel},
		success:function(data){
			$('#adminTable').show(data); 
			$('#adminTable').html(data);
			
			
		}
	 });
	
		$.ajax({



			url: '../functions/buscarAccHosS.php',
			type: 'POST',
			data: {palabra:palabra, nivel:nivel},
			success:function(data){
				$('#adminTable').show(); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}







function busquedaEs() {
    
	var palabra = $('#busEs option:selected').val();
// alert(palabra);
      
	//Contamos el valor del input mediante una condicional



	
	$.ajax({


		url: '../functions/loadscreen.php',
		type: 'POST',
		data: {palabra:palabra},
		success:function(data){
			$('#adminTable').show(data); 
			$('#adminTable').html(data);
			
			
		}
	 });
	
	
		$.ajax({


			url: '../functions/buscarAccEs.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}

function busquedaEsIn() {
    
	var palabra = $('#busEsIn option:selected').val();
// alert(palabra);
      
	//Contamos el valor del input mediante una condicional

	$.ajax({


		url: '../functions/loadscreen.php',
		type: 'POST',
		data: {palabra:palabra},
		success:function(data){
			$('#adminTable').show(data); 
			$('#adminTable').html(data);
			
			
		}
	 });
	
		$.ajax({


			url: '../functions/buscarEsIn.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
				
				
			}
		 });   
        
	
}





function setIVA(x,r){
	$("#montosErogadosE").val(x);

	$("#montosErogadosIVA").val((x*1.16).toFixed(2));

	xx = Math.floor((x*2)/r)
    if (xx!=x/r) {xx++}
  
    var dx = (Math.round(xx*r));

	$("#reservaTecnica").val(dx);
	$("#montosErogadosRT").val(dx*1.16);

	var texto = $("#montosErogados").find('option:selected').text(); 
	$("#pq").val(texto);

	
}

  function setIv(data){
    $("#montosErogadosHM").val((data*1.16).toFixed(2));
  }
 
function siniestroRepetido() {

	  
	var palabra = $('#folioSiniestro').val();
	

      
	
		$.ajax({
			url: '../functions/revFOSI.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				
				$('#diagnostico').val(data);
				
				alert(data);
                
			}
		});  
        
	
}

function buscarFolioS() {
	var minimo_letras = 2; // minimo letras visibles en el autocompletar  
	var palabra = $('#folioBus').val();
	//Contamos el valor del input mediante una condicional
		$.ajax({
			url: '../functions/buscarFolioSol.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
	
			}
		 });   

}

function buscarFolioSM() {
	var minimo_letras = 2; // minimo letras visibles en el autocompletar  
	var palabra = $('#folioBus').val();
	//Contamos el valor del input mediante una condicional
		$.ajax({
			url: '../functions/buscarFolioSolM.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#adminTable').show(data); 
				$('#adminTable').html(data);
	
			}
		 });   

}


function busquedaPeriodoSOL(){
      
	var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();
	var folio = $('#foAcc').val();


$.ajax({

   url: '../functions/buscarPeriodoAdminSOL.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin, folio:folio},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   
	   
   }
});

} 



function busquedaPeriodoES(){
      
	var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();

	
	document.getElementById('labPer').innerHTML= "DATOS EN EL PERIODO DE "+fechaIn+" a "+" "+fechaFin;
	
	$.ajax({

		url: '../functions/totalesPeriodo.php',
		type: 'POST',
		data: {fechaIn:fechaIn, fechaFin:fechaFin},
		success:function(data){
			$('#totalesInfo').show();
				$('#totalesInfo').html(data);
				$('#totalesInfo').val(data);
                
		}
	 });

$.ajax({

   url: '../functions/busAccEs.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#acciEs').show(data); 
	   $('#acciEs').html(data);
	   
   }
});

$.ajax({

	url: '../functions/busHosEs.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#hosEs').show(data); 
		$('#hosEs').html(data);
		
	}
 });

 $.ajax({

	url: '../functions/sinEs.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#sinEs').show(data); 
		$('#sinEs').html(data);
		
	}
 });

 $.ajax({

	url: '../functions/accUsEs.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#accUsEs').show(data); 
		$('#accUsEs').html(data);
		
	}
 });



 $.ajax({

	url: '../functions/accSCPe.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#accSCPe').show(data); 
		$('#accSCPe').html(data);
		
	}
 });

 $.ajax({

	url: '../functions/accSolEsPe.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#accSolEsPe').show(data); 
		$('#accSolEsPe').html(data);
		
	}
 });


 $.ajax({

	url: '../functions/auPe.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#auPe').show(data); 
		$('#auPe').html(data);
		
	}
 });

 $.ajax({

	url: '../functions/subPe.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#subPe').show(data); 
		$('#subPe').html(data);
		
	}
 });

 $.ajax({

	url: '../functions/carusPe.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#carusPe').show(data); 
		$('#carusPe').html(data);
		
	}
 });


 $.ajax({

	url: '../functions/camUsPe.php',
	type: 'POST',
	data: {fechaIn:fechaIn, fechaFin:fechaFin},
	success:function(data){
		$('#camUs').show(data); 
		$('#camUs').html(data);
		
	}
 });






} 

function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    patron =/[\x5C'"«»“”„“|°]/;
    te = String.fromCharCode(tecla);
    return !patron.test(te);
} 

function accSolPen() {
	var palabra = "";

				$.ajax({
			url: '../functions/solicitudesPendientes.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#curpInfo').show();
				$('#adminTable').html(data);
				$('#adminTable').val(data);
                
			}
		});

		document.getElementById('btnTo').style.display = 'inline'; 
		document.getElementById('btnPe').style.display = 'none'; 
	
}

function auAlu() {
    
    var palabra = $('#curpAcc').val();
	var minimo_letras = 18; // minimo letras visibles en el autocompletar

	//Contamos el valor del input mediante una condicional
	if (palabra.length >= minimo_letras) {

				$.ajax({
			url: '../functions/autoCurp.php',
			type: 'POST',
			data: {palabra:palabra},
			success:function(data){
				$('#curpInfo').show();
				$('#curpInfo').html(data);
				$('#curpInfo').val(data);
                
			}
		});
	} 
}

function enviarMensaje(tip){
	var palabra = $('#nuevoMensaje').val();
	var tipo = tip;
	var us = localStorage.getItem('nombreUsuario');   
	var idSA = $('#idSA').val();
	
	
	if(palabra != ""){
	  $.ajax({
		url: '../functions/registrarMensaje.php',
		type: 'POST',
		data: {palabra:palabra,tipo:tipo, us:us, idSA:idSA},
		success:function(data){
		  $('#mensajesBox').show();
		  $('#mensajesBox').html(data);        
		}
	  });
	}
	else{ 
	  alert("NO PUEDE ENVIAR MENSAJES VACIOS");
	}
	
	
	}
	
	
	function actualizarMensajes(tip){
		  
		var idSA = $('#idSA').val();
		var tipo = tip;
		
		
		  $.ajax({
			url: '../functions/actualizarMensajes.php',
			type: 'POST',
			data: {idSA:idSA, tipo:tipo},
			success:function(data){
			  $('#mensajesBox').show();
			  $('#mensajesBox').html(data);        
			}
		  });
		
		
		
		}

function compSesion (){
alert("comprobando sesion");
	if(localStorage.getItem('nivel') == ""){
          
		window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
		localStorage.clear;
	  }




}