<?php
// Aldagaiak
$gid = isset($_REQUEST['gid']) ? $_REQUEST['gid'] : null;
$profesor = isset($_REQUEST['profesor']) ? $_REQUEST['profesor'] : null;
$nom_grupo = isset($_REQUEST['nom_grupo']) ? $_REQUEST['nom_grupo'] : null;

// Datu basera konektatu
include 'dbcon.php';
// Konprobatu POST-etik datuak datozen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Preparatu UPDATE
    $nireUpdate = $nirePDO->prepare("UPDATE `Grupos` SET `profesor` = '$profesor', `nom_grupo` = '$nom_grupo' WHERE `gid` = '$gid'");
    // Exekutatu UPDATE datuekin
    $nireUpdate->execute();
    // usuarios.php-ra bialdu
    header('Location: grupos.php');
} else {
    // Preparatu SELECT
    $nireKonts = $nirePDO->prepare('SELECT * FROM `Grupos` WHERE `gid` = :gid;');
    // Exekutatu kontsulta
    $nireKonts->execute(
        [
            'gid' => $gid
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
    <title>Aldatu Taldeak</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="nickname">Irakaslea</label>
            <input id="nickname" type="text" name="nickname" value="<?= $datuak['profesor'] ?>">
        </p>
        <p>
            <label for="nombre">Taldea</label>
            <input id="coche" type="text" name="nombre" value="<?= $datuak['nom_grupo'] ?>">
        </p>
        <p>
            <input type="hidden" name="gid" value="<?= $gid ?>">
            <input type="submit" value="Aldatu">
        </p>
    </form>
</body>
</html>