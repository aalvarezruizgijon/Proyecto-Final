<?php
require_once 'DrivoDB.php';
require_once 'Cliente.php';
require_once 'Flota.php';

class Reserva {
    private $id;
    private $id_vehiculo; // FK de Flota
    private $id_user;     // FK de Clientes
    private $fecha_inicio;
    private $fecha_fin;

    function __construct($id=0, $id_vehiculo=0, $id_user=0, $fecha_inicio="", $fecha_fin="") {
        $this->id = $id;
        $this->id_vehiculo = $id_vehiculo;
        $this->id_user = $id_user;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function insert() {
        $conexion = DrivoDB::connectDB();
        $insercion = "INSERT INTO reservas (id_vehiculo, id_user, fecha_inicio, fecha_fin) 
                      VALUES ('$this->id_vehiculo', '$this->id_user', '$this->fecha_inicio', '$this->fecha_fin')";
        $conexion->exec($insercion);
        
        // Al insertar una reserva, actualizamos los contadores del cliente automáticamente
        $actualizarCliente = "UPDATE clientes SET 
                              reservas_actuales = reservas_actuales + 1, 
                              reservas_totales = reservas_totales + 1 
                              WHERE id='$this->id_user'";
        $conexion->exec($actualizarCliente);
        $conexion = null;
    }

    public static function getReservasPorCliente($id_user) {
        $conexion = DrivoDB::connectDB();
        $consulta = $conexion->query("SELECT * FROM reservas WHERE id_user=$id_user");
        $reservas = [];
        while ($reg = $consulta->fetchObject()) {
            $reservas[] = new Reserva($reg->id, $reg->id_vehiculo, $reg->id_user, $reg->fecha_inicio, $reg->fecha_fin);
        }
        return $reservas;
    }

    public function calcularDias() {
    $inicio = new DateTime($this->fecha_inicio);
    $fin = new DateTime($this->fecha_fin);
    $diferencia = $inicio->diff($fin);
    return $diferencia->days;
}

public function getCosteTotal() {
    // Necesitamos el precio del coche asociado
    $coche = Flota::getVehiculoById($this->id_vehiculo);
    return $this->calcularDias() * $coche->getPrecioDia();
}
}