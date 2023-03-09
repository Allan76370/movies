<?php

require './inc/fonctions.php';
require './inc/pdo.php';
require './partials/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = "DELETE FROM movies_full WHERE id = :id";
    $stmt = $conn->prepare($stmt);
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    if ($stmt->execute()) {
        header('Location: index.php');
        exit();
    } else {
        $error = "Une erreur s'est produite lors de la suppression du film.";
        dd($stmt->errorInfo());
    }
}

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
                    <!-- <td> <a href="./edit.php?id=<?= $value['id'] ?>" class="btn">Edit</a> -
                     <a href="<?= $value['id'] ?>"><button class="btn">Suppression</button></a></td> -->
                    <td>
                        <a href="./edit.php?id=<?= $value['id'] ?>" class="btn">Edit</a>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                            <!-- ajout d'une alerte pour confirmer la suppression -->
                            <button type="submit" class="btn" 
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film?')">Supprimer</button>
                        </form>
                    </td>

                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <button> <a href="./ajout.php">Ajoute un film</a> </button>

</div>
<?php
require './partials/footer.php';
?>