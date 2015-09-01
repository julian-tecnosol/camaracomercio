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

    <link rel="stylesheet" type="text/css" href="main.css">
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
    <div id="mytabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tabla</a></li>
            <li role="presentation"><a href="#actividades" aria-controls="actividades" role="tab" data-toggle="tab">Actividades</a></li>
            <li role="presentation"><a href="#mapagoogle" aria-controls="mapagoogle" role="tab" data-toggle="tab">Mapa Informe</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home">
                <table id="tablaEncuesta" class="table table-bordered table-striped table-hover" style="background: #f2f2f2">
                    <thead>
                        <th>Cod</th>
                        <th>FECHA</th>
                        <th>No DOCUMENTO</th>
                        <th>RAZÓN SOCIAL</th>
                        <th>NOMBRE PROPIETARIO</th>
                        <th>ACTIVIDAD ECONOMICA</th>
                        <th>DIRECCION</th>
                        <th>BARRIO</th>
                        <th>COMUNA</th>
                        <th>NOMBRE ENCUESTADO</th>
                        <th>TEL ENCUESTADO</th>
                        <th>NOMBRE ENCUESTADOR</th>
                        <th>OBSERVACIONES</th>
                        <th colspan="3"></th>
                    </thead>
                    <tbody id="tableContainer">

                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="actividades">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 seccion">
                        <form id="addNewActividades" role="form">
                            <div class="form-group">
                                <label class="col-md-12 col-lg-12 label-control">Ingrese nueva actividad economica</label>
                                <div class="col-md-6 col-lg-6">
                                    <input name="nombreActividad" class="form-control" type="text">
                                </div>
                                <label class="col-md-2 col-lg-2 label-control">Tipo de Actividad</label>
                                <div class="col-md-2 col-lg-2">
                                    <select name="titleActividad" class="form-control">
                                        <option value=""></option>
                                        <option value="1">Servicios</option>
                                        <option value="2">Comercial</option>
                                        <option value="3">Industrial</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-success col-md-2 col-lg-2">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                        <div class="seccion">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th>Actividad Economica</th>
                                    <th>Tipo de Actividad</th>
                                    <th colspan="2"></th>
                                </thead>
                                <tbody id="tableActividades">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="mapagoogle">
                <div class="row">
                    <div id="canvasmap"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal to edit dataform-->
    <div id="myModalFormEdit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal fucking content from php-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar datos para encuesta</h4>
                </div>
                <div class="modal-body" id="modalContentFormBody">
                    <p>Some text in the modal.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- END MODAL CODE-->


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC1eAFPKJwC0mCgNkumzCx-9ILUNjU1vpQ&sensor=true" type="text/javascript"></script>
    <script type="text/javascript" src="js/maineditar.js"></script>
    <script type="text/javascript" src="js/mainadmin.js"></script>
</body>
</html>