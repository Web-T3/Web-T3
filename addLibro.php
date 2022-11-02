<?php

//Datu basea hartu
include 'dbcon.php';
//Konprobatu POST-etik hartzen duen datuak
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Aldagaiak
    $titulo = $_POST['titulo'];
    $escritor = $_POST['escritor'];
    $sinopsis = $_POST['sinopsis'];
    $idioma = $_POST['idioma'];
    $formato = $_POST['sl0'];
    $archivo = $_FILES['imagen']['name'];
    $temp = $_FILES['imagen']['tmp_name'];
    $tamaino = $_FILES['imagen']['size'];
    $tipo = $_FILES['imagen']['type'];

    //Balidatuko du argazkia badago
    if ($temp != "") {
    //Orain ikusiko du zein artxibo mota den eta haren tamainua, balidazioak bezalakoak ez badira, errorea emango du
        if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamaino < 2000000))) {
            echo '<div>Artxiboa '.$tipo.' da</div>';
            echo '<div>Artxiboaren tamaina '.$tamaino.' da</div>';
            echo '<div>Error, mesedez sartu jpeg, jpg eta png, eta argazkiaren tamaina izan behar da 2MB baino gutxiago.</div>';
        } else {
    //Errorerik ez badu ematen, orduan sartuko du datu basean argazkia
            $imagen = file_get_contents($temp);
        }
    }

    //Etiketa multiple hartuko du, egiten da aldagaia
    $etiq = '';
    //Sartzen da array batean datuak implode bidez
    $etiq = implode(', ', $_POST['cbox']);
    //Sartu datu basean
    $nireInsert = $nirePDO->prepare('INSERT INTO `Libros` (`titulo`, `escritor`, `sinopsis`, `idiomas`, `formato`, `etiquetas`, `imagen`, `estado`, `tipo`) VALUES (:titulo, :escritor, :sinopsis, :idiomas, :formato, :etiquetas, :imagen, :estado, :tipo)');
    // Exekutatu INSERT datuekin
    $nireInsert->execute(
        array(
            'titulo' => $titulo,
            'escritor' => $escritor,
            'sinopsis' => $sinopsis,
            'idiomas' => $idioma,
            'formato' => $formato,
            'etiquetas' => $etiq,
            'imagen' => $imagen,
            'estado' => "supervision",
            'tipo' => $tipo
        )
    );
    //Bukatzean eramango du index.php
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/addL.css">
    <script src="JS/script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Multimedia/icono_arbol.png">
    <title>Añadir Libro</title>
</head>
<body>
<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <td>
            <tr>
                <br>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" placeholder="Mete titulo en cada idioma.">
                <br>
            </tr>
            <tr>
                <br>
                <label for="escritor">Escritor</label>
                <input type="text" name="escritor" placeholder="Mete escritor/es.">
                <br>
            </tr>
            <tr>
                <br>
                <label for="sinopsis">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" placeholder="Mete una sinopsis breve." style="resize: none"></textarea>
                <br>
            </tr>
            <tr>
                <br>
                <label for="idioma">Idiomas</label>
                <input type="text" name="idioma" placeholder="Mete los idiomas.">
                <br>
            </tr>
            <tr>
                <br>
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
                <br>
            </tr>
            <tr>
                <br>
                <p>Etiquetas</p>
                    <label for="chbx1"><input type="checkbox" id="chbx1" value="Aventura" name="cbox[]">Aventura</label>
                    <label for="chbx2"><input type="checkbox" id="chbx2" value="Ciencia Ficción" name="cbox[]">Ciencia Ficción</label>
                    <label for="chbx3"><input type="checkbox" id="chbx3" value="Acción" name="cbox[]">Acción</label>
                    <label for="chbx4"><input type="checkbox" id="chbx4" value="Hadas" name="cbox[]">Hadas</label>
                    <label for="chbx5"><input type="checkbox" id="chbx5" value="Gótica" name="cbox[]">Gótica</label>
                    <label for="chbx6"><input type="checkbox" id="chbx6" value="Policiaca" name="cbox[]">Policiaca</label>
                    <label for="chbx7"><input type="checkbox" id="chbx7" value="Paranormal" name="cbox[]">Paranormal</label>
                    <label for="chbx8"><input type="checkbox" id="chbx8" value="Distopica" name="cbox[]">Distopica</label>
                    <label for="chbx9"><input type="checkbox" id="chbx9" value="Fantastica" name="cbox[]">Fantastica</label>
                    <label for="chbx10"><input type="checkbox" id="chbx10" value="Comedia" name="cbox[]">Comedia</label>
                    <label for="chbx11"><input type="checkbox" id="chbx11" value="Misterio" name="cbox[]">Misterio</label>
                    <label for="chbx12"><input type="checkbox" id="chbx12" value="Terror" name="cbox[]">Terror</label>
                    <label for="chbx13"><input type="checkbox" id="chbx13" value="Historico" name="cbox[]">Historico</label>
                    <label for="chbx14"><input type="checkbox" id="chbx14" value="Autobiografia" name="cbox[]">Autobiografia</label>
                    <label for="chbx15"><input type="checkbox" id="chbx15" value="Biografia" name="cbox[]">Biografia</label>
                <br>
            </tr>
            <tr>
                <br>
                <label for="imagen">Portada</label>
                <input type="file" id="imagen" name="imagen">
                <br>
            </tr>
            <tr>
                <br>
                <button type="submit" name="addL" value="submit">Enviar</button>
                <br>
            </tr>
        </td>
    </form>
</div>

</body>
</html>