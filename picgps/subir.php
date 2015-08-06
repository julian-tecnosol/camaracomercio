<?php
session_start();
if (!!isset($_SESSION['idCensador'])) {
	$validador = true;
	$idCensador = $_SESSION['idCensador'];
}
require_once('../model/usuariosModel.php');
$UsuModel = new usuariosModel();
$numPic = $UsuModel->getNumPic($idCensador);

if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	$lat =  $_POST['latitud'];
	$lon = $_POST['longitud'];
	$idEmpresa = $_POST['idEmpresa'];
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 3000;
    $new_name = $_SESSION['idCensador']."_pic".$numPic;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" .$new_name .".jpg";
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";

				$UsuModel->uploadMedia($idEmpresa, $idCensador,"picgps/".$ruta,$lat,$lon);
				$UsuModel->uploadNumfotos($_SESSION['idCensador']);

			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $new_name . ".jpg , este archivo existe";
		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}