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
    <title>Encriptador AES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/AES-encrypt.css">
</head>
<header>
    <div class="logo">
        <p1><a href="../views/index.php">Seguridad informática</a></p1>
    </div>
    <nav>
        <ul>
            <li style="color: #333333">Encriptar</li>
            <li><a href="decrypt.php" style="color: white">Desencriptar</a></li>
        </ul>
    </nav>
</header>

<body>
    <div class="container">
        <h1 class="mt-4">Encriptador AES</h1>
        <form method="post" action="../controllers/selectModeController.php" class="mt-4">
            <div class="form-group">
                <label for="plaintext">Texto plano:</label>
                <textarea class="form-control" name="plaintext" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <label for="key">Clave:</label>
                <input type="text" class="form-control" name="key" required>
            </div>
            <div class="form-group">
                <label for="cipherMode">Modo de cifrado:</label>
                <select class="form-control" name="cipherMode">
                    <option value="CBC">CBC</option>
                    <option value="ECB">ECB</option>
                    <option value="CFB">CFB</option>
                    <option value="OFB">OFB</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="encrypt">Encriptar</button>
        </form>
    </div>
</body>

</html>