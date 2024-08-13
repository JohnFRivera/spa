<?php
    require_once('../../../Back/Model/conexion.php');

    $conexion = new Conexion();

    $conexion -> conectar();
    try {
        $consulta = "SELECT * FROM terapeutas";
        $citas = $conexion->ConsultaCompleja($consulta);
        $data = array();
        foreach ($citas as $row)
        {
            $data[] = $row;
        }
        return $data;
    } catch (PDOException $e) {
        echo 'error: ' . $e->getMessage();
    }
    finally{
        $conexion -> Desconectar();
    }
?>