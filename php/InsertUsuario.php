<?php
	session_start();
	include "conexion.php";
	$re = $mysqli->query("SELECT * FROM usuarios");
    if(mysqli_connect_errno()){
        echo 'conexion fallida: ', mysqli_connect_error;
    }
		while ($f=mysqli_fetch_array($re)) {
    	if ($_POST['nombre'] == $f['nombre_usuario']) {
    		$x=1;
    	}
    	if ($_POST['correo'] == $f['correo_usuario']) {
    		$y=1;
    	}
    }


    if ($x==1 && $y==1) {
        header("Location: ../AdUsuarios.php?repetidos=si");
    } elseif ($x==1) {
        header("Location: ../AdUsuarios.php?errorusuario=si");
    } elseif ($y==1) {
        header("Location: ../AdUsuarios.php?errorcorreo=si");
    } else {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $correo = $_POST['correo'];
        $tipo = $_POST['tipo'];
        $rs = $mysqli->query("INSERT INTO usuarios (nombre_usuario, correo_usuario, contrasena_usuario, tipo_usuario) VALUES ('".$nombre."', '".$correo."', '".$contrasena."', '".$tipo."')");
        header("Location: ../AdUsuarios.php?agregado=si");
    }
?>