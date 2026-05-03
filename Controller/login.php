<?php
require_once '../Model/Cliente.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} // Necesario para mantener al usuario conectado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recogemos el usuario (o email) y la contraseña del formulario
    $user_input = trim($_POST['email']); 
    $pass_input = $_POST['password'];

    // Usamos el método estático de tu clase Cliente
    $cliente = Cliente::login($user_input, $pass_input);

    if ($cliente) {
        // LOGIN CORRECTO: Guardamos los datos en la sesión[cite: 1]
        $_SESSION['id_cliente'] = $cliente->getId();
        $_SESSION['nombre'] = $cliente->getNombre();
        $_SESSION['rol'] = $cliente->getRol();
        
        // Redirigimos al index principal de la raíz[cite: 1]
        header('Location: ../index.php');
        exit;
    } else {
        // LOGIN INCORRECTO: Volvemos a la vista con un mensaje de error[cite: 1]
        header('Location: login.php?error=auth');
        exit;
    }
} else {
    // Si entran por GET, simplemente mostramos la vista[cite: 1]
    include '../View/login/login_view.php';
}