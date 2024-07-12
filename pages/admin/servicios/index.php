<?php
define("PAGE_NAME", "Servicios");
define("PILL_SELECT", "Lista");

$users = [
    ["id" => "1", "descripcion" => "John", "duracion" => "1", "precio" => "3105339788", "terapeuta" => "john@gmail.com"],
    ["id" => "2", "descripcion" => "Kevin", "duracion" => "4", "precio" => "3105339788", "terapeuta" => "kevin@gmail.com"],
    ["id" => "3", "descripcion" => "Walter", "duracion" => "2", "precio" => "3105339788", "terapeuta" => "walter@gmail.com"],
    ["id" => "4", "descripcion" => "Camilo", "duracion" => "7", "precio" => "3105339788", "terapeuta" => "camilo@gmail.com"],
    ["id" => "5", "descripcion" => "Bladimir", "duracion" => "11", "precio" => "3105339788", "terapeuta" => "blacho@gmail.com"],
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../../assets/img/spa_logo.webp" type="image/x-icon">
    <title>Spa | Gestión de <?php echo PAGE_NAME ?></title>
</head>

<body class="container-fluid bg-body-secondary">
    <?php include("../assets/templates/header.php"); ?>

    <main class="row">
        <?php include("../assets/templates/aside_bar.php"); ?>

        <section class="col p-4">
            <h5 class="fw-normal mb-0">Bienvenido a</h5>
            <h4 class="fw-bold mb-4">Gestión de <?php echo PAGE_NAME ?></h4>
            <div class="row">
                <div class="col">
                    <div class="bg-light rounded-4 shadow-sm p-3">
                        <?php include("../assets/templates/nav_pills.php") ?>

                        <div class="table-responsive mb-2">
                            <table id="myTable" class="table table-light table-hover w-100 mb-0">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Terapeuta</th>
                                        <th>
                                            <i class="bi bi-alarm me-2"></i>
                                            Duración
                                        </th>
                                        <th>
                                            <i class="bi bi-currency-dollar me-2"></i>
                                            Precio
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $key => $user) {
                                    ?>
                                        <tr>
                                            <td class="opacity-75"><?php echo $user["descripcion"] ?></td>
                                            <td class="opacity-75"><?php echo $user["terapeuta"] ?></td>
                                            <td class="opacity-75"><?php echo $user["duracion"] ?></td>
                                            <td class="opacity-75"><?php echo $user["precio"] ?></td>
                                            <td class="opacity-75">
                                                <div class="d-flex justify-content-end gap-2">
                                                    <a href=<?php echo "./editar.php?nombres=" . $user["nombre"] . "&apellidos=" . $user["apellido"] . "&telefono=" . $user["telefono"] . "&correo=" . $user["correo"] ?> class="link-primary"><i class="bi bi-pencil-square"></i></a>
                                                    <a href=<?php echo "./eliminar.php?id=" . $user["id"] . "&nombre=" . $user["nombre"] . "+" . $user["apellido"] ?> class="link-danger"><i class="bi bi-trash-fill"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include("../../assets/templates/footer.php"); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js"></script>
    <script>
        let table = new DataTable('#myTable', {
            language: {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 usuarios",
                "infoFiltered": "(filtrado de _MAX_ usuarios totales)",
                "lengthMenu": "Mostrar _MENU_ usuarios",
                "loadingRecords": "Cargando...",
                "search": "Buscar: ",
                "zeroRecords": "No se encontraron registros coincidentes",
                "aria": {
                    "orderable": "Ordenar por esta columna",
                    "orderableReverse": "Ordenar esta columna en orden inverso"
                }
            }
        });
    </script>
</body>

</html>