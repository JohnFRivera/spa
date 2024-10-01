<?php
define("PAGE_NAME", "Gráficos");

require_once '../../../Back/Controllers/auth/login/routes/verificar_acceso.php';
verificar_acceso([ROL_ADMIN]);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/spa_logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Spa | Graficos</title>
</head>

<body>
    <?php include("../assets/templates/header.php"); ?>
    <main class="container-fluid">
        <div class="row bg-body-secondary h-section">
            <?php include("../assets/templates/aside_bar.php"); ?>
            <section class="col p-4">
                <h5 class="fw-normal mb-0">Bienvenido a</h5>
                <h4 class="fw-bold mb-4"><?php echo PAGE_NAME ?></h4>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="bg-light rounded-4 p-4 shadow-sm">
                            <h5 class="mb-4">Ingresos Generados por Tiempo</h5>
                            <canvas id="ingresosPorTiempoCanvas" style="height: 155px;"></canvas>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-light rounded-4 p-4 shadow-sm">
                            <h5 class="mb-4">Popularidad de Tratamientos</h5>
                            <canvas id="popularidadTratamientosCanvas" style="height: 155px;"></canvas>
                        </div>
                    </div>
                    <div class="col mb-5 mb-md-0">
                        <div class="bg-light rounded-4 p-4 shadow-sm">
                            <h5 class="mb-4">Ingresos Generados por Servicio</h5>
                            <canvas id="ingresosPorServicioCanvas" style="height: 320px;"></canvas>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include("../../../assets/templates/footer.php"); ?>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./main.js"></script>
</body>

</html>