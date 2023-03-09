<?php
session_start();

require './inc/pdo.php';
require './inc/fonctions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    // definir mes variables avec ma table
    $title = $_POST['title'];
    $year = $_POST['year'];
    $genres = $_POST['genres'];
    $plot = $_POST['plot'];
    $directors = $_POST['directors'];
    $cast = $_POST['cast'];
    $writers = $_POST['writers'];
    $runtime = $_POST['runtime'];
    $mpaa = $_POST['mpaa'];
    $rating = $_POST['rating'];
    $popularity = $_POST['popularity'];
    $created = date('Y-m-d H:i:s');

    // requete sql d'ajout
    $stmt = 'INSERT INTO movies_full (title, year, genres, plot, directors, cast, writers, runtime, mpaa, rating, popularity, created) VALUES (:title, :year, :genres, :plot, :directors, :cast, :writers, :runtime, :mpaa, :rating, :popularity, :created)';

    $stmt = $conn->prepare($stmt);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':year', $year, PDO::PARAM_STR);
    $stmt->bindValue(':genres', $genres, PDO::PARAM_STR);
    $stmt->bindValue(':plot', $plot, PDO::PARAM_STR);
    $stmt->bindValue(':directors', $directors, PDO::PARAM_STR);
    $stmt->bindValue(':cast', $cast, PDO::PARAM_STR);
    $stmt->bindValue(':writers', $writers, PDO::PARAM_STR);
    $stmt->bindValue(':runtime', $runtime, PDO::PARAM_STR);
    $stmt->bindValue(':mpaa', $mpaa, PDO::PARAM_STR);
    $stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
    $stmt->bindValue(':popularity', $popularity, PDO::PARAM_STR);
    $stmt->bindValue(':created', $created, PDO::PARAM_STR);
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
            <label for="title">Title :</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="year">Year :</label>
            <input type="text" name="year" id="year">
        </div>
        <div>
            <label for="genres">Genres :</label>
            <input type="text" name="genres" id="genres">
        </div>
        <div>
            <label for="plot">plot :</label>
            <input type="text" name="plot" id="plot">
        </div>
        <div>
            <label for="directors">directors :</label>
            <input type="text" name="directors" id="directors">
        </div>
        <div>
            <label for="cast">cast :</label>
            <input type="text" name="cast" id="cast">
        </div>
        <div>
            <label for="writers">writers :</label>
            <input type="text" name="writers" id="writers">
        </div>
        <div>
            <label for="runtime">runtime :</label>
            <input type="text" name="runtime" id="runtime">
        </div>
        <div>
            <label for="mpaa">mpaa :</label>
            <input type="text" name="mpaa" id="mpaa">
        </div>
        <div>
            <label for="rating">rating :</label>
            <input type="text" name="rating" id="rating">
        </div>
        <div>
            <label for="popularity">popularity :</label>
            <input type="text" name="popularity" id="popularity">
        </div>
        <div>
            <input type="submit" value="enregistrer">
        </div>
    </form>
</body>

</html>