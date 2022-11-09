<?php
// Konprobatu POST-etik hartzen dugun
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aldagaiak hartu
    $gid = isset($_REQUEST['gid']) ? $_REQUEST['gid'] : null;
    $profesor = isset($_REQUEST['profesor']) ? $_REQUEST['profesor'] : null;
    $nom_grupo = isset($_REQUEST['nom_grupo']) ? $_REQUEST['nom_grupo'] : null;
    // Datu basearekin konektatu
    include "CBD.php";
    // Preparatu INSERT
    $nireInsert = $nirePDO->prepare('INSERT INTO Grupos (gid, profesor, nom_grupo) VALUES (:gid, :profesor, :nom_grupo)');
    // Exekutatu INSERT datuekin
    $nireInsert->execute(
        array(
            'gid' => '',
            'profesor' => $profesor,
            'nom_grupo' => $nom_grupo
        )
    );
    // Irakurrira eraman
    header('Location: grupos.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sartu Taldeak</title>
</head>
<body>
    <form action="" method="post">
        <p>
            <label for="profesor">Irakaslea</label>
            <input id="profesor" type="text" name="profesor">
        </p>
        <p>
            <label for="nom_grupo">Taldearen izena</label>
            <input id="nom_grupo" type="text" name="nom_grupo">
        </p>
        <p>
            <input type="submit" value="Sartu">
        </p>
    </form>
</body>
</html>