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
$codigo = isset($_REQUEST['nickname']) ? $_REQUEST['nickname'] : null;
// Preparatu DELETE
$miConsulta = $miPDO->prepare('DELETE FROM Usuarios WHERE nickname = :nickname');
// Exekutatu sententzia SQL
$miConsulta->execute([
    'nickname' => $nickname
]);
// irakurri.php-era bialdu
header('Location: usuarios.php');
?>