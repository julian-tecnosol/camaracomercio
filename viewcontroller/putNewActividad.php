<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 14/08/15
 * Time: 05:57 PM
 */

$name = $_POST["nombreActividad"];
$pertenece = $_POST["titleActividad"];

require_once("../model/encuestaModel.php");

$classEncuesta = new encuestaModel();

echo $classEncuesta->putNewActivity($name,$pertenece);