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
    <?php if (isset($_GET["errornumeros"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error4').modal('show') };
            </script>

            <div class="modal fade" id="error4" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Los campos Telefono y Edad solo permiten ingresar numeros.</p>
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
                            <p>Los datos se han actualizado correctamente.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["eliminado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error6').modal('show') };
            </script>

            <div class="modal fade" id="error6" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registro eliminado</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>El usuario ha sido eliminado de la base de datos.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["error"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error6').modal('show') };
            </script>

            <div class="modal fade" id="error6" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error al eliminar usuario</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Mensaje de error: <br>
                                <span class="text-lowercase"><i><?php echo $_GET['m'] ?></i></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["ultimo"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error7').modal('show') };
            </script>

            <div class="modal fade" id="error7" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error al modificar usuario</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                El usuario que intenta cambiar es el ultimo de tipo Administrador. No se pueden a eliminar todos los administradores del sistema.<br><br>Si desea borrar esta cuenta antes debe crear otra de tipo Admin.
                            </p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["agregado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error7').modal('show') };
            </script>

            <div class="modal fade" id="error7" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Usuario Agregado</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>El usuario se a registrado correctamente.</p>
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
                    <?php include "php/AutentificacionAdmin.php";  include "php/Autentificacion2.php";?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <main class="InPrincipal row justify-content-center">
            <div class="col-11 my-4">
                <div class="row">
                    <h3 class="mx-3 my-auto col-auto">Administrar usuarios</h3>
                    <form action="" method="GET" class="form-inline my-2 col-auto m-auto">
                        <input class="form-control mr-sm-2" placeholder="Buscar" type="text" name="buscar">
                        <button class="btn btn-outline-primary my-2" type="submit"><i class="fas fa-search mx-3"></i></button>
                    </form>
                    <button class="btn btn-success my-auto ml-auto mr-3" data-toggle="modal" data-target="#AgregarUsuario">
                        Agregar Usuario
                    </button>
<div class="modal fade" id="AgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form action="php/InsertUsuario.php" method="POST">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input class="form-control form-control-sm mb-2" placeholder="Nombre" name="nombre" type="text" required>
                        <label>Coreo:</label>
                        <input class="form-control form-control-sm mb-2" placeholder="Correo" name="correo" type="text" required>
                        <label>Contraseña:</label>
                        <input class="form-control form-control-sm mb-2" placeholder="Contraseña" name="contrasena" type="text" required>
                        <label>tipo de cuenta:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo" id="b" value="b" checked>
                            <label class="form-check-label" for="inlineRadio1">Normal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo" id="a" value="a">
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <button type="submit" class="Ingresar btn btn-success btn-block mt-3 mb-3" name="id">Agregar Cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                </div>
                <hr class="mx-3">
            </div>
            <div class="col-11 mb-4">
                <?php
                    $re2 = $mysqli->query("SELECT * FROM `usuarios`");
                    $cantidad_resultados = 15;
                    if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
                        if ($_GET["page"] != 1) {
                            $pagina = $_GET["page"];
                        }
                    } else {
                        $pagina = 1;
                    }
                    $empieza = ($pagina-1) * $cantidad_resultados;
                    $total_registros = mysqli_num_rows($re2);

                    $total_paginas = ceil($total_registros / $cantidad_resultados);

                    if(isset($_GET['buscar'])){
                        $re = $mysqli->query("SELECT * FROM usuarios WHERE nombre_usuario  LIKE '%".$_GET['buscar']."%' ORDER BY `id_usuario` ASC LIMIT $empieza, $cantidad_resultados");
                    } else {
                        $re = $mysqli->query("SELECT * FROM usuarios ORDER BY `id_usuario` ASC LIMIT $empieza, $cantidad_resultados");
                    }
                     if ((mysqli_num_rows($re))!=0) {
                ?>
                <table class="table table-striped table-bordered table-sm table-hover">
                     <thead class="thead-dark">
                        <th class="text-center col-auto">ID</th>
                        <th class="text-center col-auto">Nombre</th>
                        <th class="text-center col-auto">Correo</th>
                        <th class="text-center col-auto">Contraseña</th>
                        <th class="text-center col-auto">Tipo</th>
                        <th class="text-center col-auto">Editar</th>
                        <th class="text-center col-auto">Eliminar</th>
                    </thead>
                <?php
                        while ($f=mysqli_fetch_array($re)) {
                ?>     
                    <tr>
                        <td class="text-center"><?php echo $f['id_usuario']; ?></td>
                        <td class="text-center"><?php echo $f['nombre_usuario']; ?></td>
                        <td class="text-center"><?php echo $f['correo_usuario']; ?></td>
                        <td class="text-center"><?php echo $f['contrasena_usuario']; ?></td>
                        <td class="text-center"><?php if ($f['tipo_usuario']=='a') { echo "Admin"; } else { echo "Normal"; } ?></td>
                        <td class="text-center">
                            <button class="retirar btn btn-primary btn-sm" data-toggle="modal" data-target="#Editar<?php echo $f['id_usuario']; ?>">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </button>
                        </td>
<div class="modal fade" id="Editar<?php echo $f['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar datos del usuario <?php echo $f['id_usuario']; ?></h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form action="php/EditUsuario.php" method="POST">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input class="form-control form-control-sm mb-2" placeholder="Nombre" name="nombre" value="<?php echo $f['nombre_usuario']; ?>" type="text" required>
                        <label>Coreo:</label>
                        <input class="form-control form-control-sm mb-2" placeholder="Correo" name="correo" value="<?php echo $f['correo_usuario']; ?>" type="text" required>
                        <label>Contraseña:</label>
                        <input class="form-control form-control-sm mb-2" placeholder="Contraseña" name="contrasena" value="<?php echo $f['contrasena_usuario']; ?>" type="text" required>
                        <label>tipo de cuenta:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo" id="b" value="b" <?php if ($f['tipo_usuario']=='b') { echo "checked"; } ?>>
                            <label class="form-check-label" for="inlineRadio1">Normal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo" id="a" value="a" <?php if ($f['tipo_usuario']=='a') { echo "checked"; } ?>>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <button type="submit" class="Ingresar btn btn-success btn-block mt-3 mb-3" name="id" value="<?php echo $f['id_usuario']; ?>">Editar Cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                        <td class="text-center">
                            <form action="php/DeleteUsuario.php" method="POST">
                                <button type="submit" class="retirar btn btn-danger btn-sm" name="id" value="<?php echo $f['id_usuario']; ?>">
                                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                        }
                ?>      
                </table>

                <nav class="mt-4" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if($pagina==1){ echo "disabled";} ?>">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a>
                        </li>
                        <?php
                            if ($pagina<5) {
                                $i = 1;
                            } else {
                                $i = $pagina-4;
                            }
                            if ($total_paginas<=9) {
                                 $Muestra_paginas = $total_paginas;
                            } else {
                                $Muestra_paginas = 9;
                            }

                            for ($i; $i<=$Muestra_paginas; $i++) {
                                print '<li class="page-item ';
                                if($pagina==$i){print 'disabled';}
                                echo '"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
                            }; 
                        ?>       
                        <li class="page-item <?php if($pagina==$total_paginas){ echo "disabled";} ?>">
                            <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>

            </div>
                <?php
                } else {
                    echo "<div class='col-12 m-5'><center><strong>No hat encuestas</strong></center></div>";
                }
                ?>
                </table>
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