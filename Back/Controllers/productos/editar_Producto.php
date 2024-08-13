<?php
    require_once '../../../Back/Model/conexion.php';
    $id = $_GET['id'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['existencias'];
    $valor = $_POST['precio'];
    $estado = $_POST['estado'];

    $conexion = new Conexion();
    $conexion -> conectar();
    $enviar_Mensaje;
    try {
        $consulta = "UPDATE productos SET descripcion = :descripcion , stock  = :stock , valor_Producto  = :valor , estado = :estado WHERE id = :id  ";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();

        if ($stmt -> rowCount() > 0)
        {
            header('Location: http://localhost/spa/pages/admin/productos/') ;
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