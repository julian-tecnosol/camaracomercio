<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 11/07/2015
 * Time: 09:32 AM
 */

require_once('../model/encuestaModel.php');

$TipoOrg = new encuestaModel();

$dataClasificacionEmpresa = $TipoOrg->clasificacionEmpresa();

echo json_encode($dataClasificacionEmpresa);