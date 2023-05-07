<?php

require_once '../models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    /**
     * Registra un nuevo usuario utilizando los datos proporcionados en el formulario.
     */
    public function registrarUsuario()
    {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoP'];
        $apellidoMaterno = $_POST['apellidoM'];
        $correo = $_POST['email'];
        $contrasena = $_POST['pwd'];

        // Registrar el nuevo usuario utilizando UserModel
        if ($this->userModel->registrarUsuario($nombre, $apellidoPaterno, $apellidoMaterno, $correo, $contrasena)) {
            // Redirigir al usuario a la página de inicio de sesión si el registro fue exitoso
            header("Location: ../views/login.html");
            exit();
        } else {
            // Mostrar un mensaje de error si el registro falló
            echo "Error al registrar el usuario";
        }

    }

    /**
     * Verifica las credenciales proporcionadas en el formulario y inicia sesión si son válidas.
     */
    public function iniciarSesion()
    {
        // Obtener los datos del formulario
        $correo = $_POST['email'];
        $contrasena = $_POST['pwd'];

        // Verificar las credenciales utilizando UserModel
        if ($this->userModel->validarInicioSesion($correo, $contrasena)) {
            // Iniciar sesión y redirigir al usuario a la página principal si las credenciales son válidas
            session_start();
            $_SESSION['email'] = $correo;
            header("Location: ../views/index.php");
            exit();
        } else {
            // Mostrar un mensaje de error si las credenciales son inválidas
            echo '<script>alert("Credenciales inválidas. Por favor, inténtelo de nuevo.");</script>';
        }
    }
}
?>