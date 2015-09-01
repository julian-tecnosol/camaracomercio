<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 31/08/15
 * Time: 02:20 PM
 */

$direccionEmpresa = $_POST["direccionEmpresa"];
$barrioEmpresa = $_POST["barrioEmpresa"];
$comunaEmpresa = $_POST["comunaEmpresa"];
$selectUbicaComercial = $_POST["selectUbicaComercial"];
$caracterUbicacion = $_POST["caracterUbicacion"];
$inpNumDocuemnto = $_POST["inpNumDocuemnto"];

require_once("../../model/encuestaModel.php");

$classEncuesta = new encuestaModel();

$classEncuesta->updateUbicacionEmpresa($direccionEmpresa,$barrioEmpresa,$comunaEmpresa,$selectUbicaComercial,$caracterUbicacion,$inpNumDocuemnto);