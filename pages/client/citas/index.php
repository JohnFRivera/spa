<?php
define("PAGE_NAME", "Agendar cita");
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
                            <form action="" method="post">
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
                                <select name="id_Servicio" id="idServicio" class="form-select form-select-lg" required>
                                    <option>Seleccionar...</option>
                                </select>
                                <label for="idProducto" class="fs-5 ms-1 text-secondary">Producto</label>
                                <select name="id_Producto" id="idProducto" class="form-select form-select-lg mb-3" required>
                                    <option>Seleccionar...</option>
                                </select>
                                <button type="button" id="btnReservar" class="btn btn-lg btn-success w-100">
                                    Agendar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include("../../../assets/templates/footer.php"); ?>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>