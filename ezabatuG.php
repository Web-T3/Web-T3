<?php
// Datu basera konektatu
include "CBD.php";
// Borratu nahi dugun liburuaren kodea lortu
$gid = isset($_REQUEST['gid']) ? $_REQUEST['gid'] : null;
// Preparatu DELETE
$nireKonts = $nirePDO->prepare("DELETE FROM `Grupos` WHERE `gid` = '$gid'");
// Exekutatu sententzia SQL
$nireKonts->execute();
// usuarios.php-era bialdu
header('Location: grupos.php');
?>