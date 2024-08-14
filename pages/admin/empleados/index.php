<?php
define("PAGE_NAME", "Empleados");
define("PILL_SELECT", "Lista");

session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ../../../index.php');
    exit();
}

$users = require_once '../../../Back/Controllers/spaEmpelados/terapeutas/controlador_select_terapeuta.php';
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
                            <?php include("../assets/templates/nav_pills.php") ?>
                            <div class="table-responsive mb-2">
                                <table id="myTable" class="table table-light table-hover w-100 fs-5 mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Especialidad</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $key => $user) {
                                        ?>
                                            <tr id="row-<?php echo $user["id"] ?>">
                                                <td><?php echo $user["nombre"] ?></td>
                                                <td><?php echo $user["apellido"] ?></td>
                                                <td><?php echo $user["especialidad"] ?></td>
                                                <td>
                                                    <div class="d-flex justify-content-end gap-2">
                                                        <button type="button" onclick="showPutModal(<?php echo $user['id'] ?>)" class="bg-transparent border-0 text-primary p-0">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                        <button type="button" onclick="showDeleteModal(<?php echo $user['id'] ?>)" class="bg-transparent border-0 text-danger p-0">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="putModal" tabindex="-1" aria-labelledby="putModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="frmPut" action="/spa/back/Controllers/spaEmpelados/terapeutas/controlador_edit_terapeuta.php" method="post" class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-primary fs-4" id="putModalLabel">Modificar Empleado</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-2 mb-2">
                                                    <div class="col">
                                                        <input type="text" name="nombre" id="inpNombres" class="form-control form-control-lg" placeholder="Nombres" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" name="apellido" id="inpApellidos" class="form-control form-control-lg" placeholder="Apellidos" required>
                                                    </div>
                                                </div>
                                                <input type="text" name="especialidad" id="inpEspecialidad" class="form-control form-control-lg" placeholder="Especialidad" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Modificar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="frmDelete" action="/spa/back/Controllers/spaEmpelados/terapeutas/controlador_delete_terapeuta.php" method="post" class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-danger fs-4" id="deleteModalLabel">¡Advertencia!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 mb-0">¿Seguro que deseas eliminar al empleado <b id="lblUsuario"></b>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include("../../../assets/templates/footer.php"); ?>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/datatables.min.js"></script>
    <script>
        let table = new DataTable('#myTable', {
            language: {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ empleados",
                "infoEmpty": "Mostrando 0 a 0 de 0 empleados",
                "infoFiltered": "(filtrado de _MAX_ empleados totales)",
                "lengthMenu": "Mostrar _MENU_ empleados",
                "loadingRecords": "Cargando...",
                "search": "Buscar: ",
                "zeroRecords": "No se encontraron registros coincidentes",
                "aria": {
                    "orderable": "Ordenar por esta columna",
                    "orderableReverse": "Ordenar esta columna en orden inverso"
                }
            }
        });
        const deleteModal = new bootstrap.Modal('#deleteModal');
        const putModal = new bootstrap.Modal('#putModal');
        const getCols = (id) => {
            var row = document.getElementById(`row-${id}`).children;
            var cols = [];
            for (let i = 0; i < (row.length - 1); i++) {
                cols.push(row.item(i).innerText);
            };
            return cols;
        };
        const showPutModal = (id) => {
            var cols = getCols(id);
            document.getElementById("frmPut").action += `?id=${id}`;
            document.getElementById("inpNombres").value = cols[0];
            document.getElementById("inpApellidos").value = cols[1];
            document.getElementById("inpEspecialidad").value = cols[2];
            putModal.show();
        };
        const showDeleteModal = (id) => {
            var cols = getCols(id);
            document.getElementById("frmDelete").action += `?id=${id}`;
            document.getElementById("lblUsuario").innerText = `${cols[0]} ${cols[1]}`;
            deleteModal.show();
        };
    </script>
</body>

</html>