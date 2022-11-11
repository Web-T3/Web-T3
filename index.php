<?php
    include 'dbcon.php';
    // SELECT prestatu
    session_start();
    $miConsulta = $nirePDO->prepare('SELECT * FROM Libros WHERE estado = "Aprobado";');
    // Kontsulta exekutatu
    $miConsulta->execute();
    
    $valM = isset($_COOKIE['sCookie']);
    $valN = isset($_SESSION['nickname']);
    $valP = isset($_SESSION['contrasenya']);
    $valR = isset($_SESSION['rol']);
    if ($_SERVER["REQUEST_METHOD"]!="POST"){ 
        $miConsulta = $nirePDO->prepare('SELECT * FROM Libros WHERE estado = "Aprobado";');
        // Kontsulta exekutatu
        $miConsulta->execute();
    }
    include "FB.php";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/script.js" type="text/javascript"></script>
    <title>Liburuak</title>
</head>

<body class="body">
    <?php include "header.php";?>

    <!-- Container -->
    <div class="container containerIndex">
        <?php foreach ($miConsulta as $clave => $valor): ?>
        <div class="libro">
            <a href="paginaLibro.php?titulo=<?= $valor['titulo'] ?>"><img class="imgLibro" src="data:<?php echo $valor['tipo']?>;base64,<?php echo base64_encode($valor['imagen']);?>"></img></a>

            <a class="tituloLibro" href="paginaLibro.php?titulo=<?= $valor['titulo'] ?>">
                <?php 
                $titulo = explode(",",$valor['titulo']);
                echo $titulo[0];
                ?>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <footer>

        <div class="nuestrosNombres">
            <p>Iker Siles</p>
            <p>Adrian Ocampo</p>
            <p>Erlantz Barriuso</p>
            <p>Gonzalo Azaldegi</p>
        </div>
        <div class="texto">Bigarren Hezkuntzako gazte askok irakurtzeko zaletasuna dugu. Hala ere, liburudendetan
            hainbeste liburu daude, ez dakigula nondik hasi!
            Webgune honetan gaztetxuentzako eta ez hain gaztetxuentzako liburuak daude: arrakastatsuenak…baita gustatu
            ez zaizkigunak ere. Bilatu eta gozatu!</div>


        <a href="mailto:leireirakasle21@gmail.com">
            <p class="mail">leireirakasle21@gmail.com</p>
        </a>

    </footer>
</body>

</html>