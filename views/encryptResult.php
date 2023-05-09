<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header('Location: login.html');
    exit;
}

$session_timeout = 5 * 60; // 5 minutos en segundos
if (isset($_SESSION['start_time']) && time() - $_SESSION['start_time'] > $session_timeout) {
    session_unset();
    session_destroy();
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Resultado de Encriptación AES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/css/encryptResult.css">
</head>
<header>
    <div class="logo">
        <p1>Seguridad informática</p1>
    </div>
    <nav>
        <ul>
            <li><a href="../views/encrypt.html" style="color: white">Encriptar</a></li>
            <li><a href="../views/decrypt.html" style="color: white">Desencriptar</a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="container">
        <h1 class="mt-4">Resultado de Encriptación AES</h1>
        <div class="mt-4">
            <h4>Texto cifrado:</h4>
            <textarea class="form-control" rows="4" readonly><?php echo $encryptedData['ciphertext']; ?></textarea>
        </div>
        <div class="mt-4">
            <h4>IV:</h4>
            <textarea class="form-control" rows="4" readonly><?php echo $encryptedData['iv']; ?></textarea>
        </div>
        <div class="mt-4">
            <h4>Clave:</h4>
            <textarea class="form-control" rows="2" readonly><?php echo $key; ?></textarea>
        </div>
        <div class="mt-4">
            <h4>Modo de cifrado:</h4>
            <textarea class="form-control" rows="1" readonly><?php echo $cipherMode; ?></textarea>
        </div>
    </div>
</body>

</html>