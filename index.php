<?php
// Lister les films
require './inc/fonctions.php';
require './inc/pdo.php';

// $sqlRequest = "SELECT * FROM movies_full WHERE title like '%vadrouille%'";
// $sqlRequest = "SELECT * FROM movies_full WHERE title LIMIT 0,30";
// $resultat = $conn->prepare($sqlRequest);
// $resultat->execute();
// $films = $resultat->fetchAll();
// MIS EN FONCTION !!!!


// dd(getMovieLimit(2));

if (count(getMovieLimit(2)) == 0) {
    echo 'aucun résultat';
} else {
    echo '<div>';
    $i = 1;
    foreach (getMovieLimit(2) as $key => $value) {
        echo 'Film n°' . $i . '<br>';
        echo 'Titre: ' . $value['title'] . '<br>';
        echo 'Genre: ' . $value['genres'] . '<br>';
        echo 'Acteurs: ' . $value['cast'] . '<br>';
        echo '<hr>';
        $i++;
    }
    echo '</div>';
}
