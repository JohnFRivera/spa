<?php
include('../../../Back/Model/conexion.php');

$conexion = new Conexion();

try {
    $consulta = "SELECT usuarios.id, nombre, apellido,telefono, correo, roles.descripcion, direccion FROM usuarios INNER JOIN roles ON usuarios.id_Rol = roles.id WHERE id_Rol = 1";
    $clientes = $conexion->ConsultaCompleja($consulta);
    return $clientes;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
