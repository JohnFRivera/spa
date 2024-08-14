<?php 
include('../../../Model/conexion.php');

if (isset($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['id_Rol'], $_POST['telefono'])) {

    $id = $_GET['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $id_Rol = $_POST['id_Rol'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $conexion = new Conexion();
    $conexion->conectar();

    try {
        $consulta = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido, telefono = :telefono, correo = :correo, id_Rol = :id_Rol, direccion = :direccion WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':id_Rol', $id_Rol, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        
        $resultado = $stmt->execute();

        if ($resultado) {
             header('Location: http://localhost/spa/pages/admin/usuarios/');
            exit();
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error en la consulta: " . $errorInfo[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conexion->Desconectar();
    }
} else {
    echo "Faltan datos en la solicitud.";
}
