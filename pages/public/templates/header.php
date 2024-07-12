<?php

$links = [
    ["text" => "Inicio","href" => "./inicio.php"],
    ["text" => "Sobre Nosotros","href" => "./sobre_nosotros.php"],
    ["text" => "Contacto","href" => "./contacto.php"]
]

?>

<header class="row bg-body border-bottom shadow">
    <div class="col-auto px-0 mx-auto">
        <a href="./inicio.php">
            <img src="../assets/img/spa_logo.webp" alt="spa logo" width="113px">
        </a>
    </div>
    <div class="col-12 col-md-9 col-lg-10 col-xl-11 align-content-center">
        <nav class="row">
            <div class="col">
                <ul class="nav flex-column flex-md-row">
                    <?php
                    foreach($links as $key => $link) {
                        $active = "link-opacity-75 link-opacity-100-hover";
                        if($link["text"] == PAGE_NAME) {
                            $active = "link-opacity-100-hover fw-semibold";
                        }
                    ?>
                        <li class="nav-item">
                            <?php echo "<a href=".$link["href"]." class='nav-link link-dark $active text-center fs-5'>".$link["text"]."</a>" ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-12 col-md-auto ms-auto align-content-center mt-2 mt-md-0">
                <div class="btn-group shadow-sm w-100 mb-3 mb-md-0">
                    <?php
                    if (PAGE_NAME == "Ingresar") {
                        echo "<a class='btn btn-lg btn-success' href='./ingresar.php'><i class='bi bi-box-arrow-in-right'></i> Ingresar</a>";
                        echo "<a class='btn btn-lg btn-outline-success' href='./registrarse.php'>Registrarse</a>";
                    } else {
                        echo "<a class='btn btn-lg btn-outline-success' href='./ingresar.php'><i class='bi bi-box-arrow-in-right'></i> Ingresar</a>";
                        echo "<a class='btn btn-lg btn-success' href='./registrarse.php'>Registrarse</a>";
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
</header>