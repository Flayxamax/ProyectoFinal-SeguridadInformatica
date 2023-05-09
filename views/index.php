<?php
session_start();
?>
<!doctype html>
<html lang="es">

<head>
    <title>Seguridad informatica</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
    <link rel=" stylesheet" type="text/css" href="../views/css/index.css">
</head>

<body>
    <header>
        <div class="logo">
            <p1>Seguridad informatica</p1>
        </div>
        <nav>
            <ul>
                <li style="color: white">Bienvenido,
                    <?php echo $_SESSION['nombre_completo']; ?>
                </li>
                <li><a href="../views/login.html" style="color: white">Salir</a>
                </li>
            </ul>
        </nav>
    </header>

    <div id="contenedor">
        <div id="banner">
            <div class="banner-texto">
                <h1>Encriptador/Desencriptador de texto</h1>
                <p>Encripta y desencripta cualquier texto ;)</p>
                <br>
                <a href="../views/encrypt.html" style="background-color: #1f7765;"
                    class="btn btn-success btn-block">Encriptar</a>
                <a href="../views/decrypt.html" style="background-color: #1f7765;"
                    class="btn btn-success btn-block">Desencriptar</a>
            </div>
            <div class="banner-image">
                <img id="slide" src="../views/img/encriptacion.png" alt="Imagen del banner">
            </div>
        </div>
    </div>



    <div id="contenido">
        <main>
            <div class="main-image">
                <img src="../views/img/aes (Custom).png" alt="Descripción de la imagen">
            </div>
            <h2>Definición</h2>
            <p>En este trabajo se estará realizando una página Web que denote un algoritmo de encriptación, con el fin
                de que los involucrados en el desarrollo de este trabajo aprendan a utilizar algoritmos de encriptación
                y saber cómo implementarlos en cualquier proyecto.</p>
            <br>
            <p> En este caso, el equipo tomó la decisión de utilizar el algoritmo de encriptación AES para el trabajo,
                ya que todos han trabajado con este anteriormente y, de una u otra forma, ya están familiarizados con la
                forma en que se emplea y todas las características importantes que conlleva este algoritmo, para así
                poder darle el mejor provecho a todas sus cualidades en la página Web.</p>
            <br>
            <p>
                Nuestro reporte llevará a cabo una especie de bitácora, donde mostraremos un poco de información sobre
                los aspectos generales del algoritmo AES, el proceso que llevemos a cabo para realizar la página con él,
                los retos, obstáculos, además de contar las satisfacciones y/o frustraciones que experimentemos a lo
                largo del desarrollo de este proyecto.</p>
            <hr>

            <div class="main-image">
                <img src="../views/img/aes (Custom).png" alt="Descripción de la imagen">
            </div>
            <h2>Definición</h2>
            <p>En este trabajo se estará realizando una página Web que denote un algoritmo de encriptación, con el fin
                de que los involucrados en el desarrollo de este trabajo aprendan a utilizar algoritmos de encriptación
                y saber cómo implementarlos en cualquier proyecto.</p>
            <br>
            <p> En este caso, el equipo tomó la decisión de utilizar el algoritmo de encriptación AES para el trabajo,
                ya que todos han trabajado con este anteriormente y, de una u otra forma, ya están familiarizados con la
                forma en que se emplea y todas las características importantes que conlleva este algoritmo, para así
                poder darle el mejor provecho a todas sus cualidades en la página Web.</p>
            <br>
            <p>
                Nuestro reporte llevará a cabo una especie de bitácora, donde mostraremos un poco de información sobre
                los aspectos generales del algoritmo AES, el proceso que llevemos a cabo para realizar la página con él,
                los retos, obstáculos, además de contar las satisfacciones y/o frustraciones que experimentemos a lo
                largo del desarrollo de este proyecto.</p>
            <hr>
        </main>
    </div>
    <script src="../views/js/script_slide_img.js"></script>

    <footer>
        <div class="footer-info">
            <p>Proyecto final: Seguridad informatica</p>
            <p>Equipo: Marchena</p>
        </div>
    </footer>

</body>

</html>