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
    <title>Desencriptar en AES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/AES-decrypt.css">
</head>
<header>
    <div class="logo">
        <p1><a href="../views/index.php">Seguridad informática</a></p1>
    </div>
    <nav>
        <ul>
            <li><a href="encrypt.php" style="color: white">Encriptar</a></li>
            <li style="color: #333333">Desencriptar</li>
        </ul>
    </nav>
</header>

<body>
    <div class="container">
        <h1>Desencriptar en AES</h1>
        <form method="POST" action="../controllers/selectModeController.php">
            <div class="form-group">
                <label for="ciphertext">Texto cifrado:</label>
                <textarea class="form-control" name="ciphertext" id="ciphertext" cols="40" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="key">Clave:</label>
                <input type="text" class="form-control" name="key" id="key" required>
            </div>
            <div class="form-group">
                <label for="iv">IV:</label>
                <input type="text" class="form-control" name="iv" id="iv" required>
            </div>
            <div class="form-group">
                <label for="cipherMode">Modo de cifrado:</label>
                <select class="form-control" name="cipherMode" id="cipherMode">
                    <option value="CBC">CBC</option>
                    <option value="ECB">ECB</option>
                    <option value="CFB">CFB</option>
                    <option value="OFB">OFB</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="decrypt">Desencriptar</button>

        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>