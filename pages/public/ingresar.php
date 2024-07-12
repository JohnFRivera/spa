<?php
define("PAGE_NAME", "Ingresar");
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
    <title>Spa | Ingresar</title>
    <script>
        const toggleShowPass = () => {
            var inpPass = document.getElementById("pass");
            inpPass.type == "password" ? inpPass.type = "text" : inpPass.type = "password";
        };
    </script>
</head>

<body class="container-fluid bg-body-secondary">
    <?php include("./templates/header.php"); ?>
    
    <main class="row">
        <div class="col border-end d-none d-md-block px-0">
            <img src="./img/img_spa_login.webp" alt="lobby spa" class="img-fluid object-fit-cover h-100">
        </div>
        <div class="col">
            <div class="row">
                <div class="col-11 col-lg-9 col-xl-8 col-xxl-7 my-5 mx-auto">
                    <h1 class="fw-semibold text-center">
                        Bienvenido
                    </h1>
                    <p class="text-center fs-5 mb-5">Inicia sesión y disfruta de todas las experiencias que nuestro spa tiene para ofrecerte</p>
                    <form action="" method="post">
                        <div class="input-group rounded-3 mb-2">
                            <div class="form-floating text-black-50">
                                <input type="email" class="form-control" name="email" id="email" placeholder="" required>
                                <label for="email">Correo electrónico</label>
                            </div>
                            <div class="input-group-text">
                                <i class="bi bi-envelope-at fs-5"></i>
                            </div>
                        </div>
                        <div class="input-group rounded-3 mb-1">
                            <div class="form-floating text-black-50">
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="" minlength="8" required>
                                <label for="pass">Contraseña</label>
                            </div>
                            <div class="input-group-text">
                                <i class="bi bi-key fs-5"></i>
                            </div>
                        </div>
                        <div class="form-check text-black-50">
                            <input type="checkbox" id="showPass" onchange="toggleShowPass()" class="form-check-input">
                            <label for="showPass" class="form-check-label">
                                Mostrar contraseña
                            </label>
                        </div>
                        <p id="lblErr" class="text-danger fw-semibold ms-1 mb-0"></p>
                        <button class="btn btn-lg btn-success w-100 mt-3 mb-1" type="submit" id="btnEntrar">
                            Entrar
                        </button>
                        <p class="text-center mb-0">¿Aún no tienes una cuenta? <a href="./registrarse.php" class="text-decoration-none fw-semibold">Registrate aquí</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include("../assets/templates/footer.php"); ?>
</body>

</html>