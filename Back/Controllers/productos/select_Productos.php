<?php
require_once '../../../Back/Model/conexion.php';

$conexion = new Conexion();
$conexion ->conectar();

try{
    $consulta = "SELECT id, descripcion FROM productos;";
    $stmt = $conexion -> ConsultaCompleja($consulta);
    $resultado = $stmt ;
    $data = array();
    foreach ($resultado as $row)
    {
        $data[] = $row;
    }
    return $data;
}catch(PDOException $e)
{
    echo 'error: ' . $e->getMessage();
}finally{
    $conexion -> Desconectar();
}