<?php
define("PAGE_NAME", "Agendar cita");
$citasPendientes = require_once '../../../Back/Controllers/ReservaCitas/controlador_pendiente_cita.php';
$servicio = require_once '../../../Back/Controllers/servicios/select_servicios.php';
$productos = require_once '../../../Back/Controllers/productos/select_Productos.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/img/spa_logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Spa | Agendar cita</title>
</head>

<body>
    <?php include("../assets/templates/header.php"); ?>
    <main class="container-fluid">
        <div class="row bg-body-secondary h-section">
            <?php include("../assets/templates/aside_bar.php"); ?>
            <section class="col p-4">
                <h5 class="fw-normal mb-0">Bienvenido a</h5>
                <h4 class="fw-bold mb-4"><?php echo PAGE_NAME ?></h4>
                <div class="row mb-2">
                    <div class="col col-md-6">
                        <div class="bg-body rounded-3 p-3 shadow-sm">
                            <form action="/spa/Back/Controllers/ReservaCitas/controlador_insertar_cita.php" method="post">
                                <label for="fecha" class="fs-5 ms-1 text-secondary">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control form-control-lg mb-1" required>
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col mb-1">
                                        <label for="horaInicio" class="fs-5 ms-1 text-secondary">Hora de Inicio</label>
                                        <input type="time" name="hora_Inicio" id="horaInicio" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="col mb-1">
                                        <label for="horaFin" class="fs-5 ms-1 text-secondary">Hora de Fin</label>
                                        <input type="time" name="hora_Fin" id="horaFin" class="form-control form-control-lg" required>
                                    </div>
                                </div>
                                <label for="idServicio" class="fs-5 ms-1 text-secondary">Servicio</label>
                                <select name="id_Servicio" id="" class="form-select form-select-lg mb-3">
                                    <option value="">servicio...</option>
                                    <?php foreach ($servicio as $servicios): ?>
                                        <option value="<?php echo ($servicios['id']); ?>">
                                            <?php echo ($servicios['descripcion_Servicio']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <label for="idProducto" class="fs-5 ms-1 text-secondary">Producto</label>
                                <select name="id_Producto" id="" class="form-select form-select-lg mb-3">
                                    <option value="">Producto...</option>
                                    <?php foreach ($productos as $producto): ?>
                                        <option value="<?php echo ($producto['id']); ?>">
                                            <?php echo ($producto['descripcion']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" id="btnReservar" class="btn btn-lg btn-success w-100">
                                    Agendar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-md-4">
                <h4 class="fw-bold mb-4">Tus Citas Pendientes</h4>
                <?php if (is_array($citasPendientes) && count($citasPendientes) > 0): ?>
                    <ul class="list-group">
                        <?php foreach ($citasPendientes as $cita): ?>
                            <li class="list-group-item rounded-4 m-1 shadow-sm">
                                <strong>Fecha:</strong> <?php echo $cita['fecha']; ?> <br>
                                <strong>Hora:</strong> <?php echo $cita['hora_Inicio']; ?> - <?php echo $cita['hora_Fin']; ?> <br>
                                <strong>Servicio:</strong> <?php echo $cita['descripcion_Servicio']; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No tienes citas pendientes.</p>
                <?php endif; ?>
            </section>

        </div>
    </main>
    <?php include("../../../assets/templates/footer.php"); ?>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
