<?php
    session_start();
    if (!!isset($_SESSION['num_fotos']) || !!isset($_SESSION['idCensador'])) {
        $validador = true;
    }else{
        header("Location: /");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Localizacion</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="maingeo.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="row">
    <header class="row">
        <div class="backHeader col-lg-12 col-md-12 col-xs-12">
        </div>
        <div class="col-xs-4 visible-xs"></div>
        <div class=" logo-img col-md-offset-5 col-md-2 col-sm-4 col-sm-offset-4 col-xs-2 col-xs-offset-0">
            <!--<div class="divLogo">-->
            <img src="../img/Logo.png">
            <!--</div>-->
        </div>
    </header>
    <form action="subirfotonit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $_SESSION['num_fotos']?>" name="num_fotos">
        <input type="hidden" value="<?php echo $_SESSION['idCensador']?>" name="idCensador">
        <div class="col-md-offset-3 col-md-6" id="upImage">
            <div id="geolocation-test">
                <h3 id="cuadro-info">Por favor, espera, estamos obteniendo tu posicion actual  ...</h3>
                <button id="reload">Recargar</button>
            </div>
            <div class="col-md-12 cuadroImagen">
                <label class="label-control" for="imagen">NIT Empresa:</label>
                <input class="form-control" type='text' name='idEmpresa'>
                <label class="label-control" for="imagen">Imagen:</label>
                <input class="form-control" type="file" name="imagen" id="imagen" />
                <br>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="subir" value="Subir"/>
        </div>
    </form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
