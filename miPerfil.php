<?php
    include 'dbcon.php';
    // SELECT prestatu
    session_start();
    $miConsulta = $nirePDO->prepare('SELECT * FROM Libros WHERE estado = "Aprobado";');
    // Kontsulta exekutatu
    $miConsulta->execute();
    $valM = isset($_SESSION['mail']);
    $valN = isset($_SESSION['nickname']);
    $valP = isset($_SESSION['contrasenya']);
    $valR = isset($_SESSION['rol']);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JS/script.js"></script>
    <title>Profila</title>
</head>

<body class="body">
    <!-- Header -->
    <header class="headerLibro">
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
            <div class="dropdown">
                <img src="Multimedia/no-profile.jpg" alt="" class="profile">
                <div class="dropdown-content">
                <?php
                        if ($_SESSION['rol'] == "invitado") {
                            echo '<p>'.$_SESSION['nickname'].'</p>';
                            echo '<a href="LoginAO1C.php">Erregistratu edo saioa hasi</a>';
                        } else if ($_SESSION['rol'] == "irakaslea") {
                            echo '<p>'.$_SESSION['nickname'].'</p>';
                            echo '<a href="addLibro.php">Bidali liburu berria</a>';
                            echo '<a href="miFicha.php">Zure fitxa</a>';
                            echo '<a href="miPerfil.php">Profila</a>';
                            echo '<a href="admin.php">Admin</a>';
                            echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                        } else if ($_SESSION['rol'] == "ikaslea") {
                            echo '<p>'.$_SESSION['nickname'].'</p>';
                            echo '<a href="addLibro.php">Bidali liburu berria</a>';
                            echo '<a href="miFicha.php">Zure fitxa</a>';
                            echo '<a href="miPerfil.php">Profila</a>';
                            echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                        } else if ($_SESSION['rol'] == "admin") {
                            echo '<p>'.$_SESSION['nickname'].'</p>';
                            echo '<a href="addLibro.php">Bidali liburu berria</a>';
                            echo '<a href="miFicha.php">Zure fitxa</a>';
                            echo '<a href="miPerfil.php">Profila</a>';
                            echo '<a href="admin.php">Admin</a>';
                            echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Container -->
    <div class="container containerPerfil">

        <div class="nick">
            <img src="Multimedia/no-profile.jpg" alt="">
            <h1 class="nickname"> Nickname </h1>
        </div>
        
        <div class="datosPersonales">
            <h2 class="dpTitulo">Datu Pertsonalak</h2>
            <input class="inputPerfil" type="text" placeholder="Izena" autocomplete="off">
            <input class="inputPerfil" type="text" placeholder="Abizena" autocomplete="off">
            <input class="inputPerfil" type="text" placeholder="Adina" autocomplete="off">
        </div>

        <div class="contrasenya">
            <h2 class="contraTitulo">Pasahitza</h2>
            <input class="inputPerfil" type="password" placeholder="Pasahitza" autocomplete="off">
            <input class="inputPerfil" type="password" placeholder="Berriro pasahitza" autocomplete="off">
            <input class="inputPerfil" type="password" placeholder="Pasahitza zaharra" autocomplete="off">
        </div>

        <!-- <button> Bidali</button> -->


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