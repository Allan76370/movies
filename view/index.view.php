<?php
// Header, footer echo 'test'
require './partials/header.php';
?>
<main>
    <div id="table">
        <p><a href="./dashboard.php">Admin</a></p>
        <?=
        $i = 1;
        foreach (getMovieLimit(2) as $key => $value) {
        ?>
            <?= 'Film n°' . $i . '<br>'; ?>
            <?= 'Titre: ' . $value['title'] . '<br>'; ?>
            <?= 'Genre: ' . $value['genres'] . '<br>'; ?>
            <?= 'Acteurs: ' . $value['cast'] . '<br>'; ?>
            <?= 'Résumé: ' . $value['plot'] . '<br>'; ?>
        <?= '<hr>';
            $i++;
        }
        '</div>';
        ?>

        <?php
        require './partials/footer.php';
        ?>