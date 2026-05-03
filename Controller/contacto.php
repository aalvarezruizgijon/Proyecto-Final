<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si es GET, cargamos la vista[cite: 1]
include '../View/contacto/contacto_view.php';