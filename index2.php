<?php
/**
 * Created by PhpStorm.
 * User: Julian Albero
 * Date: 17/07/2015
 * Time: 10:15 AM
 */

?>
<html>
    <head>
        <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/logstyle.css">
        <meta charset="utf-8">
    </head>
    <body>
    <div class="row content-dialog modal-dialog modal-content">
        <h3 class="col-lg-12">
            Sistema de Ingreso para Censadores
        </h3>
        <form  class="form-horizontal" action="viewcontroller/validationUser.php" method="post">
            <label class="control-label">Usuario</label>
            <input class="form-control" type="text" name="nickname" required="required">
            <label class="control-label">Contraseña</label>
            <input class="form-control" type="password" name="password" required="required">
            <br>
            <button class="btn btn-block btn-success btn-lg" type="submit">Ingresar</button>
        </form>
    </div>
    </body>
</html>
