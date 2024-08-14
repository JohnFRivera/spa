<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../../Model/conexion.php';

$conexion = new Conexion();
$conexion->conectar();

// Manejo del formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge y valida datos del formulario
    $nombres = $_POST['nombre'];
    $apellidos = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['correo'];
    $password = $_POST['password'];
    $direccion = $_POST['direccion'];
    

    $errors = [];

   

    if (empty($errors)) {
        // Verificar si el usuario ya existe
        $stmt = $conexion->prepare('SELECT id FROM usuarios WHERE correo = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            echo "hola";
            $errors[] = 'El correo electrónico ya está registrado.';
        } else {
            // Insertar nuevo usuario
            
            $stmt = $conexion->prepare('INSERT INTO usuarios (nombre, apellido, telefono, correo, password, direccion) VALUES (?, ?, ?, ?, ?, ?)');
            if ($stmt->execute([$nombres, $apellidos, $telefono, $email, $password, $direccion])) {
                // Redirigir al inicio de sesión o mostrar mensaje de éxito
                header('Location: http://localhost/spa/ingresar.php');
                exit();
            } else {
                $errors[] = 'Error al registrar el usuario. Inténtalo de nuevo.';
            }
        }
    }
}
?>