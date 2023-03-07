<?php
session_start();

require '../inc/pdo.php';
require '../inc/fonctions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $email = htmlentities(trim($_POST['email']));
    $login = htmlentities(trim($_POST['login']));
    $pwd = trim($_POST['pwd']);
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);


    $stmt = 'INSERT INTO users (login, email, pwd) VALUES (:login, :email, :pwd)';
    $stmt = $conn->prepare($stmt);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':pwd', $hashed_pwd, PDO::PARAM_STR);
    $stmt->execute();


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
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="pwd">
        </div>
        <div>
            <input type="submit" value="enregistrer">
        </div>
    </form>
</body>

</html>