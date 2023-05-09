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


        // Consultar la base de datos para verificar si el correo ya está en uso
        if ($this->userModel->existeCorreo($correo)) {
            // Mostrar un mensaje de error si el correo ya está en uso
            echo '<script>alert("El correo proporcionado ya está en uso. Por favor utiliza otro."); window.location.href = "../views/register.html";</script>';
            return;
        }

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
            // Obtener el nombre completo del usuario
            $nombreCompleto = $_SESSION['nombre'] . " " . $_SESSION['apellido_paterno'];

            // Iniciar sesión y almacenar el nombre completo en la variable de sesión
            session_start();
            $_SESSION['email'] = $correo;
            $_SESSION['nombre_completo'] = $nombreCompleto;

            // Redirigir al usuario a la página principal
            header("Location: ../views/index.php");
            $_SESSION['start_time'] = time();
            exit();
        } else {
            // Mostrar un mensaje de error si las credenciales son inválidas
            echo '<script>alert("Credenciales inválidas. Por favor, inténtelo de nuevo."); window.location.href = "../views/login.html";</script>';
        }
    }

    /**
     * Cierra la sesión y todos sus datos.
     */
    function cerrarSesion()
    {
        session_start(); // Iniciamos la sesión
        session_unset(); // Borramos las variables de sesión
        session_destroy(); // Destruimos la sesión
        header("Location: ../views/login.html"); // Redirigimos al usuario al login.html
        exit(); // Terminamos el script
    }
}
?>