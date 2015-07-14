<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 11/07/2015
 * Time: 08:38 AM
 */

require_once('../model/encuestaModel.php');

$TipoOrg = new encuestaModel();

$dataTipoOrg = $TipoOrg->ubicacionComercial();

echo json_encode($dataTipoOrg);