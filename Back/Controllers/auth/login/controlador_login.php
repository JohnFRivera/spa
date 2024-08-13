<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../../Model/conexion.php';

$conexion = new Conexion();
$conexion->conectar();


session_start();

// Manejo del formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge y valida datos del formulario
    $email = $_POST['correo'];
    $password = $_POST['password'];

    $errors = [];

    // Verificar credenciales
    $stmt = $conexion->prepare('SELECT id, password FROM usuarios WHERE correo = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    echo $user['password'];

    if ($user && password_verify($password, $user['password'])) {
        // Credenciales correctas
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = true;
        header('Location: http://localhost/spa/pages/admin/usuarios');
        exit();
    } else {
        $errors[] = 'Correo electrónico o contraseña incorrectos.';
    }
}
?>