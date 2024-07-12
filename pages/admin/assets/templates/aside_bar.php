<?php

$buttons = [
    ["text" => "Gráficos", "href" => "../graficos/", "icon" => "graph-up"],
    ["text" => "Reportes", "href" => "../reportes/", "icon" => "file-spreadsheet-fill"],
    ["text" => "Usuarios", "href" => "../usuarios/", "icon" => "person-circle"],
    ["text" => "Clientes", "href" => "../clientes/", "icon" => "people-fill"],
    ["text" => "Empleados", "href" => "../empleados/", "icon" => "person-vcard-fill"],
    ["text" => "Servicios", "href" => "../servicios/", "icon" => "people-fill"],
    ["text" => "Sesiones", "href" => "../sesiones/", "icon" => "people-fill"],
    ["text" => "Productos", "href" => "../productos/", "icon" => "box-seam-fill"],
];

?>
<aside class="col-auto bg-body-tertiary border-bottom border-end overflow-x-auto p-2">
    <ul class="nav flex-nowrap flex-md-column gap-0">
        <li class="nav-item border-bottom d-none d-md-block pb-2 mb-2">
            <h4 class="fw-bold text-success ps-3 mb-1">Gestiones</h4>
        </li>
        <?php
        foreach ($buttons as $key => $button) {
            $active = "";
            if ($button["text"] == PAGE_NAME) {
                $active = "active";
            }
        ?>
            <li class="nav-item">
                <?php echo "<a href='".$button["href"]."' class='btn btn-outline-success btn-aside border-0 fs-5 d-flex flex-column flex-md-row justify-content-start w-100 ps-3 pe-5 me-2 $active'>" ?>
                <?php echo "<i class='bi bi-".$button["icon"]." me-0 me-md-3'></i>" ?>
                <?php echo $button["text"] ?>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</aside>