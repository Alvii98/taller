<?php
class SingletonConexion
{
    private static $instance = null;
    private $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'taller');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new SingletonConexion;
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->conn;
    }
}
?>