/**
 * Created by Julian Albero on 13/07/2015.
 */
function validador(){
    $("#formContainer").submit(function(event){
        event.preventDefault();
        var formulario = $("#formContainer");
        var allInputText = formulario.find("input[type='text']");
        var allInputRadio = formulario.find("input[type='checkbox']");
        var allInputs = [];
        var contadorErrores = 0;

        var controlText = allInputText.length;
        var controlRadio = allInputText.length;

        for(var i = 0; i < controlText; i++){
            var thisInputText = $(allInputText[i]);
            var parent = thisInputText.parent();
            if(thisInputText.val().length >= 1){
                parent.parent().hide();
            }else{
                parent.append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
                parent.addClass('has-error has-feedback');

                contadorErrores += 1;
            }
        }

        for(var j = 0; j < controlRadio; j++){
            var thisInputRadio = $(allInputRadio[j]);
            var parent2 = thisInputRadio.parent();
            if(thisInputRadio.is(':checked')){
                parent2.hide();
            }else{
                parent2.parent().addClass('has-error');
                contadorErrores += 1;
            }
        }

        if(contadorErrores > 0){
            $('body').append('<div class="col-md-2 persona-danger navbar-fixed-top">Faltan '+contadorErrores+' campos por llenar</div>');
            $('.persona-danger').fadeOut(5000);
        }else{
            alert('True')
        }

    });
}


$(document).ready(validador);
