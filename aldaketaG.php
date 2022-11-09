<?php
// Aldagaiak
$gid = isset($_REQUEST['gid']) ? $_REQUEST['gid'] : null;
$profesor = isset($_REQUEST['profesor']) ? $_REQUEST['profesor'] : null;
$nom_grupo = isset($_REQUEST['nom_grupo']) ? $_REQUEST['nom_grupo'] : null;

// Datu basera konektatu
include "CBD.php";
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
            <label for="profesor">Irakaslea</label>
            <input id="profesor" type="text" name="profesor" value="<?= $datuak['profesor'] ?>">
        </p>
        <p>
            <label for="nom_grupo">Taldea</label>
            <input id="nom_grupo" type="text" name="nom_grupo" value="<?= $datuak['nom_grupo'] ?>">
        </p>
        <p>
            <input type="hidden" name="gid" value="<?= $gid ?>">
            <input type="submit" value="Aldatu">
        </p>
    </form>
</body>
</html>