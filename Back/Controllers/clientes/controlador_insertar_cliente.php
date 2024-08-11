<?php
include('../../Model/conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];


$conexion = new conexion();
$conexion->conectar();


try {
    $consulta = "INSERT INTO clientes (nombre, apellido, direccion, correo) VALUES (:nombre, :apellido, :direccion, :correo)";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
    $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    
    $resultado = $stmt->execute();

    if ($resultado) {
        header('Location: http://localhost/spa/pages/admin/clientes/');
    } else {
        echo "Error en la consulta";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conexion->Desconectar();
}