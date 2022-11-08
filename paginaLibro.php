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
    <title>Liburuak</title>
</head>

<body id="bodyLibro">
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
                <?php
                        if ($_SESSION['rol'] == "invitado" || $_SESSION['rol'] == "") {
                            echo '<p>'.$_SESSION['nickname'].'</p>';
                            echo '<a href="LoginAO1C.php">Erregistratu edo saioa hasi</a>';
                        } else if ($_COOKIE['rolCookie'] == "irakaslea") {
                            echo '<p>'.$_COOKIE['erabCookie'].'</p>';
                            echo '<a href="addLibro.php">Bidali liburu berria</a>';
                            echo '<a href="miFicha.php">Zure fitxa</a>';
                            echo '<a href="miPerfil.php">Profila</a>';
                            echo '<a href="admin.php">Admin</a>';
                            echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                        } else if ($_COOKIE['rolCookie'] == "ikaslea") {
                            echo '<p>'.$_COOKIE['erabCookie'].'</p>';
                            echo '<a href="addLibro.php">Bidali liburu berria</a>';
                            echo '<a href="miFicha.php">Zure fitxa</a>';
                            echo '<a href="miPerfil.php">Profila</a>';
                            echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                        } else if ($_COOKIE['rolCookie'] == "admin") {
                            echo '<p>'.$_COOKIE['erabCookie'].'</p>';
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
    <div class="container containerLibro">


        <img class="imgLibroPagina" src="/Multimedia/Libros/El_diario_de_greg.jpg" alt="">

        <h1 class="tituloLibroPagina">El Diario de Greg</h1>
        <p class="sinopsisLibroPagina">Greg Heffley es casi adolescente, está en el instituto y tiene un amigo, un
            auténtico cretino llamado Rowley Jefferson, y aunque Greg quiera conseguir una novia o parecer guay su amigo
            siempre se lo fastidia. Greg dice que este no es un típico diario, simplemente sus memorias. Tenía un
            hermano mayor llamado Rodrick, muy pesado y siempre le quería hacer la vida imposible a Greg y para rematar
            un hermanito pequeño de lo más mimado y ese se llamaba Manny. En el instituto había una maldición sobre un
            queso; quien lo tocara, tendría “la maldición del queso”. Greg y Rowley en Halloween molestaron a unos
            adolescentes. Pasado un tiempo Greg y Rowley se estaban “peleando”, los chicos mayores los pillaron y a
            Rowley le hicieron tragarse la loncha del queso maldito. Al día siguiente la gente se enteró de que el queso
            no estaba allí y por deducciones casi culpaban a Rowley pero Greg, le defendió de “la maldición” y al final
            se reconciliaron. Desde entonces, en el instituto le tenían mucho asco.</p>

        <div class="notaLibroPagina">
            <p class="notaPagina">4/5</p>
        </div>

        <div class="comentarios"></div>


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