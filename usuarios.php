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
            <th>Mail</th>
            <th>Nickname</th>
            <th>Izena</th>
            <th>Abizena</th>
            <th>Pasahitza</th>
            <th>Adina</th>
            <th>Rola</th>
            <th>Taldea</th>
            <th>Lib. Irakurrita</th>
            <td></td>
            <td></td>
        </tr>        
        <tr>
        <?php
        include 'conn.php';
        // SELECT prestatu
        $query = $conn->query('SELECT * FROM Usuarios ORDER BY nickname ASC;');
        if($query->num_rows > 0){
            while($balorea = $query->fetch_assoc()) { 
        ?>
            <td><?= $balorea['mail']; ?></td>
           <td><?= $balorea['nickname']; ?></td>
           <td><?= $balorea['nombre']; ?></td>
           <td><?= $balorea['apellido']; ?></td>
           <td><?= $balorea['contrasenya']; ?></td>
           <td><?= $balorea['edad']; ?></td>
           <td><?= $balorea['rol']; ?></td>
           <td><?= $balorea['grupo']; ?></td>
           <td><?= $balorea['lib_leido']; ?></td>
           <!-- Aurrerago erabiliko da eliminatzeko edo aldatzeko erregistroa -->
           <td><a class="button" href="aldaketa.php?mail=<?= $balorea['mail'] ?>">Aldatu</a></td>
           <td><a class="button" href="ezabatu.php?mail=<?= $balorea['mail'] ?>">Ezabatu</a></td>
        </tr>
        <?php } ?>
    <?php } ?>
    </table>
</body>
</html>