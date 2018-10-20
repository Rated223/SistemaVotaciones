<?php
	include "CompararFechas.php";
	session_start();
	include "Conexion.php";
	$x = 0;
	$nombre = $_POST['nombre'];
    $fechaf = $_POST['date'];
    $fechai = date("Y-m-d");
    $Cantidad_opciones = $_POST['Cantidad'];
	$re = $mysqli->query("SELECT * FROM votacion");
	while ($f = mysqli_fetch_array($re)) {
    	if ((strcasecmp($nombre, $f['nombre_votacion'])) == 0) {
    		$x++;
    	}
    }
    if ($x>0) {
    	header("Location: ../AdCrear.php?repetido=si");
    } else {
	    $rs = $mysqli->query("INSERT INTO votacion (nombre_votacion, fecha_inicio_votacion, fecha_final_votacion) VALUES ('".$nombre."', '".$fechai."', '".$fechaf."')");
	    usleep(500000);
	    $re2 = $mysqli->query("SELECT id_votacion FROM votacion WHERE nombre_votacion = '".$nombre."'");
	    $f2 = mysqli_fetch_array($re2);

	    $nombre_opcion = ($_POST['nombre_opcion']);
	    $descripcion = ($_POST['descripcion']);
	    $nomOp = current($nombre_opcion);
	    $desc = current($descripcion);
	    while (true) {
	    	if ((strcasecmp($nomOp, $nomOp2)) != 0) {
	    		$rs2 = $mysqli->query("INSERT INTO opciones (id_votacion, nombre_opcion, descripcion_opcion, numero_votos_opcion) VALUES ('".$f2['id_votacion']."', '".$nomOp."', '".$desc."', '0')");
	    		$nomOp2 = $nomOp;
	    		$desc2 = $desc;
	    	}
	    	$nomOp = next($nombre_opcion);
	    	$desc = next($descripcion);
	    	if ($nomOp === false && $desc === false) { break; }
	    }
	    header("Location: ../AdCrear.php?creado=si");      
	}
?>