<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Elimina todas las variables de sesión
$_SESSION = array();

// Si se utiliza una cookie de sesión, la eliminamos también
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio o de login
header("Location: /spa/");
exit();
