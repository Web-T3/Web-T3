<?php
// Datu basera konektatu
include "CBD.php";
// Borratu nahi dugun liburuaren kodea lortu
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
// Preparatu DELETE
$nireKonts = $nirePDO->prepare("DELETE FROM Libros WHERE `titulo` = '$titulo'");
// Exekutatu sententzia SQL
$nireKonts->execute();
// irakurri.php-era bialdu
header('Location: librosA.php');
?>