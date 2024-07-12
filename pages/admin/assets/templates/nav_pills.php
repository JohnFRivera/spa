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
        if($pill["text"] == PILL_SELECT) {
            $active = "active";
        }
    ?>
        <li class="nav-item">
            <?php echo "<a href='".$pill["href"]."' class='btn btn-outline-primary border-0 rounded-3 btn-aside $active'>" ?>
                <?php echo "<i class='bi bi-".$pill["icon"]."'></i>" ?>
                <?php echo $pill["text"] ?>
            </a>
        </li>
    <?php
    }
    ?>
</ul>