<?php
include('../../../Model/conexion.php');

$id = $_GET['id'];


$conexion = new conexion();
$conexion->conectar();

try {
    $consulta = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $resultado = $stmt->execute();

    if ($resultado) {
        header('Location: http://localhost/spa/pages/admin/usuarios/');
    } else {
        echo "Error al eliminar el registro";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conexion->Desconectar();
}
