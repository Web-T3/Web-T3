<?php
// Aldagaiak
$hostDB = 'wger1dbvpc1.clfizgthaamq.us-east-1.rds.amazonaws.com';
$nombreDB = 'e1webgune';
$usuarioDB = 'admin';
$contrasenyaDB = 'NausicaA';
// Datu basera konektatu
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// SELECT prestatu
session_start();
$miConsulta = $miPDO->prepare('SELECT * FROM Libros WHERE estado = "Aprobado";');
// Kontsulta exekutatu
$miConsulta->execute();

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

<body class="body">
   
    <!-- Header -->
    <header>
        <img src="Multimedia/logo.png" alt="Logo" class="logo">
        <div class="rightSide">
            <div class="dropdown">
                <button class='fa fa-filter filtros' style="font-size:35px; color:black">
                    <div class="dropdown-content">
                        <h3>Iragazkiak</h3>
                        <a href="#">Filtro1</a>
                        <a href="#">Filtro2</a>
                        <a href="#">Filtro3</a>
                    </div>
            </div>
            </button>
            <form class="search">
                <input type="text" name="search" id="searchInput" placeholder="Bilatu" autocomplete="off">
                <img src="Multimedia/lupa.png" class="lupa">
            </form>
            <div class="dropdown">
                <img src="Multimedia/no-profile.jpg" alt="" class="profile">
                <div class="dropdown-content">
                    <p>Nickname</p>
                    <a href="#">Añadir Libro</a>
                    <a href="#">Mi Ficha</a>
                    <a href="#">Perfil</a>
                    <a href="#">Admin</a>
                    <a href="#">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Container -->
    <div class="container containerIndex">
        <?php foreach ($miConsulta as $clave => $valor): ?>
        <div class="libro">
            <img class="imgLibro" src="data:<?php echo $valor['tipo']?>;base64,<?php echo base64_encode($valor['imagen']);?>">
                <h3 id="tituloHover"></h3>
                <p id="sinopsisHover"></p>
            </img>

            <p class="tituloLibro">
                <?php 
                $titulo = explode(",",$valor['titulo']);
                echo $titulo[0];
                ?>
            </p>
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