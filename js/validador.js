/**
 * Created by Julian Albero on 13/07/2015.
 */
function validador(){
    $("#formContainer").submit(function(event){
        event.preventDefault();
        var formulario = $("#formContainer");
        var allInputText = formulario.find("input[type='text']");
        var allInputRadio = formulario.find("input[type='radio'],input[type='checkbox']");
        console.log(allInputText);

        var controlText = allInputText.length;
        var controlRadio = allInputText.length;

        for(var i = 0; i < controlText; i++){
            console.log(allInputText[i]);
            var thisInputText = $(allInputText[i]);
            if(thisInputText.val().length >= 1){
                thisInputText.hide();
            }else{
                thisInputText.addClass('error');
            }
        }

        for(var j = 0; j < controlRadio; j++){
            var thisInputRadio = $(allInputRadio[j]);
            if(thisInputRadio.is(':checked')){
                thisInputRadio.hide();
            }else{
                thisInputRadio.addClass('error');
            }
        }
    });
}

$(document).ready(validador);
