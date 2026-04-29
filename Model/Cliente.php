<?php
require_once 'DrivoDB.php';

class Cliente {
    private $id;
    private $user;
    private $passw;
    private $reservas_actuales;
    private $reservas_totales;

    function __construct($id=0, $user="", $passw="", $reservas_actuales=0, $reservas_totales=0) {
        $this->id = $id;
        $this->user = $user;
        $this->passw = $passw;
        $this->reservas_actuales = $reservas_actuales;
        $this->reservas_totales = $reservas_totales;
    }

    public static function getClienteById($id) {
        $conexion = DrivoDB::connectDB();
        $consulta = $conexion->query("SELECT * FROM clientes WHERE id=$id");
        if ($reg = $consulta->fetchObject()) {
            return new Cliente($reg->id, $reg->user, $reg->passw, $reg->reservas_actuales, $reg->reservas_totales);
        }
        return false;
    }

    public static function login($usuario, $password) {
    $conexion = DrivoDB::connectDB();
    $consulta = $conexion->query("SELECT * FROM clientes WHERE user='$usuario' AND passw='$password'");
    if ($reg = $consulta->fetchObject()) {
        return new Cliente($reg->id, $reg->user, $reg->passw, $reg->reservas_actuales, $reg->reservas_totales);
    }
    return false;
}
}