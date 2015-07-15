/**
 * Created by Julian Albero on 13/07/2015.
 */
function validador(){
    $("#formContainer").submit(function(event){
        event.preventDefault();
        var formulario = $("#formContainer");
        var allInputText = formulario.find("input[type='text']");
        var allInputRadio = formulario.find("input[type='radio'],input[type='checkbox']");

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
            }
        }

        for(var j = 0; j < controlRadio; j++){
            var thisInputRadio = $(allInputRadio[j]);
            var parent = thisInputRadio.parent();
            if(thisInputRadio.is(':checked')){
                thisInputRadio.hide();
            }else{
                parent.parent().addClass('has-error');
            }
        }
    });
}

$(document).ready(validador);
