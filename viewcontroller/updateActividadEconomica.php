<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 14/08/15
 * Time: 07:20 PM
 */

$val = $_POST["newVal"];
$id = $_POST["idActividad"];

require_once("../model/encuestaModel.php");

$classEncuesta = new encuestaModel();

echo $classEncuesta->updateActividadEconomica($val,$id);