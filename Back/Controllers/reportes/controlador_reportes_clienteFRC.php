<?php
require_once(__DIR__ . '/../../Model/conexion.php');

$conexion = new Conexion();

try {
    $consulta = "SELECT usuarios.id AS ClienteID, CONCAT(usuarios.nombre, ' ', usuarios.apellido) AS Cliente, COUNT(citas.id) AS Cantidad_Visitas, GROUP_CONCAT( servicios.descripcion_Servicio ORDER BY ServicioCount DESC SEPARATOR '; ' ) AS Tratamientos_Mas_Solicitados FROM usuarios JOIN citas ON usuarios.id = citas.id_Usuario JOIN (SELECT servicios.id, servicios.descripcion_Servicio, COUNT(citas.id) AS ServicioCount FROM servicios JOIN citas ON servicios.id = citas.id_Servicio GROUP BY servicios.id, servicios.descripcion_Servicio) servicios ON citas.id_Servicio = servicios.id WHERE usuarios.id_Rol = 1 GROUP BY usuarios.id ORDER BY Cantidad_Visitas DESC;";
    $clientes = $conexion->ConsultaCompleja($consulta);
    return $clientes;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
