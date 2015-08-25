/**
 * Created by julian on 27/07/15.
 */
function iniciarAutocomplete(){
    var objetoJSON = {};

    $.get("viewcontroller/getAllActividadesArr.php",function(dataArray){
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
        });
    });
}

$(document).ready(iniciarAutocomplete);