<?php
require_once 'drivoDB.php';

class Cliente {
    private $id;
    private $usuario;
    private $passw;
    private $email;
    private $nombre;
    private $apellidos;
    private $rol;
    private $fecha_registro;

    public function __construct($usuario = "", $passw = "", $email = "", $nombre = "", $apellidos = "", $rol = "cliente", $id = null, $fecha_registro = null) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->passw = $passw;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->rol = $rol;
        $this->fecha_registro = $fecha_registro;
    }

    // --- GETTERS & SETTERS ---
    public function getId() { return $this->id; }
    public function getUsuario() { return $this->usuario; }
    public function getEmail() { return $this->email; }
    public function getNombre() { return $this->nombre; }
    public function getApellidos() { return $this->apellidos; }
    public function getRol() { return $this->rol; }

    // --- MÉTODOS DE BASE DE DATOS (CRUD y utilidades) --- //

    // Método para registrar un nuevo cliente
    public function insert() {
        $conexion = DrivoDB::connectDB();
        // Usamos sentencias preparadas para evitar Inyección SQL (¡Súper importante en los proyectos!)
        $insercion = "INSERT INTO clientes (usuario, passw, email, nombre, apellidos, rol) 
                      VALUES (:usuario, :passw, :email, :nombre, :apellidos, :rol)";
        
        $stmt = $conexion->prepare($insercion);
        
        // Hasheamos la contraseña antes de guardarla por seguridad
        $hashPass = password_hash($this->passw, PASSWORD_BCRYPT);

        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':passw', $hashPass);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellidos', $this->apellidos);
        $stmt->bindParam(':rol', $this->rol);

        try {
            $stmt->execute();
            $this->id = $conexion->lastInsertId();
            return true;
        } catch (PDOException $e) {
            // Manejar error de duplicados (email o usuario) u otros
            error_log("Error al insertar cliente: " . $e->getMessage());
            return false;
        }
    }

    // Método para comprobar el login usando password_verify
    public static function login($usuario, $password) {
        $conexion = DrivoDB::connectDB();
        $consulta = "SELECT * FROM clientes WHERE usuario = :usuario OR email = :usuario";
        
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        
        $registro = $stmt->fetch(PDO::FETCH_OBJ);
        
        // Si el usuario existe y la contraseña coincide
        if ($registro && password_verify($password, $registro->passw)) {
            return new Cliente($registro->usuario, $registro->passw, $registro->email, 
                               $registro->nombre, $registro->apellidos, $registro->rol, 
                               $registro->id, $registro->fecha_registro);
        }
        return false;
    }

    // Obtener un cliente por su ID
    public static function getClienteById($id) {
        $conexion = DrivoDB::connectDB();
        $consulta = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $registro = $stmt->fetch(PDO::FETCH_OBJ);
        
        if ($registro) {
            return new Cliente($registro->usuario, $registro->passw, $registro->email, 
                               $registro->nombre, $registro->apellidos, $registro->rol, 
                               $registro->id, $registro->fecha_registro);
        }
        return null;
    }
}
?>
