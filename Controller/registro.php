<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../Model/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuario_nick = trim($_POST['email']); 
    $email = strtolower(trim($_POST['email']));
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $pass = $_POST['password'];

    $nuevoCliente = new Cliente($usuario_nick, $pass, $email, $nombre, $apellidos);

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