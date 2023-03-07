<?php
session_start();

require '../inc/fonctions.php';
require '../inc/pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $email = htmlentities(trim($_POST['email']));
    $login = htmlentities(trim($_POST['login']));
    $pwd = trim($_POST['pwd']);

    $stmt = $pdo->prepare('INSERT INTO users (login, email, pwd) VALUES (:nom, :email, :pwd)');
    $stmt->execute(array(
        'login' => $login,
        'email' => $email,
        'pwd' => $pwd,
    ));

   echo 'Enregistrement réussi.';
endif;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
</head>

<body>
    <form action="" method="POST" class="connexion">
        <div>
            <label for="login">Pseudo</label>
            <input type="text" name="login" id="login">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="pwq">Mot de passe</label>
            <input type="password" name="pwd" id="pwd">
        </div>
        <div>
            <input type="submit" value="enregistrer">
        </div>
    </form>
</body>

</html>