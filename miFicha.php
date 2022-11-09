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
    <title>Nire info</title>
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
                <?php
                        if ($_SESSION['rol'] == "invitado" || $_SESSION['rol'] == "") {
                            if ($_SESSION['rol'] == "") {
                                echo '<p>inv</p>';
                                echo '<a href="LoginAO1C.php">Erregistratu edo saioa hasi</a>';
                            } else {
                                echo '<p>'.$_SESSION['nickname'].'</p>';
                                echo '<a href="LoginAO1C.php">Erregistratu edo saioa hasi</a>';
                            }
                        } else if ($_SESSION['rol'] == "irakaslea") {
                            echo '<p>'.$_SESSION['nickname'].'</p>';
                            echo '<a href="addLibro.php">Bidali liburu berria</a>';
                            echo '<a href="miFicha.php">Zure fitxa</a>';
                            echo '<a href="miPerfil.php">Profila</a>';
                            echo '<a href="admin.html">Admin</a>';
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
                            echo '<a href="admin.html">Admin</a>';
                            echo '<a href="LoginAO1C.php">Saioa itxi</a>';
                        }
                    ?>
            </div>
        </div>
    </header>

    <!-- Container -->
    <div class="container containerMiPerfil">

        <!-- Libros leidos -->
        <h1 id="tituloLibrosLeidos">Irakurritako Liburuak</h1>
        <div class="containerLibrosLeidos">


            <div class="libros">
                <img src="Multimedia/Libros/El_diario_de_greg.jpg" />
                <p class="tituloLibro" id="libro">
                    El Diario de Greg
                </p>
            </div>

            <div class="libros">
                <div>Imagen</div>
                <p class="tituloLibro" id="libro">
                    Titulo
                </p>
            </div>

            <div class="libros">
                <div>Imagen</div>
                <p class="tituloLibro" id="libro">
                    Titulo
                </p>
            </div>

            <div class="libros">
                <div>Imagen</div>
                <p class="tituloLibro" id="libro">
                    Titulo
                </p>
            </div>

            <div class="libros">
                <div>Imagen</div>
                <p class="tituloLibro" id="libro">
                    Titulo
                </p>
            </div>


        </div>

        <!-- Reseñas -->
        <h1 class="tituloReseñas">Aipamenak</h1>
        <div class="containerReseñas">

            <div class="comentario">
                <p>4/5<span>El Diario de Greg</span></p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, nam! Beatae explicabo itaque in odio
                    fuga veritatis eum. Impedit ea sequi hic temporibus excepturi enim beatae aliquid ipsa, distinctio
                    corporis.
                    Laboriosam tempore fugit non? Quis deleniti perspiciatis magni nam natus dolorem quidem
                    exercitationem necessitatibus eos, repellat quisquam voluptatum dolor accusantium veritatis beatae
                    officia consectetur nesciunt, non dolorum esse praesentium quos!</p>
            </div>

            <div class="comentario">
                <p>5/5<span>El Capitan Calzoncillo</span></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae, quas totam. Sunt, reiciendis autem?
                    Suscipit culpa quia quae explicabo. Quos perspiciatis eum nisi id modi nam vitae iure error culpa.
                    <p>
            </div>

            <div class="comentario">
                <p>2/5<span>La Rosa de Guadalupe</span></p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum perspiciatis doloremque eum cupiditate
                    ut pariatur quos mollitia tempore dicta dignissimos nostrum eos magnam inventore vel aspernatur,
                    corporis amet odit laborum!
                    Suscipit, cumque assumenda atque in deserunt ipsa molestias iure vero eum beatae nisi voluptates
                    nesciunt quibusdam doloremque corrupti? Et modi repellendus quo voluptatibus numquam rem error
                    maxime dolorum natus nesciunt!
                    Ea placeat non sunt consectetur iusto at unde quaerat perferendis provident ad dolorum, fuga dicta
                    maiores vel expedita facere debitis nihil voluptate ipsam vitae ducimus exercitationem aliquid hic!
                    Consequatur, in.</p>
            </div>



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