<?php
    include 'CBD.php';
    // SELECT prestatu
    session_start();
    $miConsulta = $nirePDO->prepare('SELECT * FROM Libros WHERE estado = "Aprobado";');
    // Kontsulta exekutatu
    $miConsulta->execute();

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
    <?php include "header.php";?>
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