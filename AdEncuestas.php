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
    <?php if (isset($_GET["repetido"])){ ?>
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
                            <p>El nombre de la encuesta que intenta ingresar ya existe.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["editado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error2').modal('show') };
            </script>

            <div class="modal fade" id="error2" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
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
                window.onload = function(){ $('#error3').modal('show') };
            </script>

            <div class="modal fade" id="error3" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Registro eliminado</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>La encuesta ha sido eliminado de la base de datos.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["error"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error4').modal('show') };
            </script>

            <div class="modal fade" id="error4" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error al eliminar encuesta</h5>
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
                    <h3 class="mx-3 my-auto col-auto">Administrar encuestas</h3>
                    <form action="" method="GET" class="form-inline my-2 col-auto m-auto">
                        <input class="form-control mr-sm-2" placeholder="Buscar" type="text" name="buscar">
                        <button class="btn btn-outline-primary my-2" type="submit"><i class="fas fa-search mx-3"></i></button>
                    </form>
                    <a class="btn btn-success my-auto ml-auto mr-3" href="AdCrear.php">
                        Agregar Encuesta
                    </a>
                </div>
                <hr class="mx-3">
            </div>
            <div class="col-11 mb-4">
                <?php
                    $re2 = $mysqli->query("SELECT * FROM `votacion`");
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
                        $re = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion_F, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion_F FROM votacion WHERE nombre_votacion LIKE '%".$_GET['buscar']."%' ORDER BY `votacion`.`id_votacion` ASC LIMIT $empieza, $cantidad_resultados");
                    } else {
                        $re = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion_F, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion_F FROM votacion ORDER BY `votacion`.`id_votacion` ASC LIMIT $empieza, $cantidad_resultados");
                    }
                     if ((mysqli_num_rows($re))!=0) {
                ?>
                <table class="table table-striped table-bordered table-sm table-hover">
                     <thead class="thead-dark">
                        <th class="text-center col-auto">ID</th>
                        <th class="text-center col-auto">Nombre</th>
                        <th class="text-center col-auto">Fecha de inicio</th>
                        <th class="text-center col-auto">Fecha de finalización</th>
                        <th class="text-center col-auto">Editar</th>
                        <th class="text-center col-auto">Eliminar</th>
                    </thead>
                <?php
                        while ($f=mysqli_fetch_array($re)) {
                ?>     
                    <tr>
                        <td class="text-center"><?php echo $f['id_votacion']; ?></td>
                        <td class="text-center"><?php echo $f['nombre_votacion']; ?></td>
                        <td class="text-center"><?php echo $f['fecha_inicio_votacion_F']; ?></td>
                        <td class="text-center"><?php echo $f['fecha_final_votacion_F']; ?></td>
                        <td class="text-center">
                            <button class="retirar btn btn-primary btn-sm" data-toggle="modal" data-target="#Editar<?php echo $f['id_votacion']; ?>">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </button>
                        </td>
<div class="modal fade" id="Editar<?php echo $f['id_votacion']; ?>" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar datos de la encuesta <?php echo $f['id_votacion']; ?></h5>
                <button class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form action="php/EditEncuesta.php" method="POST">
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input class="form-control form-control-sm mb-2" placeholder="Nombre" name="nombre" value="<?php echo $f['nombre_votacion']; ?>" type="text" required>
                        <label class="mt-2">fecha de inicio:</label>
                        <input class="form-control form-control-sm mb-2" name="fechai" id="fechai" type="date" value="<?php echo $f['fecha_inicio_votacion']; ?>" readonly>
                        <label class="mt-2">fecha fin:</label>
                        <input class="form-control form-control-sm mb-2" name="fechaf" id="fechaf" type="date" value="<?php echo $f['fecha_final_votacion']; ?>" min="<?php echo date('Y-m-d',mktime(0,0,0,date('m'),date('d')+1,date('Y'))); ?>" required>
                        <hr>
                        <?php 
                            $re2 = $mysqli->query("SELECT * FROM `opciones` WHERE id_votacion = '". $f['id_votacion']."'");
                            $contador = 1;
                            while ($f2=mysqli_fetch_array($re2)) {
                        ?>
                                <div class="card card-body my-2 mx-4 bg-light">
                                    <div class="row">
                                        <h5 class="col-auto">Opcion <?php echo $contador; ?></h5>
                                        <div class=" col-auto ml-auto">id: <input type="text" name="id_opcion[]" maxlength="4" size="2" value="<?php echo $f2['id_opcion']; ?>" readOnly></div>
                                    </div>
                                    <hr>
                                    <label>Nombre de opción:</label>
                                    <input type="text" class="form-control form-control-sm mb-2" placeholder="Nombre de opción" name="nombre_opcion[]" value="<?php echo $f2['nombre_opcion']; ?>" required>
                                    <label>Descripción:</label>
                                    <textarea name="descripcion_opcion[]" style="width: 100%; height: 100px;"><?php echo $f2['descripcion_opcion']; ?></textarea>
                                    <label>Cantidad de votos:</label>
                                    <input type="text" class="form-control form-control-sm mb-2" placeholder="Votos" value="<?php echo $f2['numero_votos_opcion']; ?>" disabled>
                                </div>
                        <?php
                                $contador++;
                            }
                        ?>
                        <button type="submit" class="Ingresar btn btn-success btn-block mt-3 mb-3" name="id" value="<?php echo $f['id_votacion']; ?>">Editar Encuesta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                        <td class="text-center">
                            <form action="php/DeleteEncuesta.php" method="POST">
                                <button type="submit" class="retirar btn btn-danger btn-sm" name="id" value="<?php echo $f['id_votacion']; ?>">
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