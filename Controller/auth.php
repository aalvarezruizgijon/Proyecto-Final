<?php
// Iniciamos sesión para poder leer las variables $_SESSION
session_start();

// Si no existe el ID del cliente en la sesión, redirigimos al login
if (!isset($_SESSION['id_cliente'])) {
    header('Location: ../Controller/login.php');
    exit;
}
?>