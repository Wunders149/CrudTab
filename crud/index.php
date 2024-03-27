<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD APP</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <button id="btn"><a href="adduser.php">ADD USER</a></button>
        <div class="container">
            <table>
                <tr id="entete">
                    <td>#</td>
                    <td>NOM</td>
                    <td>PRENOM</td>
                    <td>SEXE</td>
                    <td>FILIERE</td>
                    <td>NIVEAU</td>
                    <td>ACTION</td>
                </tr>
                <?php
                    require 'config.php';
                    $rows=mysqli_query($conn,"SELECT * FROM user");
                    $i=1;
                ?>
                <?php foreach($rows as $row): ?>
                <tr id=<?php echo $row["id"]; ?>>
                    <td><?php echo $i++;?> </td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["gender"]; ?></td>
                    <td><?php echo $row["chec"]; ?></td>
                    <td><?php echo $row["radio"]; ?></td>
                    <td>
                    <a href="edituser.php?id=<?php echo $row["id"]; ?>"><img src="./icone/mode_edit@2x.png"></a>
                    <button type="button" onclick="submitData(<?php echo $row['id']; ?>);"><img src="./icone/delete@2x.png"></button>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
        <?php require 'script.php';?>
    </body>
</html>