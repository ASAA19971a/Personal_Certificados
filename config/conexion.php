<?php
// Inicializando Sesion de Usuario
session_start();
// clase conectar
class Conectar
{
    protected $dbh;

    // Funcion Protegida de cadena conexion
    protected function Conexion()
    {
        try {
            /*  Cadena de conexion */
            $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=proyecto_certificado", "root", ""); //Linea conexion 
            return $conectar;
        } catch (Exception $e) {
            // Error en cadena de conexion
            print "¡Error BD!: " . $e->getMessage() . "</br>";
            die();
        }
    }

    // Funcion para manejar utf8( impedir problemas caracteres especiales)
    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    // Ruta principal del proyecto
    public static function ruta()
    {
        return "http://localhost/Proyectos/CURSOS WEB PHP/Personal_Certificados/";
    }
}