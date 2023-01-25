<?php

session_start();

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

<h1>Modifier son profil</h1>

<form class="form" method="post" action="">
    <input type="text" name="newlogin" placeholder=<?php echo $_SESSION["utilisateur"]["login"]; ?>>
    <input type="text" name="newprenom" placeholder=<?php echo $_SESSION["utilisateur"]["prenom"]; ?>>
    <input type="text" name="newnom" placeholder=<?php echo $_SESSION["utilisateur"]["nom"]; ?>>
    <input type="password" name="newmdp" placeholder=" Nouveau mot de passe">
    <input type="password" name="newmdpconf" placeholder="Confirmation nouveau mot de passe">
    <input id="submit_btn" type="submit" name="submit" value="Validation">
</form>

</main>

</body>
</html>