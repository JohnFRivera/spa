<?php
define("PAGE_NAME", "Empleados");

$id = $_GET["id"];
$nombres = $_GET["nombres"];
$apellidos = $_GET["apellidos"];
$especialidad = $_GET["especialidad"];
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
                            <form action="" method="post" class="col-12 col-md-9 col-lg-5">
                                <div class="row g-2 mb-2">
                                    <div class="col">
                                        <label for="nombres" class="fw-semibold ms-1">Nombres</label>
                                        <input type="text" name="nombres" id="nombres" class="form-control rounded-3" value=<?php echo $nombres ?> required>
                                    </div>
                                    <div class="col">
                                        <label for="apellidos" class="fw-semibold ms-1">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos" class="form-control rounded-3" value=<?php echo $apellidos ?> required>
                                    </div>
                                </div>
                                <label for="especialidad" class="fw-semibold ms-1">Especialidad</label>
                                <input type="text" name="especialidad" id="especialidad" class="form-control rounded-3" value=<?php echo $especialidad ?> required>
                                <p id="txtErr" class="text-danger fw-semibold ms-1 mb-0"></p>
                                <button class="btn btn-primary w-100 mt-3" type="submit">
                                    Modificar
                                </button>
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