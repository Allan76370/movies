<?php 
session_start();

require '../inc/fonctions.php';
require '../inc/pdo.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') :
$email = htmlentities(trim($_POST['email']));
$pwd = trim($_POST['pwd']);

    $requete = 'SELECT * FROM user WHERE email = :email';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':email' , $email, PDO::PARAM_STR);
    $resultat->execute();
    $resultatEmail = $resultat->fetchAll();


    if(!$resultatEmail) : 
        echo 'Votre email n\'est pas enregistré comme utilisateur de notre site.';
        exit();
    else:
        // if(password_verify($pwd, $resultatEmail['pwd'])) :
        $_SESSION['login'] = true;
            header('Location: http://localhost/movies/');
            exit();
        // else: 
            // echo 'Le mot de passe est non valide.';
        // endif;
    endif;
endif;

?>

<style>
    .connexion div{
        margin: 2rem;
    }
</style>

<form action="" method="POST" class="connexion">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" id="pwd">
    </div>
    <div>
        <input type="submit" value="connexion">
    </div>
</form>
