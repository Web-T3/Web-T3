<?php
// Datu basera konektatu
include "dbcon.php";
$titulo= isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
$nirePDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
session_start();
$valM = isset($_SESSION['mail']);
$valN = isset($_SESSION['nickname']);
$valP = isset($_SESSION['contrasenya']);
$valR = isset($_SESSION['rol']);
include "FB.php";
// SELECT prestatu
$nireKonts = $nirePDO->prepare('SELECT * FROM `Libros` WHERE `titulo` = :titulo;');
// Exekutatu kontsulta
$nireKonts->execute(
    [
        'titulo' => $titulo
    ]
);

// Erantzuna lortu
$datuak = $nireKonts->fetch();


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/script.js"></script>
    <title>Liburuak</title>
</head>

<body id="bodyLibro">
    <?php include "header.php";?>
    <!-- Container -->
    <div class="container containerLibro">


        <img class="imgLibroPagina" src="data:<?php echo $datuak['tipo']?>;base64,<?php echo base64_encode($datuak['imagen']);?>">

        <h1 class="tituloLibroPagina"><?php $titulo = explode(",",$datuak['titulo']); echo $titulo[0];?></h1>
        <p class="sinopsisLibroPagina"><?= $datuak['sinopsis'] ?></p>

        <div class="notaLibroPagina">
            <p class="notaPagina">4/5</p>
        </div>

        <div class="comentarios">
        <form action=" " id="frmComment" method="post">
        <div class="row">
            <label> Nombre: </label> <span id="name-info"></span><h1 class="form-field" id="name" type="text" name="user"></h1>
        </div>
        <div class="row">
            <label for="mesg"> Mensaje : <span id="message-info"></span></label>
            <textarea class="form-field" id="message" name="message" rows="4"></textarea>   
        </div>
        <div class="row">
            <input type="hidden" name="add" value="post" />
            <button type="submit" name="submit" id="submit" class="btn-add-comment">Añadir Comentario</button>
        </div>
        </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>

        <div class="nuestrosNombres">
            <p>Iker S.</p>
            <p>Adrian O.</p>
            <p>Erlantz B.</p>
            <p>Gonzalo A.</p>
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