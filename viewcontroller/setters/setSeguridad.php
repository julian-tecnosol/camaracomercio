<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 31/08/15
 * Time: 02:20 PM
 */

$titletipoActividad = $_POST["titletipoActividad"];
$ActividadEconomica = $_POST["ActividadEconomica"];
$clasificacionEmpresa = $_POST["clasificacionEmpresa"];
$tieneEmpleados = isset($_POST["tieneEmpleados"]) ? $_POST["tieneEmpleados"] : 0;
$tipoEmpleados = isset($_POST["tipoEmpleados"]) ? $_POST["tipoEmpleados"] : 0;
$numEmpleados = isset($_POST["numEmpleados"]) ? $_POST["numEmpleados"] : 0;
$afilPensSalud = isset($_POST["afilPensSalud"]) ? $_POST["afilPensSalud"] : 0;
$justificacionPrestaciones = isset($_POST["justificacionPrestaciones"]) ? $_POST["justificacionPrestaciones"] : "";
$inpNumDocuemnto = $_POST["inpNumDocuemnto"];

require_once("../../model/encuestaModel.php");

$classEncuesta = new encuestaModel();

$classEncuesta->updateClasificacionEmpresa($titletipoActividad,$ActividadEconomica,$clasificacionEmpresa,$tieneEmpleados,$tipoEmpleados,$numEmpleados,$afilPensSalud,$justificacionPrestaciones,$inpNumDocuemnto);