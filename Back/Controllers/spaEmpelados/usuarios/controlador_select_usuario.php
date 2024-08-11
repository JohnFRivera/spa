<?php
require_once('../../../Back/Model/conexion.php');


try {
    $conexion = new Conexion();
    $conexion->conectar();

    $consulta = 'SELECT usuarios.id, nombre, apellido,telefono, correo, roles.descripcion FROM usuarios INNER JOIN roles ON usuarios.id_Rol = roles.id;';
    $usuario = $conexion->ConsultaCompleja($consulta);

    return $usuario;

    $conexion->Desconectar();

} catch (PDOException $e) {
    echo 'error: ' . $e->getMessage();
}
