<?php
    require_once '../../../Back/Model/conexion.php';
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['existencias'];
    $valor = $_POST['precio'];


    $conexion = new Conexion();
    $conexion -> conectar();
    $enviar_Mensaje;
    try {
        $consulta = "INSERT INTO productos (descripcion , stock , valor_Producto) VALUES(:descripcion , :stock, :valor)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
        $stmt -> execute();

        if ($stmt -> rowCount() > 0)
        {
            header('Location: http://localhost/spa/pages/admin/productos/');
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