<?php

include('../../../Back/Model/conexion.php');

// Verificar si los datos están presentes en la solicitud POST
if (isset($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['id_Rol'], $_POST['telefono'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $id_Rol = $_POST['id_Rol'];
    $telefono = $_POST['telefono'];

    $conexion = new Conexion();
    $conexion->conectar();

    try {
        $consulta = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido, telefono = :telefono, correo = :correo, id_Rol = :id_Rol WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':id_Rol', $id_Rol, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $resultado = $stmt->execute();

        if ($resultado) {
            // Redirigir al índice después de una actualización exitosa
            header('Location: http://localhost/spa/pages/admin/usuarios/'); // Cambia la ruta al archivo de índice
            exit();
        } else {
            echo "Error en la consulta";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conexion->Desconectar();
    }
} else {
    echo "Faltan datos en la solicitud.";
}
?>
