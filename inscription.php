<?php

$error = "";

try {
    $database = new PDO('mysql:host=localhost;dbname=moduleconnexion', 'root', '');
}

catch (Exception $e) {
    die('Erreur: '. $e->getMessage());
}

if(isset($_POST['submit'])) {

    if(!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['mdpconf'])) {

        if($_POST['mdp'] == $_POST['mdpconf']) {

            $login = htmlspecialchars($_POST['login']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $mdp = sha1($_POST['mdp']);

            $request = $database->prepare('INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?,?,?,?)');

            if($request->execute(array($login, $prenom, $nom, $mdp))) {

                header('Location: connexion.php');
            }
        }
    }
    else {
        $error = "Veuillez remplir tous les champs";
    }
}

?>

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
    </div>
</div>
</header>

<main>

<h1>Formulaire d'inscription</h1>

<form class="form" method="post" action="">
    <input type="text" name="login" placeholder="Login" autocomplete="off">
    <input type="text" name="prenom" placeholder="Prénom" autocomplete="off">
    <input type="text" name="nom" placeholder="Nom" autocomplete="off">
    <input type="password" name="mdp" placeholder="Mot de passe" autocomplete="off">
    <input type="password" name="mdpconf" placeholder="Confirmation mot de passe" autocomplete="off">
    <input id="submit_btn" type="submit" name="submit" value="Validation">
</form>

<div class="error">
<?php echo $error; ?>
</div>

</main>

</body>
</html>