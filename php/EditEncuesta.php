<?php
	include "CompararFechas.php";
	session_start();
	include "Conexion.php";
	$x = 0;
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
    $fechaf = $_POST['fechaf'];
    $fechai = $_POST['fechai'];;
	$re = $mysqli->query("SELECT * FROM votacion");
	while ($f = mysqli_fetch_array($re)) {
    	if ((strcasecmp($nombre, $f['nombre_votacion'])) == 0 && $id != $f['id_votacion']) {
    		$x++;
    	}
    }
    if ($x>0) {
    	header("Location: ../AdEncuestas.php?repetido=si");
    } else {
        $rs = $mysqli->query("UPDATE votacion SET nombre_votacion='$nombre', fecha_inicio_votacion='$fechai',  	fecha_final_votacion='$fechaf' WHERE id_votacion = '$id'");

        usleep(500000);

        $id_opcion = ($_POST['id_opcion']);
	    $nombre_opcion = ($_POST['nombre_opcion']);
	    $descripcion = ($_POST['descripcion_opcion']);
	    $idop  = current($id_opcion);
	    $nomOp = current($nombre_opcion);
	    $desc = current($descripcion);
	    while (true) {
	    	if ((strcasecmp($nomOp, $nomOp2)) != 0) {
	    		$rs2 = $mysqli->query("UPDATE opciones SET id_votacion='$id', nombre_opcion='$nomOp', descripcion_opcion='$desc' WHERE id_opcion = '$idop' ");
	    		$idop2 = $idop;
	    		$nomOp2 = $nomOp;
	    		$desc2 = $desc;
	    	}
	    	$idop  = next($id_opcion);
	    	$nomOp = next($nombre_opcion);
	    	$desc = next($descripcion);
	    	if ($nomOp === false && $desc === false && $idop === false) { break; }
	    }


   		header("Location: ../AdEncuestas.php?editado=si");
    }
?>