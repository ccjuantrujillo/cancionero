$(function(){
    
    $("#anadir_cancion_a_cancionero").click(function(){

        var url = '/compania/listar';
        var index = $('#tbl_cancioneros tbody tr').length;
        
        $.get(url, '', function(data){

            fila = '<tr class="text-center">';
            fila += '<td scope="row">';
            fila += '<a href="#" onclick="eliminar_categoriacancion('+ index +')">';
            fila += '<img src="/images/icons/delete-mod.png" alt="Eliminar" class="brand-image elevation-3">';
            fila += '</a>';
            fila += '</td>';
            fila += '<td scope="row">';
            fila += '<select class="form-control" id="cancionero['+ index +']" name="cancionero['+ index +']" onchange="seleccionar_cancionero('+ index +')">';
            fila += '<option value="">::Seleccione::</option>';
            
            $.each(data, function (key, value) {
                fila += '<option value="' + value.COMPP_Codigo + '">' + value.COMPC_Descripcion + '</option>';
            });
            
            fila += '</select>';
            fila += '</td>';
            fila += '<td scope="row">';
            fila += '<select class="form-control" id="categoria['+ index +']" name="categoria['+ index +']">';
            fila += '<option value="">::Seleccione::</option>';
            fila += '</select>';
            fila += '</td>';
            fila += '<td scope="row">';
            fila += '<input type="text" name="orden['+ index +']" id="orden['+ index +']" class="form-control" />';
            fila += '<input type="hidden" name="categoriacancion['+ index +']" id="categoriacancion['+ index +']" class="form-control" />';
            fila += '</td>';           
            fila += '</tr>';
            $('#tbl_cancioneros tbody').append(fila);
            
        }, 'json');
    });
    
});

function seleccionar_cancionero (index) {
    var a = 'cancionero['+index+']';
    var b = 'categoria['+index+']';
    var cancionero = document.getElementById(a);
    var categoria  = document.getElementById(b);
    var url        = '/categoriacancion/listar/' + cancionero.value;
    
    // Add cancioneros
    $.get(url, '', function(data){
        var num_option=categoria.length;
        var orden = 'orden['+ index +']';
        for(i=1;i<=num_option;i++){
            categoria.remove(0);
        }        
        opt = document.createElement("option");
        texto = document.createTextNode("::Seleccion::");
        opt.appendChild(texto);
        opt.value = "";
        categoria.appendChild(opt);        
        $.each(data.categorias, function (key, value){
            opt   = document.createElement("option");
            texto = document.createTextNode(value.CATEGC_Descripcion); 
            opt.appendChild(texto);
            opt.value = value.CATEGP_Codigo;
            categoria.appendChild(opt);
        });
        document.getElementById(orden).value = data.maximo;
    });
    
}

function eliminar_categoriacancion (index) {
    var a   = 'categoriacancion['+ index +']';
    var categoriacancion = document.getElementById(a).value;
    var url = '/categoriacancion/eliminar-categoriacancion/' + categoriacancion;
    
    $.get(url, '', function (data) {
        if (data.success) {
            location.reload();
        }
    });
}
