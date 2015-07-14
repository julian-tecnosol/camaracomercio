<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 10/07/2015
 * Time: 06:38 PM
 */

require_once('../model/encuestaModel.php');

$TipoOrg = new encuestaModel();

$dataTitleTipoOrg = $TipoOrg->getTituloOrganizacion();

echo json_encode($dataTitleTipoOrg);