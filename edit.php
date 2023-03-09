<?php

require './inc/pdo.php';
require './inc/fonctions.php';
require './partials/header.php';


// dd($_GET);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifier si le formulaire de mise à jour a été soumis
    if (isset($_POST['update'])) {

        // Récupérer les nouvelles valeurs pour les champs de film
        $title = $_POST['title'];
        $year = $_POST['year'];
        $genres = $_POST['genres'];
        $modified = date('Y-m-d H:i:s');

        // Préparer la requête SQL pour mettre à jour le film
        $sql = "UPDATE movies_full SET title = :title, year = :year, genres = :genres, modified = :modified WHERE id = :id";

        // Préparer les paramètres de la requête SQL
        $params = array(
            ':title' => $title,
            ':year' => $year,
            ':genres' => $genres,
            ':modified' => $modified,
            ':id' => $id
        );

        // Exécuter la requête SQL avec les paramètres
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);

        // Rediriger l'utilisateur vers la liste des films après la mise à jour
        header('Location: index.php');
        exit();
    }
} else {
    exit('Le film n\'est pas disponible');
}

// Récupérer les informations sur le film sélectionné à partir de la base de données
$sql = "SELECT * FROM movies_full WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(':id' => $id));
$movie = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<head>
        <title>Editer un film</title>
    </head>
    <body>
        <h1>Editer un film</h1>
        <form method="post">
            <label for="title">Titre :</label>
            <input type="text" name="title" id="title" value="<?= $movie['title'] ?>"><br><br>
            <label for="year">Année :</label>
            <input type="number" name="year" id="year" value="<?= $movie['year'] ?>"><br><br>
            <label for="genres">Genres :</label>
            <input type="text" name="genres" id="genres" value="<?= $movie['genres'] ?>"><br><br>
            <input type="submit" name="update" value="Mettre à jour">
        </form>
    </body>


<?php


require './partials/footer.php';
?>