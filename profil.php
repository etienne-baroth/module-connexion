<?php

require_once('config.php');

$getUser = $database->prepare('SELECT* FROM utilisateurs');

$getUser->execute();

$user = $getUser->fetch();


if(isset($_POST["submit"])) {

    $newmdp = sha1($_POST['newmdp']);
    $newlogin = htmlspecialchars($_POST['newlogin']);
    $newprenom = htmlspecialchars($_POST['newprenom']);
    $newnom = htmlspecialchars($_POST['newnom']);

    if(!empty($newlogin) && !empty($newprenom) && !empty($newnom) && !empty($newmdp)) {

        $userId = $_SESSION["utilisateur"]["id"];
        $getUser = $database->prepare("UPDATE utilisateurs SET `login` = '$newlogin', `prenom` = '$newprenom', `nom` = '$newnom', `password` = :password WHERE `id`='$userId'");

        $getUser->bindValue(":password", $newmdp);

        $getUser->execute();

        echo "Les modifications sont enregistrées";

    } else {
        echo "Toutes les informations sont nécessaires";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="style/img/logo.png" alt ="logo voyage désert">
    </div></a>
    <div class="head_btn">
        <p><a href="logout.php">Déconnexion</a></p>
    </div>
</div>
</header>

<main>

<h1 id="TitreProfil">Envie de modifier vos informations <?php echo $_SESSION["utilisateur"]["login"] ?> ? Vous pouvez le faire ici</h1>

<div class="modif">
<form class="form" method="post" action="">
    <label for="Nouveau Login">Nouveau Login</label>
    <input type="text" name="newlogin" autocomplete="off">
    <label for="Nouveau Prénom">Nouveau Prénom</label>
    <input type="text" name="newprenom" autocomplete="off">
    <label for="Nouveau Nom">Nouveau Nom</label>
    <input type="text" name="newnom" autocomplete="off">
    <label for="Nouveau Mot de Passe">Nouveau Mot de Passe</label>
    <input type="password" name="newmdp" autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Modifier">
</form>
</div>

</main>

</body>
</html>