<?php
require_once 'DrivoDB.php';

class Flota {
    private $id;
    private $marca;
    private $modelo;
    private $traccion;
    private $ruedas;
    private $motor;
    private $cambios;
    private $anio;
    private $precio_dia;

    function __construct($id=0, $marca="", $modelo="", $traccion="", $ruedas=0, $motor="", $cambios="", $anio=0, $precio_dia=0) {
        $this->id = $id;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->traccion = $traccion;
        $this->ruedas = $ruedas;
        $this->motor = $motor;
        $this->cambios = $cambios;
        $this->anio = $anio;
        $this->precio_dia = $precio_dia;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getMarca() { return $this->marca; }
    public function getModelo() { return $this->modelo; }
    public function getPrecioDia() { return $this->precio_dia; }

    public static function getVehiculos() {
        $conexion = DrivoDB::connectDB();
        $seleccion = "SELECT * FROM flota";
        $consulta = $conexion->query($seleccion);
        $vehiculos = [];
        while ($reg = $consulta->fetchObject()) {
            $vehiculos[] = new Flota($reg->id, $reg->marca, $reg->modelo, $reg->traccion, $reg->ruedas, $reg->motor, $reg->cambios, $reg->anio, $reg->precio_dia);
        }
        return $vehiculos;
    }

    public static function getVehiculoById($id) {
    $conexion = DrivoDB::connectDB();
    $consulta = $conexion->query("SELECT * FROM flota WHERE id=$id");
    if ($reg = $consulta->fetchObject()) {
        return new Flota($reg->id, $reg->marca, $reg->modelo, $reg->traccion, $reg->ruedas, $reg->motor, $reg->cambios, $reg->anio, $reg->precio_dia);
    }
    return false;
}

public static function getDestacados($limite = 3) {
    $conexion = DrivoDB::connectDB();
    // Trae los coches más nuevos para la portada
    $consulta = $conexion->query("SELECT * FROM flota ORDER BY anio DESC LIMIT $limite");
    $resultado = [];
    while ($reg = $consulta->fetchObject()) {
        $resultado[] = new Flota($reg->id, $reg->marca, $reg->modelo, $reg->traccion, $reg->ruedas, $reg->motor, $reg->cambios, $reg->anio, $reg->precio_dia);
    }
    return $resultado;
}
}