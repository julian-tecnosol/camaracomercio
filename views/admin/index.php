<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 24/07/2015
 * Time: 11:37 AM
 */

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seccion Administrador</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body class="backImg">
    <header class="headerFx row">
        <div class="col-md-8 col-md-offset-2">
            <a href="#">
                <img src="../../img/icono.png">
            </a>
            <div class="pull-right">
                <a href="/" class="btn btn-info">Cerrar Sesion</a>
            </div>
        </div>
    </header>
    <table id="tablaEncuesta" class="table table-bordered table-striped table-hover" style="background: #f2f2f2">
        <thead>
            <th>Cod</th>
            <th>FECHA</th>
            <th>No DOCUMENTO</th>
            <th>RAZÓN SOCIAL</th>
            <th>ACTIVIDAD ECONOMICA</th>
            <th>BARRIO</th>
            <th>COMUNA</th>
            <th>NOMBRE ENCUESTADO</th>
            <th>TEL ENCUESTADO</th>
            <th>OBSERVACIONES</th>
            <th colspan="3"></th>
        </thead>
        <tbody id="tableContainer">

        </tbody>
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/mainadmin.js"></script>
</body>
</html>