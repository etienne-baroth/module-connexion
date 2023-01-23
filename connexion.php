<?php

session_start();

$database = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');

if(isset($_POST['submit'])) {

    if(!empty($_POST['login']) && !empty($_POST['mdp'])) {

        $login = htmlspecialchars($_POST['login']);
        $mdp = sha1($_POST['mdp']);

        $getUser = $database->prepare("SELECT* FROM utilisateurs WHERE login = ? AND password = ?");
        $getUser->execute(array($login, $mdp));

        if($getUser->rowCount() > 0) {
            $_SESSION['login'] = $login;
            $_SESSION['mdp'] = $mdp;
        }
        header('Location: index.php');
    }
    else {
        echo "Votre mot de passe ou pseudo est incorrect";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="style/img/logo.png" alt ="logo voyage désert">
    </div></a>
    <div class="head_btn">
        <p><a href="connexion.php">Se connecter</a></p>
        <p><a href="inscription.php">Nouveau compte</a></p>
        <p><a href="profil.php">Modifier profil</a></p>
    </div>
</div>
</header>

<main>

<h1>Connexion</h1>

<form class="form" method="post" action="">
    <input type="text" name="login" placeholder="Login" autocomplete="off">
    <input type="password" name="mdp" placeholder="Mot de passe" autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Validation">
</form>

</main>

</body>
</html>