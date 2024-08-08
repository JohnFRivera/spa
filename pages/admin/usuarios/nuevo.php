<?php
define("PAGE_NAME", "Usuarios");
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
                                    <div class="row g-2 mb-2">
                                        <div class="col">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="bi bi-telephone fs-5"></i>
                                                </div>
                                                <input type="tel" name="telefono" class="form-control form-control-lg" placeholder="Teléfono" pattern="^[0-9]*$" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <select name="rol" class="form-select form-select-lg" required>
                                                <option>Rol...</option>
                                                <option value="Usuario">Usuario</option>
                                                <option value="Empleado">Empleado</option>
                                                <option value="Administrador">Administrador</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">
                                            <i class="bi bi-envelope-at fs-5"></i>
                                        </div>
                                        <input type="email" name="email" class="form-control form-control-lg" placeholder="Correo electrónico" required>
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">
                                            <i class="bi bi-key fs-5"></i>
                                        </div>
                                        <input type="password" name="password" id="password" oninput="toggleConfirmPass()" class="form-control form-control-lg" placeholder="Contraseña" minlength="8" required>
                                    </div>
                                    <input type="password" id="confirmPass" oninput="toggleConfirmPass()" class="form-control form-control-lg" placeholder="Confirmar contraseña" minlength="8" required>
                                    <p id="txtErr" class="text-danger fw-semibold ms-1 pb-2"></p>
                                    <button class="btn btn-lg btn-primary w-100" type="submit">
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