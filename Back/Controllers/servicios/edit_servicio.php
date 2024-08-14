<?php
    include('../../Model/conexion.php');

    $descripcion = $_POST['descripcion'];
    $valor = $_POST['precio'];
    $duracion = $_POST['duracion'];
    $id = $_GET['id'];
    $id_Terapeuta = $_POST['terapeuta'];

    $conexion = new Conexion();
    $conexion -> conectar();
    $enviar_Mensaje;
    try {
        $consulta = "UPDATE servicios SET descripcion_Servicio = :descripcion , valor_Servicio  = :valor , duracion  = :duracion , id_Terapeuta = :id_Terapeuta WHERE id = :id  ";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
        $stmt->bindParam(':duracion', $duracion, PDO::PARAM_STR);
        $stmt->bindParam(':id_Terapeuta', $id_Terapeuta, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();

        if ($stmt -> rowCount() > 0)
        {
            header('Location: http://localhost/spa/pages/admin/servicios/');
        }
        else{
            $mensaje = array(
                "message" => "Error en la consulta"
            );
            $enviar_Mensaje = json_encode($mensaje);
            print $enviar_Mensaje;
        }
    }
    catch (PDOException $e){ 
        echo 'error: ' . $e->getMessage();
    }
    finally {
        $conexion -> Desconectar();
    }

?>