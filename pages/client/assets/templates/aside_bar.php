<?php

$buttons = [
    ["text" => "Agendar cita", "href" => "../citas/", "icon" => "calendar-plus"],
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
                <a href="<?php echo $button["href"] ?>" class="btn btn-outline-success btn-aside border-0 fs-5 d-flex flex-column flex-md-row justify-content-start w-100 ps-4 pe-5 me-2 <?php echo $active ?>">
                    <i class="bi bi-<?php echo $button["icon"] ?> me-0 me-md-2"></i>
                    <?php echo $button["text"] ?>
                </a>
            </li>
        <?php
        }
        ?>
    </ul>
</aside>