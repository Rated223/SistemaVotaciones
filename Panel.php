<!DOCTYPE html>
<html lang="es">
<?php include "php/Conexion.php";?>
<head>
    <title>Sistema de votos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
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
    <?php if (isset($_GET["repetidos"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error1').modal('show') };
            </script>

            <div class="modal fade" id="error1" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Los datos de usuario y correo ya estan registrados en otras cuentas, por favor elija otros.</p>
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
    <?php if (isset($_GET["editado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error5').modal('show') };
            </script>

            <div class="modal fade" id="error5" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Datos Editados</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Sus datos se han actualizado correctamente.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <nav class="navbar navbar-expand-xl navbar-dark bg-primary">
        <div class="container">
            <a href="Panel.php" class="navbar-brand">
                <div class="Titulo align-content-center">
                    <strong class="d-none d-sm-inline-block text-center" >Sistema de votos</strong>
                </div>
            </a>
            <div class="col-auto ml-auto">
                    <?php include "php/Autentificacion.php";?>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Encuestas.php">Ver encuestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="MiVoto.php">Mis votos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Panel.php">Cuenta</a>
                    </li>
                    <?php include "php/AutentificacionAdmin.php";?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <main class="InPrincipal row justify-content-center">
            <div class="col-12 col-lg-4">
                <div class="card my-4 rounded">
                    <h4 class="card-header">Informacion de la cuenta</h4>
                    <div class="card-body">
                        <?php
                            $re = $mysqli->query("SELECT * FROM usuarios WHERE nombre_usuario = '".$_SESSION['usuario']."'");
                             $f = mysqli_fetch_array($re);
                        ?>
                        <table class="table table-striped table-sm">
                            <tr>
                                <th>Nombre de usuario:</th>
                            </tr>
                            <tr class="table-light">
                                <td><?php echo $f['nombre_usuario']; ?></td>
                            </tr>
                            <tr>
                                <th>Correo:</th>
                            </tr>
                            <tr class="table-light">
                                <td><?php echo $f['correo_usuario']; ?></td>
                            </tr>
                            <tr>
                                <th>Tipo:</th>
                            </tr>
                            <tr class="table-light">
                                <td>
                                    <?php 
                                        if ($f['tipo_usuario'] == 'a') {
                                            echo "Administrador";
                                        } else {
                                            echo "Encuestado";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                         <button class="btn btn-info mt-3 btn-block"  data-toggle="modal" data-target="#Editar"> Editar datos</button>
                    </div>
                    <?php
                        $y = 0;
                        $re2 = $mysqli->query("SELECT * FROM `votacion`
                            INNER JOIN `votos_emitidos`
                            ON votacion.id_votacion = votos_emitidos.id_votacion
                            INNER JOIN `usuarios`
                            ON votos_emitidos.id_usuario = usuarios.id_usuario
                            WHERE usuarios.nombre_usuario = '".$_SESSION['usuario']."'");
                        while ($f2=mysqli_fetch_array($re2)) {
                            $y++;
                        }
                    ?>
                    <h5 class="card-footer"> 
                        <p class="text-center my-0">
                            Ha participado en <span class="font-weight-bold"><?php echo $y?></span> encuestas
                        </p> 
                    </h5>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="card my-4">
                    <h4 class="card-header">Ultimos votos</h4>
                    <div class="card-body">
                        <?php
                            $re3 = $mysqli->query("SELECT * FROM `votacion`
                                INNER JOIN `votos_emitidos`
                                ON votacion.id_votacion = votos_emitidos.id_votacion
                                INNER JOIN `usuarios`
                                ON votos_emitidos.id_usuario = usuarios.id_usuario
                                WHERE usuarios.nombre_usuario = '".$_SESSION['usuario']."'");
                            if ((mysqli_num_rows($re3))!=0) {
                                $x = 0;
                        ?>
                                <ul class="list-group">
                        <?php
                                while ($f3=mysqli_fetch_array($re3)) {
                                    if ($x==5) {
                                        break;
                                    }
                        ?>
                                    <a  href="Votacion.php?id=<?php echo $f3['id_votacion'];?>" class="list-group-item list-group-item-action">
                                        <?php echo $f3['nombre_votacion']; ?>
                                    </a>
                        <?php
                                    $x++;
                                }
                        ?>      
                                </ul>
                                <div class="my-4 mx-5">
                                    <a href="MiVoto.php" class="btn btn-success btn-block">Ver todas</a>
                                </div>
                        <?php
                            } else {
                                echo "<div class='col-12 my-4'><center><strong>Usted aun no ha participado en ninguna encuesta</strong></center></div>";
                            }
                        ?>                      
                    </div>    
                </div>
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

    <div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar datos de la cuenta</h5>
                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="php/EditarDatos.php" method="POST">
                        <div class="form-group">
                            <label>Nombre de usuario:</label>
                            <input class="form-control form-control-sm mb-2" placeholder="Nombre" name="nombre" type="text" value="<?php echo $f['nombre_usuario']; ?>" required>
                            <label>Contraseña:</label>
                            <input class="form-control form-control-sm mb-2" placeholder="Contraseña" name="contrasena" type="password" value="<?php echo $f['contrasena_usuario']; ?>" required>
                            <label>Confirma contraseña:</label>
                            <input class="form-control form-control-sm mb-2" placeholder="Contraseña" name="contrasena2" type="password" value="<?php echo $f['contrasena_usuario']; ?>" required>
                            <label for="">Correo:</label>
                            <input class="form-control form-control-sm mb-2" placeholder="Correo" name="correo" type="text" value="<?php echo $f['correo_usuario']; ?>" required>
                            <input type="submit" class="Ingresar btn btn-success btn-block mt-3 mb-3" name="registro" value="Cambiar datos">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>