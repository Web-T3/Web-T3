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
    <title>Liburu bat gehitu</title>
</head>

<body class="body">
    <!-- Header -->
    <header class="headerLibro">
        <img src="Multimedia/logo.png" alt="Logo" class="logo">
        <div class="rightSide" id="rightSideFicha">
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
        </div>
    </header>

    <!-- Container -->
    <div class="container containerAddLibro">

        <h1>Añadir un nuevo libro</h1>

        <!-- Formulario  -->
        <form action="addLibroF.php" method="post" enctype="multipart/form-data">

            <!-- Titulo -->
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" placeholder="Mete titulo en cada idioma.">
            </div>

            <!-- Nombre del autor -->
            <div>
                <label for="escritor">Escritor</label>
                <input type="text" name="escritor" placeholder="Mete escritor/es.">
            </div>

            <!-- Sinopsis -->
            <div>
                <label for="sinopsis">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" placeholder="Mete una sinopsis breve."
                    style="resize: none"></textarea>
            </div>

            <!-- Idiomas -->
            <div>
                <label for="idioma">Idiomas</label>
                <input type="text" name="idioma" placeholder="Mete los idiomas.">
            </div>

            <!-- Formato -->
            <div>
                <label for="formato">Formato</label>
                <select name="sl0" id="formato">
                    <option value="Novela">Novela</option>
                    <option value="Novela Juvenil">Novela Juvenil</option>
                    <option value="Libro Infantil">Libro Infantil</option>
                    <option value="Diario">Diario</option>
                    <option value="Manga">Manga</option>
                    <option value="Comic">Comic</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <!-- Etiquetas -->
            <div>
                <p>Etiquetas</p>
                <div class="etiquetas">
                    <label for="chbx1"><input type="checkbox" id="chbx1" value="Aventura" name="cbox[]">Aventura</label>
                    <label for="chbx2"><input type="checkbox" id="chbx2" value="Ciencia Ficción" name="cbox[]">C.
                        Ficción</label>
                    <label for="chbx3"><input type="checkbox" id="chbx3" value="Acción" name="cbox[]">Acción</label>
                    <label for="chbx4"><input type="checkbox" id="chbx4" value="Hadas" name="cbox[]">Hadas</label>
                    <label for="chbx5"><input type="checkbox" id="chbx5" value="Gótica" name="cbox[]">Gótica</label>
                    <label for="chbx6"><input type="checkbox" id="chbx6" value="Policiaca"
                            name="cbox[]">Policiaca</label>
                    <label for="chbx7"><input type="checkbox" id="chbx7" value="Paranormal"
                            name="cbox[]">Paran.</label>
                    <label for="chbx8"><input type="checkbox" id="chbx8" value="Distopica"
                            name="cbox[]">Distopica</label>
                    <label for="chbx9"><input type="checkbox" id="chbx9" value="Fantastica"
                            name="cbox[]">Fantastica</label>
                    <label for="chbx10"><input type="checkbox" id="chbx10" value="Comedia" name="cbox[]">Comedia</label>
                    <label for="chbx11"><input type="checkbox" id="chbx11" value="Misterio"
                            name="cbox[]">Misterio</label>
                    <label for="chbx12"><input type="checkbox" id="chbx12" value="Terror" name="cbox[]">Terror</label>
                    <label for="chbx13"><input type="checkbox" id="chbx13" value="Historico"
                            name="cbox[]">Historico</label>
                    <label for="chbx14"><input type="checkbox" id="chbx14" value="Autobiografia"
                            name="cbox[]">Autobiografia</label>
                    <label for="chbx15"><input type="checkbox" id="chbx15" value="Biografia"
                            name="cbox[]">Biografia</label>
                </div>
            </div>

            <!-- Imagen de la portada -->
            <div>
                <label for="imagen">Portada</label>
                <input type="file" id="imagen" name="imagen">
            </div>

            <!-- Boton enviar -->
            <button type="submit" name="addL" value="submit">Bidali</button>

        </form>



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