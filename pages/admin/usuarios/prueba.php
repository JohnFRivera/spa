<?php
// prueba_include.php
$file = '../../../Back/Controllers/spaEmpelados/usuarios/controlador_edit_usuario.php';

if (file_exists($file)) {
    echo "El archivo existe.";
} else {
    echo "El archivo no existe.";
}
?>
