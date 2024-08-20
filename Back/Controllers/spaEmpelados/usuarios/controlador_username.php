<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logeado
if (isset($_SESSION['user_id'])) {
    // Obtener el id del usuario
    $user_id = $_SESSION['user_id'];

    // Conectar a la base de datos y obtener el nombre del usuario
    require_once '../../../Back/Model/conexion.php';
    $conexion = new Conexion();
    $conexion->conectar();
    
    $stmt = $conexion->prepare('SELECT nombre FROM usuarios WHERE id = ?');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
        $nombre = $user['nombre'];
      return $nombre; 
    } else {
        echo $user_id;
        echo "Usuario no encontrado.";
    }
} else {
    echo "No has iniciado sesión.";
}
