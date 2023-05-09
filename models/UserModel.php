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
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $apellidoPaterno = filter_var($apellidoPaterno, FILTER_SANITIZE_STRING);
        $apellidoMaterno = filter_var($apellidoMaterno, FILTER_SANITIZE_STRING);
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);

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
     * Verifica si un correo electrónico ya está registrado en la base de datos.
     *
     * @param string $correo El correo electrónico a verificar.
     * @return bool True si el correo electrónico ya está registrado, false en caso contrario.
     */
    public function existeCorreo($correo)
    {
        // Filtrar los datos de entrada
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        // Preparar la consulta SQL
        $stmt = $this->conn->prepare("SELECT correo FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);

        // Ejecutar la consulta y obtener el resultado
        $stmt->execute();
        $stmt->store_result();
        $numRows = $stmt->num_rows;

        // Retornar true si el correo electrónico ya está registrado, false en caso contrario
        if ($numRows > 0) {
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
        // Filtrar los datos de entrada
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
        
        // Preparar la consulta para obtener la información del usuario
        $stmt = $this->conn->prepare("SELECT id_usuario, nombre, apellido_paterno, apellido_materno, correo, contrasena FROM usuarios WHERE correo = ?");
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
        $apellidoPaterno = $fila['apellido_paterno'];
        $apellidoMaterno = $fila['apelido_materno'];
        $correo = $fila['correo'];
        $contrasena_encriptada = $fila['contrasena'];

        // Verificar si la contraseña es correcta
        if (password_verify($contrasena, $contrasena_encriptada)) {
            // Iniciar sesión
            session_start();
            $_SESSION['id_usuario'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido_paterno'] = $apellidoPaterno;
            $_SESSION['apellido_materno'] = $apellidoMaterno;
            $_SESSION['correo'] = $correo;
            return true;
        } else {
            return false;
        }
    }

}
?>