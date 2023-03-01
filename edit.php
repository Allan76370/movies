<?php

require './inc/pdo.php';
require './inc/fonctions.php';
require './partials/header.php';


// dd($_GET);

if (isset($_GET['id']) && !is_int($_GET['id'])) :
    $id = $_GET['id'];

else: 
    exit('Le film n\'est pas disponible');
endif;

dd(getOnMovie($id));

require './partials/footer.php';
