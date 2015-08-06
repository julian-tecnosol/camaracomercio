/**
 * Created by Julian Albero on 24/07/2015.
 */
function iniciarTable(){
    $.get('../../viewcontroller/getAllEncuestasForTable.php',function(data){
        data = JSON.parse(data);
        var codigoHTML = '';
        for(var i = 0; i < data.length; i++){
            var thisObj = data[i];
            codigoHTML +='<tr>';
            codigoHTML += '<td>'+thisObj.id_encuesta_principal+'</td>';
            codigoHTML += '<td>'+thisObj.fecha+'</td>';
            codigoHTML += '<td>'+thisObj.id_empresa+'</td>';
            codigoHTML += '<td>'+thisObj.nombre_razon+'</td>';
            codigoHTML += '<td>'+thisObj.actividad_economica+'</td>';
            codigoHTML += '<td>'+thisObj.barrio+'</td>';
            codigoHTML += '<td>'+thisObj.comuna+'</td>';
            codigoHTML += '<td>'+thisObj.Nombre+'</td>';
            codigoHTML += '<td>'+thisObj.telefono+'</td>';
            codigoHTML += '<td>'+thisObj.observaciones+'</td>';
            codigoHTML += '<td><button class="btn btn-default" data-evento="ver" data-id="'+thisObj.id_encuesta_principal+'"><i class="fa fa-search"></i></a></td>';
            codigoHTML += '<td><button class="btn btn-default" data-evento="eliminar" data-id="'+thisObj.id_encuesta_principal+'"><i class="fa fa-trash-o"></i></a></td>';
            codigoHTML += '<td><button class="btn btn-default" data-evento="editar" data-id="'+thisObj.id_encuesta_principal+'"><i class="fa fa-pencil"></i></a></td>';
            codigoHTML += '</tr>';
        }
        $('#tableContainer').html(codigoHTML);
    }).done(function(){
        var botones  = $('#tablaEncuesta').find('button').click(function(){
            var thisId = this.dataset.id;
            var evento = this.dataset.evento;


        });
    });
}

$(document).ready(iniciarTable);