<?php
// Aldagaiak
$hostDB = 'wger1dbvpc1.clfizgthaamq.us-east-1.rds.amazonaws.com';
$nombreDB = 'e1webgune';
$usuarioDB = 'admin';
$contrasenyaDB = 'NausicaA';
// Datu basera konektatu
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
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