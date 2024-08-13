<?php
define("PAGE_NAME", "Registrarse");
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
    <title>Spa | Registrarse</title>
</head>

<body>
    <?php include("./assets/templates/header.php"); ?>
    <main class="container-fluid">
        <section class="row bg-body-secondary h-section">
            <div class="col d-none d-md-block px-0">
                <img src="./assets/img/img_spa_register.jpg" alt="lobby spa" class="img-fluid object-fit-cover h-100">
            </div>
            <div class="col align-content-center">
                <div class="row">
                    <div class="col-11 col-lg-9 col-xl-8 col-xxl-7 my-5 mx-auto">
                        <h1 class="fw-bold text-center mb-0">!Descubre el Akzara!</h1>
                        <p class="fw-normal text-center fs-5 mb-5"><strong>Regístrate</strong> ahora y sumérgete en la experiencia rejuvenecedora de nuestro <strong class="text-success">Spa</strong></p>
                        <form action="/spa/Back/Controllers/auth/register/controlador_registro.php" method="post">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-exclamation-circle-fill me-1"></i> Error:</strong> La contraseña está incorrecta.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <h5 class="fw-bold ms-1 mb-1">Datos básicos</h5>
                            <div class="row g-2 mb-2">
                                <div class="col">
                                    <input type="text" name="nombre" id="nombres" class="form-control form-control-lg" placeholder="Nombres" required>
                                </div>
                                <div class="col">
                                    <input type="text" name="apellido" id="apellidos" class="form-control form-control-lg" placeholder="Apellidos" required>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-text">
                                    <i class="bi bi-telephone fs-5"></i>
                                </div>
                                <input type="tel" name="telefono" id="telefono" class="form-control form-control-lg" placeholder="Teléfono" pattern="^[0-9]*$" required>
                            </div>
                            <h5 class="fw-bold ms-1 mb-1">Datos de ingreso</h5>
                            <div class="input-group mb-2">
                                <div class="input-group-text fs-5">
                                    <i class="bi bi-envelope-at"></i>
                                </div>
                                <input type="email" name="correo" id="email" class="form-control form-control-lg" placeholder="Correo electrónico" required>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-text">
                                    <i class="bi bi-key fs-5"></i>
                                </div>
                                <input type="password" name="password" id="password" oninput="toggleConfirmPass()" class="form-control form-control-lg" placeholder="Contraseña" minlength="8" required>
                            </div>
                            <input type="password" id="confirmPass" oninput="toggleConfirmPass()" class="form-control form-control-lg" placeholder="Confirmar contraseña" minlength="8" required>
                            <p id="txtErr" class="text-danger fw-semibold ms-1 pb-2"></p>
                            <button class="btn btn-lg btn-success w-100 mb-2" type="submit" id="btnEntrar">
                                Registrarme
                            </button>
                            <p class="text-center fs-6 mb-0">
                                <a href="./ingresar.php" class="link-primary link-underline-opacity-0 link-underline-opacity-100-hover">¿Ya tienes una cuenta?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include("./assets/templates/footer.php"); ?>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleConfirmPass = () => {
            var inpConfirmPass = document.getElementById("confirmPass");
            var inpPass = document.getElementById("password");
            if (inpPass.value.length > 0) {
                var txtErr = document.getElementById("txtErr");
                if (inpPass.value == inpConfirmPass.value) {
                    inpConfirmPass.classList.remove("is-invalid");
                    inpConfirmPass.classList.add("is-valid");
                    txtErr.innerText = "";
                } else {
                    inpConfirmPass.classList.remove("is-valid");
                    inpConfirmPass.classList.add("is-invalid");
                    txtErr.innerText = "Las contraseñas no coinciden";
                };
            };
        };
    </script>
</body>

</html>