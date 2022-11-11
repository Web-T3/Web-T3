<?php
    include 'dbcon.php';
    // SELECT prestatu
    session_start();
    //Balidazioak
    $valM = isset($_SESSION['mail']);
    $valN = isset($_SESSION['nickname']);
    $valP = isset($_SESSION['contrasenya']);
    $valR = isset($_SESSION['rol']);
    //UPDATE egiteko datuak
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
    $apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : null;
    $edad = isset($_REQUEST['edad']) ? $_REQUEST['edad'] : null;
    $psswdO = isset($_REQUEST['psswdO']) ? $_REQUEST['psswdO'] : null;
    $psswdO2 = isset($_REQUEST['psswdO2']) ? $_REQUEST['psswdO2'] : null;
    $psswdB = isset($_REQUEST['psswdB']) ? $_REQUEST['psswdB'] : null;
    $mail = $_SESSION['mail']; 

    // Konprobatu POST-etik datuak datozen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Konprobatu pasahitza ondo dagoen
    if ($psswdO == $psswdO2) {
        // Preparatu UPDATE
        $nireUpdate = $nirePDO->prepare("UPDATE `Usuarios` SET `nombre` = :nombre, `apellido` = :apellido, `contrasenya` = :contrasenya, `edad` = :edad WHERE `mail` = :mail");
        // Exekutatu UPDATE datuekin
        $nireUpdate->execute(
            [
                'mail' => $mail,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'edad' => $edad,
                'contrasenya' => $psswdB
            ]
        );
        // usuarios.php-ra bialdu
        header('Location: index.php');
    }

} else {
    // Preparatu SELECT
    $nireKonts = $nirePDO->prepare('SELECT * FROM `Usuarios` WHERE `mail` = :mail;');
    // Exekutatu kontsulta
    $nireKonts->execute(
        [
            'mail' => $mail
        ]
    );
}

// Erantzuna lortu
$datuak = $nireKonts->fetch();
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
    <?php include "header.php";?>

    <!-- Container -->
    <div class="container containerPerfil">
        
        <div class="nick">
            <img src="Multimedia/no-profile.jpg" alt="">
            <h1 class="nickname"> <?php echo $_SESSION['nickname'] ?> </h1>
        </div>
        
        <form class="formPerfil" action="" method="post">

            <div class="datosPersonales">
                <h2 class="dpTitulo">Datu Pertsonalak</h2>
                <input name="nombre" class="inputPerfil" type="text" value="<?= $datuak['nombre'] ?>" autocomplete="off">
                <input name="apellido" class="inputPerfil" type="text" value="<?= $datuak['apellido'] ?>" autocomplete="off">
                <input name="edad" class="inputPerfil" type="text" value="<?= $datuak['edad'] ?>" autocomplete="off">
            </div>
    
            <div class="contrasenya">
                <h2 class="contraTitulo">Pasahitza</h2>
                <input name="psswdO" class="inputPerfil" type="password" placeholder="Pasahitza" autocomplete="off">
                <input name="psswdO2" class="inputPerfil" type="password" placeholder="Berriro pasahitza" autocomplete="off">
                <input name="psswdB" class="inputPerfil" type="password" placeholder="Pasahitza zaharra" autocomplete="off">
            </div>
    
            <button type="submit" value="submit">Bidali</button>

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