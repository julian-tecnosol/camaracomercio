/**
 * Created by Julian Albero on 13/07/2015.
 */

function validador(){
    var formulario = $("#formContainer");
    formulario.submit(function(event){
        event.preventDefault();
        var allInputText = formulario.find("input[type='text']");
        var allInputDate = formulario.find("input[type='date']");
        var allSelects = formulario.find("select");

        var contadorErrores = 0;

        var controlText = allInputText.length;
        var ControlDate = allInputDate.length;
        var ControlSelect = allSelects.length;

        for(var a = 0; a < controlText; a++){
            var thisInputText = $(allInputText[a]);
            var parent = thisInputText.parent();
            var place = thisInputText.attr('placeholder');
            if(!place){
                if(thisInputText.val().length >= 1){
                    //parent.parent().hide();
                }
                else{
                    parent.append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
                    parent.addClass('has-error has-feedback');
                    contadorErrores += 1;
                }
            }
        }

        for(var b = 0; b < ControlDate; b++){
            var thisInputDate = $(allInputDate[b]);
            var valThisDate = thisInputDate.val();
            var parentThisDate = thisInputDate.parent();
            if(valThisDate.length >= 1){
                parentThisDate.addClass('');
            }
            else{
                parentThisDate.addClass('has-error');
                contadorErrores += 1;
            }
        }

        for(var c = 0; c < ControlSelect; c++){
            var thisSelect = $(allSelects[c]);
            var valThisSelect = thisSelect.val();
            var parentThisSelect = thisSelect.parent();
            if(valThisSelect.length >= 1){
                parentThisSelect.addClass('has-success');
            }
            else{
                parentThisSelect.addClass('has-error');
                contadorErrores += 1;
            }
        }

        /*******************************************************************************************************/
        /******     OBTENER LOS DATOS DE EL HTML PARA SER ENVIADOS A EL PHP Y AGREGADOS A EL MYSQL   ***********/
        /*******************************************************************************************************/
        console.log(contadorErrores);
        if(contadorErrores > 0){
            $('body').append('<div class="col-md-2 persona-danger navbar-fixed-top">Faltan '+contadorErrores+' campos por llenar</div>');
            $('.persona-danger').fadeOut(5000);
        }else{
            $('body').html(formulario.serialize());
            $.post('viewcontroller/putAllDataForm.php',formulario.serialize());
        }

    });
}


$(document).ready(validador);
