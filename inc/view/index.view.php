
<?php
// Header, footer echo 'test'
require '../movies/inc/partials/header.php';
?>


<?php
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
        echo 'Résumé: ' . $value['plot'] . '<br>';
        echo '<hr>';
        $i++;
    }
    echo '</div>';
}
?>

<?php
require '../movies/inc/partials/footer.php';
?>