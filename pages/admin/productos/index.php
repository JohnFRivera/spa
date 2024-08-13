<?php
define("PAGE_NAME", "Productos");
define("PILL_SELECT", "Lista");

$users = require_once '../../../Back/Controllers/productos/seleccionar_Productos.php';

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
                                            <th>Descripción</th>
                                            <th>Existencias</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $key => $user) {
                                        ?>
                                            <tr id="row-<?php echo $user["id"] ?>">
                                                <td><?php echo $user["descripcion"] ?></td>
                                                <td><?php echo $user["stock"] ?></td>
                                                <td><?php echo $user["valor_Producto"] ?></td>
                                                <td><?php if ($user["estado"] === 0) {
                                                    echo 'Inactivo';
                                                }else{
                                                    echo 'Activo';
                                                } ?></td>
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
                                        <form id="frmPut" action="/spa/back/Controllers/productos/editar_producto.php" method="post" class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-primary fs-4" id="putModalLabel">Modificar Producto</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="descripcion" id="inpDescripcion" class="form-control form-control-lg mb-2" placeholder="Descripción" required>
                                                <input type="number" name="existencias" id="inpExistencias" class="form-control form-control-lg mb-2" placeholder="Existencias" pattern="^[0-9]*$" min="1" required>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-text">
                                                        <i class="bi bi-currency-dollar fs-5"></i>
                                                    </div>
                                                    <input type="number" name="precio" id="inpPrecio" class="form-control form-control-lg" placeholder="Precio" pattern="^[0-9]*$" min="0" required>
                                                </div>
                                                <select name="estado" id="slcEstado" class="form-select form-select-lg">
                                                    <option>Estado...</option>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
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
                                        <form id="frmDelete" action="/spa/back/Controllers/productos/eliminar_producto.php" method="post" class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title text-danger fs-4" id="deleteModalLabel">¡Advertencia!</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="fs-5 mb-0">¿Seguro que deseas eliminar el producto <b id="lblUsuario"></b>?</p>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 productos",
                "infoFiltered": "(filtrado de _MAX_ productos totales)",
                "lengthMenu": "Mostrar _MENU_ productos",
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
            document.getElementById("frmPut").action += `?id=${id}`;
            document.getElementById("inpDescripcion").value = cols[0];
            document.getElementById("inpExistencias").value = cols[1];
            document.getElementById("inpPrecio").value = cols[2];
            selectOpt("slcEstado", cols[3]);
            putModal.show();
        };
        const showDeleteModal = (id) => {
            var cols = getCols(id);
            document.getElementById("frmDelete").action += `?id=${id}`;
            document.getElementById("lblUsuario").innerText = `${cols[0]}`;
            deleteModal.show();
        };
    </script>
</body>

</html>