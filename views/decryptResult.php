<!DOCTYPE html>
<html>
<head>
    <title>Resultado de desencriptación AES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/css/decryptResult.css">
</head>
<header>
    <div class="logo">
        <p1>Seguridad informatica</p1>
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
        <h1 class="mt-4">Resultado de desencriptación AES</h1>
        <div class="mt-4">
            <h4>Texto descifrado:</h4>
            <textarea class="form-control" rows="2" readonly><?php echo $decryptedText; ?></textarea>
        </div>
    </div>
</body>
</html>