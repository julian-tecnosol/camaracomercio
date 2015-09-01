/**
 * Created by julian on 28/08/15.
 */


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
    });
}

//Funcion para habilitar todos los input hijos del contenedor "id"
function enableAllInput(id, container){
    $("#" + id + "Target" + container + " input").each(function(cont){
        $(this).removeAttr("disabled");
    });
}

//Funcion para deshabilitar todos los select hijos del contenedor "id"
function disableAllSelect(id, container){
    $("#" + id +"Target" + container + " select").each(function(cont){
        $(this).attr("disabled", "disabled");
    });
}

//Funcion para habilitar todos los select hijos del contenedor "id"
function enableAllSelect(id, container){
    $("#" + id + "Target" + container + " select").each(function(cont){
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
    if(($("#" + id + " option:selected").val() == "1")){
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
    }
    else{
        if(($("#" + id + " option:selected").val() == "0")){
            enableAllInput(id, 2);
            enableWhichForm(id, 2);
            enableWhyForm(id, 2);
            enableAllSelect(id, 2);
            disableAllInput(id, 1);
            disableWhichForm(id, 1);
            disableWhyForm(id, 1);
            disableAllSelect(id, 1);
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
    if(($("#" + id + " option:selected").val() == 2) || ($("#" + id + " option:selected").val() == 3) || ($("#" + id + " option:selected").val() == 17)|| ($("#" + id + " option:selected").val() == 18)){
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