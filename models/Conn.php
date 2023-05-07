<?php
/**
 * Clase para manejar la conexión a la base de datos utilizando el patrón Singleton.
 */
class Conn {
    /**
     * @var Conn La instancia única de la clase Conn.
     */
    private static $instance = null;
    /**
     * @var mysqli La conexión a la base de datos.
     */
    private $conn;

    /**
     * @var string El nombre del host de la base de datos.
     */
    private $host = "localhost";
    /**
     * @var string El nombre de usuario de la base de datos.
     */
    private $user = "root";
    /**
     * @var string La contraseña de la base de datos.
     */
    private $pass = "";
    /**
     * @var string El nombre de la base de datos.
     */
    private $name = "seguridad";

    /**
     * Constructor privado para evitar la creación de instancias de la clase Conn.
     */
    private function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
    }

    /**
     * Método estático para obtener la instancia única de la clase Conn.
     *
     * @return Conn La instancia única de la clase Conn.
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Conn();
        }
        return self::$instance;
    }

    /**
     * Método para obtener la conexión a la base de datos.
     *
     * @return mysqli La conexión a la base de datos.
     */
    public function getConnection() {
        return $this->conn;
    }
}
?>
