//carga la vista principal de la pagina
$(document).ready(function(){
    //cargarEncabezado("vista/sectionHead.php");
    //cargarContenido("vista/inicio.php");
});

//funcion que carga el encabezado en el div de encabezado
function cargarEncabezado(urlPagina){
    $.get(urlPagina, function(data){
       $('div#contenedorSuperior').html(data);
    });
};

//funcion que carga el rubro como contenido en el div de contenido
function cargarContenido(urlPagina){
    $.get(urlPagina, function(data){
       $('div#contenedorCentral').html(data);
    });
};

//funcion que obedece a los eventos de los botones del menu principal
function btnPress(nombre){
    switch (nombre){
        case "Jugueteria":
            cargarProductos(nombre);
        break;
        case "Maleteria":
            cargarProductos(nombre);
        break;
        case "Libreria":
            cargarProductos(nombre);
        break;
        case "Abarroteria":
            cargarProductos(nombre);
        break;
        case "inicio":
            cargarContenido("vista/inicio.php");
        break;
        case "login":
            cargarContenido("vista/formularios/formRegistrar.php");
        break;
    }
};

function cargarProductos(rubro){
    $('#contenedorCentral').empty();
    $('#contenedorCentral').append(""+"<div class='hero-unit'>"
                                     +"<h3 class='sut-titulo' id='subtitulo'>"+rubro+"</h2>"
                                     +"</div>"
                                     +"<div class='container' id='mostradorProductos'>"
                                     +"</div>"
                                  );
    $('#mostradorProductos').append("<center><img id='loading' src='img/loading.gif'></center>");
    
    $.ajax(
            {
            type:'GET',
            url:'modelo/stock_productos.php',
            dataType:'json',
            success:function(result){
                    $('#mostradorProductos').empty();
                    
                    $('#mostradorProductos').append(""+'<table>'
                                                        +'<tr>'
                                                        +'<th>Nro</th>'
                                                        +'<th><a href="javascript:void(0)">Codigo de producto</a></th>'
                                                        +'<th><a class="selected" href="javascript:void(0)">Nombre</a></th>'
                                                        +'<th><a href="javascript:void(0)">Presentacion</a></th>'
                                                        +'<th><a href="javascript:void(0)">Opciones</a></th></tr>'
                                                        +'<tr class="1">'
                                                        +'</table>');
                    $.each(result.items,function(id,valor){
                        
                        var vCont;
                        var item;
                        item ="<tr id='options"+valor.id+"'>"
                        + "<td>" + vCont +"</td>"
                        + "<td>" + valor.id + "</td>"
                        + "<td>" + valor.nom + "</td>"
                        + "<td>" + valor.presen + "</td>"
                        + "<td>"
                        + "<a href='javascript:void(0)' id='lnk-edit-"+valor.id+"'>modificar</a> - "
                        + "<a href='javascript:void(0)' id='lnk-drop-"+valor.id+"'>eliminar</a></td>"
                        + "</tr>";
                        $('table').append(item);
                        vCont++;
                    });                    
            }
     });
};

//                        //////////////////modificar///////////////////////
//                        $('#lnk-edit-'+valor.id).click(function(){
//                            documentosLibres.doc_id=valor.id;
//                            $("#formulario-crud").css("display", "block");
//                            $('#cod').val(valor.id);
//                            $('#nom').val(valor.nom);
//                            $('#des').val(valor.des);
//                            controlNewDocLibre.editar();
//                            flagButtonGuardar=1;//flag del boton guardar(1:actualiza, 2:crea nuevo registro)                            
//                            return false;
//
//                        });
//                        ////////////////////eliminar///////////////////////
//                        $('#lnk-drop-'+valor.id).click(function(){
//                            //$('#cod').val(valor.id);
//                            //alert("eliminando "+'#lnk-edit-'+valor.id);
//                            documentosLibres.eliminar(valor.id);
//                            return false;
//                        });
//
//                        ////////////////////mostrar en el crud///////////////////////
//                        $('#options'+valor.id).click(function(){
//                            $('#clicke').attr('disabled','');
//                            $('#cod').val(valor.id);
//                            $('#nom').val(valor.nom);
//                            $('#des').val(valor.des);
//                            return false;
//                        });
//                        //////////////////////////////////////////////////////////
//
//                        vCont++;
