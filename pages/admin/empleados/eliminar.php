<?php
define("PAGE_NAME", "Empleados");

$id = $_GET["id"];
$nombre = $_GET["nombre"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../../assets/img/spa_logo.webp" type="image/x-icon">
    <title>Spa | Gestión de <?php echo PAGE_NAME ?></title>
</head>

<body class="container-fluid bg-body-secondary">
    <?php include("../assets/templates/header.php"); ?>

    <main class="row">
        <?php include("../assets/templates/aside_bar.php"); ?>

        <section class="col p-4">
            <h5 class="fw-normal mb-0">Bienvenido a</h5>
            <h4 class="fw-bold mb-4">Gestión de <?php echo PAGE_NAME ?></h4>
            <div class="row">
                <div class="col">
                    <div class="bg-light rounded-4 shadow-sm p-3">
                        <div class="bg-body-secondary rounded-3 p-2 mb-2">
                            <a href="./" class="btn btn-sm btn-outline-primary btn-aside border-0 rounded-3">
                                <i class="bi bi-arrow-left fs-5"></i>
                            </a>
                        </div>
                        <div class="row mt-3">
                            <form action="" method="post" class="col-12 col-md-9 col-lg-5 mx-auto">
                                <div class="card shadow-sm">
                                    <h5 class="card-header">Eliminar Empleado</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">¿Seguro que deseas eliminar al empleado <b><?php echo $nombre ?></b>?</li>
                                        <li class="list-group-item">
                                            <div class="clearfix">
                                                <a href="./" class="btn btn-secondary float-start">Cancelar</a>
                                                <button type="submit" class="btn btn-danger float-end">Eliminar</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include("../../assets/templates/footer.php"); ?>
</body>

</html>