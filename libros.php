<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/style.css"> -->
    <title>Admininistrazioa Erabiltzaileak</title>
</head>
<body>
    <table>
        <tr>
            <th>Titulua</th>
            <th>Idazlea</th>
            <th>Sinopsia</th>
            <th>Lenguaiak</th>
            <th>Formatua</th>
            <th>Etiketak</th>
            <th>Irudia</th>
            <th>Egoera</th>
            <th>Mota</th>
            <td></td>
            <td></td>
        </tr>
        <?php
        include 'conn.php';
        // SELECT prestatu
        $query = $conn->query('SELECT * FROM Libros ORDER BY titulo ASC;');
        if($query->num_rows > 0){
            while($balorea = $query->fetch_assoc()) { ?>
        <tr>
            <td><?= $balorea['titulo']; ?></td>
           <td><?= $balorea['escritor']; ?></td>
           <td><?= $balorea['sinopsis']; ?></td>
           <td><?= $balorea['idiomas']; ?></td>
           <td><?= $balorea['formato']; ?></td>
           <td><?= $balorea['etiquetas']; ?></td>
           <td><img src="data:image/png;base64,<?php echo base64_encode($balorea['imagen']); ?>" alt="argazkia" width="120" height="180" /></td>
           <td><?= $balorea['estado']; ?></td>
           <td><?= $balorea['tipo']; ?></td>
           <!-- Aurrerago erabiliko da eliminatzeko edo aldatzeko erregistroa -->
           <td><a class="button" href="aldaketaL.php?titulo=<?= $balorea['titulo'] ?>">Aldatu</a></td>
           <td><a class="button" href="ezabatuL.php?titulo=<?= $balorea['titulo'] ?>">Ezabatu</a></td>
        </tr>
        <?php } ?>
    <?php } ?>
    </table>
</body>
</html>