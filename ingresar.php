<?php
define("PAGE_NAME", "Ingresar");
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
    <title>Spa | Ingresar</title>
</head>

<body>
    <!-- CABECERA -->
    <?php include("./assets/templates/header.php"); ?>
    <!-- CONTENIDO -->
    <main class="container-fluid">
        <section class="row bg-body-secondary h-section">
            <!-- IMAGEN -->
            <div class="col d-none d-md-block px-0">
                <img src="./assets/img/img_spa_login.webp" alt="lobby spa" class="img-fluid object-fit-cover h-100">
            </div>
            <!-- FORMULARIO -->
            <div class="col align-content-center">
                <div class="row">
                    <div class="col-11 col-lg-9 col-xl-8 col-xxl-7 my-5 mx-auto">
                        <h1 class="fw-bold text-center mb-0">
                            Bienvenido
                        </h1>
                        <p class="fw-normal text-center fs-5 mb-5"><strong>Inicia sesión</strong> y disfruta de todas las experiencias que nuestro <strong class="text-success">Spa</strong> tiene para ofrecerte</p>
                        <form action="" method="post">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-exclamation-circle-fill me-1"></i> Error:</strong> La contraseña está incorrecta.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-text">
                                    <i class="bi bi-envelope-at fs-5"></i>
                                </div>
                                <div class="form-floating">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                                    <label for="email">Correo electrónico</label>
                                </div>
                            </div>
                            <div class="input-group mb-1">
                                <div class="input-group-text">
                                    <i class="bi bi-key fs-5"></i>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="" minlength="8" required>
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" id="showPass" onchange="toggleShowPass()" class="form-check-input">
                                <label for="showPass" class="form-check-label">
                                    Mostrar contraseña
                                </label>
                            </div>
                            <button class="btn btn-lg btn-success fw-semibold w-100 mb-2" type="submit" id="btnEntrar">
                                Entrar
                            </button>
                            <p class="text-center fs-6 mb-0">
                                <a href="./registrarse.php" class="link-primary link-underline-opacity-0 link-underline-opacity-100-hover">¿Aún no tienes una cuenta?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- PIE -->
    <?php include("./assets/templates/footer.php"); ?>
    <script>
        const toggleShowPass = () => {
            var inpPass = document.getElementById("password");
            inpPass.type == "password" ? inpPass.type = "text" : inpPass.type = "password";
        };
    </script>
</body>

</html>