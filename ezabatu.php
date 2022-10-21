<?php
include 'dbcon.php';
// Borratu nahi dugun liburuaren kodea lortu
$mail = isset($_REQUEST['mail']) ? $_REQUEST['mail'] : null;
// Preparatu DELETE
$nireKonts = $nirePDO->prepare("DELETE FROM `Usuarios` WHERE `mail` = '$mail'");
// Exekutatu sententzia SQL
$nireKonts->execute();
// usuarios.php-era bialdu
header('Location: usuarios.php');
?>