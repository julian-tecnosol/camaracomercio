(function(){
	var content = document.getElementById("geolocation-test");
	var $divUpImage = $("#upImage");
	$divUpImage.hide();

	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(function(objPosition)
		{
			var lon = objPosition.coords.longitude;
			var lat = objPosition.coords.latitude;

			var miId = location.search.split("value=")[1];
			var miError = location.search.split("error=")[1];
			content.innerHTML = "<p><h3>Tu posicion actual</h3><strong>Latitud:</strong><input type='text' name='latitud' class='form-control' value='" + lat + "' readonly></p><p><strong>Longitud:</strong><input type='text' class='form-control' name='longitud' value='" + lon + "' readonly></p><input type='hidden' name='idEmpresa' value='"+miId+"'>";
			if(miError.indexOf("TRUE") > -1){
				$("#geolocation-test").append("<h4>Error al subir imagen vuelve a intentarlo</h4>")
			}

			$divUpImage.show();

		}, function(objPositionError)
		{
			switch (objPositionError.code)
			{
				case objPositionError.PERMISSION_DENIED:
					content.innerHTML = "No se ha permitido el acceso a la posición del usuario.";
				break;
				case objPositionError.POSITION_UNAVAILABLE:
					content.innerHTML = "No se ha podido acceder a la información de su posición.";
				break;
				case objPositionError.TIMEOUT:
					content.innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
				break;
				default:
					content.innerHTML = "Error desconocido.";
			}

		}, {
			maximumAge: 75000,
			timeout: 15000
		});
	}
	else
	{
		content.innerHTML = "Su navegador no soporta la API de geolocalización.";
	}
})();
