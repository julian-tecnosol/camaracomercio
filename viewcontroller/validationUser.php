<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 17/07/2015
 * Time: 10:19 AM
 */
session_start();
require_once('../model/usuariosModel.php');

$nick = $_POST['nickname'];
$pass = $_POST['password'];

$valUser = new usuariosModel();

$datosCensador = $valUser->validateUser($nick,$pass);

if(!!$datosCensador){
    if (!isset($_SESSION['nombreCensador']) || !isset($_SESSION['idCensador'])) {
        $_SESSION['nombreCensador'] = $datosCensador['Nombre_Completo'];
        $_SESSION['idCensador'] = $datosCensador['id_encuestador'];
        $_SESSION['tipo_usuario'] = $datosCensador['tipo_usuario'];
    }

    echo $_SESSION['tipo_usuario'];
}else{
    echo "0";
}