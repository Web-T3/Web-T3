<?php
// Datu basera konektatu
include "CBD.php";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Borratu nahi dugun liburuaren kodea lortu
$mail = isset($_REQUEST['mail']) ? $_REQUEST['mail'] : null;
// Preparatu DELETE
$nireKonts = $miPDO->prepare("DELETE FROM `Usuarios` WHERE `mail` = '$mail'");
// Exekutatu sententzia SQL
$nireKonts->execute();
// usuarios.php-era bialdu
header('Location: usuarios.php');
?>