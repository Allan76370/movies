<?php

require './inc/fonctions.php';
require './inc/pdo.php';
require './partials/header.php';

?>

<div class="dashboard">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Année</th>
                <th>Genres</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (getMovieLimit(10) as $key => $value) {
            ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['title'] ?></td>
                    <td><?= $value['year'] ?></td>
                    <td><?= $value['genres'] ?></td>
                    <td> <a href="./edit.php?id=<?= $value['id'] ?>" class="btn">Edit</a> - <a href=""><button class="btn">Suppression</button></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require './partials/footer.php';
