<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 29/08/15
 * Time: 10:07 PM
 */

$selectTipoDocumento = $_POST["selectTipoDocumento"];
$fechaencuesta = $_POST["fechaencuesta"];
$inpNumDocuemnto = $_POST["inpNumDocuemnto"];
$inpNombreRazonSocial = $_POST["inpNombreRazonSocial"];
$inpNombrePersonaNatural = $_POST["inpNombrePersonaNatural"];
$telefonoEmpresa = $_POST["telefonoEmpresa"];
$celularEmpresa = $_POST["celularEmpresa"];
$correoEmpresa = $_POST["correoEmpresa"];
$tipoOrg = $_POST["tipoOrg"];
$inpNombreRepresentante = $_POST["inpNombreRepresentante"];

require_once("../../model/encuestaModel.php");

$classEncuesta = new encuestaModel();

$classEncuesta->updateInformacionPersonal($selectTipoDocumento,$fechaencuesta,$inpNumDocuemnto,$inpNombreRazonSocial,$inpNombrePersonaNatural,$telefonoEmpresa,$celularEmpresa,$correoEmpresa,$tipoOrg,$inpNombreRepresentante);