<?php
// à mettre à l'en-tête FORCE LE TYPAGE
declare(strict_types=1);

function dd($value)
{
    echo "<pre style='background-color:black;
    color:white;padding: 15px;overflow:auto; height: 600px;'>";
    var_dump($value);
    echo '</pre>';
    die;
}

function dbug($valeur)
{
    echo '<pre>';
    var_dump($valeur);
    echo '</pre>';
}


function cleanData($valeur)
{
    if (!empty($valeur) && isset($valeur)) {
        $valeur = htmlentities($valeur);
        $valeur = trim($valeur);
        // if (!filter_var($valeur, FILTER_VALIDATE_REGEXP, array(
        //     'options' => array(
        //         'regexp' => '/^[a-zA-Z\s]*$/'
        //     )
        // ))) {
        //     return false;
        // }
        return $valeur;
    } else {
        return false;
    }
}
function textData($valeur)
{
    $valeur = preg_match('/^[a-z-A-Z]*$/', $valeur);
    return $valeur;
}

function adressData($valeur)
{
    $valeur = preg_match('/^[a-z-A-Z-0-9\s]*$/', $valeur);
    return $valeur;
}

function getMovieLimit($valeur)
{
    global $conn;
    // $sqlRequest = "SELECT * FROM movies_full WHERE title like '%vadrouille%'";
    // $sqlRequest = "SELECT * FROM movies_full WHERE title LIMIT :limite";
    $sqlRequest = "SELECT * FROM movies_full ORDER BY id DESC LIMIT :limite";
    $resultat = $conn->prepare($sqlRequest);
    $resultat->bindValue(':limite', $valeur, PDO::PARAM_INT);
    $resultat->execute();
    return $resultat->fetchAll();
}

function getOnMovie($valeur)
{
    global $conn;
    // $sqlRequest = "SELECT * FROM movies_full WHERE title like '%vadrouille%'";
    $sqlRequest = "SELECT * FROM `movies_full` WHERE id = :valeur";
    $resultat = $conn->prepare($sqlRequest);
    $resultat->bindValue(':valeur', $valeur, PDO::PARAM_INT);
    $resultat->execute();
    return $resultat->fetchAll();
}
