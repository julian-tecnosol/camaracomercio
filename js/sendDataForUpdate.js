/**
 * Created by julian on 29/08/15.
 */
function sendDataByAjax(url,dataSerialize){
    $.ajax({
        method: "POST",
        url : "../../viewcontroller/seters/"+url,
        data : dataSerialize,
        beforeSend : function(){
            var codigoHTML = "<div style='text-align: center;'><img src='/censocc/img/loading.gif'></div>";
            var $modal = $("#myModal");
            $modal.modal('show');
            $("#modalContainerSendData").html(codigoHTML);
        },
        success : function(data){
            $("#modalContainerSendData").html(data);
        }
    });
}

function iniciarFuncionesParaActualizar(){


    function addDataIdEmpresa(dataSerialize){
        var numId = $("#NumeroDeDocumento").serialize();
        dataSerialize += "&"+numId;
        return dataSerialize;
    }

    $("#infoPersonalForm").submit(function(e){
        var formData = $(this).serialize();
        e.preventDefault();
        sendDataByAjax("setInformacionPersonal.php",formData);
    });

    $("#infoUbicacionForm").submit(function(e){
        var formData = $(this).serialize();
        e.preventDefault();
        formData = addDataIdEmpresa(formData);
        sendDataByAjax("setUbicacion.php",formData);
    });

    $("#infoClasificacionEmpresaForm").submit(function(e){
        var formData = $(this).serialize();
        formData = addDataIdEmpresa(formData);
        e.preventDefault();
        sendDataByAjax("setClasificacion.php",formData);
    });

    $("#infoEncuestaGenerarForm").submit(function(e){
        var formData = $(this).serialize();
        e.preventDefault();
        sendDataByAjax("setClasificacion.php",formData);
    });

    $("#infoVendedoresAmbulantesForm").submit(function(e){
        var formData = $(this).serialize();
        e.preventDefault();
        console.log(formData);
        console.dir(this);
    });

    $("#infoSeguridadForm").submit(function(e){
        var formData = $(this).serialize();
        e.preventDefault();
        console.log(formData);
        console.dir(this);
    });

    $("#infoMaquilaForm").submit(function(e){
        var formData = $(this).serialize();
        e.preventDefault();
        console.log(formData);
        console.dir(this);
    });

    $("#infoPersonaEncuestadaForm").submit(function(e){
        var formData = $(this).serialize();
        e.preventDefault();
        console.log(formData);
        console.dir(this);
    });
}

$(document).ready(iniciarFuncionesParaActualizar);