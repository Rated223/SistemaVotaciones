<?php
	if (isset($_SESSION["autentificado"]) == "SI") {
		$oc = $_SESSION['usuario'];
		
		include "Conexion.php";
		
		$rs = $mysqli->query("SELECT tipo_usuario FROM usuarios WHERE nombre_usuario = '".$oc."'");
		$row = mysqli_fetch_array($rs);
		
		
		If ($row['tipo_usuario'] == 'a'){ ?>
			<li class="nav-item dropdown rounded">
				<a href="#" class="nav-link dropdown-toggle" id="menu-admin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		            <strong>Opciones de Administador</strong>
		        </a>
		            <div class="dropdown-menu" aria-labelledby="menu-admin">
		                <a href="AdCrear.php" class="dropdown-item">Crear Encuesta</a>
		                <a href="AdEncuestas.php" class="dropdown-item">Ver Encuestas</a>
		                <a href="AdUsuarios.php" class="dropdown-item">Ver Usuarios</a>
		            </div>
		    </li>
		<?php } else {
			echo "";
		}
	} else {
		echo "";
	}
?> 