<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 14/08/15
 * Time: 07:37 PM
 */

require_once('../model/encuestaModel.php');

$classEncuesta = new encuestaModel();

$allRowsActividades = $classEncuesta->getActividadesEconomicasArr();

echo json_encode($allRowsActividades);