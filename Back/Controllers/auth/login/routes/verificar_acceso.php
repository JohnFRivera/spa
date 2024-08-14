<?php
session_start();

// Incluye la configuración de roles
require_once 'config.php';

// Función para verificar el acceso
function verificar_acceso($roles_permitidos) {
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        // Usuario no está logueado
        header('Location: ../../../index.php');
        exit();
    }
    
    $rol_usuario = $_SESSION['user_descripcion'];
    
    if (!in_array($rol_usuario, $roles_permitidos)) {
        // Usuario no tiene permisos para acceder
        header('Location: ../../../index.php');
        exit();
    }
}
?>
