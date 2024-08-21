$(document).ready(function () {

    let presionado = false;

    $("#sgte").click(function () {
        
    });

    $("#mostrar_ocultar").click(function(){
		if(!presionado){
		   $("span").removeClass("d-none"); 
		   $("span").addClass("d-block");    
		   presionado = true;
		}
		else{
		   $("span").removeClass("d-block"); 
		   $("span").addClass("d-none");   			
		   presionado = false;
		}
	});

});