<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../Model/Cliente.php';

// Verificamos si se ha enviado el formulario por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Recoger los datos del formulario
    // Usamos el email como 'usuario' ya que tu tabla requiere ese campo único
    $usuario_nick = trim($_POST['email']); 
    $email = strtolower(trim($_POST['email']));
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $pass = $_POST['password'];

    // 2. Instanciar el objeto Cliente con los datos recogidos
    // El orden del constructor es: $usuario, $passw, $email, $nombre, $apellidos
    $nuevoCliente = new Cliente($usuario_nick, $pass, $email, $nombre, $apellidos);

    // 3. Intentar insertar en la base de datos usando tu método insert()
    if ($nuevoCliente->insert()) {
        // ÉXITO: Redirigimos al controlador de login con un mensaje de éxito
        header('Location: login.php?registro=exito');
        exit;
    } else {
        // ERROR: Redirigimos a la vista de registro avisando del fallo (ej: email duplicado)
        header('Location: registro.php?error=duplicado');
        exit;
    }
} else {
    // Si la petición es por GET (entrar a la página), cargamos la vista directamente
    include '../View/registro/registro_view.php';
}