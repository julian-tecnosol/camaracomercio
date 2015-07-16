/**
 * Created by Julian Albero on 10/07/2015.
 */
function inicializar(){
    var objTiposOrganizacion, tituloOrganizaciones;

    $.get('viewcontroller/getTipoOrganizacion.php',function(data) {
        data = JSON.parse(data);
        objTiposOrganizacion = data;
    }).done(function(){
        $.get('viewcontroller/getTitleTipoOrganizacion.php',function(data2){
            data2 = JSON.parse(data2);
            tituloOrganizaciones = data2;
        }).done(function(){
            var codigoHTML = '<option value=""></option>';

            var lenTitleOrg = tituloOrganizaciones.length;
            var lenTiposOrg = objTiposOrganizacion.length;
            for(var i = 0; i < lenTitleOrg; i++){
                codigoHTML += '<optgroup label="'+tituloOrganizaciones[i].Name+'"' +'>';
                for(var j = 0;j < lenTiposOrg; j++){
                    if(objTiposOrganizacion[j].id_title == tituloOrganizaciones[i].id_title){
                        codigoHTML += '<option value="'+objTiposOrganizacion[j].TipoOrg_Id+'">'+objTiposOrganizacion[j].TipoOrg_name+'</option>';
                    };
                }
                codigoHTML += '</optgroup>'
            }

            $('#selectTipoOrg').html(codigoHTML);
        });
    });

    $.get('viewcontroller/getUbicacionComercial.php',function(data3){
        data3 = JSON.parse(data3);
        var codigoHTML = '<option value=""></option>';

        for(var i = 0;i < data3.length; i++){
            codigoHTML += '<option value="'+data3[i].ubicacion_id+'">'+data3[i].ubicacion_name+'</option>';
        }

        $("#selUbicacionComercial").html(codigoHTML);
    });

    $.get('viewcontroller/getClasificacionEmpresa.php',function(dataClasificaionEmpresa){
        dataClasificaionEmpresa = JSON.parse(dataClasificaionEmpresa);
        var codigoHTML = '<option value=""></option>';

        for(var i = 0;i < dataClasificaionEmpresa.length; i++){
            codigoHTML += '<option value="'+dataClasificaionEmpresa[i].id_clasificacion+'"><b>'+dataClasificaionEmpresa[i].name_clasificacion+'</b> --- '+dataClasificaionEmpresa[i].descripcion_clasificacion+'</option>';
        }

        var select = $("select[name='clasificacionEmpresa']").html(codigoHTML);
    });

}

$(document).ready(inicializar);