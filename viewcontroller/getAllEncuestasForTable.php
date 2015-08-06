<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 24/07/2015
 * Time: 11:52 AM
 */

require_once('../model/encuestaModel.php');

$classEncuestaModel = new encuestaModel();

$allEncuestas = $classEncuestaModel->getEncuestasForTable();

echo json_encode($allEncuestas);
//var_dump($allEncuestas);