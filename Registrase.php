<!DOCTYPE html>
<html lang="es">
<?php include "php/Conexion.php";?>
<head>
    <title>Videogame Station</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://use.fontawesome.com/54c080e4c8.js"></script>
    <script type="text/javascript"  href="./js/scripts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/Estilos.css">
</head>
<body>
	<?php if (isset($_GET["errorcontrasena"])){ ?>
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
                            <p>Las contraseñas no coinciden</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["errorusuario"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error2').modal('show') };
            </script>

            <div class="modal fade" id="error2" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Este nombre de usuario ya existe, por favor escoja otro.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["errorcorreo"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error3').modal('show') };
            </script>

            <div class="modal fade" id="error3" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Este correo ya ha sido ingresado, por favor ingrese otro.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["fracaso"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#confirmacion').modal('show') };
            </script>

            <div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Algo va mal...</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>No pudimos contactar con tu cuenta de email. Intentalo de nuevo o si es posible ingresa otra dirección.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <nav class="navbar navbar-expand-xl navbar-dark bg-primary">
        <div class="container">
            <a href="Index.php" class="navbar-brand">
                <div class="Titulo align-content-center">
                    <strong class="d-none d-sm-inline-block text-center" >Sistema de votos</strong>
                </div>
            </a>
        </div>
    </nav>
    <div class="container">
        <main class="InPrincipal row justify-content-center">
            <div class="col-auto mt-3">
               <h2 class="mt-5">Registro de usuario</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-8">
	            <form action="php/ConfirmarRegistro.php" method="POST">
	            	<div class="form-group">
	            		<label>Nombre:</label>
			            <input class="form-control form-control-sm mb-2" placeholder="Nombre" name="nombre" type="text" required>
		            	<label>Contraseña:</label>
		            	<input class="form-control form-control-sm mb-2" placeholder="Contraseña" name="contrasena" type="password" required>
		            	<label>Confirma contraseña:</label>
		            	<input class="form-control form-control-sm mb-2" placeholder="Contraseña" name="contrasena2" type="password" required>
		            	<label for="">Correo:</label>
		            	<input class="form-control form-control-sm mb-4" placeholder="Correo" name="correo" type="text" required>
		            	<input type="submit" class="Ingresar btn btn-success btn-block mt-3 mb-5" name="registro" value="Registrarse">
		            </div>
	            </form>
			</div>
        </main>
    </div>
     <footer>
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-auto">
                    <h6 class="m-2">Información</h6>
                    <a href="">Sobre Nosotros</a><br>
                    <a href="">Politicas de uso</a><br>
                </div>
                <div class="col-auto mr-auto">
                    <h6 class="m-2">Servicio al Cliente</h6>
                    <a href="">Contacto</a><br>
                    <a href="">Preguntas Frecuentes</a><br><br>
                </div>
                <div class="col-auto">
                    <div class="row">
                        <h6 class="m-2">*Nombre del Proyecto* <i class="fa fa-copyright" aria-hidden="true"></i> Derechos reservados</h6>
                    </div>
                    <div class="row justify-content-around">
                        <!--<a href=""><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-youtube fa-3x" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                        <a href=""><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>