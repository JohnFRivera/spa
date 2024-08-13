<?php
   
   require_once '../../../Back/Model/conexion.php';

    $conexion  = new Conexion();

    $conexion ->conectar();
    try{
        $consulta = "SELECT servicios.id, descripcion_Servicio, duracion, valor_Servicio, CONCAT(terapeutas.nombre , ' ', terapeutas.apellido) as nombre FROM servicios INNER JOIN terapeutas on id_Terapeuta = terapeutas.id ";
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


?>