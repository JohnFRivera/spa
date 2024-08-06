<?php
define("PAGE_NAME", "Inicio");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/spa_logo.webp" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Spa | Inicio</title>
</head>

<body class="container-fluid bg-body-secondary">
    <?php include("./assets/templates/header.php"); ?>

    <main class="container-sm my-5">
        <section class="row section-hover mb-5">
            <div class="col align-content-center">
                <h1 class="display-3 fw-semibold">¡Bienvenido a <br /><b class="text-success">Akzara Spa!</b></h1>
                <p class="fs-4">Descubre tu oasis de relajación y rejuvenecimiento</p>
            </div>
            <div class="col-5">
                <img src="./assets/img/spa_girl.avif" alt="spa girl" class="img-fluid rounded-pill shadow">
            </div>
        </section>
        <hr />
        <section class="row section-hover my-5">
            <div class="col">
                <p class="fs-4 text-center">
                    En <b>Akzara Spa</b>, nos dedicamos a ofrecerte una experiencia de <b>bienestar</b>
                    incomparable.<br>Sumérgete en un mundo de <b>tranquilidad</b> y descubre el equilibrio
                    perfecto<br>entre cuerpo y mente
                </p>
            </div>
        </section>
        <hr />
        <section class="row section-hover g-4 mt-5">
            <div class="col">
                <div class="bg-success rounded-4 py-5">
                    <h1 class="text-light text-center">Relajación</h1>
                </div>
            </div>
            <div class="col">
                <div class="bg-success rounded-4 py-5">
                    <h1 class="text-light text-center">Tranquilidad</h1>
                </div>
            </div>
            <div class="col">
                <div class="bg-success rounded-4 py-5">
                    <h1 class="text-light text-center">Confiable</h1>
                </div>
            </div>
        </section>
    </main>

    <?php include("./assets/templates/footer.php"); ?>
</body>

</html>