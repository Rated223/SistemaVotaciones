<!DOCTYPE html>
<html lang="es">
<?php 
    include "php/Conexion.php";
    include "php/CompararFechas.php";
    function b4Color($int){
        switch ($int) {
            case 0:
                $str = 'primary';
                break;
            case 1:
                $str = 'success';
                break;
            case 2:
                $str = 'danger';
                break;
            case 3:
                $str = 'info';
                break;
            case 4:
                $str = 'warning';
                break;
            case 5:
                $str = 'secondary';
                break;
            default:
                $str = 'primary';
                break;
        }
        echo $str;
    }

?>
<head>
    <title>Sistema de votos</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script type="text/javascript"  href="./js/scripts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/Estilos.css">
</head>
<body>
    <?php if (isset($_GET["voto"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error').modal('show') };
            </script>

            <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Voto emitido</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Gracias por participar en nuestra encuesta</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (!isset($_GET["id"])){
        header("Location: Encuestas.php");        
    } ?>
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
                 <?php
                    $re = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion FROM `votacion` WHERE id_votacion = ".$_GET['id']);
                    while ($f=mysqli_fetch_array($re)) {
                        $id = $f['id_votacion'];
                        $nombre = $f['nombre_votacion'];
                        $fecha_inicio = $f['fecha_inicio_votacion'];
                        $fecha_fin = $f['fecha_final_votacion'];
                    }
                    $Voto_emitido = false;
                    $re2 = $mysqli->query("SELECT * FROM `votacion` INNER JOIN `votos_emitidos` ON votacion.id_votacion = votos_emitidos.id_votacion INNER JOIN `usuarios` ON votos_emitidos.id_usuario = usuarios.id_usuario WHERE usuarios.nombre_usuario = '".$_SESSION['usuario']."' && votacion.id_votacion = '".$_GET['id']."'");
                    while ($f2=mysqli_fetch_array($re2)) {
                        if ($id == $f2['id_votacion']) {
                            $Voto_emitido = true;
                            break;
                        }
                    }
                ?>
                <div class="my-4 col-12">
                    <div class="row">
                        <h3 class="col-12 mx-3">Encuesta: <?php echo $nombre; ?></h3>
                        <span class="col-auto ml-auto my-auto font-weight-bold border-right">fecha de inicio: <?php echo $fecha_inicio ?></span>
                        <span class="col-auto mr-3 my-auto font-weight-bold <?php if (!compararFechas(date('d-m-Y'), $fecha_fin)){echo 'text-danger';} ?>">Fecha de finalización: <?php echo $fecha_fin ?></span>
                    </div>
                    <hr>
                </div>
                <?php
                    $num_opciones = 0;
                    $re3 = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion FROM `votacion` INNER JOIN `opciones` ON votacion.id_votacion = opciones.id_votacion WHERE votacion.id_votacion = ".$_GET['id']);
                    while ($f3=mysqli_fetch_array($re3)) {  
                        $num_opciones++;
                    }  
                    switch ($num_opciones) {
                        case 1:
                            $Casilla = 12;
                            break;
                        case 2:
                            $Casilla = 6;
                            break;
                        case 3:
                            $Casilla = 4;
                            break;
                        case 4:
                            $Casilla = 6;
                            break;
                        case 5:
                            $Casilla = 4;
                            break;
                        case 6:
                            $Casilla = 4;
                            break;
                        default:
                            $Casilla = 4;
                            break;
                    }
                    $re4 = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion FROM `votacion` INNER JOIN `opciones` ON votacion.id_votacion = opciones.id_votacion WHERE votacion.id_votacion = ".$_GET['id']);
                    if ($Voto_emitido == false && (compararFechas(date("d-m-Y"), $fecha_fin))) {
                        while ($f4=mysqli_fetch_array($re4)) {
                ?>
                    <div class="col-<?php echo $Casilla ?>">
                        <div class="card my-4 mx-1 rounded">
                            <h5 class="card-header"><?php echo $f4['nombre_opcion']; ?></h5>
                            <div class="card-body">
                                <p>
                                    <?php echo $f4['descripcion_opcion']; ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="php/Voto.php?idv=<?php echo $_GET['id']; ?>&ido=<?php echo $f4['id_opcion']; ?>" class="btn btn-primary btn-block">Votar</a>
                            </div>
                        </div>
                    </div>
                
                <?php        
                        }
                    } else {
                        $re5 = $mysqli->query("SELECT id_opcion FROM `votos_emitidos` WHERE id_votacion = '".$_GET['id']."' && id_usuario = '".$_SESSION['id']."'");
                        $f5=mysqli_fetch_array($re5);
                        $j=0;
                        $total_votos = 0;
                        while ($f4=mysqli_fetch_array($re4)) {
                            $id_op[$j] = $f4['id_opcion'];
                            $numero_votos[$j] = $f4['numero_votos_opcion'];
                            $nombre_op[$j] = $f4['nombre_opcion'];
                            $descripcion_op[$j] = $f4['descripcion_opcion'];
                            $total_votos = $total_votos + $f4['numero_votos_opcion'];
                            $j++;
                        }
                        for ($i=0; $i < $j; $i++) { 
                            $porcentaje_opcion[$i] = round(($numero_votos[$i] / $total_votos)*100);
                ?>
                    <div class="col-<?php echo $Casilla ?>">
                        <div class="card my-4 mx-1 rounded">
                            <div class="card-header bg-<?php b4Color($i); ?> text-white">
                                <h5><?php echo $nombre_op[$i]; if ($f5['id_opcion'] == $id_op[$i]) { echo ' <i class="fas fa-check-square fa-lg"></i>'; } ?></h5>
                                <div class="text-right">
                                    <span class="my-0 mr-auto font-weight-bold"><?php echo $numero_votos[$i]; ?> votos</span>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <p>
                                    <?php echo $descripcion_op[$i]; ?>
                                </p>
                            </div>
                            <div class="card-footer bg-<?php b4Color($i); ?> text-white text-center">
                                    Tiene el <h5 class="font-weight-bold d-inline mx-1"><?php echo $porcentaje_opcion[$i]; ?>%</h5> de los votos
                            </div>
                        </div>
                    </div>    
                <?php     
                          
                        }
                ?>
                <div class="col-12 mb-4">
                    <h4 class="ml-3">Progreso:</h4>
                    <div class="progress mb-3" style="height: 30px; line-height: 30px;">
                <?php
                        for ($i=0; $i < $j; $i++) {
                ?>
            
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-<?php echo b4Color($i) ?>" role="progressbar" style="width: <?php echo $porcentaje_opcion[$i]; ?>%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentaje_opcion[$i]; ?>%</div>
                <?php

                        }
                ?>
                    </div>
                </div>
                <?php
                    }
                ?>
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