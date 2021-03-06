/**
 * Created by Julian Albero on 13/07/2015.
 */

function validador(){
    var formulario = $("#formContainer");

    function validIsNumber (ele){
        var $esteInputNum = ele;
        $esteInputNum.blur(function () {
            var boolNumero = $.isNumeric($esteInputNum.val());
            if (!boolNumero) {
                $esteInputNum.focus();
                $('body').append('<div class="col-md-2 persona-danger navbar-fixed-top">Debe Ser Solo Numerico '+$esteInputNum.val()+'</div>');
                $('.persona-danger').fadeOut(5000);
            }
        });
    }

    var allInputsNumber = $("input[type='number']");
    allInputsNumber.each(function(){
        var $esteInputNum = $(this);
        if ($esteInputNum.data("validar") !== false) {
            validIsNumber($esteInputNum);
        }
    });

    formulario.submit(function(event){

        event.preventDefault();
        var allInputText = formulario.find("input[type='text']");
        var allInputDate = formulario.find("input[type='date']");
        var allInputNum = formulario.find("input[type='number']");
        var allSelects = formulario.find("select");

        var contadorErrores = 0;

        var controlText = allInputText.length;
        var ControlDate = allInputDate.length;
        var ControlSelect = allSelects.length;
        var ControlNumber = allInputNum.length;

        for(var a = 0; a < controlText; a++){
            if(allInputText[a].disabled == false){
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
        }

        for(var b = 0; b < ControlDate; b++){
            if(allInputDate[b].disabled == false){
                var thisInputDate = $(allInputDate[b]);
                if(!(thisInputDate.disabled)){
                    var valThisDate = thisInputDate.val();
                    var parentThisDate = thisInputDate.parent();
                    if(valThisDate.length >= 1){
                        parentThisDate.addClass('');
                    }else{
                        parentThisDate.addClass('has-error');
                        contadorErrores += 1;
                    }
                }
            }
        }

        for(var c = 0; c < ControlSelect; c++){
            if(allSelects[c].disabled == false){
                var thisSelect = $(allSelects[c]);
                if(!(thisSelect.disabled)){
                    var valThisSelect = thisSelect.val();
                    var parentThisSelect = thisSelect.parent();
                    console.log(thisSelect);
                    if(valThisSelect.length >= 1){
                        parentThisSelect.addClass('has-success');
                    }
                    else{
                        parentThisSelect.addClass('has-error');
                        contadorErrores += 1;
                    }
                }
            }
        }

        for(var d = 0; d < ControlNumber; d++){
            if(allInputNum[d].dataset.validar === undefined) {
                if (allInputNum[d].disabled == false) {
                    var thisInputNum = $(allInputNum[d]);
                    if (!(thisInputNum.disabled)) {
                        var valThisInputNum = thisInputNum.val();
                        var parentThisNum = thisInputNum.parent();
                        if (valThisInputNum.length >= 1) {
                            parentThisNum.addClass('has-success');
                        }
                        else {
                            parentThisNum.addClass('has-error');
                            contadorErrores += 1;
                        }
                    }
                }
            }
        }

        /*******************************************************************************************************/
        /******     OBTENER LOS DATOS DE EL HTML PARA SER ENVIADOS A EL PHP Y AGREGADOS A EL MYSQL   ***********/
        /*******************************************************************************************************/

        if(contadorErrores > 0){
            $('body').append('<div class="col-md-2 persona-danger navbar-fixed-top">Faltan ' + contadorErrores + ' campos por llenar</div>');
            $('.persona-danger').fadeOut(5000);
        }else{
            var modal =$('#myModal');
            modal.modal('show');
            $.ajax({
                method : 'POST',
                url : 'viewcontroller/putAllDataForm.php',
                data : formulario.serialize(),
                success : function(data){
                    $('#modalContainer').append(data);
                    $("#takePic").click(function(e){
                        e.preventDefault();
                        var numDocumento = $('#NumeroDeDocumento').val();
                        var url = "picgps?error=FALSE&value="+numDocumento;
                        window.open(url);
                    });
                    modal.on('hidden.bs.modal', function () {
                        document.getElementById("formContainer").reset();
                        location.reload()
                    });
                    modal.on('hidden', function () {
                        document.getElementById("formContainer").reset();
                        location.reload()
                    })
                }
            });
        }
    });
}


$(document).ready(validador);
