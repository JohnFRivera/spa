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
    $stmt = $conexion->prepare('SELECT usuarios.id, usuarios.password, roles.descripcion 
    FROM usuarios 
    INNER JOIN roles ON usuarios.id_Rol = roles.id 
    WHERE usuarios.correo = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && $password === $user['password']) {
        //validacion de usuario o admin
        switch ($user['descripcion']) {
            case 'usuario':
                // Credenciales correctas
            
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = true;
        header('Location: http://localhost/spa/pages/client/citas/');
        exit();
                break;
            case 'administrador':    
            $_SESSION['user_descripcion'] = $user['descripcion'];         
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            
            header('Location: http://localhost/spa/pages/admin/usuarios/');
            exit();
                break;
            case 'empleado':
            $_SESSION['user_descripcion'] = $user['descripcion']; 
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            header('Location: http://localhost/spa/pages/admin/usuarios/');
            exit();
                break;
        }
    } else {
      echo  $errors[] = 'Correo electrónico o contraseña incorrectos.';
    }
    
}
