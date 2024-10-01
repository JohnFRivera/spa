<?php
require_once(__DIR__ . '/../../Model/conexion.php');

$conexion = new Conexion();

$conexion -> conectar();

try {
    $consulta = "SELECT productos.id, productos.descripcion, productos.stock, COUNT(id_Producto) AS consumidos FROM citas INNER JOIN productos ON citas.id_Producto = productos.id
    WHERE productos.estado = 1  -- Filtra solo los productos activos
    GROUP BY productos.id;";
    $data = $conexion->ConsultaCompleja($consulta);
    return $data;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
