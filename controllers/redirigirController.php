<?php

require_once '../models/UserModel.php';
require_once '../controllers/UserController.php';

$userController = new UserController();

if (isset($_POST['registrarUsuario'])) {
    $userController->registrarUsuario();
} elseif (isset($_POST['iniciarSesion'])) {
    $userController->iniciarSesion();
}

?>