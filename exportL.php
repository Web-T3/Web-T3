<?php

require_once 'conn.php';

$query = $conn->query("SELECT * FROM Libros ORDER BY titulo DESC;");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "Liburuak_" . date('Y-m-d') . ".csv";

    $output = fopen("php://output", "w");
    $fields = array('titulo', 'escritor', 'sinopsis', 'idiomas', 'formato', 'etiquetas', 'estado');
    fputcsv($output, $fields);


    while($balorea = $query->fetch_assoc()) {
        $lineData = array($balorea['titulo'], $balorea['escritor'], $balorea['sinopsis'], $balorea['idiomas'], $balorea['formato'], $balorea['etiquetas'], $balorea['estado']);
        fputcsv($output, $lineData, $delimiter);
    }

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=' . $filename . '');

    fpassthru($output);
}
exit;
?>