<?php 

include('../../../Model/conexion.php');

// Verificar si los datos están presentes en la solicitud POST
if (isset($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['id_Rol'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $id_Rol = $_POST['id_Rol'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $direccion = $_POST['direccion'];
    echo $password;
    $conexion = new Conexion();
    $conexion->conectar();

    try {
        $consulta = "INSERT INTO usuarios (nombre, apellido, telefono, correo, direccion, id_Rol, password ) VALUES (:nombre, :apellido, :telefono, :correo, :direccion, :id_Rol, :password)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':id_Rol', $id_Rol, PDO::PARAM_INT);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $resultado = $stmt->execute();

        if ($resultado) {
            header('Location: http://localhost/spa/pages/admin/usuarios/');
        } else {
            echo "Error en la consulta";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conexion->Desconectar();
    }
} else {
    echo "Faltan datos en la solicitud.";
}
?>
