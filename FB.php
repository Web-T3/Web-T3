<?php
if (isset($_GET['filtro'])){
    $filtro= $_GET["filtro"];
    $miConsulta = $nirePDO->prepare("SELECT * FROM Libros WHERE etiquetas LIKE '%$filtro%' AND estado = 'Aprobado'; ");
    // Kontsulta exekutatu
    
    $miConsulta->execute();

}
if (isset($_GET['search'])){
    $busqueda= $_GET["search"];
    $miConsulta = $nirePDO->prepare("SELECT * FROM Libros WHERE titulo LIKE '%$busqueda%' AND estado = 'Aprobado';");
    // Kontsulta exekutatu
    $miConsulta->execute();
    
}
?>