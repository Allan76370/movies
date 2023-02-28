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
