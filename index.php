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
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
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
		<form class="col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12" action="" method="post" id="loginForm">
			<div class="form-group">
                <label class="control-label">Usuario</label>
                <input class="form-control" type="text" name="nickname" required="required">
                <label class="control-label">Contraseña</label>
                <input class="form-control" type="password" name="password" required="required">
                <br>
                <button class="btn btn-block btn-success btn-lg" type="submit">Ingresar</button>
			</div>
            <div id="alertFail"></div>
        </form>
	</div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#loginForm").submit(function(e){
                e.preventDefault();
                $.ajax({
                    method : 'POST',
                    url : "viewcontroller/validationUser.php",
                    data : $(this).serialize(),
                    success : function(data){
                        if(data){
                            switch (data){
                                case "C":
                                    window.location.href = "/views/principal/";
                                    break;
                                case "A" :
                                    window.location.href = "/view/admin/";
                                    break;
                                case "0":
                                    $("#alertFail").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                        '<strong>Upsss!</strong> Usuario y/o Contraseña Incorrectos'+
                                        '</div>');
                                    break;
                                case "D" :
                                    window.location.href = "/censo.php";
                                    break;
                            }
                        }
                    }
                })
            })
        });
    </script>
</body>
</html>