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
    $email = filter_var(trim($_POST['correo']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);
    
    $errors = [];

    // Validar si el email es válido
    if (!$email) {
        $errors[] = 'Por favor, introduce un correo electrónico válido.';
    }

    // Validar si la contraseña no está vacía
    if (empty($password)) {
        $errors[] = 'La contraseña no puede estar vacía.';
    }

    // Si no hay errores hasta ahora, verificar en la base de datos
    if (empty($errors)) {
        // Verificar si el correo electrónico existe
        $stmt = $conexion->prepare('SELECT usuarios.id, usuarios.password, roles.descripcion
                                    FROM usuarios 
                                    INNER JOIN roles ON usuarios.id_Rol = roles.id 
                                    WHERE usuarios.correo = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

       
        if (!$user) {
            $errors[] = 'El correo electrónico no está registrado.';
        } else {
            
            if (password_verify($password, $user['password'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['logged_in'] = true;

                switch ($user['descripcion']) {
                    case 'usuario':
                        header('Location: http://localhost/spa/pages/client/citas/');
                        exit();
                    case 'administrador':
                        $_SESSION['user_descripcion'] = $user['descripcion'];
                        header('Location: http://localhost/spa/pages/admin/usuarios/');
                        exit();
                    case 'empleado':
                        $_SESSION['user_descripcion'] = $user['descripcion'];
                        header('Location: http://localhost/spa/pages/admin/usuarios/');
                        exit();
                }
            } else {
               
                $errors[] = 'La contraseña es incorrecta.';
            }
        }
    }

  
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: http://localhost/spa/ingresar.php');
        exit();
    }
}
?>
