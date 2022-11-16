<?php
include_once "config.php";

function login($correo, $keyword){
    # Primero obtener usuario...
    $userRegistrado = obtenerUsuario($correo);
    if ($userRegistrado === false) {
        # Si no existe, salir y regresar false
        return false;
    }

    # Comprobar contraseñas
    $keywordBD = $userRegistrado->keyword;
    $coinciden = coincidencia($keyword, $keywordBD);
    # Si no coinciden, salimos de una vez
    if (!$coinciden) {
        return false;
    }

    # En caso de que sí hayan coincidido iniciamos sesión pasando el objeto
    iniciarSesion($userRegistrado);
    # Y regresamos true ;)
    return true;
}

function usuarioExiste($correo){
    $BD = obtenerBD();
    $sentencia = $BD->prepare("SELECT correo FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}

function obtenerUsuario($correo){
    $BD = obtenerBD();
    $sentencia = $BD->prepare("SELECT correo, keyword FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}

function registrarUsuario($names, $rut, $correo, $keyword){
    $keyword = hashearkeyword($keyword); # algoritmo de contraseña
    $BD = obtenerBD();
    $sentencia = $BD->prepare("INSERT INTO usuarios(`names`, `rut`, `correo`, `keyword`) values(?, ?, ?, ?)");
    return $sentencia->execute([$names, $rut, $correo, $keyword]);
}


function iniciarSesion($usuario){
    // Se encarga de poner los datos dentro de la sesión
    session_start();
    $_SESSION["correo"] = $usuario->correo;

}

function coincidencia($keyword, $keywordBD){
    return password_verify($keyword, $keywordBD);
}


// function hashearkeyword($keyword){
//     return $keyword;  
// }

# algoritmo para generar la contraseña
function hashearkeyword($keyword){
    return password_hash($keyword, PASSWORD_BCRYPT);  
}




