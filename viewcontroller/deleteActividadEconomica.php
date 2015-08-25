<?php
/**
 * Created by PhpStorm.
 * User: julian
 * Date: 14/08/15
 * Time: 06:54 PM
 */

$idActividad = $_POST["idActividad"];

require_once("../model/encuestaModel.php");

$classEncuesta = new encuestaModel();

$classEncuesta->deleteActividadEconomica($idActividad);