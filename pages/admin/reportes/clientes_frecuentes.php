<?php
define("PAGE_NAME", "Reportes");
define("PILL_SELECT", "Lista");

require_once '../../../Back/Controllers/auth/login/routes/verificar_acceso.php';
verificar_acceso([ROL_ADMIN]);


$users = require_once '../../../Back/Controllers/reportes/controlador_reportes_clienteFRC.php';
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
                            <ul class="nav bg-body-secondary rounded-3 gap-0 p-2 mb-2">
                                <li class="nav-item">
                                    <a href="./ingresos_generados.php" class="btn btn-outline-success border-0 rounded-3 fs-5 btn-aside">
                                        Ingresos Generados
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./ocupacion_terapeutas.php" class="btn btn-outline-success border-0 rounded-3 fs-5 btn-aside">
                                        Ocupación Terapeutas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./clientes_frecuentes.php" class="btn btn-outline-success border-0 rounded-3 fs-5 btn-aside active">
                                        Clientes Frecuentes
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./consumo_productos.php" class="btn btn-outline-success border-0 rounded-3 fs-5 btn-aside">
                                        Consumo Productos
                                    </a>
                                </li>
                            </ul>
                            <div class="table-responsive mb-2">
                                <table id="myTable" class="table table-light table-hover w-100 fs-5 mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th class="text-start">
                                                <i class="bi bi-telephone-fill me-2"></i>
                                                Teléfono
                                            </th>
                                            <th>
                                                <i class="bi bi-envelope-at-fill me-2"></i>
                                                Correo
                                            </th>
                                            <th>
                                                <i class="bi bi-tag-fill me-2"></i>
                                                Rol
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $key => $user) {
                                        ?>
                                            <tr id="row-<?php echo $user["id"] ?>">
                                                <td><?php echo $user["nombre"] ?></td>
                                                <td><?php echo $user["apellido"] ?></td>
                                                <td class="text-start"><?php echo $user["telefono"] ?></td>
                                                <td><?php echo $user["correo"] ?></td>
                                                <td class="text-success fw-bold"><?php echo $user["rol"] ?></td>
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
        </div>
    </main>
    <?php include("../../../assets/templates/footer.php"); ?>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/vfs_fonts.js"></script>
    <script src="../../assets/js/pdfmake.min.js"></script>
    <script src="../../assets/js/datatables.min.js"></script>
    <script>
        let table = new DataTable('#myTable', {
            language: {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ reportes",
                "infoEmpty": "Mostrando 0 a 0 de 0 reportes",
                "infoFiltered": "(filtrado de _MAX_ reportes totales)",
                "lengthMenu": "Mostrar _MENU_ reportes",
                "loadingRecords": "Cargando...",
                "search": "Buscar: ",
                "zeroRecords": "No se encontraron registros coincidentes",
                "aria": {
                    "orderable": "Ordenar por esta columna",
                    "orderableReverse": "Ordenar esta columna en orden inverso"
                }
            },
            layout: {
                top2End: {
                    buttons: [{
                        extend: 'excel',
                        text: `<i class="bi bi-file-earmark-spreadsheet"></i> Excel`,
                        className: "btn-success"
                    },{
                        extend: 'pdf',
                        text: `<i class="bi bi-filetype-pdf"></i> Pdf`,
                        className: "btn-danger"
                    }]
                }
            }
        });
    </script>
</body>

</html>