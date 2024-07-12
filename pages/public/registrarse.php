<?php
define("PAGE_NAME", "Registrarse");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="../assets/img/spa_logo.webp" type="image/x-icon">
    <title>Spa | Registrarse</title>
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
</head>

<body class="container-fluid bg-body-secondary">
    <?php include("./templates/header.php"); ?>

    <main class="row">
        <div class="col border-end d-none d-md-block px-0">
            <img src="./img/img_spa_register.jpg" alt="lobby spa" class="img-fluid object-fit-cover h-100">
        </div>
        <div class="col">
            <div class="row">
                <div class="col-11 col-lg-9 col-xl-8 col-xxl-7 my-5 mx-auto">
                    <h1 class="fw-semibold text-center">!Descubre el Akzara!</h1>
                    <p class="text-center fs-5 mb-5">Regístrate ahora y sumérgete en la experiencia rejuvenecedora de nuestro spa</p>
                    <form action="" method="post">
                        <h5 class="fw-semibold ms-2 mb-2">Datos básicos</h5>
                        <div class="row g-2 mb-2">
                            <div class="col">
                                <input type="text" name="nombres" id="nombres" class="form-control rounded-3" placeholder="Nombres" required>
                            </div>
                            <div class="col">
                                <input type="text" name="apellidos" id="apellidos" class="form-control rounded-3" placeholder="Apellidos" required>
                            </div>
                        </div>
                        <div class="input-group rounded-3 mb-3">
                            <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Teléfono" pattern="^[0-9]*$" required>
                            <div class="input-group-text">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>
                        <h5 class="fw-semibold ms-2 mb-2">Datos de ingreso</h5>
                        <div class="input-group rounded-3 mb-2">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                            <div class="input-group-text">
                                <i class="bi bi-envelope-at"></i>
                            </div>
                        </div>
                        <div class="input-group rounded-3 mb-1">
                            <input type="password" name="password" id="password" oninput="toggleConfirmPass()" class="form-control" placeholder="Contraseña" minlength="8" required>
                            <div class="input-group-text">
                                <i class="bi bi-key"></i>
                            </div>
                        </div>
                        <input type="password" id="confirmPass" oninput="toggleConfirmPass()" class="form-control rounded-3 mb-1" placeholder="Confirmar contraseña" minlength="8" required>
                        <p id="txtErr" class="text-danger fw-semibold ms-1 mb-0"></p>
                        <button class="btn btn-lg btn-success w-100 mt-3 mb-1" type="submit" id="btnEntrar">
                            Registrarme
                        </button>
                        <p class="text-center mb-0">¿Ya tienes una cuenta? <a href="./ingresar.php" class="text-decoration-none fw-semibold">Ingresa aquí</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include("../assets/templates/footer.php"); ?>
</body>

</html>