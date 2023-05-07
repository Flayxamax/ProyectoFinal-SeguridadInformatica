<?php
require_once 'Conn.php';

class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conn::getInstance()->getConnection();
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     *
     * @param string $nombre El nombre del usuario.
     * @param string $apellidoPaterno El apellido paterno del usuario.
     * @param string $apellidoMaterno El apellido materno del usuario.
     * @param string $correo El correo electrónico del usuario.
     * @param string $contrasena La contraseña del usuario.
     * @return bool True si el usuario se registró exitosamente, false en caso contrario.
     */
    public function registrarUsuario($nombre, $apellidoPaterno, $apellidoMaterno, $correo, $contrasena)
    {
        // Encriptar la contraseña antes de almacenarla en la base de datos
        $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        // Preparar la consulta SQL
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, correo, contrasena) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $correo, $contrasenaEncriptada);

        // Ejecutar la consulta y verificar si tuvo éxito
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Verifica si las credenciales de un usuario son válidas para iniciar sesión.
     *
     * @param string $correo El correo electrónico del usuario.
     * @param string $contrasena La contraseña del usuario (en texto plano).
     * @return bool True si las credenciales son válidas, false en caso contrario.
     */
    public function validarInicioSesion($correo, $contrasena)
    {
        // Preparar la consulta para obtener la información del usuario
        $stmt = $this->conn->prepare("SELECT id_usuario, nombre, correo, contrasena FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verificar si se encontró un usuario con el correo especificado
        if ($resultado->num_rows == 0) {
            return false;
        }

        // Obtener los datos del usuario
        $fila = $resultado->fetch_assoc();
        $id = $fila['id_usuario'];
        $nombre = $fila['nombre'];
        $correo = $fila['correo'];
        $contrasena_encriptada = $fila['contrasena'];

        // Verificar si la contraseña es correcta
        if (password_verify($contrasena, $contrasena_encriptada)) {
            // Iniciar sesión
            session_start();
            $_SESSION['id_usuario'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['correo'] = $correo;
            return true;
        } else {
            return false;
        }
    }

}
?>