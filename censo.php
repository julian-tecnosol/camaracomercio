<?php
    session_start();
    date_default_timezone_set('America/Bogota');

    $validador = false;
    if (!!isset($_SESSION['nombreCensador']) || !!isset($_SESSION['idCensador'])) {
        $validador = true;
    }else{
        header("Location: /");
    }

    $fechaHoy = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Aplicacion de censo empresarial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="libs/jquery/jquery-ui/jquery-ui.css">-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body class="backImg">
    <header class="headerFx row">
        <div class="col-md-8 col-md-offset-2">
            <a href="#">
                <img src="img/icono.png">
            </a>
            <div class="pull-right">
                <a href="/" class="btn btn-info">Cerrar Sesion</a>
            </div>
        </div>
    </header>
    <section>
        <div class="row fix">
            <h2 class="col-md-8 col-md-offset-2 name-encuestador">
                <?php
                if ($validador) {
                    echo 'Hola '.$_SESSION['nombreCensador'].' y Bienvenido';
                }
                ?>
            </h2>
            <form id="formContainer" class="form-horizontal row col-md-8 col-md-offset-2 edit">
                <input type="hidden" name="idEncuestador" value="<?php echo $_SESSION['idCensador'] ?>">
                <input type="hidden" name="tipoEncuestador" value="<?php echo $_SESSION['tipo_usuario'] ?>">
    <!--Informacion personal                                                                                           -->
                <div id="accordion" class="panel-group" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default" >
                        <div id="personalInfo" data-toggle="collapse" data-parent="#accordion" href="#personalInfoTarget" aria-expanded="false" aria-controls="personalInfoTarget" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                <a role="button">
                                    Informacion de la Empresa
                                </a>
                            </h3>
                        </div>
                        <div id="personalInfoTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="personalInfo">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Tipo de Identificación
                                    </label>
                                    <div class="col-md-2">
                                        <select class="form-control" name="selectTipoDocumento">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                C.C.
                                            </option>
                                            <option value="2">
                                                C.E.
                                            </option>
                                            <option value="3">
                                                NIT
                                            </option>
                                            <option value="4">
                                                TI
                                            </option>
                                        </select>
                                    </div>
                                    <label class="col-md-2">
                                        Fecha de la encuesta
                                    </label>
                                    <div class="col-md-4">
                                        <input class="form-control col-md-6" type="date" name="fechaencuesta">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Numero de Identificacion</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="number" name="inpNumDocuemnto" id="NumeroDeDocumento">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" col-md-4">
                                        Razon Social o Nombre del establecimiento
                                    </label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="inpNombreRazonSocial">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" col-md-4">
                                        Nombre completo del propietario
                                    </label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="inpNombrePersonaNatural">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Telefono y/o Fax de la empresa
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="number" data-validar="false" name="telefonoEmpresa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Celular
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="number" data-validar="false" name="celularEmpresa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Correo Electronico
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="text" name="correoEmpresa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Tipo de Organizacion
                                    </label>
                                    <div class="col-md-6">
                                        <select onchange="showAdInfo(this.id)" class="form-control" name="tipoOrg" id="selectTipoOrg"></select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Nombre Representante Legal
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="text" name="inpNombreRepresentante">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <!--      Informacion ubicación                                                                                 -->
                    <div class="panel panel-default">
                        <div id="locationInfo" data-toggle="collapse" href="#locationInfoTarget" data-parent="#accordion" aria-expanded="false" aria-controls="locationInfoTarget" class="panel-heading">
                            <h3 class="panel-title">
                                    <a role="button">
                                        Informacion de ubicacion
                                    </a>
                            </h3>
                        </div>
                        <div id="locationInfoTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="locationInfo">
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Direccion
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control col-md-6" type="text" name="direccionEmpresa">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Barrio
                                    </label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="barrioEmpresa">
                                    </div>
                                    <label class="col-md-2">
                                        Comuna
                                    </label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="comunaEmpresa">
                                            <option value=""></option>
                                            <option value="Comuna 1">Comuna 1</option>
                                            <option value="Comuna 2">Comuna 2</option>
                                            <option value="Comuna 3">Comuna 3</option>
                                            <option value="Comuna 4">Comuna 4</option>
                                            <option value="Comuna 5">Comuna 5</option>
                                            <option value="Comuna 6">Comuna 6</option>
                                            <option value="Comuna 7">Comuna 7</option>
                                            <option value="Comuna 8">Comuna 8</option>
                                            <option value="Comuna 9">Comuna 9</option>
                                            <option value="Comuna 10">Comuna 10</option>
                                            <option value="Comuna 11">Comuna 11</option>
                                            <option value="Comuna 12">Comuna 12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Ubicación Comercial
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="selectUbicaComercial" id="selUbicacionComercial"></select>
                                    </div>
                                    <label class="col-md-2">
                                        Caracter de ubicacion:
                                    </label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="caracterUbicacion">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Propio
                                            </option>
                                            <option value="2">
                                                Arrendado
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!--Informacion empresa                                                                                             -->
                    <div class="panel panel-default">
                        <div id="companyRating" data-toggle="collapse" data-parent="#accordion" href="#companyRatingTarget" aria-expanded="false" aria-controls="companyRatingTarget" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                 <a role="button">
                                    Clasificación de la empresa
                                </a>
                            </h3>
                        </div>
                        <div id="companyRatingTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="companyRating">
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <label class="col-md-3">
                                        Actividad economica
                                    </label>
                                    <div class="col-md-3">
                                        <select class="form-control" id="tipoDeActividad">
                                            <option value=""></option>
                                            <option value="1">
                                                Servicios
                                            </option>
                                            <option value="2">
                                                Comercial
                                            </option>
                                            <option value="3">
                                                Industrial
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="ActividadEconomica" id="nameActividad">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-3">
                                        Categoria:
                                    </label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="clasificacionEmpresa">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Micro
                                            </option>
                                            <option value="2">
                                                Pequeña
                                            </option>
                                            <option value="3">
                                                Mediana
                                            </option>
                                            <option value="4">
                                                Grande
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <h4 class="marginButton">
                                    Empleados
                                </h4>
                                <br>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Tiene Empleados
                                    </label>
                                    <div class="col-md-3">
                                        <select id="employeeForm" onchange='checkIdCondition(this.id)' class="form-control" name="tieneEmpleados">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div id="employeeFormTarget1" class="ifHeHas">
                                    <div class="form-group" id="encuestaEmpleados">
                                            <label class="col-md-2 label-control">
                                                Tipo de empleados
                                            </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="tipoEmpleados" disabled="disabled">
                                                    <option value=""></option>
                                                    <option value="1">
                                                        Directos
                                                    </option>
                                                    <option value="2">
                                                        Indirectos
                                                    </option>
                                                    <option value="3">
                                                        Directos e indirectos
                                                    </option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Cuantos
                                        </label>
                                        <div class="col-md-2 col-md-offset-1">
                                            <input class="form-control" type="number" name="numEmpleados" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">
                                            Se encuentran afiliados a salud, pension o ARL
                                        </label>
                                        <div class="col-md-2">
                                            <select id="afilArl" onchange="checkIdConditionW(this.id); enableTag(this.id)" class="form-control" name="afilPensSalud" disabled="disabled">
                                                <option value="">

                                                </option>
                                                <option value="1">
                                                    Si
                                                </option>
                                                <option value="0">
                                                    No
                                                </option>
                                            </select>
                                        </div>
                                        <div id="afilArlTarget2" class="ifHeHas col-md-6">
                                            <input class="form-control" type="text" name="justificacionPrestaciones" placeholder="Porque" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        <!--        Encuesta                                                                                -->
                    <div class="panel panel-default">
                        <div id="quiz" data-toggle="collapse" data-parent="#accordion" href="#quizTarget" aria-expanded="false" aria-controls="quizTarget" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                <a role="button">
                                    Encuesta
                                </a>
                            </h3>
                        </div>
                        <div id="quizTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="quiz">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Posee registro mercantil
                                    </label>
                                    <div class="col-md-2">
                                        <select id="hasRegistMerc" onchange="checkIdConditionRegMerc(this.id); enableTag(this.id)" class="form-control col-md-3" name="registMercant">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 ifHeHas" id="hasRegistMercTarget2">
                                        <label class="col-md-3">
                                            Por que?
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="justificacionMercantil" disabled="disabled">
                                                <option value=""></option>
                                                <option value="1">No Aplica</option>
                                                <option value="2">Por Desconocimiento</option>
                                                <option value="3">No lo ha hecho</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="hasRegistMercTarget1" class="ifHeHas form-group">
                                    <label class="col-md-4">
                                            Numero Matricula Mercantil
                                    </label>
                                    <div class="col-md-2">
                                        <input class="form-control col-md-8" type="number" name="numMatriculaMercantil" disabled="disabled">
                                    </div>
                                    <label class="col-md-3">
                                            A que año se encuentra renovada
                                    </label>
                                    <div class="col-md-2">
                                        <input class="form-control col-md-4" type="text" name="anioMatriculaMercantil" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Permiso de uso del suelo
                                    </label>
                                    <div class="col-md-2">
                                        <select id="permSuelo" onchange="checkIdConditionW(this.id); enableTag(this.id)" class="form-control" name="permiSuelo">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="permSueloTarget2" class="ifHeHas col-md-6">
                                        <label class="col-md-3">
                                            Por que?
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="justificacionUsoSuelo" disabled="disabled">
                                                <option value=""></option>
                                                <option value="1">No Aplica</option>
                                                <option value="2">Por Desconocimiento</option>
                                                <option value="3">No lo ha hecho</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Certificado de Bomberos
                                    </label>
                                    <div class="col-md-2">
                                        <select id="bombCert" onchange="checkIdConditionW(this.id); enableTag(this.id)" class="form-control" name="certBomberos">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="bombCertTarget2" class="col-md-6 ifHeHas">
                                        <label class="col-md-3">
                                            Por que?
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="justificacionBomberos" disabled="disabled">
                                                <option value=""></option>
                                                <option value="1">No Aplica</option>
                                                <option value="2">Por Desconocimiento</option>
                                                <option value="3">No lo ha hecho</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-4">
                                        Manipulacion de alimentos
                                    </label>
                                    <div class="col-md-2">
                                        <select id="manipAliment" onchange="checkIdConditionW(this.id); enableTag(this.id)" class="form-control" name="manipAlimentos">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="manipAlimentTarget2" class="ifHeHas col-md-6">
                                        <label class="col-md-3">
                                            Por que?
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="justificacionManipulacionAlimentos" disabled="disabled">
                                                <option value=""></option>
                                                <option value="1">No Aplica</option>
                                                <option value="2">Por Desconocimiento</option>
                                                <option value="3">No lo ha hecho</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Posee registro invima
                                    </label>
                                    <div class="col-md-2">
                                        <select id="invimaReg" onchange="checkIdConditionRegMerc(this.id); enableTag(this.id)" class="form-control" name="regisInvima">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="invimaRegTarget2" class="ifHeHas col-md-6">
                                        <label class="col-md-3">
                                            Por que?
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="justificacionInvima" disabled="disabled">
                                                <option value=""></option>
                                                <option value="1">No Aplica</option>
                                                <option value="2">Por Desconocimiento</option>
                                                <option value="3">No lo ha hecho</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="invimaRegTarget1" class="ifHeHas">
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-2">
                                            <input class="form-control col-md-4" type="number" name="numInvima" disabled="disabled">
                                        </div>
                                        <label class="col-md-1">
                                            Fecha
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control col-md-4" type="text" name="fechaInvima" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Certificado de Sayco y Acinpro
                                    </label>
                                    <div class="col-md-2">
                                        <select id="saycoAcinpro" onchange="checkIdConditionRegMerc(this.id); enableTag(this.id)" class="form-control" name="certSayAcin">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="saycoAcinproTarget2" class="ifHeHas col-md-6">
                                        <label class="col-md-3">
                                            Por que?
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="justificacionSaycoAcinpro" disabled="disabled">
                                                <option value=""></option>
                                                <option value="1">No Aplica</option>
                                                <option value="2">Por Desconocimiento</option>
                                                <option value="3">No lo ha hecho</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="saycoAcinproTarget1" class="ifHeHas">
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control col-md-4" type="number" name="numSayco" disabled="disabled">
                                        </div>
                                        <label class="col-md-1">
                                            Fecha
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control col-md-4" type="text" name="fechaAcinpro" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Contrato para dispocicion de residuos peligrosos
                                    </label>
                                    <div class="col-md-2">
                                        <select id="dispResiduos" onchange="checkIdCondition(this.id); enableTag(this.id)" class="form-control" name="contrDispoResid">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div id="dispResiduosTarget1" class="ifHeHas">
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="number" name="numResiduosPeligrosos" disabled="disabled">
                                        </div>
                                        <label class="col-md-1">
                                            Fecha
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" name="fechaResiduosPeligrosos" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">
                                        Codigo CIIU
                                    </label>
                                    <div class="col-md-2">
                                        <select id="ciiu" name="codCiiu" onchange="checkIdCondition(this.id); enableTag(this.id)" class="form-control" >
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="ciiuTarget1" class="ifHeHas">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="number" name="numCodCiiu" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">
                                        Codigo Industria y Comercio
                                    </label>
                                    <div class="col-md-2">
                                        <select id="industComer" onchange="checkIdCondition(this.id); enableTag(this.id)"  class="form-control" name="codIndustComerc">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="industComerTarget1" class="ifHeHas">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="number" name="numIndustriaComercio" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-4">
                                        Cuantos ingresos obtiene en el mes ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="valorIngresosMensuales">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cuantos valen los activos del establecimiento ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="valorActivosEmpresa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-6">
                                        Permiso del Ministerio de las TIC o PRSTM para internet o venta de celulares
                                    </label>
                                    <div class="col-md-2">
                                        <select  class="form-control" name="permisoTic">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            <!--Información adicional                                                                               -->
                    <div id="selectTipoOrgTarget"class="panel panel-default ifHeHas">
                        <div id="adInfo" data-toggle="collapse" href="#adInfoCond" data-parent="#accordion" aria-expanded="false" aria-controls="adInfoCond" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                <a role="button">
                                    Informacion adicional para vendedores estacionarios y ambulantes
                                </a>
                            </h3>
                        </div>
                        <div id="adInfoCond" class="panel-collapse collapse" role="tabpanel" aria-labelledby="adInfo">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Tiene algun permiso para el funcionamiento
                                    </label>
                                    <div class="col-md-2">
                                        <select id="permiFunc" onchange="checkIdCondition(this.id); enableTag(this.id)" class="form-control" name="permisoFuncionamiento">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="permiFuncTarget1" class="col-md-12 ifHeHas">
                                        <label class="col-md-4">
                                            Cual
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="otroPermisoFunconamiento" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cual es el valor de ventas mensuales ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="ventasMensuales" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Paga algun impuesto:
                                    </label>
                                    <div class="col-md-2">
                                        <select id="payTax" onchange="checkIdCondition(this.id); enableTag(this.id)" class="form-control" name="pagaImpuesto" disabled="disabled">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div id="payTaxTarget1" class="ifHeHas form-group">
                                    <label class="col-md-4">
                                        Cual
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="otroImpuesto" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cual es el numero de empleos que genera ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="empleosGenerados" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        En que jornada labora ?
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="jornadaLaboral" disabled="disabled">
                                            <option value="">

                                            </option>
                                            <option value="diurna">
                                                Diurna
                                            </option>
                                            <option value="nocturna">
                                                Nocturnas
                                            </option>
                                            <option value="ambas">
                                                Ambas
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Se encuentra afiliado a salud, pension, arl
                                    </label>
                                    <div class="col-md-2">
                                        <select id="afilSalPens" onchange="checkIdConditionW(this.id); enableTag(this.id)" class="form-control" name="afiliadoSaludPensionArl" disabled="disabled">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                    <div id="afilSalPensTargetYes" class="ifHeHas col-md-6">
                                        <input class="form-control" type="text" name="justificacionPrestaciones2" placeholder="Porque" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div id="infoSeguridad" data-toggle="collapse" href="#infoSeguridadTarget" data-parent="#accordion" aria-expanded="false" aria-controls="infoSeguridadTarget" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                <a role="button">
                                    Informacion general de Seguridad
                                </a>
                            </h3>
                        </div>
                        <div id="infoSeguridadTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="infoSeguridad">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cuenta con sistema de seguridad
                                    </label>
                                    <div class="col-md-2">
                                        <select id="sistSecurity" onchange="checkIdCondition(this.id); enableTag(this.id)" class="form-control" name="tieneSeguridadPriv">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div id="sistSecurityTarget1" class="ifHeHas form-group">
                                    <label class="col-md-4">
                                        Cual:
                                    </label>
                                    <div class="col-md-2">
                                        <select class="form-control" name="tipoSistemaSeguridad" title="Tipos De Seguridad">
                                            <option value="">
                                            </option>
                                            <option value="1">
                                                Camaras
                                            </option>
                                            <option value="2">
                                                Vigilancia Privada
                                            </option>
                                            <option value="3">
                                                Alarmas
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Ha sido victima de algun delito
                                    </label>
                                    <div class="col-md-2">
                                        <select id="victimaDelito" onchange="checkIdCondition(this.id); enableTag(this.id)" class="form-control" name="victimaDelito">
                                            <option value="">

                                            </option>
                                            <option value="1">
                                                Si
                                            </option>
                                            <option value="0">
                                                No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div id="victimaDelitoTarget1" class="ifHeHas form-group">
                                    <label class="col-md-4">
                                        Cual:
                                    </label>
                                    <div class="col-md-2">
                                        <select  class="form-control" name="tipoDelito">
                                            <option value="">

                                            </option>
                                             <option value="1">
                                                Hurto a personas
                                            </option>
                                            <option value="2">
                                                Hurto a establecimientos
                                            </option>
                                            <option value="3">
                                                Violación
                                            </option>
                                            <option value="4">
                                                Extorsión
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Posee algun sistema de seguridad personal
                                    </label>
                                    <div class="col-md-2">
                                       <select  class="form-control" name="segPersonal">
                                           <option value="">

                                           </option>
                                           <option value="1">
                                               Si
                                           </option>
                                           <option value="0">
                                               No
                                           </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div id="infoMaquila" data-toggle="collapse" href="#infoMaquilaTarget" data-parent="#accordion" aria-expanded="false" aria-controls="infoMaquilaTarget" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                <a role="button">
                                    Informacion general de maquilas
                                </a>
                            </h3>
                        </div>
                        <div id="infoMaquilaTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="infoMaquila">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cuantas maquinas tiene
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="numMaquinas">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div id="locationInfo" data-toggle="collapse" href="#infoEncuestado" data-parent="#accordion" aria-expanded="false" aria-controls="infoEncuestado" class="panel-heading">
                            <h3 class="panel-title">
                                <a role="button">
                                    Informacion de Encuestado
                                </a>
                            </h3>
                        </div>
                        <div id="infoEncuestado" class="panel-collapse collapse" role="tabpanel" aria-labelledby="infoEncuestado">
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Numero de cedula
                                    </label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="number" name="idPersonaEncuestada">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Nombre Encuestado
                                    </label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="nombrePersonaEncuestada">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Telefono
                                    </label>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="telefonoEncuestado">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="comment">Observaciones</label>
                                    <textarea class="form-control" id="comment" name="observa"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($_SESSION['tipo_usuario'] == 'D') {
                        echo '<br>';
                        echo '<div class="form-group col-md-12">';
                        echo '    <label class=" label-control col-md-4">Ingrese el nombre del encuestador</label>';
                        echo '    <div class="col-md-6">';
                        echo '        <select class="form-control" name="idOtroEncuestador" id="idOtroEncuestador"></select>';
                        echo '    </div>';
                        echo '</div>';
                    }?>
                    <div class="col-xs-1 visible-xs"></div>
                    <button class="marginButton btn btn-block btn-success btn-lg sbmtButton">Enviar</button>
                </div>
            </form>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Informe de Envio Encuesta</h4>
                        </div>
                        <div class="modal-body" id="modalContainer">
                            <p>Espera un momento . Por favor</p>
                        </div>
                        <div class="modal-footer">
                            <?php if ($_SESSION['tipo_usuario'] == 'C') {
                                echo '<button type="button" class="btn btn-info" id="takePic">Tomar Fotografia</button>';
                            }?>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </section>

    <!--***********************************************-->
    <!--Librerias de javascrip para una carga asincrona-->
    <!--***********************************************-->

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- <script type="text/javascript" src="libs/jquery/jquery-ui/jquery-ui.min.js"></script> -->
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/validador.js"></script>
    <script type="text/javascript" src="js/autocompleActividades.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--***********************************************-->
</body>
</html>