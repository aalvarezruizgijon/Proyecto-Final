<?php
require_once '../Model/Vehiculo.php';

// Obtenemos TODO el catálogo de coches para la página "Nuestros Coches"
$coches = Vehiculo::getAll();

include '../View/coches/coches_view.php';
