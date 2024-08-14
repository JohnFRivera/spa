<?php
session_start();
require_once '../../../Back/Model/conexion.php';

$conexion = new Conexion();
$conexion->conectar();

try {
    // Obtención de datos del POST
    $fecha = $_POST['fecha'];
    $horaInicio = $_POST['hora_Inicio'];
    $hora_fin = $_POST['hora_Fin'];
    $id_cliente = $_SESSION['user_id'];
    $id_Servicio = $_POST['id_Servicio'];
    $id_Producto = $_POST['id_Producto'];

    // Consulta para verificar si la hora está ocupada
    $consultaVerificacion = "SELECT COUNT(*) FROM citas WHERE fecha = :fecha AND ((:horaInicio < hora_Fin AND :horaFin > hora_Inicio))";
    $stmtVerificacion = $conexion->prepare($consultaVerificacion);
    $stmtVerificacion->bindParam(':fecha', $fecha);
    $stmtVerificacion->bindParam(':horaInicio', $horaInicio);
    $stmtVerificacion->bindParam(':horaFin', $hora_fin);
    $stmtVerificacion->execute();
    $count = $stmtVerificacion->fetchColumn();

    if ($count > 0) {
        // Hora ocupada
        $data = array(
            'access' => false,
            'message' => 'Cita ocupada lamentablemente'
        );
        echo json_encode($data);
    } else {
        // Insertar nueva cita
        $consultaInsertar = "INSERT INTO citas (fecha, hora_Inicio, hora_Fin, id_Usuario, id_Servicio, id_Producto) VALUES (:fecha, :horaInicio, :horaFin, :id_Usuario, :id_Servicio, :id_Producto)";
        $stmtInsertar = $conexion->prepare($consultaInsertar);
        $stmtInsertar->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmtInsertar->bindParam(':horaInicio', $horaInicio, PDO::PARAM_STR);
        $stmtInsertar->bindParam(':horaFin', $hora_fin, PDO::PARAM_STR);
        $stmtInsertar->bindParam(':id_Usuario', $id_cliente);
        $stmtInsertar->bindParam(':id_Servicio', $id_Servicio);
        $stmtInsertar->bindParam(':id_Producto', $id_Producto);
        $stmtInsertar->execute();

        // Actualizar stock del producto
        $consulta_Cantidad_Consumo_Producto = "SELECT productos.stock as stock, COUNT(citas.id_Producto) as consumidos FROM citas INNER JOIN productos ON citas.id_Producto = productos.id WHERE citas.id_Producto = :id_Producto";
        $stmt = $conexion->prepare($consulta_Cantidad_Consumo_Producto);
        $stmt->bindParam(':id_Producto', $id_Producto);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $stock = $resultado['stock'];
        $cantidad = $resultado['consumidos'];
        $nuevo_Stock = $stock - $cantidad;

        $actuliazar_Stock = "UPDATE productos SET stock = :nuevo_Stock WHERE id = :id_Producto";
        $stmt_Actualizar = $conexion->prepare($actuliazar_Stock);
        $stmt_Actualizar->bindParam(':nuevo_Stock', $nuevo_Stock);
        $stmt_Actualizar->bindParam(':id_Producto', $id_Producto);
        $stmt_Actualizar->execute();

        // Respuesta JSON
        header('Location: http://localhost/spa/pages/client/citas/');
    }
} catch (PDOException $e) {
    // Manejo de errores
    echo json_encode(array(
        'access' => false,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ));
}
?>
