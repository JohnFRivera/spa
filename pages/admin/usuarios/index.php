<?php
define("PAGE_NAME", "Usuarios");
define("PILL_SELECT", "Lista");

$users = [
    ["id" => "1", "nombre" => "John", "apellido" => "Rivera", "telefono" => "3105339788", "correo" => "john@gmail.com", "rol" => "Administrador"],
    ["id" => "2", "nombre" => "Kevin", "apellido" => "Alzate", "telefono" => "3105339788", "correo" => "kevin@gmail.com", "rol" => "Empleado"],
    ["id" => "3", "nombre" => "Walter", "apellido" => "Arias", "telefono" => "3105339788", "correo" => "walter@gmail.com", "rol" => "Usuario"],
    ["id" => "4", "nombre" => "Camilo", "apellido" => "Vanegas", "telefono" => "3105339788", "correo" => "camilo@gmail.com", "rol" => "Usuario"],
    ["id" => "5", "nombre" => "Bladimir", "apellido" => "Silva", "telefono" => "3105339788", "correo" => "blacho@gmail.com", "rol" => "Usuario"],
];
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
                                                <td class="text-start"><?php echo $user["telefono"] ?></td>
                                                <td><?php echo $user["correo"] ?></td>
                                                <td class="text-success fw-bold"><?php echo $user["rol"] ?></td>
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
                                        <form id="frmPut" action="/spa/back/" method="post" class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-primary fs-4" id="putModalLabel">Modificar Usuario</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-2 mb-2">
                                                    <div class="col">
                                                        <input type="text" name="nombres" id="inpNombres" class="form-control form-control-lg" placeholder="Nombres" required>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" name="apellidos" id="inpApellidos" class="form-control form-control-lg" placeholder="Apellidos" required>
                                                    </div>
                                                </div>
                                                <div class="row g-2 mb-2">
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <div class="input-group-text">
                                                                <i class="bi bi-telephone fs-5"></i>
                                                            </div>
                                                            <input type="tel" name="telefono" id="inpTelefono" class="form-control form-control-lg" placeholder="Teléfono" pattern="^[0-9]*$" required>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <select name="rol" id="slcRol" class="form-select form-select-lg" required>
                                                            <option>Rol...</option>
                                                            <option value="Usuario">Usuario</option>
                                                            <option value="Empleado">Empleado</option>
                                                            <option value="Administrador">Administrador</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="bi bi-envelope-at fs-5"></i>
                                                    </div>
                                                    <input type="email" name="email" id="inpEmail" class="form-control form-control-lg" placeholder="Correo electrónico" required>
                                                </div>
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
                                        <form id="frmDelete" action="/spa/back/" method="post" class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-danger fs-4" id="deleteModalLabel">¡Advertencia!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 mb-0">¿Seguro que deseas eliminar al usuario <b id="lblUsuario"></b>?</p>
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
        const selectOpt = (elementId, value) => {
            var select = document.getElementById(elementId);
            for (let i = 0; i < select.length; i++) {
                if (select.item(i).value == value) {
                    select.item(i).selected = true;
                };
            };
        };
        const showPutModal = (id) => {
            var cols = getCols(id);
            document.getElementById("frmPut").action += id;
            document.getElementById("inpNombres").value = cols[0];
            document.getElementById("inpApellidos").value = cols[1];
            document.getElementById("inpTelefono").value = cols[2];
            document.getElementById("inpEmail").value = cols[3];
            selectOpt("slcRol", cols[4]);
            putModal.show();
        };
        const showDeleteModal = (id) => {
            var cols = getCols(id);
            document.getElementById("frmDelete").action += id;
            document.getElementById("lblUsuario").innerText = `${cols[0]} ${cols[1]}`;
            deleteModal.show();
        };
    </script>
</body>

</html>