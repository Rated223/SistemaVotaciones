<?php
	include "Conexion.php";
	session_start();
	$id_votacion = $_GET['idv'];
	$id_opcion = $_GET['ido'];
	$re = $mysqli->query("SELECT numero_votos_opcion FROM `opciones` WHERE id_opcion = ".$id_opcion." && id_votacion = ".$id_votacion);

	while ($f=mysqli_fetch_array($re)) {
		$votos = $f['numero_votos_opcion'];
	}

	$votos++;

	$re2 = $mysqli->query("UPDATE `opciones` SET numero_votos_opcion='".$votos."' WHERE id_opcion = '".$_GET['ido']."'");
	$re3 = $mysqli->query("INSERT INTO `votos_emitidos`(`id_usuario`, `id_votacion`, `id_opcion`) VALUES (".$_SESSION['id'].",".$id_votacion.",".$id_opcion.")");
	header("Location: ../Votacion.php?id=$id_votacion&voto=si");

?>