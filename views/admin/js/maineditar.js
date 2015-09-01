/**
 * Created by julian on 27/08/15.
 */
function vaciarEn (element,selector,value){
    var $principalForm = $("#formContainer");

    var $selectEle = $principalForm.find(element+'[name="'+selector+'"]');

    $selectEle.val(value);

    if(element == "select"){
        $selectEle.change();
    }
}

function addDateAndNumberOn (validar,dataObject,havenumber,havejustificacion){
    havejustificacion = havejustificacion || true;

    if(validar == 1){
        if(havenumber){
            vaciarEn("input",dataObject.selectorNumero,dataObject.numero);
            vaciarEn("input",dataObject.fecha,dataObject.selectorFecha);
        }
    }else{
        if(havejustificacion){
            vaciarEn("select",dataObject.selectorJustificacion,dataObject.justificacion);
        }
    }
}

function vaciarDatos (allData, modal){
    allData = JSON.parse(allData);
    allData = allData[0];
    console.log(allData);


    /***************************************
     *  OBTENER TODA LA INFORMACION
     *  NECESARIA PARA AGREGARLA A
     *  EL FORMULARIO
     **************************************/

    var objTiposOrganizacion, tituloOrganizaciones;

    $.get('/censocc/viewcontroller/getTipoOrganizacion.php',function(data) {
        data = JSON.parse(data);
        objTiposOrganizacion = data;
    }).done(function(){
        $.get('/censocc/viewcontroller/getTitleTipoOrganizacion.php',function(data2){
            data2 = JSON.parse(data2);
            tituloOrganizaciones = data2;
        }).done(function(){
            var codigoHTML = '<option value=""></option>';

            var lenTitleOrg = tituloOrganizaciones.length;
            var lenTiposOrg = objTiposOrganizacion.length;
            for(var i = 0; i < lenTitleOrg; i++){
                codigoHTML += '<optgroup label="'+tituloOrganizaciones[i].Name+':"' +'>';
                for(var j = 0;j < lenTiposOrg; j++){
                    if(objTiposOrganizacion[j].id_title == tituloOrganizaciones[i].id_title){
                        codigoHTML += '<option value="'+objTiposOrganizacion[j].TipoOrg_Id+'">'+objTiposOrganizacion[j].TipoOrg_name+'</option>';
                    }
                }
                codigoHTML += '</optgroup>'
            }
            $('#selectTipoOrg').html(codigoHTML);

            //  VACIAR TIPO ORGANIZACION ASINCRONAMENTE

            vaciarEn("select","tipoOrg",allData.id_tipo_organizacion);

            /*********/
        });
    });

    $.get('/censocc/viewcontroller/getUbicacionComercial.php',function(data3){
        data3 = JSON.parse(data3);
        var codigoHTML = '<option value=""></option>';

        for(var i = 0;i < data3.length; i++){
            codigoHTML += '<option value="'+data3[i].ubicacion_id+'">'+data3[i].ubicacion_name+'</option>';
        }

        $("#selUbicacionComercial").html(codigoHTML);

        //  VACIAR UBICACION ASINCRONAMENTE

        vaciarEn("select","selectUbicaComercial",allData.ubicacion_id);
        vaciarEn("select","caracterUbicacion",allData.id_caracter_ubicacion);

        /*********/
    });

    $.get('/censocc/viewcontroller/getClasificacionEmpresa.php',function(dataClasificaionEmpresa){
        dataClasificaionEmpresa = JSON.parse(dataClasificaionEmpresa);
        var codigoHTML = '<option value=""></option>';

        for(var i = 0;i < dataClasificaionEmpresa.length; i++){
            codigoHTML += '<option value="'+dataClasificaionEmpresa[i].id_clasificacion+'"><b>'+dataClasificaionEmpresa[i].name_clasificacion+'</b> --- '+dataClasificaionEmpresa[i].descripcion_clasificacion+'</option>';
        }

        var select = $("select[name='clasificacionEmpresa']").html(codigoHTML);

        //  VACIAR TITULO ACTIVIDAD ASINCRONAMENTE

        vaciarEn("select","clasificacionEmpresa",allData.id_clasificacion);

        /*********/
    });

    $.get('/censocc/viewcontroller/getAllEncuestadores.php', function(encuestadores){
        encuestadores = JSON.parse(encuestadores);
        var codigoHTML = '<option value=""></option>';

        for(var i = 0;i < encuestadores.length; i++){
            codigoHTML += '<option value="'+encuestadores[i].id_encuestador+'"><b>'+encuestadores[i].Nombre_Completo+'</b></option>';
        }

        $("#idOtroEncuestador").html(codigoHTML);
    });

    var objetoJSON = {};

    $.get("/censocc/viewcontroller/getAllActividadesArr.php",function(dataArray){
        objetoJSON = JSON.parse(dataArray);
    }).done(function(){

        $("#tipoDeActividad").change(function (event) {
            var valueChange = $(this).find("option:selected").val();
            var segundoSelect = $("#nameActividad");
            var codeHTML = '<option value=""></option>';
            var i = 0;

            for(i; i < objetoJSON.length; i++){
                var thisRow = objetoJSON[i];
                if(thisRow.id_title_actividad == valueChange){
                    codeHTML += '<option value='+thisRow.id_actividad+'>';
                    codeHTML += thisRow.actividad_name;
                    codeHTML += '</option>';
                }
            }

            segundoSelect.html(codeHTML);

            //  VACIAR TITULO ACTIVIDAD ASINCRONAMENTE

            vaciarEn("select","ActividadEconomica",allData.id_actividad);

            /*********/
        });

        //  VACIAR TITULO ACTIVIDAD ASINCRONAMENTE

        vaciarEn("select","titletipoActividad",allData.id_title_actividad);

        /*********/
    });

    /**************************************/

    /******************************
     *  VACIAR DATOS PERSONALES
     *****************************/

    vaciarEn("select","selectTipoDocumento",allData.id_tipo_identifica);
    vaciarEn("input","fechaencuesta",allData.fecha);
    vaciarEn("input","inpNumDocuemnto",allData.id_empresa);
    vaciarEn("input","inpNombreRazonSocial",allData.nombre_razon);
    vaciarEn("input","inpNombrePersonaNatural",allData.nombre_persona);
    vaciarEn("input","telefonoEmpresa",allData.telefonoEmpresa);
    vaciarEn("input","celularEmpresa",allData.celular);
    vaciarEn("input","correoEmpresa",allData.correo_electronico);
    vaciarEn("input","inpNombreRepresentante",allData.representante_legal);

    /****************************/

    /******************************
     *  VACIAR DATOS DE UBICACION
     *****************************/

    vaciarEn("input","direccionEmpresa",allData.direccion_empresa);
    vaciarEn("input","barrioEmpresa",allData.barrio);
    vaciarEn("select","comunaEmpresa",allData.comuna);


    /****************************/


    /********************************************
     *  VACIAR DATOS DE CLASIFICACION EMPRESA
     ********************************************/

    vaciarEn("select","tieneEmpleados",allData.empleados);
    vaciarEn("select","tipoEmpleados",allData.empleados_direc_indirect);
    vaciarEn("input","numEmpleados",allData.empleados_numero);
    vaciarEn("select","afilPensSalud",allData.prestaciones);
    vaciarEn("input","justificacionPrestaciones",allData.porque_prestaciones);

    /****************************/

    /********************************************
     *  VACIAR DATOS DE ENCUESTA GENERAL
     ********************************************/

    //Registro Mercantil
    vaciarEn("select","registMercant",allData.registroMercantil);
    var registroObj = {
        numero : allData.num_registro_mercantil,
        selectorNumero : "numMatriculaMercantil",
        fecha : allData.fecha_registro_mercantil,
        selectorFecha : "anioMatriculaMercantil",
        justificacion : allData.justificacion_registro,
        selectorJustificacion : "justificacionMercantil"
    };
    addDateAndNumberOn(allData.registroMercantil,registroObj,true);

    //Permiso de uso del suelo
    vaciarEn("select","permiSuelo",allData.usoSuelo);
    var usoSueloObj = {
        justificacion : allData.justificacion_uso_suelo,
        selectorJustificacion : "justificacionUsoSuelo"
    };
    addDateAndNumberOn(allData.usoSuelo,usoSueloObj,false);


    //Certificado de bomberos

    vaciarEn("select","certBomberos",allData.certificadoBomberos);
    var certificadoBomberosObj = {
        justificacion : allData.justificacion_bomberos,
        selectorJustificacion : "justificacionBomberos"
    };
    addDateAndNumberOn(allData.certificadoBomberos,certificadoBomberosObj,false);

    //Certificado de manipulacion de alimentos

    vaciarEn("select","manipAlimentos",allData.manipulacion_alimentos);
    var alimentosObj = {
        justificacion : allData.justificacion_alimentos,
        selectorJustificacion : "justificacionManipulacionAlimentos"
    };
    addDateAndNumberOn(allData.manipulacion_alimentos,alimentosObj,false);

    //Registro invima

    vaciarEn("select","regisInvima",allData.registro_Invima);
    var invimaObj = {
        numero : allData.num_registro_invima,
        selectorNumero : "numInvima",
        fecha : allData.fecha_registro_invima,
        selectorFecha : "fechaInvima",
        justificacion : allData.justificacion_Invima,
        selectorJustificacion : "justificacionInvima"
    };
    addDateAndNumberOn(allData.registro_Invima,invimaObj,true);

    //Sayco Acynpro

    vaciarEn("select","certSayAcin",allData.sayco_acinpro);
    var saycoObj = {
        numero : allData.num_cert_sayco,
        selectorNumero : "numSayco",
        fecha : allData.fecha_sayco,
        selectorFecha : "fecha_sayco",
        justificacion : allData.justificacion_sayco,
        selectorJustificacion : "justificacionSaycoAcinpro"
    };
    addDateAndNumberOn(allData.sayco_acinpro,saycoObj,true);

    //Disposicion de residuos peligrosos

    vaciarEn("select","contrDispoResid",allData.num_residuos);
    var residuosPeligrososObj = {
        numero : allData.num_residuos_peligrosos,
        selectorNumero : "numResiduosPeligrosos",
        fecha : allData.fecha_residuos,
        selectorFecha : "fechaResiduosPeligrosos"
    };
    addDateAndNumberOn(allData.residuos_peligrosos,residuosPeligrososObj,true,false);

    //Codigo CIIU

    vaciarEn("select","codCiiu",allData.codigo_ciiu);
    var ciiuObj = {
        numero : allData.num_cod_ciiu,
        selectorNumero : "numCodCiiu",
        fecha : allData.fecha_ciiu,
        selectorFecha : "fechaciiu"
    };
    addDateAndNumberOn(allData.codigo_ciiu,ciiuObj,true,false);

    //Codigo CIIU

    vaciarEn("select","codIndustComerc",allData.num_cod_indusComer);
    var indusComercioObj = {
        numero : allData.num_industriComercio,
        selectorNumero : "numIndustriaComercio",
        fecha : allData.fecha_industriComercio,
        selectorFecha : "fechaIndusComercio"
    };
    addDateAndNumberOn(allData.num_cod_indusComer,indusComercioObj,true,false);

    //Ingresos mensuales y activos
    vaciarEn("input","valorIngresosMensuales",allData.ingresos_mensuales);
    vaciarEn("input","valorActivosEmpresa",allData.valor_activos);
    vaciarEn("select","permisoTic",allData.TIC_PRSTM);


    //Seccion Seguridad
    vaciarEn("select","tieneSeguridadPriv",allData.sistemaSeguridad);
    ((allData.sistemaSeguridad == 1) ? vaciarEn("select","tipoSistemaSeguridad",allData.id_tipos_seguridad) : "");
    vaciarEn("select","victimaDelito",allData.victimaDelito);
    ((allData.victimaDelito == 1) ? vaciarEn("select","tipoDelito",allData.id_tipo_delitos) : "");
    vaciarEn("select","segPersonal",allData.sistema_seguridad_personal);

    vaciarEn("input","idPersonaEncuestada",allData.id_persona);
    vaciarEn("input","nombrePersonaEncuestada",allData.nombre_persona);
    vaciarEn("input","telefonoEncuestado",allData.telefono_encuestado);
    vaciarEn("input","observa",allData.observaciones);

    /****************************/

    modal.modal({
        show : true,
        keyboard : true
    });
}