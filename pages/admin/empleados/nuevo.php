<?php
define("PAGE_NAME", "Empleados");
define("PILL_SELECT", "Nuevo");
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
    <title>Spa | Gestión de <?php echo PAGE_NAME ?></title>
</head>

<body>
    <?php include("../assets/templates/header.php"); ?>
    <main class="container-fluid">
        <div class="row bg-body-secondary h-section">
            <?php include("../assets/templates/aside_bar.php"); ?>
            <section class="col p-4">
                <h5 class="fw-normal mb-0">Bienvenido a</h5>
                <h4 class="fw-bold mb-4">Gestión de <?php echo PAGE_NAME ?></h4>
                <div class="row">
                    <div class="col">
                        <div class="bg-light rounded-4 shadow-sm p-3">
                            <?php include("../assets/templates/nav_pills.php") ?>
                            <div class="row mt-3">
                                <form action="" method="post" class="col-12 col-md-9 col-lg-5">
                                    <div class="row g-2 mb-2">
                                        <div class="col">
                                            <input type="text" name="nombres" class="form-control form-control-lg" placeholder="Nombres" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="apellidos" class="form-control form-control-lg" placeholder="Apellidos" required>
                                        </div>
                                    </div>
                                    <input type="text" name="especialidad" class="form-control form-control-lg mb-3" placeholder="Especialidad" required>
                                    <button type="submit" class="btn btn-lg btn-success w-100">
                                        Crear
                                    </button>
                                </form>
                            </div>
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