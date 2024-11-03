$(function(){

    $(".agregar_cancion").click(function(){
        var id     = $(this).attr("id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
                type : "POST",
                url  : "/cancion/list",
                data:"{}",
                contentType:"application/json",
                dataType:"json",
                success:function(resultado){
                    option = "<option value=''>::Seleccione::</option>";
                    catego_ini = 0;
                    
                    $.each(resultado,function(index,value){
                        catego = value.CATEGP_Codigo;
                        
                        if(catego != catego_ini){
                            if(index == 0){
                               option += "<optgroup label='"+ value.CATEGC_DescripcionCorta +"'>";
                            }
                            else{
                                option += "</optgroup><optgroup label='"+ value.CATEGC_DescripcionCorta +"'>";
                            }
                        }      
                        
                        catego_ini = catego;
                        
                        option+= "<option value='"+value.CATEGCANCP_Codigo+"'>"+value.CATEGCANCC_Orden+" - " + value.CANCC_Titulo + "</option>";
                    });
                    selector  = "<select class='form-control form-control-sm' name='categ_"+id+"[]'>"+option+"</select>";					
                    $(".canciones_"+id).append(selector);			
                },
                error:function(){
                        alert('Se producjo un error');
                }
        });
					
    });

    /*function getCancion(pos){
            switch(pos){
                    case '1':
                            nombre = "entrada[]";break;
                    case '2':
                            nombre = "perdon[]";break;
                    case '3':
                            nombre = "gloria[]";break;
                    case '4':
                            nombre = "aleluya[]";break;
                    case '5':
                            nombre = "ofertorio[]";break;
                    case '6':
                            nombre = "santo[]";break;
                    case '7':
                            nombre = "padre[]";break;	
                    case '8':
                            nombre = "paz[]";break;	
                    case '9':
                            nombre = "cordero[]";break;	
                    case '10':
                            nombre = "comunion[]";break;	
                    case '11':
                            nombre = "salida[]";break;																																																		
                    default:
                            nombre = "cancion[]";break;
            }
            return nombre;
    }	*/

});