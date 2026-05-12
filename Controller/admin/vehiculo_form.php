<?php
require_once 'auth_admin.php';
require_once '../../Model/Vehiculo.php';

$uploadDir = __DIR__ . '/../../View/img/coches/';
$allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/avif'];

// ───── POST: guardar (insert o update) ─────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id          = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT); // null = insertar
    $matricula   = trim($_POST['matricula']  ?? '');
    $marca       = trim($_POST['marca']      ?? '');
    $modelo      = trim($_POST['modelo']     ?? '');
    $motor       = trim($_POST['motor']      ?? '');
    $cambios     = trim($_POST['cambios']    ?? '');
    $traccion    = trim($_POST['traccion']   ?? '');
    $llantas     = intval($_POST['llantas']  ?? 17);
    $anio        = intval($_POST['anio']     ?? date('Y'));
    $precio_dia  = floatval($_POST['precio_dia'] ?? 0);
    $disponible  = isset($_POST['disponible']) ? 1 : 0;
    $oferta      = isset($_POST['oferta'])     ? 1 : 0;

    // Gestión de imagen
    $imagenActual = trim($_POST['imagen_actual'] ?? 'default.jpg');
    $imagen = $imagenActual; // por defecto mantenemos la existente

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['imagen'];
        if (in_array($file['type'], $allowedTypes) && $file['size'] <= 5 * 1024 * 1024) {
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $nombreArchivo = strtolower($marca . '_' . $modelo . '.' . $extension);
            $nombreArchivo = preg_replace('/[^a-z0-9._-]/', '_', $nombreArchivo);
            if (move_uploaded_file($file['tmp_name'], $uploadDir . $nombreArchivo)) {
                $imagen = $nombreArchivo;
            }
        }
    }

    $vehiculo = new Vehiculo($matricula, $marca, $modelo, $motor, $cambios, $traccion,
                             $llantas, $anio, $precio_dia, $imagen, $disponible, $oferta, $id);

    if ($id) {
        // Edición
        $ok = $vehiculo->update();
        header('Location: vehiculos.php?ok=' . ($ok ? 'editado' : 'error'));
    } else {
        // Alta nueva
        $ok = $vehiculo->insert();
        header('Location: vehiculos.php?ok=' . ($ok ? 'creado' : 'error'));
    }
    exit;
}

// ───── GET: mostrar formulario ─────
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$vehiculoEditar = $id ? Vehiculo::getById($id) : null;

$paginaActiva = 'vehiculos';
include '../../View/admin/vehiculo_form_view.php';
