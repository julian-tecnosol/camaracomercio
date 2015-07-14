/**
 * Created by Julian Albero on 13/07/2015.
 */
function validador(){
    var allInput = $("#formContainer").find("input");

    var control = allInput.length;

    for(var i = 0; i < control; i++){
        console.log(allInput[i]);
        var thisInput = $(allInput[i]);
        if(thisInput.val().length >= 1){
            thisInput.hide();
        }
    }
}

$(document).ready(validador);