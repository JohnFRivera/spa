<?php
require_once(__DIR__ . '/../../Model/conexion.php');

$conexion = new Conexion();
$conexion->conectar();

try {
    $consulta = "SELECT citas.id, 
                        DATE_FORMAT(fecha, '%D') AS Dia, 
                        DATE_FORMAT(fecha, '%m') AS Mes, 
                        DATE_FORMAT(fecha, '%Y') AS Year, 
                        SUM(servicios.valor_Servicio) AS ingreso 
                 FROM citas 
                 INNER JOIN servicios ON id_Servicio = servicios.id 
                 GROUP BY fecha;";
    $data = $conexion->ConsultaCompleja($consulta); 
    return $data;
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]); }
