<?php

require_once 'conn.php';

$query = $conn->query("SELECT * FROM Usuarios ORDER BY nickname ASC;");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "Erabiltzaileak_" . date('Y-m-d') . ".csv";

    $output = fopen("php://output", "w");
    $fields = array('mail', 'nickname', 'nombre', 'apellido', 'contrasenya', 'edad', 'rol', 'grupo', 'lib_leido');
    fputcsv($output, $fields);


    while($balorea = $query->fetch_assoc()) {
        $lineData = array($balorea['mail'], $balorea['nickname'], $balorea['nombre'], $balorea['apellido'], $balorea['contrasenya'], $balorea['edad'], $balorea['rol'], $balorea['grupo'], $balorea['lib_leido']);
        fputcsv($output, $lineData, $delimiter);
    }

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=' . $filename . '');

    fpassthru($output);
}
exit;
?>