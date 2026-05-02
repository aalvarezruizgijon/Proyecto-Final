<?php
require_once 'drivoDB.php';

class Vehiculo {
    private $id;
    private $matricula;
    private $marca;
    private $modelo;
    private $motor;
    private $cambios;
    private $traccion;
    private $llantas;
    private $anio;
    private $precio_dia;
    private $imagen;
    private $disponible;
    private $oferta;

    public function __construct($matricula = "", $marca = "", $modelo = "", $motor = "", $cambios = "", $traccion = "", $llantas = 17, $anio = 0, $precio_dia = 0.0, $imagen = "default.jpg", $disponible = 1, $oferta = 0, $id = null) {
        $this->id = $id;
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->motor = $motor;
        $this->cambios = $cambios;
        $this->traccion = $traccion;
        $this->llantas = $llantas;
        $this->anio = $anio;
        $this->precio_dia = $precio_dia;
        $this->imagen = $imagen;
        $this->disponible = $disponible;
        $this->oferta = $oferta;
    }

    // --- GETTERS BÁSICOS --- //
    public function getId() { return $this->id; }
    public function getMatricula() { return $this->matricula; }
    public function getMarca() { return $this->marca; }
    public function getModelo() { return $this->modelo; }
    public function getMotor() { return $this->motor; }
    public function getCambios() { return $this->cambios; }
    public function getTraccion() { return $this->traccion; }
    public function getLlantas() { return $this->llantas; }
    public function getAnio() { return $this->anio; }
    public function getPrecioDia() { return $this->precio_dia; }
    public function getImagen() { return $this->imagen; }
    public function getDisponible() { return $this->disponible; }
    public function getOferta() { return $this->oferta; }

    // Nombre completo del coche
    public function getNombreCompleto() {
        return $this->marca . ' ' . $this->modelo;
    }

    // --- MÉTODOS DE BASE DE DATOS --- //

    // Obtener todos los vehículos para mostrar en el catálogo general (o admin)
    public static function getAll() {
        $conexion = DrivoDB::connectDB();
        $consulta = "SELECT * FROM flota";
        $resultado = $conexion->query($consulta);
        
        $vehiculos = [];
        while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
            $vehiculos[] = new Vehiculo(
                $registro->matricula, $registro->marca, $registro->modelo, 
                $registro->motor, $registro->cambios, $registro->traccion, 
                $registro->llantas, $registro->anio, $registro->precio_dia, 
                $registro->imagen, $registro->disponible, $registro->oferta, $registro->id
            );
        }
        return $vehiculos;
    }

    // Obtener solo los disponibles para que los clientes puedan reservar
    public static function getDisponibles() {
        $conexion = DrivoDB::connectDB();
        $consulta = "SELECT * FROM flota WHERE disponible = 1";
        $resultado = $conexion->query($consulta);
        
        $vehiculos = [];
        while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
            $vehiculos[] = new Vehiculo(
                $registro->matricula, $registro->marca, $registro->modelo, 
                $registro->motor, $registro->cambios, $registro->traccion, 
                $registro->llantas, $registro->anio, $registro->precio_dia, 
                $registro->imagen, $registro->disponible, $registro->oferta, $registro->id
            );
        }
        return $vehiculos;
    }

    // Obtener solo los vehículos en oferta (disponibles y marcados como oferta)
    public static function getOfertas() {
        $conexion = DrivoDB::connectDB();
        $consulta = "SELECT * FROM flota WHERE disponible = 1 AND oferta = 1";
        $resultado = $conexion->query($consulta);
        
        $vehiculos = [];
        while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
            $vehiculos[] = new Vehiculo(
                $registro->matricula, $registro->marca, $registro->modelo, 
                $registro->motor, $registro->cambios, $registro->traccion, 
                $registro->llantas, $registro->anio, $registro->precio_dia, 
                $registro->imagen, $registro->disponible, $registro->oferta, $registro->id
            );
        }
        return $vehiculos;
    }

    // Obtener un coche por su ID
    public static function getById($id) {
        $conexion = DrivoDB::connectDB();
        $consulta = "SELECT * FROM flota WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $registro = $stmt->fetch(PDO::FETCH_OBJ);
        
        if ($registro) {
            return new Vehiculo(
                $registro->matricula, $registro->marca, $registro->modelo, 
                $registro->motor, $registro->cambios, $registro->traccion, 
                $registro->llantas, $registro->anio, $registro->precio_dia, 
                $registro->imagen, $registro->disponible, $registro->oferta, $registro->id
            );
        }
        return null;
    }

    // Cambiar la disponibilidad de un vehículo (por ejemplo al confirmar una reserva)
    public static function setDisponibilidad($id, $estado) {
        $conexion = DrivoDB::connectDB();
        $consulta = "UPDATE flota SET disponible = :estado WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
