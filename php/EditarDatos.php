<?php
	session_start();
	include "conexion.php";

	if ($_POST['contrasena'] != $_POST['contrasena2']) {
		header("Location: ../Panel.php?errorcontrasena=si");
	} else {
		$re = $mysqli->query("SELECT * FROM usuarios");
        if(mysqli_connect_errno()){
            echo 'conexion fallida: ', mysqli_connect_error;
        }
  		while ($f=mysqli_fetch_array($re)) {
        	if ($_SESSION['usuario'] == $f['nombre_usuario']) {
        		$id = $f['id_usuario'];
        	}
        }


		$re2 = $mysqli->query("SELECT * FROM usuarios");
        if(mysqli_connect_errno()){
            echo 'conexion fallida: ', mysqli_connect_error;
        }
  		while ($f2=mysqli_fetch_array($re2)) {
        	if (($_POST['nombre'] == $f2['nombre_usuario']) && ($id != $f2['id_usuario'])) {
        		$x=1;
        	}
        	if (($_POST['correo'] == $f2['correo_usuario']) && ($id != $f2['id_usuario'])) {
        		$y=1;
        	}
        }


        if ($x==1 && $y==1) {
            header("Location: ../Panel.php?repetidos=si");
        } elseif ($x==1) {
            header("Location: ../Panel.php?errorusuario=si");
        } elseif ($y==1) {
            header("Location: ../Panel.php?errorcorreo=si");
        } else {
            $nombre = $_POST['nombre'];
            $contrasena = $_POST['contrasena'];
            $correo = $_POST['correo'];
            $rs = $mysqli->query("UPDATE usuarios SET nombre_usuario='$nombre', contrasena_usuario='$contrasena', correo_usuario='$correo' WHERE id_usuario = '$id'");
            $_SESSION['usuario'] = $nombre;
            $_SESSION['contra'] = $contrasena;
            header("Location: ../Panel.php?editado=si");
        }
	}
?>