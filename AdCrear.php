
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
                            <p>Este nombre para una encuesta ya existe, por favor ingrese otro.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["errorfechas"])){ ?>
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
                            <p>La fecha escogida debe ser mayor a la actual.</p>
                        </div>
                    </div>
                </div>
            </div>  
    <?php } ?>
    <?php if (isset($_GET["creado"])){ ?>
            <script type="text/javascript">
                window.onload = function(){ $('#error4').modal('show') };
            </script>

            <div class="modal fade" id="error4" tabindex="-1" role="dialog" aria-labelledby="fm-modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Encuesta creada</h5>
                            <button class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>La encuesta se a creado correctamente.</p>
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
                    <h3 class="mx-3 my-auto col-auto">Crear encuesta</h3>
                </div>
                <hr class="mx-3">
            </div>
            <div class="col-11 mb-4">
                <div class="card rounded border-secondary">
                    <div class="card-body">
                        <form action="php/InsertEncuesta.php" name="Encuesta" method="POST">
                            <div class="form-group">
                                <label>Nombre de la encuesta:</label>
                                <input class="form-control form-control-sm mb-2" placeholder="Nombre" name="nombre" id="nombre" type="text" required>
                                <label for="">Fecha de finalización:</label><br>
                                <?php 
                                    $fm = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
                                ?>
                                <input name="date" id="date" type="date" value="<?php echo $fm; ?>" min="<?php echo $fm; ?>" required><br>
                                <label>Cantidad de opciones:</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Cantidad" id="c2" value="2" checked>
                                    <label class="form-check-label" for="inlineRadio2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Cantidad" id="c3" value="3">
                                    <label class="form-check-label" for="inlineRadio3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Cantidad" id="c4" value="4">
                                    <label class="form-check-label" for="inlineRadio3">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Cantidad" id="c5" value="5">
                                    <label class="form-check-label" for="inlineRadio3">5</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Cantidad" id="c6" value="6">
                                    <label class="form-check-label" for="inlineRadio1">6</label>
                                </div>
                                <button type="button" onclick="GuardarDatos()" class="Ingresar btn btn-info btn-block mt-3 mb-3" data-toggle="collapse" href="#collapseform" role="button" aria-expanded="false" aria-controls="collapseform" name="registro" id="adencuesta"> Agregar datos de opciones </button>
                            </div>
                            <div class="collapse multi-collapse" id="collapseform">
                            </div>
                        </form>
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
    <script>
        var name = "";
        var date = "";
        var op = "";
        function GuardarDatos() {
            name = document.forms["Encuesta"]["nombre"].value;
            date = document.forms["Encuesta"]["date"].value;
            op = document.forms["Encuesta"]["Cantidad"].value;
            if (name == "" || date == ""  || op == "" ) {return 0}
            console.log(name);
            console.log(date);
            console.log(op);
            
            var cuerpo = document.getElementById("collapseform");
            var capa = document.createElement("div");
            capa.setAttribute("class", "row justify-content-center");
            capa.setAttribute("id", "contenedor");

            for (var i = 1; i <= op; i++) {
                var divcoll = document.createElement("div");
                divcoll.setAttribute("class", " col-3 card card-body my-2 mx-4 bg-light"); 

                    var title = document.createElement("h5");
                    title.setAttribute("class", "mx-2 my-0");
                    title.innerHTML = "Opción "+i;
                    divcoll.appendChild(title);

                    var hr = document.createElement("hr");
                    divcoll.appendChild(hr);

                    var labelin = document.createElement("label");
                    labelin.innerHTML = "nombre de la opción:";
                    divcoll.appendChild(labelin);

                    var input = document.createElement("input");
                    input.setAttribute("class", "form-control form-control-sm mb-2");
                    input.setAttribute("placeholder", "Nombre de opción");
                    input.setAttribute("name", "nombre_opcion[]");
                    input.setAttribute("type", "text");
                    input.setAttribute("required", "true");
                    divcoll.appendChild(input);

                    var labeltx = document.createElement("label");
                    labeltx.innerHTML = "Descripción:";
                    divcoll.appendChild(labeltx);

                    var textarea = document.createElement("textarea");
                    textarea.setAttribute("name", "descripcion[]");
                    textarea.setAttribute("style", "width: 100%; height: 100px;");
                    divcoll.appendChild(textarea);

                capa.appendChild(divcoll);
            }
            var divbtn = document.createElement("div");
            divbtn.setAttribute("class", "col-12");

                var row = document.createElement("div");
                row.setAttribute("class", "row my-2");

                    var columnabtn1 = document.createElement("div");
                    columnabtn1.setAttribute("class", "col-auto ml-5");
                        var link = document.createElement("button");
                        link.setAttribute("onclick", "VolverPrincipal()");
                        link.setAttribute("class", "btn btn-info");
                        link.setAttribute("type", "button");
                        link.setAttribute("data-toggle", "collapse");
                        link.setAttribute("href", "#collapseform");
                        link.setAttribute("role", "button");
                        link.setAttribute("aria-expanded", "true");
                        link.setAttribute("aria-controls", "collapseform");
                        link.setAttribute("name", "registro2");
                        link.setAttribute("id", "adencuesta2");
                        link.innerHTML = "Cambiar datos de la Encuesta";
                        columnabtn1.appendChild(link);
                    row.appendChild(columnabtn1);

                    var columnabtn2 = document.createElement("div");
                    columnabtn2.setAttribute("class", "col-auto mr-5 ml-auto");
                        var input = document.createElement("input");
                        input.setAttribute("class", "btn btn-success");
                        input.setAttribute("value", "Agregar encuesta");
                        input.setAttribute("name", "Enviar");
                        input.setAttribute("type", "submit");
                        columnabtn2.appendChild(input);
                    row.appendChild(columnabtn2);

                divbtn.appendChild(row);
            capa.appendChild(divbtn);
            cuerpo.appendChild(capa);

            document.getElementById('nombre').readOnly = true
            document.getElementById('date').readOnly = true
            if (document.getElementById('c2').checked == false) {document.getElementById('c2').disabled = true}
            if (document.getElementById('c3').checked == false) {document.getElementById('c3').disabled = true}
            if (document.getElementById('c4').checked == false) {document.getElementById('c4').disabled = true}
            if (document.getElementById('c5').checked == false) {document.getElementById('c5').disabled = true}
            if (document.getElementById('c6').checked == false) {document.getElementById('c6').disabled = true}
            setTimeout ("document.getElementById('adencuesta').disabled = true;", 50);
        }

        function VolverPrincipal() {
            document.getElementById('nombre').readOnly = false
            document.getElementById('date').readOnly = false
            document.getElementById('c2').disabled = false
            document.getElementById('c3').disabled = false
            document.getElementById('c4').disabled = false
            document.getElementById('c5').disabled = false
            document.getElementById('c6').disabled = false
            setTimeout ("document.getElementById('adencuesta').disabled = false;", 50);
            document.getElementById("contenedor").parentNode.removeChild(document.getElementById("contenedor"));
        }
    </script>

</body>
</html>