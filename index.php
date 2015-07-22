<?php
// Finalmente, destruir la sesión.
if (!isset($_SESSION))
{
    session_start();
}

if (!!isset($_SESSION['nombreCensador'])) {
    session_destroy();
}

;?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,700' rel='stylesheet' type='text/css'>
	<title>Login</title>
    <style>
        .row{
            margin: 0;
        }
    </style>
</head>
<body class="fixBody">
	<header class="row">
			<div class="backHeader col-lg-12 col-md-12 col-xs-12">
			</div>
			<div class="col-xs-4 visible-xs"></div>
			<div class=" logo-img col-md-offset-5 col-md-2 col-sm-4 col-sm-offset-4 col-xs-2 col-xs-offset-0">
				<!--<div class="divLogo">-->
					<img src="img/Logo.png">
				<!--</div>-->
			</div>
	</header>
	<div class="row formEdit">
		<form class="col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12" action="viewcontroller/validationUser.php" method="post">
			<div class="form-group">
                <label class="control-label">Usuario</label>
                <input class="form-control" type="text" name="nickname" required="required">
                <label class="control-label">Contraseña</label>
                <input class="form-control" type="password" name="password" required="required">
                <br>
                <button class="btn btn-block btn-success btn-lg" type="submit">Ingresar</button>
			</div>
		</form>
	</div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- <script type="text/javascript" src="libs/jquery/jquery-ui/jquery-ui.min.js"></script> -->
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/validador.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>