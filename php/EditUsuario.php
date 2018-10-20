<?php
	session_start();
	include "conexion.php";
	$id=$_POST['id'];
    $x=0;
    $y=0;
    $z=0;
    $contador=0;
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
        if ($f2['tipo_usuario'] == 'a') {
            $contador++;
        }
    }
    $re3 = $mysqli->query("SELECT tipo_usuario FROM usuarios WHERE id_usuario = '$id'");
    $f3=mysqli_fetch_array($re3);
    if ($f3['tipo_usuario'] == 'a' && $contador <= 1 && $_POST['tipo'] == 'b') {
        $z=1;
    }


    if ($x==1 && $y==1) {
        header("Location: ../AdUsuarios.php?repetidos=si");
    } elseif ($x==1) {
        header("Location: ../AdUsuarios.php?errorusuario=si");
    } elseif ($y==1) {
        header("Location: ../AdUsuarios.php?errorcorreo=si");
    } elseif ($z==1) {
        header("Location: ../AdUsuarios.php?ultimo=si");
    } else {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $correo = $_POST['correo'];
        $tipo = $_POST['tipo'];
        $rs = $mysqli->query("UPDATE usuarios SET nombre_usuario='$nombre', correo_usuario='$correo', contrasena_usuario='$contrasena', tipo_usuario='$tipo' WHERE id_usuario = '$id'");
        if ($_SESSION['id']==$_POST['id']) {
        	$_SESSION['usuario'] = $nombre;
            $_SESSION['contra'] = $contrasena;
        }
        header("Location: ../AdUsuarios.php?editado=si");
    }
?>