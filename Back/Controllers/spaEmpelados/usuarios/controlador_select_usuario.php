<?php
require_once('../../../Back/Model/conexion.php');


try {
    $conexion = new Conexion();
    $conexion->conectar();


    if (PAGE_NAME === 'Usuarios') {
        $consulta = 'SELECT usuarios.id, nombre, apellido,telefono, correo, roles.descripcion, direccion FROM usuarios INNER JOIN roles ON usuarios.id_Rol = roles.id WHERE id_Rol = 3;';
        $usuario = $conexion->ConsultaCompleja($consulta);
        return $usuario;
    
        $conexion->Desconectar();
        
    }elseif(PAGE_NAME ==='Clientes'){
        $consulta = 'SELECT usuarios.id, nombre, apellido,telefono, correo, roles.descripcion, direccion FROM usuarios INNER JOIN roles ON usuarios.id_Rol = roles.id WHERE id_Rol = 1;';
        $usuario = $conexion->ConsultaCompleja($consulta);
        return $usuario;
    
        $conexion->Desconectar();
    }

    

    
} catch (PDOException $e) {
    echo 'error: ' . $e->getMessage();
}
