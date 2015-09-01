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
    var $miModal = $("#myModal");

    $.post("/censocc/viewcontroller/getAllDataEncuesta.php", {idEmpresa : id}, function(allData){
        var dataView = allData[0];
        var codigoHTML = "<div>" +
            "<div><h3>Fecha encuesta: </h3><span>"+dataView.fecha+"</span></div>" +
            "<div><h3>Tipo de Organizacion: </h3><span>"+dataView.TipoOrg_name+"</span></div>" +
            "<div><h3>Razon Social: </h3><span>"+dataView.nombre_razon+"</span></div>" +
            "<div><h3>Nombre Representante: </h3><span>"+dataView.nombre_persona+"</span></div>" +
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
            "<div><h3>Comuna: </h3><span>"+dataView.comuna+"</span></div>"+
            "<div><h3>Telefono: </h3><span>"+dataView.telefonoEmpresa+"</span></div>"+
            "<div><h3>Celular: </h3><span>"+dataView.celular+"</span></div>"+
            "<div><h3>Correo Electronico: </h3><span>"+dataView.correo_electronico+"</span></div>"+
            "<div><h3>Actividad Economica: </h3><span>"+dataView.actividad_name+"</span></div>"+
            "<div><h3>Clasificacion Empresa: </h3><span>"+dataView.descripcion_clasificacion+"</span></div>";

        if(dataView.empleados == 1){
            codigoHTML += "<div><h3>Numero de Empleados: </h3><span>"+dataView.empleados_numero+"</span></div>" ;
            if(dataView.prestaciones == 1){
                codigoHTML += "<div><h3>Afiliado a salud, pension, ARL: </h3><span>Si</span></div>" ;
            }else{
                codigoHTML += "<div><h3>Afiliado a salud, pension, ARL: </h3><span>No</span></div>" +
                    "<div><h3>Por que no estan afiliados ? </h3><span>"+dataView.porque_prestaciones+"</span></div>" ;
            }
        }

        //      REGISTRO MERCANTIL
        if(dataView.registroMercantil == 1){
            codigoHTML += "<div><h3>Numero de registro mercantil: </h3><span>"+dataView.num_registro_mercantil+"</span></div>" +
                "<div><h3>Fecha registro: </h3><span>"+dataView.fecha_registro_mercantil+"</span></div>";
        }else{
            codigoHTML += "<div><h3>Porque no tiene registro mercantil: </h3><span>"+dataView.justificaciones[dataView.justificacion_registro - 1].Nombre_Justificacion+"</span></div>";
        }

        //      USO DEL SUELO

        if(dataView.usoSuelo == 1){
            codigoHTML += "<div><h3>Certificado de uso del suelo: </h3><span>Si</span></div>";
        }else{
            codigoHTML += "<div><h3>Porque no tiene certificado de uso del suelo: </h3><span>"+dataView.justificaciones[dataView.justificacion_uso_suelo - 1].Nombre_Justificacion+"</span></div>";
        }

        //      CERTIFICADO DE BOMBEROS

        if(dataView.certificadoBomberos == 1){
            codigoHTML += "<div><h3>Certificado de Bomberos: </h3><span>Si</span></div>";
        }else{
            codigoHTML += "<div><h3>Porque no tiene certificado de Bomberos: </h3><span>"+dataView.justificaciones[dataView.justificacion_bomberos - 1].Nombre_Justificacion+"</span></div>";
        }

        //     MANIPULACION DE ALIMENTOS

        if(dataView.manipulacion_alimentos == 1){
            codigoHTML += "<div><h3>Certificado de Manipulacion de alimentos: </h3><span>Si</span></div>";
        }else{
            codigoHTML += "<div><h3>Porque no tiene certificado de Manipulacion de alimentos: </h3><span>"+dataView.justificaciones[dataView.justificacion_alimentos - 1].Nombre_Justificacion+"</span></div>";
        }

        //      REGISTRO INVIMA

        if(dataView.registro_Invima == 1){
            codigoHTML += "<div><h3>Numero Invima: </h3><span>"+dataView.num_registro_mercantil+"</span></div>" +
                "<div><h3>Fecha registro: </h3><span>"+dataView.fecha_registro_mercantil+"</span></div>";
        }else{
            codigoHTML += "<div><h3>Porque no tiene registro Invima: </h3><span>"+dataView.justificaciones[dataView.justificacion_Invima - 1].Nombre_Justificacion +"</span></div>";
        }
        if(dataView.sayco_acinpro == 1){
            codigoHTML += "<div><h3>Numero Sayco: </h3><span>"+dataView.num_cert_sayco+"</span></div>" +
                "<div><h3>Fecha registro: </h3><span>"+dataView.fecha_registro_mercantil+"</span></div>";
        }else{
            codigoHTML += "<div><h3>Porque no tiene certificado de Sayco y Acinpro: </h3><span>"+dataView.justificaciones[dataView.justificacion_sayco - 1].Nombre_Justificacion+"</span></div>";
        }
        if(dataView.num_residuos == 1){
            codigoHTML += "<div><h3>Numero Invima: </h3><span>"+dataView.num_residuos_peligrosos+"</span></div>" +
                "<div><h3>Fecha registro: </h3><span>"+dataView.fecha_registro_mercantil+"</span></div>";
        }else{
            codigoHTML += "<div><h3>Residuos Peligroso: </h3><span>No Tiene</span></div>";
        }
        if(dataView.num_ciiu == 1){
            codigoHTML += "<div><h3>Numero CIIU: </h3><span>"+dataView.num_cod_ciiu+"</span></div>";
        }else{
            codigoHTML += "<div><h3>Codigo CIIU: </h3><span>No Tiene</span></div>";
        }
        if(dataView.num_industriComercio == 1){
            codigoHTML += "<div><h3>Numero Industria y Comercio: </h3><span>"+dataView.num_industriComercio+"</span></div>";
        }else{
            codigoHTML += "<div><h3>Industria y Comercio: </h3><span>No Tiene</span></div>";
        }

        codigoHTML += "<div><h3>Ingresos Mensuales: </h3><span>"+dataView.ingresos_mensuales+"</span></div>";
        codigoHTML += "<div><h3>Cuanto valen los activos del establecimiento: </h3><span>"+dataView.valor_activos+"</span></div>";

        if(dataView.sistemaSeguridad == 1){
            codigoHTML += "<div><h3>Cuenta con sistema de Seguridad: </h3><span>Si</span></div>" +
                "<div><h3>Cual: </h3><span>"+dataView.name_seguridad+"</span></div>"
        }else{
            codigoHTML += "<div><h3>Cuenta con sistema de Seguridad: </h3><span>No</span></div>";
        }

        if(dataView.victimaDelito == 1){
            codigoHTML += "<div><h3>Ha sido victima de algún delito: </h3><span>Si</span></div>" +
                "<div><h3>Cual: </h3><span>"+dataView.name_delito+"</span></div>"
        }else{
            codigoHTML += "<div><h3>Ha sido victima de algún delito: </h3><span>No</span></div>";
        }

        codigoHTML += "<div><h3>Cuenta con sistema de seguridad personal: </h3><span>"+((dataView.sistema_seguridad_personal == 1) ? "Si" : "No") +"</span></div>";

        if(dataView.tipo_usuario == 'D'){
            codigoHTML += "<div><h3>Nombre del digitador: </h3><span>"+dataView.Nombre_Completo+"</span></div>";
            codigoHTML += "<div><h3>Nombre del encuestador: </h3><span>"+dataView.nombre_encuestador+"</span></div>";
        }else{
            codigoHTML += "<div><h3>Nombre del encuestador: </h3><span>"+dataView.Nombre_Completo+"</span></div>";
        }

        codigoHTML +="</div>";

        $("#modalContentBody").html(codigoHTML);
    }, "json");

    $miModal.modal({
        show : true,
        keyboard : true
    });
}


/******************************************
 *      INICIO DE FUNCIONES PARA EDITAR
 * ***************************************/

function inicioEditar(idEmpresa){
    $.post("/censocc/viewcontroller/getAllDataEncuesta.php", {idEmpresa : idEmpresa}, function(allDataEditar){
        var dataEdit = allDataEditar[0];
        $.post("editarencuesta.php",function(data){
            //console.log(data);
            var $miModal = $("#myModalFormEdit");
            $("#modalContentFormBody").html(data);
            vaciarDatos(allDataEditar,$miModal);
        });
    });
}

/*****************************************/

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
            }else if(evento == "editar"){
                inicioEditar(id);
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
            codigoHTML += '<td>'+thisObj.direccion_empresa+'</td>';
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

    $divsTabs.find("a[aria-controls='mapagoogle']").on('shown.bs.tab', function (e) {

        /************************************************************************
         *      INICIAR APLICACION PARA LA CREACION DE GEOPOSICIONAMIENTO
         ***********************************************************************/

        var map;
        map = new google.maps.Map(document.getElementById('canvasmap'), {
            center: {lat: 4.836242, lng: -75.6799514},
            zoom: 14
        });


        function addNewMarker(position,data){
            console.log(data);
            console.log(parseFloat(data.lon),parseFloat(data.lat));

            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }


            var contentString = '<div class="row">' +
                '<div id="content" class="col-md-12 class-md-12">' +
                '<h1>'+data.nombre_razon+'</h1>' +
                '<div class="col-md-12 class-md-12">' +
                '<img src="/'+data.name_img+'" alt="'+data.nombre_razon+'" width="100%" heigth="100%    " class="img-responsive">' +
                '</div>' +
                '</div>' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });


            var marker = new google.maps.Marker({
                position: position,
                map: map
            });

            marker.addListener('click', function() {
                toggleBounce();
                infowindow.open(map, marker);
            });

        }

        function recuperarPosiciones(){
            $.get("../../viewcontroller/getPosicionAndUrl.php", function(allPosicion){
                for(var i = 0;i < allPosicion.length;i++){
                    var thisPos = allPosicion[i];
                    var pos = {lat : parseFloat(thisPos.lat), lng : parseFloat(thisPos.lon)};
                    addNewMarker(pos,thisPos);
                }
            },"json");
        }

        recuperarPosiciones();
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
        });
    });
}

$(document).ready(iniciarTable);