<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="CSS/style.css"> -->
    <title>Admininistrazioa Taldeak</title>
</head>
<body>
    <p><a class="button" href="crearG.php">Berria</a></p>
    <table>
        <tr>
            <th>GID</th>
            <th>Irakaslea</th>
            <th>Taldea</th>
            <td></td>
            <td></td>
        </tr>
        <?php
        include 'conn.php';
        // SELECT prestatu
        $query = $conn->query('SELECT * FROM Grupos ORDER BY profesor ASC;');
        if($query->num_rows > 0){
            while($balorea = $query->fetch_assoc()) { 
            ?>
        <tr>
            <td><?= $balorea['gid']; ?></td>
           <td><?= $balorea['profesor']; ?></td>
           <td><?= $balorea['nom_grupo']; ?></td>
           <!-- Aurrerago erabiliko da eliminatzeko edo aldatzeko erregistroa -->
           <td><a class="button" href="aldaketaG.php?gid=<?= $balorea['gid'] ?>">Aldatu</a></td>
           <td><a class="button" href="ezabatuG.php?gid=<?= $balorea['gid'] ?>">Ezabatu</a></td>
        </tr>
        <?php } ?>
    <?php } ?>
    </table>
</body>
</html>