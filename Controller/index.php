<?php
require_once 'auth.php';
require_once '../Model/Vehiculo.php';

// Obtenemos todos los coches en oferta para mostrarlos en la vista
$coches = Vehiculo::getOfertas();

include '../View/index/index_view.php';
