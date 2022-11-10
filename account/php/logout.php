<?php
# Iniciar sesión
session_start();
# Después, destruirla
# Eso va a eliminar todo lo que haya en $_SESSION
session_destroy();

# redireccionar al formulario de login
header("Location: ../HTML/login.html");

?>

