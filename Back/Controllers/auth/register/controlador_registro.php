<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../../../Model/conexion.php';

$conexion = new Conexion();
$conexion->conectar();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge y valida datos del formulario
    $nombres = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellido']);
    $telefono = trim($_POST['telefono']);
    $email = trim($_POST['correo']);
    $password = $_POST['password'];
    $direccion = trim($_POST['direccion']);
    
    $errors = [];

   
    if (empty($nombres)) {
        $errors[] = "El campo de nombres es obligatorio.";
    }

    if (empty($apellidos)) {
        $errors[] = "El campo de apellidos es obligatorio.";
    }

    if (empty($telefono)) {
        $errors[] = "El campo de teléfono es obligatorio.";
    }

    if (empty($email)) {
        $errors[] = "El campo de correo es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del correo electrónico no es válido.";
    }

    if (empty($password)) {
        $errors[] = "El campo de contraseña es obligatorio.";
    } elseif (strlen($password) < 8) {
        $errors[] = "La contraseña debe tener al menos 8 caracteres.";
    }


    if (empty($errors)) {
    
        $stmt = $conexion->prepare('SELECT id FROM usuarios WHERE correo = ?');
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $errors[] = 'El correo electrónico ya está registrado.';
        } else {
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            
            $stmt = $conexion->prepare('INSERT INTO usuarios (nombre, apellido, telefono, correo, password, direccion) VALUES (?, ?, ?, ?, ?, ?)');
            if ($stmt->execute([$nombres, $apellidos, $telefono, $email, $hashedPassword, $direccion])) {
                // Mensaje de éxito
                $_SESSION['success'] = "Registro exitoso. ¡Bienvenido!";
                header('Location: http://localhost/spa/ingresar.php');
                exit();
            } else {
                $errors[] = 'Error al registrar el usuario. Inténtalo de nuevo.';
            }
        }
    }

    if (!empty($errors)) {
        $_SESSION['error'] = implode('<br>', $errors);
        header('Location: http://localhost/spa/registrarse.php');
        exit();
    }
}
?>
