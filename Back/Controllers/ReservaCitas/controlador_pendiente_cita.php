<?php
session_start();
$clienteId = $_SESSION['user_id']; // Asegúrate de que el id del cliente esté en la sesión

require_once '../../../Back/Model/conexion.php';
$conexion = new Conexion();

// Incluye el valor del clienteId directamente en la consulta
$query = "SELECT citas.fecha, citas.hora_Inicio, citas.hora_Fin, servicios.descripcion_Servicio 
            FROM citas 
            INNER JOIN servicios ON citas.id_Servicio = servicios.id 
            WHERE citas.id_Usuario = $clienteId AND citas.fecha >= CURDATE()";
//
// Realizar la consulta
$citasPendientes = $conexion->ConsultaCompleja($query);

if ($citasPendientes) {
    // Mostrar las citas pendientes (para depuración)
    foreach ($citasPendientes as $cita) {
        return $citasPendientes;
    }
} else {
    echo "No se encontraron citas pendientes.";
}
?>
