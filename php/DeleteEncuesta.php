<?php
	include "Conexion.php";
	if (!mysqli_query($mysqli,"DELETE FROM `votacion` WHERE `id_votacion`='".$_POST['id']."'")) {
	  	$m = mysqli_error($mysqli);
	  	header("Location: ../AdEncuestas.php?error=si&&m=".$m);
	} else {
		header("Location: ../AdEncuestas.php?eliminado=si");
	}
?>