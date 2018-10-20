<?php
	include "Conexion.php";
	//Inicio la sesión
	session_start();

	//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
	if (isset($_SESSION["autentificado"]) != "SI") {
		header("Location: ../Index.php?errorusuario=si");
	} else { ?>
				<span class="User ml-1 text-white mr-3"><?php echo $_SESSION["usuario"]; ?></span>
				<a href="php/Salir.php" class="Ingresar btn btn-light 
				">Cerrar sesión</a>
<?php
	}
?> 