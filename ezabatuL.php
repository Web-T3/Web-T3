<?php
// Aldagaiak

// Datu basera konektatu
include 'dbcon.php';
// Borratu nahi dugun liburuaren kodea lortu
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
// Preparatu DELETE
echo'hoal';
$miConsulta = $miPDO->prepare('DELETE FROM libros WHERE `titulo` = :titulo');
// Exekutatu sententzia SQL
$miConsulta->execute([
    'titulo' => $titulo
]);
// irakurri.php-era bialdu
header('Location: libros.php');
?>