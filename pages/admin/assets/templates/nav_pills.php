<?php
$pills = [
    ["text" => "Lista", "href" => "./", "icon" => "list"],
    ["text" => "Nuevo", "href" => "./nuevo.php", "icon" => "plus-lg"],
];

// Verifica si la página es "Clientes" y elimina la nav "Nuevo" si es así.
if (PAGE_NAME === "Clientes" || PAGE_NAME === "Sesiones" ) {
    // Filtra las navs para que no incluya la opción "Nuevo".
    $pills = array_filter($pills, function($pill) {
        return $pill["text"] !== "Nuevo";
    });
}
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