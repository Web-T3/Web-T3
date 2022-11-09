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