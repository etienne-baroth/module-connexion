<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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

<h1>Formulaire d'inscription</h1>

<form class="form" method="post" action="connexion.php">
    <input type="text" name="login" placeholder="Login">
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="mdp" placeholder="Mot de passe">
    <input type="text" name="mdpconf" placeholder="Confirmation mot de passe">
    <input id="submit_btn" type="submit" name="submit" value="Validation">
</form>

</main>

</body>
</html>