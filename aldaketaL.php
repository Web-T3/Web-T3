<?php
// Aldagaiak
include 'dbcon.php';
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
$escritor = isset($_REQUEST['escritor']) ? $_REQUEST['escritor'] : null;
$sinopsis = isset($_REQUEST['sinopsis']) ? $_REQUEST['sinopsis'] : null;
$idiomas = isset($_REQUEST['idiomas']) ? $_REQUEST['idiomas'] : null;
$formato = isset($_REQUEST['formato']) ? $_REQUEST['formato'] : null;
$etiquetas = isset($_REQUEST['etiquetas']) ? $_REQUEST['etiquetas'] : null;
$estado = isset($_REQUEST['estado']) ? $_REQUEST['estado'] : null;
$tipo = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : null;



// Datu basera konektatu

// Konprobatu POST-etik datuak datozen
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $estado = $_POST['estado'];
     
    // Preparatu UPDATE
    $nireUpdate = $nirePDO->prepare("UPDATE `Libros` SET `titulo` = '$titulo', `escritor` = '$escritor', `sinopsis` = '$sinopsis',`idiomas` = '$idiomas',`formato` = '$formato', `etiquetas` = '$etiquetas', `estado` = '$estado', `tipo` = '$tipo' WHERE `titulo` = '$titulo'");
    // Exekutatu UPDATE datuekin
    $nireUpdate->execute();
    // libros.php-ra bialdu
    header('Location: libros.php');
} else {
    
    // Preparatu SELECT
    $nireKonts = $nirePDO->prepare('SELECT * FROM `Libros` WHERE `titulo` = :titulo;');
    // Exekutatu kontsulta
    $nireKonts->execute(
        [
            'titulo' => $titulo
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
    <title>Aldatu Erabiltzaileak</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="titulo">Titulo</label>
            <input id="titulo" type="text" name="titulo" value="<?= $datuak['titulo'] ?>">
        </p>
        <p>
            <label for="escritor">escritor</label>
            <input id="escritor" type="text" name="escritor" value="<?= $datuak['escritor'] ?>">
        </p>
        <p>
            <label for="sinopsis">sinopsis</label>
            <input id="sinopsis" type="text" name="sinopsis" value="<?= $datuak['sinopsis'] ?>">
        </p>
        <p>
            <label for="idiomas">idiomas</label>
            <input id="idiomas" type="text" name="idiomas" value="<?= $datuak['idiomas'] ?>">
        </p>
        <p>
            <label for="formato">formato</label>
            <input id="formato" type="text" name="formato" value="<?= $datuak['formato'] ?>">
        </p>
        <p>
            <label for="etiquetas">etiquetas</label>
            <input id="etiquetas" type="text" name="etiquetas" value="<?= $datuak['etiquetas'] ?>">
        </p>
        <p>
            <label for="estado">estado</label>
            <select name="estado" id="lang">
                <option value="supervision">supervision</option>
                <option value="Aprobado">Aprobado</option>
                <option value="Denegado">Denegado</option>
            </select>
        </p>
        <p>
            <label for="tipo">tipo</label>
            <input id="tipo" type="text" name="tipo" value="<?= $datuak['tipo'] ?>">
        </p>
        <p>
            <input type="hidden" name="titulo" value="<?= $titulo ?>">
            <input type="submit" value="Aldatu">
        </p>
    </form>
</body>
</html>