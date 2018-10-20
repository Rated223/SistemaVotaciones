<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script type="text/javascript"  href="./js/scripts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/Estilos.css">
</head>
<body>
	<?php if (isset($_GET["errorusuario"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error').modal('show') };
            </script>

            <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>No ha iniciado sesion</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
	<div class="container">
		<div class="row mt-5 justify-content-center">
	        <div class="card ">
	        	<div class="Titulo card-header">
                    <strong style="color:black;">Sistema de votos</strong>
                </div>
	        	<div class="card-body">
        			<p class="text-center"><i class="fas fa-users fa-5x text-center" aria-hidden="true"></i></p>
        			<h4 class="text-center">Acceder</h4>
		            <form method="post" accept-charset="utf-8" action="php/InicioSesion.php" name="loginform" autocomplete="off" role="form" class="form-signin">
			                <input class="form-control mb-2" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
			                <input class="form-control mb-4" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
		                	<button type="submit" class="btn btn-lg btn-success btn-signin" name="login" id="submit">Iniciar Sesión</button>
		                	<button type="button" onclick="window.open('Registrase.php','_self');" class="btn btn-lg btn-primary" name="return"">Registrarse</button>
		            </form>
	        	</div>           
	        </div>
	    </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>