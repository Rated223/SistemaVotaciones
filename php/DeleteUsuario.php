<?php
	include "Conexion.php";
	$re = $mysqli->query("SELECT * FROM usuarios");
        if(mysqli_connect_errno()){
            echo 'conexion fallida: ', mysqli_connect_error;
        }
    $x=0;
    $y=0;
    while ($f=mysqli_fetch_array($re)) {
    	if ($f['tipo_usuario']=='a') {
    		$x++;
    	}
        if ($_POST['id']==$f['id_usuario'] && $f['tipo_usuario']=='a') {
            $y=1;
        }
    }

    if ($x<=1 && $y==1) {
    	header("Location: ../AdUsuarios.php?ultimo=si");
    } else {
    	if (!mysqli_query($mysqli,"DELETE FROM `usuarios` WHERE `id_usuario`='".$_POST['id']."'")) {
		  	$m = mysqli_error($mysqli);
		  	header("Location: ../AdUsuarios.php?error=si&&m=".$m);
		} else {
			header("Location: ../AdUsuarios.php?eliminado=si");
		}
    }
?>