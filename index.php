<?php
    session_start();
    date_default_timezone_set('America/Bogota');

    $validador = false;
    if (!!isset($_SESSION['nombreCensador']) || !!isset($_SESSION['idCensador'])) {
        $validador = true;
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
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <header>
        <a class="col-md-offset-3" href="header">
            <img src="img/icono.png"
>        </a>
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
    <!--Informacion personal                                                                                           -->
                <div id="accordion" class="panel-group" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default" >
                        <div id="personalInfo" data-toggle="collapse" data-parent="#accordion" href="#personalInfoTarget" aria-expanded="false" aria-controls="personalInfoTarget" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                <a role="button">
                                    Informacion Personal
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
                                        <input class="form-control col-md-6" type="date" name="fechaencuesta" min="<?php echo $fechaHoy?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">Numero de Documento</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="inpNumDocuemnto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" col-md-4">
                                        Nombre completo del propietario
                                    </label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="inpNombreRazonSocial">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Telefono y/o Fax de la empresa
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="text" name="telefonoEmpresa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Celular
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="text" name="celularEmpresa">
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
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="text" name="direccionEmpresa">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Barrio
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control col-md-6" type="text" name="barrioEmpresa">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Tipo de Organizacion
                                    </label>
                                    <div class="col-md-4">
                                        <select onblur="showAdInfo()" class="form-control" name="tipoOrg" id="selectTipoOrg"></select>
                                    </div>
                                    <label class="col-md-2">
                                        Ubicación Comercial
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="selectUbicaComercial" id="selUbicacionComercial"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div id="econoTask" data-toggle="collapse" href="#econoTaskTarget" data-parent="#accordion" aria-expanded="false" aria-controls="econoTaskTarget" class="panel-heading">
                            <h3 class="panel-title">
                                <a role="button">
                                    Actividad Economica
                                </a>
                            </h3>
                        </div>
                        <div id="econoTaskTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="econoTask">
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <label class="col-md-2">
                                        Ingrese su actividad economica
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="ActividadEconomica">
                                            <option value="">

                                            </option>
                                            <optgroup label="Comercial">
                                                <option value="1">
                                                    Tiendas
                                                </option>
                                                <option value="2">
                                                    Revuelterias
                                                </option>
                                                <option value="3">
                                                    Almacenes
                                                </option>
                                                <option value="4">
                                                    Panaderias
                                                </option>
                                                <option value="5">
                                                    Compraventas
                                                </option>
                                                <option value="6">
                                                    Farmacias
                                                </option>
                                                <option value="7">
                                                    Restaurantes
                                                </option>
                                                <option value="8">
                                                    Carnicerias
                                                </option>
                                                <option value="9">
                                                    Distribuidores
                                                </option>
                                                <option value="10">
                                                    Estanquillos
                                                </option>
                                                <option value="11">
                                                    Billares
                                                </option>
                                                <option value="12">
                                                    Queseras
                                                </option>
                                            </optgroup>
                                            <optgroup label="Servicios">
                                                <option value="13">
                                                    Peluquerias
                                                </option>
                                                <option value="14">
                                                    Reparaciones
                                                </option>
                                                <option value="15">
                                                    Laboratorios
                                                </option>
                                                <option value="16">
                                                    Veterinarias
                                                </option>
                                                <option value="17">
                                                    Corespondencia
                                                </option>
                                                <option value="18">
                                                    Hoteles
                                                </option>
                                                <option value="19">
                                                    Moteles
                                                </option>
                                                <option value="20">
                                                    Hostales
                                                </option>
                                                <option value="21">
                                                    Tecnologia
                                                </option>
                                            </optgroup>
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
                                <div class="form-group">
                                    <label class="col-md-2">
                                        Categoria:
                                    </label>
                                    <div class="col-md-10">
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
                                <div class="form-group">
                                    <label class="col-md-2">
                                        Tiene Empleados
                                    </label>
                                    <div class="col-md-3">
                                        <select id="employeeForm" onblur='checkIdCondition(this.id)' class="form-control" name="tieneEmpleados">
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
                                <div id="employeeFormTarget" class="ifHeHas">
                                    <div class="form-group" id="encuestaEmpleados">
                                            <label class="col-md-2 col-xs-6 row">
                                                <p class="col-md-5 col-xs-5">
                                                    Directos
                                                </p>
                                                <input class="col-md-4 col-xs-2" type="checkbox" name="tipoEmpleados" value="directos">
                                            </label>
                                            <label class="col-md-2 col-xs-6 row">
                                                <p class="col-md-6 col-xs-5">
                                                    Indirectos
                                                </p>
                                                <input class="col-md-4 col-xs-2" type="checkbox" name="tipoEmpleados" value="indirectos">
                                            </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Cuantos
                                        </label>
                                        <div class="col-md-2 col-md-offset-1">
                                            <input class="form-control" type="text" name="numEmpleados">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">
                                            Se encuentran afiliados a salud, pension o ARL
                                        </label>
                                        <div class="col-md-2">
                                            <select id="afilArl" onblur="checkIdConditionW(this.id)" class="form-control" name="afilPensSalud">
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
                                    <div id="afilArlTarget" class="ifHeHas2 form-group">
                                        <input class="form-control col-md-8" type="text" name="justificacionPrestaciones" placeholder="Porque">
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
                                        <select id="hasRegistMerc" onblur="checkIdConditionRegMerc(this.id)" class="form-control col-md-3" name="registMercant">
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
                                <div id="hasRegistMercTarget1" class="ifHeHas form-group">
                                    <input class="form-control col-md-8" type="text" name="justificacionMercantil" placeholder="Porque">
                                </div>
                                <div id="hasRegistMercTarget2" class="ifHeHas form-group">
                                    <label class="col-md-4">
                                            Numero Matricula Mercantil
                                    </label>
                                    <div class="col-md-2">
                                        <input class="form-control col-md-8" type="text" name="numMatriculaMercantil">
                                    </div>
                                    <label class="col-md-3">
                                            A que año se encuentra renovada
                                    </label>
                                    <div class="col-md-2">
                                        <input class="form-control col-md-4" type="text" name="anioMatriculaMercantil">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Permiso de uso del suelo
                                    </label>
                                    <div class="col-md-2">
                                        <select id="permSuelo" onblur="checkIdConditionW(this.id)" class="form-control" name="permiSuelo">
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
                                    <div id="permSueloTarget" class="ifHeHas col-md-4">
                                        <input class="form-control" type="text" name="justificacionUsoSuelo" placeholder="Porque">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Certificado de Bomberos
                                    </label>
                                    <div class="col-md-2">
                                        <select id="bombCert" onblur="checkIdConditionW(this.id)" class="form-control" name="certBomberos">
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
                                    <div id="bombCertTarget" class="col-md-4 ifHeHas">
                                        <input class="form-control col-md-12 nswr" type="text" name="justificacionBomberos" placeholder="Porque">
                                    </div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-4">
                                        Manipulacion de alimentos
                                    </label>
                                    <div class="col-md-2">
                                        <select id="manipAliment" onblur="checkIdConditionW(this.id)" class="form-control" name="manipAlimentos">
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
                                    <div id="manipAlimentTarget" class="ifHeHas col-md-4">
                                        <input class="form-control" type="text" name="justificacionManipulacionAlimentos" placeholder="Porque">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Posee registro invima
                                    </label>
                                    <div class="col-md-2">
                                        <select id="invimaReg" onblur="checkIdConditionRegMerc(this.id)" class="form-control" name="regisInvima">
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
                                    <div id="invimaRegTarget1" class="ifHeHas col-md-4">
                                        <input class="form-control col-md-8" type="text" name="justificacionInvima" placeholder="Porque">
                                    </div>
                                </div>
                                <div id="invimaRegTarget2" class="ifHeHas">
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-2">
                                            <input class="form-control col-md-4" type="text" name="numInvima">
                                        </div>
                                        <label class="col-md-1">
                                            Fecha
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control col-md-4" type="date" name="fechaInvima" max="<?php echo $fechaHoy?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Certificado de Sayco y Acinpro
                                    </label>
                                    <div class="col-md-2">
                                        <select id="saycoAcinpro" onblur="checkIdConditionRegMerc(this.id)" class="form-control" name="certSayAcin">
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
                                <div id="saycoAcinproTarget1" class="ifHeHas form-group">
                                    <input class="form-control col-md-4" type="text" name="justificacionSaycoAcinpro" placeholder="Porque">
                                </div>
                                <div id="saycoAcinproTarget2" class="ifHeHas">
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control col-md-4" type="text" name="numSayco">
                                        </div>
                                        <label class="col-md-1">
                                            Fecha
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control col-md-4" type="date" max="<?php echo $fechaHoy?>" name="fechaAcinpro">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Contrato para dispocicion de residuos peligrosos
                                    </label>
                                    <div class="col-md-2">
                                        <select id="dispResiduos" onblur="checkIdCondition(this.id)" class="form-control" name="contrDispoResid">
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
                                <div id="dispResiduosTarget" class="ifHeHas">
                                    <div class="form-group">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" name="numResiduosPeligrosos">
                                        </div>
                                        <label class="col-md-1">
                                            Fecha
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="date" max="<?php echo $fechaHoy?>" name="fechaResiduosPeligrosos">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">
                                        Codigo CIIU
                                    </label>
                                    <div class="col-md-2">
                                        <select id="ciiu" name="codCiiu" onblur="checkIdCondition(this.id)" class="form-control" >
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
                                    <div id="ciiuTarget" class="ifHeHas">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" name="numCodCiiu">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">
                                        Codigo Industria y Comercio
                                    </label>
                                    <div class="col-md-2">
                                        <select id="industComer" onblur="checkIdCondition(this.id)"  class="form-control" name="codIndustComerc">
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
                                    <div id="industComerTarget" class="ifHeHas">
                                        <label class="col-md-1">
                                            Numero
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="text" name="numIndustriaComercio">
                                        </div>
                                    </div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-4">
                                        Cuantos ingresos obtiene en el mes ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="valorIngresosMensuales">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cuantos valen los activos del establecimiento ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="valorActivosEmpresa">
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
                    <div id="adInfoCond"class="panel panel-default ifHeHas">
                        <div id="adInfo" data-toggle="collapse" href="#adInfoTarget" data-parent="#accordion" aria-expanded="false" aria-controls="adInfoTarget" class="panel-heading" role="tab">
                            <h3 class="panel-title">
                                <a role="button">
                                    Informacion adicional para vendedores estacinarios y ambulantes
                                </a>
                            </h3>
                        </div>
                        <div id="adInfoTarget" class="panel-collapse collapse" role="tabpanel" aria-labelledby="adInfo">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Tiene algun permiso para el funcionamiento
                                    </label>
                                    <div class="col-md-2">
                                        <select id="permiFunc" onclick="checkIdConditionW(this.id)" class="form-control" name="permisoFuncionamiento">
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
                                <div class="permiFuncTarget ifHeHas">
                                        <label class="col-md-4">
                                            Cual
                                        </label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="otroPermisoFunconamiento">
                                        </div>
                                    </div>
                                </div>    <div class="form-group">
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cual es el valor de ventas mensuales ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="ventasMensuales">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Paga algun impuesto:
                                    </label>
                                    <div class="col-md-2">
                                        <select id="payTax" onClick="checkIdConditionW(this.id)" class="form-control" name="pagaImpuesto">
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
                                <div id="payTaxTarget" class="form-group">
                                    <label class="col-md-4">
                                        Cual
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="otroImpuesto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cual es el numero de empleos que genera ?
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="empleosGenerados">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        En que jornada labora ?
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="jornadaLaboral">
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
                                        <select id="afilSalPens" onClick="checkIdConditionW(this.id)" class="form-control" name="afiliadoSaludPensionArl">
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
                                <div id="afilSalPensTarget" class="form-group">
                                    <label class="col-md-4">
                                        Cual
                                    </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="otroImpuesto">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control col-md-8" type="text" name="justificacionPrestaciones" placeholder="Porque">
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
                                        <input class="form-control" type="text" name="numMaquinas">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4">
                                        Cuenta con sistema de seguridad
                                    </label>
                                    <div class="col-md-2">
                                        <select id="sistSecurity" onblur="checkIdCondition(this.id)" class="form-control" name="tieneSeguridadPriv">
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
                                <div id="sistSecurityTarget" class="ifHeHas form-group">
                                    <label class="col-md-4">
                                        Cual:
                                    </label>
                                    <div class="col-md-2">
                                        <select class="form-control" name="tipoSistemaSeguridad" title="Tipos De Seguridad">
                                            <option value="">
                                            </option>
                                            <option value="camaras">
                                                Camaras
                                            </option>
                                            <option value="vigilancia">
                                                Vigilancia Privada
                                            </option>
                                            <option value="alarmas">
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
                                        <select id="victimaDelito" onblur="checkIdCondition(this.id)" class="form-control" name="victimaDelito">
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
                                <div id="victimaDelitoTarget" class="ifHeHas form-group">
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
                                                Esxtorción
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
                                           <option value="2">
                                               No
                                           </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1 visible-xs"></div>
                    <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-10">
                        <button class="marginButton btn btn-block btn-success btn-lg sbmtButton">Enviar</button>
                    </div>
                </div>
            </form>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--***********************************************-->
</body>
</html>