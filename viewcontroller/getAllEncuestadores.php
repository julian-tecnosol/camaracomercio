<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 21/07/2015
 * Time: 07:20 PM
 */

require_once('../model/usuariosModel.php');

$dataEncuestadores = new usuariosModel();

$allEncuestadoresUsrs = $dataEncuestadores->getAllUsers();

echo json_encode($allEncuestadoresUsrs);