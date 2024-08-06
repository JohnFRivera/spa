<?php
$links = [
    ["text" => "Inicio", "href" => "./"],
    ["text" => "Sobre Nosotros", "href" => "./sobre_nosotros.php"],
    ["text" => "Contacto", "href" => "./contacto.php"]
]
?>
<header class="container-fluid">
    <div class="row border-bottom py-1">
        <!-- LOGO -->
        <div class="col-auto px-0 mx-auto">
            <a href="./index.php">
                <img src="./assets/img/spa_logo.webp" alt="Logo_de_Spa" width="113px">
            </a>
        </div>
        <!-- NAVBAR -->
        <div class="col-12 col-md-9 col-lg-10 col-xl-11 align-content-center">
            <nav class="row">
                <div class="col">
                    <ul class="nav flex-column flex-md-row">
                        <?php
                        foreach ($links as $key => $link) {
                            $active = "link-opacity-50 link-opacity-100-hover";
                            if ($link["text"] == PAGE_NAME) {
                                $active = "link-opacity-100-hover fw-bold";
                            }
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $link["href"] ?>" class="nav-link link-dark fw-semibold text-center fs-5 <?php echo "$active" ?>">
                                    <?php echo $link["text"] ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-12 col-md-auto align-content-center ms-auto mt-2 mt-md-0">
                    <div class="btn-group shadow-sm w-100 mb-2 mb-md-0">
                        <?php
                        if (PAGE_NAME == "Ingresar") {
                        ?>
                            <a href="./ingresar.php" class="btn btn-lg btn-success"><i class="bi bi-box-arrow-in-right me-1"></i> Ingresar</a>
                            <a href=./registrarse.php" class="btn btn-lg btn-outline-success">Registrarse</a>
                        <?php
                        } else {
                        ?>
                            <a href="./ingresar.php" class="btn btn-lg btn-outline-success"><i class="bi bi-box-arrow-in-right me-1"></i> Ingresar</a>
                            <a href="./registrarse.php" class="btn btn-lg btn-success">Registrarse</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>