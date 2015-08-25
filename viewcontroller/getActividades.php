<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 14/08/15
 * Time: 02:53 PM
 */


require_once('../model/encuestaModel.php');

$classEncuesta = new encuestaModel();

$allRowsActividades = $classEncuesta->getActividadesEconomicas();

echo json_encode($allRowsActividades);
