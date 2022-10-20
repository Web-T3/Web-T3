<?php
// Aldagaiak
$hostDB = 'wger1dbvpc1.clfizgthaamq.us-east-1.rds.amazonaws.com';
$nombreDB = 'e1webgune';
$usuarioDB = 'admin';
$contrasenyaDB = 'NausicaA';
$mail = isset($_REQUEST['mail']) ? $_REQUEST['mail'] : null;
$nickname = isset($_REQUEST['nickname']) ? $_REQUEST['nickname'] : null;
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
$apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : null;
$contrasenya = isset($_REQUEST['contrasenya']) ? $_REQUEST['contrasenya'] : null;
$edad = isset($_REQUEST['edad']) ? $_REQUEST['edad'] : null;
$rol = isset($_REQUEST['rol']) ? $_REQUEST['rol'] : null;
$grupo = isset($_REQUEST['grupo']) ? $_REQUEST['grupo'] : null;
$libro = isset($_REQUEST['lib_leido']) ? $_REQUEST['lib_leido'] : null;

// Datu basera konektatu
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

// Konprobatu POST-etik datuak datozen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Preparatu UPDATE
    $nireUpdate = $miPDO->prepare("UPDATE `Usuarios` SET `nickname` = '$nickname', `nombre` = '$nombre', `apellido` = '$apellido', `contrasenya` = '$contrasenya', `edad` = '$edad', `rol` = '$rol', `grupo` = $grupo,  `lib_leido` = '$libro' WHERE `mail` = '$mail'");
    // Exekutatu UPDATE datuekin
    $nireUpdate->execute();
    // usuarios.php-ra bialdu
    header('Location: usuarios.php');
} else {
    // Preparatu SELECT
    $nireKonts = $miPDO->prepare('SELECT * FROM `Usuarios` WHERE `mail` = :mail;');
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aldatu</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="nickname">Nickname</label>
            <input id="nickname" type="text" name="nickname" value="<?= $datuak['nickname'] ?>">
        </p>
        <p>
            <label for="nombre">Izena</label>
            <input id="coche" type="text" name="nombre" value="<?= $datuak['nombre'] ?>">
        </p>
        <p>
            <label for="apellido">Abizena</label>
            <input id="apellido" type="text" name="apellido" value="<?= $datuak['apellido'] ?>">
        </p>
        <p>
            <label for="contrasenya">Pasahitza</label>
            <input id="contrasenya" type="text" name="contrasenya" value="<?= $datuak['contrasenya'] ?>">
        </p>
        <p>
            <label for="edad">Adina</label>
            <input id="edad" type="text" name="edad" value="<?= $datuak['edad'] ?>">
        </p>    
        <p>
            <label for="rol">Rola</label>
            <input id="rol" type="text" name="rol" value="<?= $datuak['rol'] ?>">
        </p>
        <p>
            <label for="grupo">Taldea</label>
            <input id="grupo" type="text" name="grupo" value="<?= $datuak['grupo'] ?>">
        </p>
        <p>
            <label for="lib_leido">Liburuak</label>
            <input id="lib_leido" type="text" name="lib_leido" value="<?= $datuak['lib_leido'] ?>">
        </p>
        <p>
            <input type="hidden" name="mail" value="<?= $mail ?>">
            <input type="submit" value="Aldatu">
        </p>
    </form>
</body>
</html>