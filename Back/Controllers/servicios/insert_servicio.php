<?php
    require_once '../../../Back/Model/conexion.php';

    $descripcion = $_POST['descripcion'];
    $valor = $_POST['precio'];
    $duracion = $_POST['duracion'];
    $id = $_POST['terapeuta'];
    $conexion  = new Conexion();

    $conexion -> conectar();
    $enviar_Mensaje ;
    try{
        $consulta = "INSERT INTO servicios (descripcion_Servicio, duracion, valor_Servicio, id_Terapeuta) VALUES( :descripcion , :duracion , :valor , :id )";
        $stmt = $conexion -> prepare($consulta); 
        $stmt -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt -> bindParam(':duracion', $duracion, PDO::PARAM_STR);
        $stmt -> bindParam(':valor', $valor , PDO::PARAM_STR);
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();
        if ($stmt -> rowCount() > 0)
        {
            header('Location: http://localhost/spa/pages/admin/servicios/');
        }
        else
        {
            $mensaje = array(
                "message" => "Error en la consulta"
            );
            $enviar_Mensaje = json_encode($mensaje);
            print $enviar_Mensaje;
        }
    }catch(PDOException $e)
    {
        echo 'error: ' . $e->getMessage();
    }finally{
        $conexion -> Desconectar();
    }


?>