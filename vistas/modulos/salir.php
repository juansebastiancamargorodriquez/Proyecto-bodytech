<?php

$eliminarSesion= ModeloUsuarios::mdleliminarSesion("usuarios_log",$_SESSION["usuario"]);

session_destroy();

echo '<script>

	window.location = "ingreso";

</script>';