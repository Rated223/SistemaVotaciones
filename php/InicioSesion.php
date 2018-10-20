<?php

	include "conexion.php";
	
	$usuario = $_POST['user_name'];
	$contra = $_POST['user_password'];

	//Busca el usuario y contraseña
	$rs = $mysqli->query("SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena_usuario = '$contra'"); 

	//verifica si se encontro ese usuario con esa contraseña
	if (($rs->num_rows)!=0){
		$row = mysqli_fetch_array($rs);//guarda los datos en un array
		session_start();//defino una sesion y guardo datos
		$_SESSION['id'] = $row['id_usuario'];
		$_SESSION['usuario'] = $_POST['user_name'];
		$_SESSION['contra'] = $_POST['user_password'];
		$_SESSION['autentificado'] = 'SI';
		if ($row['tipo_usuario'] == 'a'){ //define si el usuario es administrador
			$_SESSION['autentificado2'] = 'SI';
		}
		header ("Location: ../Panel.php");
	}else {
		//si no existe se regresa al Acceso
		header("Location: ../Index.php?errorusuario=si");
	}
	$rs->close();
	$mysqli->close();
?> 