<?php

require_once 'conn.php';

$query = $conn->query("SELECT * FROM Grupos ORDER BY profesor ASC;");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "Taldeak_" . date('Y-m-d') . ".csv";

    $output = fopen("php://output", "w");
    $fields = array('gid', 'profesor', 'nom_grupo');
    fputcsv($output, $fields);


    while($balorea = $query->fetch_assoc()) {
        $lineData = array($balorea['gid'], $balorea['profesor'], $balorea['nom_grupo']);
        fputcsv($output, $lineData, $delimiter);
    }

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=' . $filename . '');

    fpassthru($output);
}
exit;
?>