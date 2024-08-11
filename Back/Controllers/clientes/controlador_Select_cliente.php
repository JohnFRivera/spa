<?php
include('../../../Back/Model/conexion.php');

$conexion = new Conexion();

try {
    $consulta = "select id, nombre, apellido, direccion, correo from clientes;";
    $clientes = $conexion->ConsultaCompleja($consulta);
    return $clientes;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
