<?php
require_once 'drivoDB.php';
require_once 'Vehiculo.php';

class Reserva {
    private $id;
    private $id_vehiculo;
    private $id_cliente;
    private $fecha_reserva;
    private $fecha_inicio;
    private $fecha_fin;
    private $sancion_km;
    private $sancion_tiempo;
    private $precio_total;
    private $estado;

    // No guardada directamente en la tabla, pero útil para mostrar datos
    private $vehiculoAsociado; 

    public function __construct($id_vehiculo, $id_cliente, $fecha_inicio, $fecha_fin, $precio_total, $estado = 'Pendiente', $sancion_km = 0, $sancion_tiempo = 0, $fecha_reserva = null, $id = null) {
        $this->id = $id;
        $this->id_vehiculo = $id_vehiculo;
        $this->id_cliente = $id_cliente;
        $this->fecha_reserva = $fecha_reserva;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->sancion_km = $sancion_km;
        $this->sancion_tiempo = $sancion_tiempo;
        $this->precio_total = $precio_total;
        $this->estado = $estado;
    }

    // --- GETTERS --- //
    public function getId() { return $this->id; }
    public function getIdVehiculo() { return $this->id_vehiculo; }
    public function getIdCliente() { return $this->id_cliente; }
    public function getFechaInicio() { return $this->fecha_inicio; }
    public function getFechaFin() { return $this->fecha_fin; }
    public function getPrecioTotal() { return $this->precio_total; }
    public function getEstado() { return $this->estado; }

    // Método para obtener el objeto Vehiculo de esta reserva
    public function getVehiculo() {
        if ($this->vehiculoAsociado == null) {
            $this->vehiculoAsociado = Vehiculo::getById($this->id_vehiculo);
        }
        return $this->vehiculoAsociado;
    }

    // --- MÉTODOS DE BASE DE DATOS --- //

    // Crear una nueva reserva
    public function insert() {
        $conexion = DrivoDB::connectDB();
        $insercion = "INSERT INTO reservas (id_vehiculo, id_cliente, fecha_inicio, fecha_fin, precio_total, estado) 
                      VALUES (:id_vehiculo, :id_cliente, :fecha_inicio, :fecha_fin, :precio_total, :estado)";
        
        $stmt = $conexion->prepare($insercion);
        $stmt->bindParam(':id_vehiculo', $this->id_vehiculo);
        $stmt->bindParam(':id_cliente', $this->id_cliente);
        $stmt->bindParam(':fecha_inicio', $this->fecha_inicio);
        $stmt->bindParam(':fecha_fin', $this->fecha_fin);
        $stmt->bindParam(':precio_total', $this->precio_total);
        $stmt->bindParam(':estado', $this->estado);

        if ($stmt->execute()) {
            $this->id = $conexion->lastInsertId();
            // Marcar el vehículo como no disponible
            Vehiculo::setDisponibilidad($this->id_vehiculo, 0);
            return true;
        }
        return false;
    }

    // Obtener todas las reservas de un cliente en concreto (mas que nada para el "Mi Perfil")
    public static function getReservasByCliente($id_cliente) {
        $conexion = DrivoDB::connectDB();
        // Ordenamos por fecha de inicio para que salgan primero las más inminentes
        $consulta = "SELECT * FROM reservas WHERE id_cliente = :id_cliente ORDER BY fecha_inicio ASC";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        
        $reservas = [];
        while ($registro = $stmt->fetch(PDO::FETCH_OBJ)) {
            $reservas[] = new Reserva(
                $registro->id_vehiculo, $registro->id_cliente, $registro->fecha_inicio, 
                $registro->fecha_fin, $registro->precio_total, $registro->estado,
                $registro->sancion_km, $registro->sancion_tiempo, $registro->fecha_reserva, $registro->id
            );
        }
        return $reservas;
    }

    // Cancelar una reserva (Pasa el estado a Cancelada y libera el coche)
    public static function cancelar($id_reserva) {
        $conexion = DrivoDB::connectDB();
        
        // Primero obtenemos la reserva para saber qué coche hay que liberar
        $consultaSelect = "SELECT id_vehiculo FROM reservas WHERE id = :id";
        $stmtSelect = $conexion->prepare($consultaSelect);
        $stmtSelect->bindParam(':id', $id_reserva);
        $stmtSelect->execute();
        $registro = $stmtSelect->fetch(PDO::FETCH_OBJ);

        if ($registro) {
            $id_vehiculo = $registro->id_vehiculo;

            // Actualizamos la reserva
            $consultaUpdate = "UPDATE reservas SET estado = 'Cancelada' WHERE id = :id";
            $stmtUpdate = $conexion->prepare($consultaUpdate);
            $stmtUpdate->bindParam(':id', $id_reserva);
            
            if ($stmtUpdate->execute()) {
                // Liberamos el coche
                Vehiculo::setDisponibilidad($id_vehiculo, 1);
                return true;
            }
        }
        return false;
    }
}
?>
