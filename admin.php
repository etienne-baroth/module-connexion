<?php

session_start();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<header>
<div class="head_nav">
    <a href="index.php"><div class="head_logo">
        <img class="logo" src="style/img/logo.png" alt ="logo voyage désert">
    </div></a>
    <div class="head_btn">
        <p><a href="profil.php">Modifier profil</a></p>
        <p><a href="logout.php">Déconnexion</a></p>
    </div>
</div>
</header>

<main>

<?php
$admin = $_SESSION["utilisateur"]["login"];
?>

<h1><?php echo "Bienvenue sur votre page d'$admin";?></h1>

<?php

$database = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');

$table= $database->query('SELECT* FROM utilisateurs');
$tableUsers = $table->fetchAll();

?>

<?php

foreach($tableUsers as $tableUser): ?>

<div class="adminTable">
<table>

    <tr>
        <th>Login</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Password</th>
    </tr>
    <tr>
        <td><?php echo $tableUser["login"]; ?></td>
        <td><?php echo $tableUser["prenom"]; ?></td>
        <td><?php echo $tableUser["nom"]; ?></td>
        <td><?php echo $tableUser["password"]; ?></td>
    </tr>

</table>
</div>

<?php endforeach; ?>

</main>

</body>
</html>