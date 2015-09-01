<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 25/08/15
 * Time: 01:03 AM
 */

require_once('../model/encuestaModel.php');

$classEncuesta = new encuestaModel();

$allPosicion = $classEncuesta->getAllPosicion();

echo json_encode($allPosicion);