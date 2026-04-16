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

    // Getters para acceder a los datos
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
}