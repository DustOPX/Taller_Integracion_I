<?php
# Iniciar sesión para usar $_SESSION
session_start();

# Y ahora leer si NO hay algo llamado correo en la sesión,
# usando empty (vacío, ¿está vacío?)
if (empty($_SESSION["correo"])) {
    # Lo redireccionamos al formulario de inicio de sesión
    header("Location: ../HTML/login.html");
    # Y salimos del script
    exit();
}

# No hace falta un else, pues si el usuario no se loguea, todo lo de abajo no se ejecuta

# Podemos recuperar datos de la sesión
header("Location: ../HTML/home.html");
?>
<!-- Por cierto, también se puede usar HTML como en todos los scripts de PHP-->
<p>    
</p>
<!-- Y aprovechando, le indicamos al usuario un enlace para salir-->

