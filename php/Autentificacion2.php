<?php
	include "Conexion.php";	
	$rs = $mysqli->query("SELECT tipo_usuario FROM usuarios WHERE id_usuario = '".$_SESSION['id']."'");
	$row = mysqli_fetch_array($rs);

	if ($row['tipo_usuario'] != "a") {
		echo "holi";
		header("Location: Encuestas.php");
	} 
?> 