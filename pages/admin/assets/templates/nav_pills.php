<?php
$pills = [
    ["text" => "Lista", "href" => "./", "icon" => "list"],
    ["text" => "Nuevo", "href" => "./nuevo.php", "icon" => "plus-lg"],
];
?>

<ul class="nav bg-body-secondary rounded-3 gap-0 p-2 mb-2">
    <?php
    foreach ($pills as $key => $pill) {
        $active = "";
        if ($pill["text"] == PILL_SELECT) {
            $active = "active";
        }
    ?>
        <li class="nav-item">
            <a href="<?php echo $pill["href"] ?>" class="btn btn-outline-success border-0 rounded-3 fs-5 btn-aside <?php echo $active ?>">
                <i class="bi bi-<?php echo $pill["icon"] ?>"></i>
                <?php echo $pill["text"] ?>
            </a>
        </li>
    <?php
    }
    ?>
</ul>