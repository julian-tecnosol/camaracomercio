/**
 * Created by Julian Albero on 24/07/2015.
 */
function actualizarCampo(padre,selector,id){
    var $input = $(selector);
    var valActual;

    $input.blur(function(){
        valActual = $input.val();
        $.ajax({
            method: "POST",
            url : "/censocc/viewcontroller/updateActividadEconomica.php",
            data : {idActividad : id, newVal : valActual},
            success : function(data){
                alert(data);
                if (data.indexOf("Error") == -1) {
                    padre[0].cells[0].innerHTML = valActual;
                }
            }
        })
    });
}

function eliminarCampoById(id){
    $.ajax({
        method: "POST",
        url : "/censocc/viewcontroller/deleteActividadEconomica.php",
        data : {idActividad : id},
        success : function(data){
            alert(data);
        }
    });
}


function iniciarTablaActividades(){
    var $botonTablaActividades = $("#tableActividades").find("button");

    $botonTablaActividades.each(function(index, ele){
        var $thisEle = $(ele);

        $thisEle.click(function(e){
            var $padreTd = $(ele).parent().parent();
            var textoColumna = $padreTd[0].cells[0].innerHTML;
            if(ele.dataset.evento == "eliminar"){
                var confirmacion = confirm("Realmente desea eliminar: "+textoColumna);
                if (confirmacion == true){
                    eliminarCampoById(ele.dataset.id);
                }
            }else if(ele.dataset.evento == "editar"){
                $padreTd[0].cells[0].innerHTML = "<input class='form-control' type='text' value='"+textoColumna+"' name='campoActualizar' id='valActualizar'>";
                actualizarCampo($padreTd,"#valActualizar",ele.dataset.id);
            }
        });
    });
}

/*
        INICIO DE FUNCIONES PARA LAS HERRAMIENTAS ADMINISTRATIVAS
 */

function verEncuestaCompleta (id){
    console.log("id desde funcion ="+id);
    var $miModal = $("#myModal");

    $.post("/censocc/viewcontroller/getAllDataEncuesta.php", {idEmpresa : id}, function(allData){
        console.log(allData);
        var dataView = allData[0];
        var codigoHTML = "<div>" +
            "<div><h3>Fecha encuesta: </h3><span>"+dataView.fecha+"</span></div>" +
            "<div><h3>Tipo de Organizacion: </h3><span>"+dataView.TipoOrg_name+"</span></div>" +
            "<div><h3>Razon Social: </h3><span>"+dataView.nombre_razon+"</span></div>" +
            "<div><h3>Nombre Representante: </h3><span>"+dataView.nombre_razon+"</span></div>" +
            "<div><h3>Nombre Propietario: </h3><span>"+dataView.nombre_persona+"</span></div>" +
            "<div><h3>Tipo de documento: </h3><span>"+dataView.Diminutivo_identifica+"</span></div>";
        var stringIdEmpresa = dataView.id_empresa;
        if(dataView.id_tipo_identifica == 3){
            stringIdEmpresa = stringIdEmpresa.substring(0,stringIdEmpresa.length-1)+"-"+stringIdEmpresa.substring(stringIdEmpresa.length-1);
        }
        codigoHTML +="<div><h3>Numero de documento </h3><span>"+stringIdEmpresa+"</span></div>" +
            "<div><h3>Ubicacion empresa: </h3><span>"+dataView.ubicacion_name+"</span></div>"+
            "<div><h3>Caracter ubicacion: </h3><span>"+dataView.caracter_ubicacion+"</span></div>"+
            "<div><h3>Direccion empresa: </h3><span>"+dataView.direccion_empresa+"</span></div>"+
            "<div><h3>Barrio: </h3><span>"+dataView.barrio+"</span></div>"+
            "<div><h3>Telefono: </h3><span>"+dataView.telefonoEmpresa+"</span></div>"+
            "<div><h3>Celular: </h3><span>"+dataView.celular+"</span></div>"+
            "<div><h3>Correo Electronico: </h3><span>"+dataView.correo_electronico+"</span></div>"+
            "<div><h3>Actividad Economica: </h3><span>"+dataView.actividad_name+"</span></div>"+
            "<div><h3>Clasificacion Empresa: </h3><span>"+dataView.descripcion_clasificacion+"</span></div>"+
            "<div><h3>Clasificacion Empresa: </h3><span>"+dataView.descripcion_clasificacion+"</span></div>"+
            "</div>";

        $("#modalContentBody").html(codigoHTML);
    }, "json");
    $miModal.modal({
        show : true,
        keyboard : true
    });
}

function inicializarTablaEncuestas(){
    var $botonTablaActividades = $("#tableContainer").find("button");

    $botonTablaActividades.each(function(index, ele){
        var $thisEle = $(ele);

        $thisEle.click(function(e){
            e.preventDefault();
            var evento = this.dataset.evento;
            var id = this.dataset.id;

            if(evento == "ver"){
                verEncuestaCompleta(id);
            }
        });
    });
}

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
            codigoHTML += '<td>'+thisObj.nombre_persona+'</td>';
            codigoHTML += '<td>'+thisObj.actividad_name+'</td>';
            codigoHTML += '<td>'+thisObj.barrio+'</td>';
            codigoHTML += '<td>'+thisObj.comuna+'</td>';
            codigoHTML += '<td>'+thisObj.Nombre+'</td>';
            codigoHTML += '<td>'+thisObj.telefono+'</td>';
            codigoHTML += '<td>'+thisObj.Nombre_Completo+'</td>';
            codigoHTML += '<td>'+thisObj.observaciones+'</td>';
            codigoHTML += '<td><button class="btn btn-default" data-evento="ver" data-id="'+thisObj.id_empresa+'"><i class="fa fa-search"></i></a></td>';
            codigoHTML += '<td><button class="btn btn-default" data-evento="eliminar" data-id="'+thisObj.id_empresa+'"><i class="fa fa-trash-o"></i></a></td>';
            codigoHTML += '<td><button class="btn btn-default" data-evento="editar" data-id="'+thisObj.id_empresa+'"><i class="fa fa-pencil"></i></a></td>';
            codigoHTML += '</tr>';
        }
        $('#tableContainer').html(codigoHTML);
        inicializarTablaEncuestas();
    });

    var $divsTabs =  $("#mytabs");

    $divsTabs.find("a").click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });

    $divsTabs.find("a[aria-controls='actividades']").on('shown.bs.tab', function (e) {
        $.get("../../viewcontroller/getActividades.php", function(dataActividades){
            dataActividades = JSON.parse(dataActividades);
            //console.log(dataActividades);
            var codigoHTML = '';
            for(var i = 0; i < dataActividades.length; i++){
                var thisObj = dataActividades[i];
                codigoHTML +='<tr>';
                codigoHTML += ' <td>'+thisObj.actividad_name+'</td>';
                codigoHTML += ' <td>'+thisObj.Name_actividad+'</td>';
                codigoHTML += ' <td><button class="btn btn-default" data-evento="eliminar" data-id="'+thisObj.id_actividad+'"><i class="fa fa-trash-o"></i></a></td>';
                codigoHTML += ' <td><button class="btn btn-default" data-evento="editar" data-id="'+thisObj.id_actividad+'"><i class="fa fa-pencil"></i></a></td>';
                codigoHTML += '</tr>';
            }
            $('#tableActividades').html(codigoHTML);
            iniciarTablaActividades();
        })
    });

    $("#addNewActividades").submit(function(e){
        e.preventDefault();
        var $thisForm = $(this);
        $.ajax({
            method: "POST",
            url : "/censocc/viewcontroller/putNewActividad.php",
            data : $thisForm.serialize(),
            success : function(data){
                alert(data);
                $thisForm[0].reset();
            }
        })
    });


    /************************************************************************
     *      INICIAR APLICACION PARA LA CREACION DE GEOPOSICIONAMIENTO
     ***********************************************************************/
}

$(document).ready(iniciarTable);