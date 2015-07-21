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


    /*******************************************************************************************************/
    /******     OBTENER LOS DATOS DE EL HTML PARA SER ENVIADOS A EL PHP Y AGREGADOS A EL MYSQL   ***********/
    /*******************************************************************************************************/
}




function checkIdConditionW(id){
    if(($("#" + id + " option:selected").val() == 1) || ($("#" + id + " option:selected").val() == "")){
        $("#" + id + 'Target2' ).hide();
    }
    else{
            $("#" + id + 'Target2' ).show();
    }
}

function checkIdConditionRegMerc(id){
    if($("#" + id + " option:selected").val() == ""){
        $("#" + id + 'Target1' ).hide();
        $("#" + id + 'Target2' ).hide();
    }
    else {
        if($("#" + id + " option:selected").val() == 1){
            $("#" + id + 'Target1' ).show();
            $("#" + id + 'Target2' ).hide();
        }
        else{
            if($("#" + id + " option:selected").val() == 0){
                $("#" + id + 'Target2' ).show();
                $("#" + id + 'Target1' ).hide();
            }
        }
    }
}

//Funcion para deshabilitar todos los input hijos del contenedor "id"
function disableAllInput(id, container){
    $("#" + id +"Target" + container + " input").each(function(cont){
        $(this).attr("disabled", "disabled");
        console.log(this);
    });
}

//Funcion para habilitar todos los input hijos del contenedor "id"
function enableAllInput(id, container){
    $("#" + id + "Target" + container + " input").each(function(cont){
            console.log(this);
            $(this).removeAttr("disabled");
        });
}

//Funcion para deshabilitar todos los select hijos del contenedor "id"
function disableAllSelect(id, container){
    $("#" + id +"Target" + container + " select").each(function(cont){
        $(this).attr("disabled", "disabled");
        console.log(this);
    });
}

//Funcion para habilitar todos los select hijos del contenedor "id"
function enableAllSelect(id, container){
    $("#" + id + "Target" + container + " select").each(function(cont){
            console.log(this);
            $(this).removeAttr("disabled");
        });
}

//Funciones para habilitar y desahabilitar formulario "Porque"
function enableWhyForm(id, container){
    $("#" + id + "Target" + container + " input").removeAttr("disabled");
}

function disableWhyForm(id, container){
    $("#" + id + "Target" + container + " input").attr("disabled", "disabled")[0];
}

//Funciones para habilitar y deshabilitar formularios "Cual"
function enableWhichForm(id, container){
    $("#" + id + "Target" + container + " select").removeAttr("disabled");
}

function disableWhichForm(id, container){
    $("#" + id + "Target" + container + " select").attr("disabled", "disabled")[0];
}

function enableSelectForm(id, container){
    $("#" + id + "Target" + container + " select").removeAttr("disabled");
}

function disableSelectForm(id, container){
    $("#" + id + "Target" + container + " select").attr("disabled", "disabled")[0];
}

//Funcion para habilitar  campos que se deben llenar y deshabilitar campos que van a quedar vacios
function enableTag(id){
        console.log("--Entro desde: ");
        console.log("--" + id + " Query: ");
        console.log($("#" + id).val())
    if(($("#" + id + " option:selected").val() == "1")){
        console.log("Entro desde: ");
        console.log(id);
        enableAllInput(id, 1);
        enableWhichForm(id, 1);
        enableWhyForm(id, 1);
        //enableAllWhichForm(id, 1);
        //enableAllWhyForm(id, 1);
        enableAllSelect(id, 1);
        disableAllInput(id, 2);
        disableWhichForm(id, 2);
        disableWhyForm(id, 2);
        //disableAllWhichForm(id, 2);
        //disableAllWhyForm(id, 2);
        disableAllSelect(id, 2);
        console.log("inActivo");
        console.log($("#" + id + "Target2")[0]);
    }
    else{
        if(($("#" + id + " option:selected").val() == "0")){
            console.log("Entra y esta " + $("#" + id + " option:selected").val());
            enableAllInput(id, 2);
            enableWhichForm(id, 2);
            enableWhyForm(id, 2);
            enableAllSelect(id, 2);
            disableAllInput(id, 1);
            disableWhichForm(id, 1);
            disableWhyForm(id, 1);
            disableAllSelect(id, 1);
            console.log("inActivo");
            console.log($("#" + id + "Target2")[0]);
        }
        else{
            if(($("#" + id + " option:selected").val() === "")){
                disableAllInput(id, 1);
                disableWhichForm(id, 1);
                disableWhyForm(id, 1);
                disableAllSelect(id, 1);
                disableAllInput(id, 2);
                disableWhichForm(id, 2);
                disableWhyForm(id, 2);
                disableAllSelect(id, 2);
            }
        }
    }
}

function showAdInfo(id){
    if(($("#" + id + " option:selected").val() == 2) || ($("#" + id + " option:selected").val() == 3)){
        enableAllSelect(id, '');
        enableAllInput(id, '');
        $("#" + id + "Target").show();
    }
    else{
        disableAllSelect(id, '');
        disableAllInput(id, '');
        $("#" + id + "Target").hide();
    }
}

function checkIdCondition(id){
    if($("#" + id + " option:selected").val() == 1){
        console.log("Entra 1");
        console.log(id);
        enableTag(id, 1);
        $("#" + id + 'Target1' ).show();
        console.log("Paso de largo");
    }
    else{
        console.log("Entra 2");
        console.log(id);
        enableTag(id, 2);
        $("#" + id + 'Target1' ).hide();
        console.log("Paso de largo");
    }
}

$(document).ready(inicializar);