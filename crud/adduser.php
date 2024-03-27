<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD APP</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <button id="btn"><a href="index.php">Enregistrement</a></button>
        <div id="form">
            <h2>USER</h2>
            <form autocomplete="off" action="" method="post">
                <label for="name">Nom</label>
                <input type="text" id="name" value=""><br>
                <label for="name">Prenom</label>
                <input type="text" id="email" value=""><br>
                <label for="">Sexe</label>
                <select name="" id="gender">
                    <option value="Male">Male</option>
                    <option value="Femele">Femele</option>
                </select>
                <div class="gird">
                    <div id="filiere">
                        <label for="">FILIERE: </label>
                        <input type="checkbox" class="info" value="INFO" /><label for="">INFO</label>
                        <input type="checkbox" class="btp" value="BTP" /><label for="">BTP</label>
                        <input type="checkbox" class="gm" value="GM" /><label for="">GM</label>
                        <input type="checkbox" class="env" value="ENV" /><label for="">ENV</label>
                    </div>
                    <div id="niveau">
                        <label for="">NIVEAU: </label>
                        <input type="radio" class="homme" name="sexe" value="LICENCE" /><label for="">LICENCE</label>
                        <input type="radio" class="femme" name="sexe" value="MASTERS" /><label for="">MASTERS</label>
                    </div>
                </div>
                <button type="button" class="btn" onclick="submitData('insert');">Inserer</button>
            </form>
        </div>
        <?php require 'script.php'?>
    </body>
</html>