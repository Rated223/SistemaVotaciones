<?php
	include "conexion.php";

	if ($_POST['contrasena'] != $_POST['contrasena2']) {
		header("Location: ../Registrase.php?errorcontrasena=si");
	} else {
		$x=0;
		$y=0;
		$re = $mysqli->query("SELECT * FROM usuarios");
        if(mysqli_connect_errno()){
            echo 'conexion fallida: ', mysqli_connect_error;
        }
        while ($f=mysqli_fetch_array($re)) {
        	if ($_POST['nombre'] == $f['nombre_usuario']) {
        		$x++;
        	}
        	if ($_POST['correo'] == $f['correo_usuario']) {
        		$y++;
        	}
        }

        /* LAS SIGUIENTES LINEAS COMENTADAS SON PARA ENVIAR UN CORREO DE CONFIRMACION, SE DEBE TRABAJAR CON FileZilla (XAMPP) O SUBIR A UN SERVIDOR PARA QUE FUNCIONE*/

        //$Mensaje = "Bienvenido ".$_POST['usuario']."!!\nAhora puedes participar en nuestro sitio:";
        //$titulo = "Confirmacion de registro";
		//if (!mail($_POST['correo'], $titulo, $mensaje,"From: rated223@gmail.com")) {
			//header("Location: ../Registrase.php?fracaso=si");
		//} elseif ($x>0) {

       	if ($x>0) {
			header("Location: ../Registrase.php?errorusuario=si");
		} elseif ($y>0) {
			header("Location: ../Registrase.php?errorcorreo=si");# code...
		} else {
			date_default_timezone_set('UTC');
			$Fecha = date("Y-m-d");
			$tipo = 'b';
			$rs = $mysqli->query("INSERT INTO usuarios (nombre_usuario, correo_usuario, contrasena_usuario, tipo_usuario) VALUES ('$_POST[nombre]','$_POST[correo]','$_POST[contrasena]','".$tipo."')");

			header("Location: ../Index.php?registrado=si");
		}
	}
?>