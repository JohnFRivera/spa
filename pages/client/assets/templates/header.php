<?php
$username = require_once $_SERVER['DOCUMENT_ROOT'] . '/spa/Back/Controllers/spaEmpelados/usuarios/controlador_username.php';
$links = [
    ["text" => "Agenda", "href" => "../dashboard.php"]
]

?>

<header class="container-fluid">
    <div class="row border-bottom py-1">
        <div class="col-1">
            <a href="/spa/">
                <img src="/spa/assets/img/spa_logo.webp" alt="Logo_de_Spa" width="113px">
            </a>
        </div>
        <div class="col-12 col-md-9 col-lg-10 col-xl-11 align-content-center">
            <nav class="row">
                <div class="col">
                    <ul class="nav flex-column flex-md-row">
                        <?php
                        foreach ($links as $key => $link) {
                            $active = "link-opacity-75 link-opacity-100-hover";
                            if ($link["text"] == PAGE_NAME) {
                                $active = "link-opacity-100-hover fw-semibold";
                            }
                        ?>
                            <li class="nav-item">
                                <?php echo "<a href=" . $link["href"] . " class='nav-link link-dark $active text-center fs-5'>" . $link["text"] . "</a>" ?>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-12 col-md-auto ms-auto align-content-center mt-2 mt-md-0">
                    <div class="btn-group shadow-sm w-100 mb-3 mb-md-0">
                        <div class="btn btn-lg btn-outline-success fw-semibold">
                            <i class="bi bi-person-fill me-2"></i>
                            <?php echo $username ?>
                        </div>
                        <a href="/spa/Back/Controllers/auth/login/logout.php" class="btn btn-lg btn-danger">
                            <i class="bi bi-box-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>