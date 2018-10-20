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
            <div class="col-11 my-4">
                <div class="row">
                    <h3 class="mx-3 my-auto col-auto">Encuestas</h3>
                    <form action="" method="GET" class="form-inline my-2 my-lg-0 col-auto ml-auto">
                        <input class="form-control mr-sm-2" placeholder="Buscar" type="text" name="buscar">
                        <button class="btn btn-outline-primary my-2" type="submit"><i class="fas fa-search mx-3"></i></button>
                    </form>
                </div>
                <hr class="mx-3">
                <?php
                    $re = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion FROM `votacion`");
                    $cantidad_resultados = 6;
                    if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
                        if ($_GET["page"] != 1) {
                            $pagina = $_GET["page"];
                        }
                    } else {
                        $pagina = 1;
                    }
                    $empieza = ($pagina-1) * $cantidad_resultados;
                    $total_registros = mysqli_num_rows($re);

                    $total_paginas = ceil($total_registros / $cantidad_resultados);

                    if(isset($_GET['buscar'])){
                        $re2 = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion FROM `votacion` WHERE nombre_votacion  LIKE '%".$_GET['buscar']."%' ORDER BY `votacion`.`id_votacion` DESC LIMIT $empieza, $cantidad_resultados");
                    } else {
                        $re2 = $mysqli->query("SELECT *, DATE_FORMAT(fecha_inicio_votacion, '%d-%m-%Y') AS fecha_inicio_votacion, DATE_FORMAT(fecha_final_votacion, '%d-%m-%Y') AS fecha_final_votacion FROM `votacion` ORDER BY `votacion`.`id_votacion` DESC LIMIT $empieza, $cantidad_resultados");
                    }
                    if ((mysqli_num_rows($re2))!=0) {
                ?>
                        <ul class="list-group">
                <?php
                        while ($f=mysqli_fetch_array($re2)) {
                ?>
                            <a  href="Votacion.php?id=<?php echo $f['id_votacion'];?>" class="list-group-item list-group-item-action">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <h5>
                                            <?php 
                                            echo $f['nombre_votacion']; 
                                            $re3 = $mysqli->query("SELECT * FROM `votacion`
                                                                    INNER JOIN `votos_emitidos`
                                                                    ON votacion.id_votacion = votos_emitidos.id_votacion
                                                                    INNER JOIN `usuarios`
                                                                    ON votos_emitidos.id_usuario = usuarios.id_usuario
                                                                    WHERE usuarios.nombre_usuario = '".$_SESSION['usuario']."'");
                                            while ($f2=mysqli_fetch_array($re3)) {
                                                if ($f['nombre_votacion'] == $f2['nombre_votacion']) {
                                                    echo ' <i class="fas fa-check-square fa-lg"></i>';
                                                }
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                    <div class="col-md-2 col-6 border border-dark border-bottom-0 border-top-0 border-right-0">
                                        <span class="font-weight-bold">inicio: </span><?php echo $f['fecha_inicio_votacion']; ?>
                                    </div>
                                    <div class="col-md-2 col-6 border border-dark border-bottom-0 border-top-0 border-right-0">
                                        <span class="font-weight-bold">finaliza: </span><?php echo $f['fecha_final_votacion']; ?>
                                    </div>
                                </div>
                            </a>
                <?php
                        }
                ?>      
                        </ul>
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
                <?php 
                    } else {
                        echo "<div class='col-12 my-4'><center><strong>Usted aun no ha participado en ninguna encuesta</strong></center></div>";
                    }
                ?>
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