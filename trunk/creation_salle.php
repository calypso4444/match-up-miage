<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id = $_SESSION['user']['id'];

$noProfil = 0;

$nomSalle = filter_input(INPUT_POST, 'nomSalle');
$descSalle = filter_input(INPUT_POST, 'descriptionSalle');
$genreSalle = filter_input(INPUT_POST, 'genreMusical');
$adresseSalle = filter_input(INPUT_POST, 'adresseSalle');
$telSalle = filter_input(INPUT_POST, 'telSalle');
$nomGerant = filter_input(INPUT_POST, 'nomGerant');
$prenomGerant = filter_input(INPUT_POST, 'prenomGerant');
$contactGerant = filter_input(INPUT_POST, 'contactGerant');
$cpSalle = filter_input(INPUT_POST, 'cpSalle');
$villeSalle = filter_input(INPUT_POST, 'villeSalle');

if (!empty($nomSalle)and ! empty($adresseSalle) and ! empty($villeSalle)and ! empty($cpSalle)) {
    $model['GestionnaireProfil']->newProfilSalle($id, $nomSalle, $adresseSalle, $cpSalle, $villeSalle);
}
if (!empty($descSalle)) {
    $model['GestionnaireProfil']->setDescriptionSalle($noProfil, $descSalle);
}
if (!empty($genreSalle)) {
    $model['GestionnaireProfil']->setGenreMusicalSalle($noProfil, $genreSalle);
}

//on insere une image par defaut
$img_default = "web/image/salle.png";
$model['GestionnaireProfil']->setphotoProfilSalle($noProfil, $img_default);
if (isset($_FILES['mon_fichier'])) {
    $tab_img = $_FILES['mon_fichier'];
    if ($_FILES['mon_fichier']['error'] > 0) {
        $erreur = "Erreur lors du transfert";
    }
    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
    //1. strrchr renvoie l'extension avec le point (« . »).
    //2. substr(chaine,1) ignore le premier caractère de chaine.
    //3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(substr(strrchr($tab_img['name'], '.'), 1));
//    $maxwidth = 0;
//    $maxheight = 0;
//    $image_sizes = getimagesize($tab_img['tmp_name']);
//    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) {
//        $erreur = "Image trop grande";
//    }
    $chemin = "web/image/photoProfilSalle/{$noProfil}.{$extension_upload}";
    $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
    if ($resultat) {
        $model['GestionnaireProfil']->setphotoProfilSalle($noProfil, $chemin);
    }
}

if (!empty($adresseSalle)) {
    $model['GestionnaireProfil']->setAdresseSalle($noProfil, $adresseSalle);
}
if (!empty($telSalle)) {
    $model['GestionnaireProfil']->setTelSalle($noProfil, $telSalle);
}
if (!empty($nomGerant)) {
    $model['GestionnaireProfil']->setNomGerant($noProfil, $nomGerant);
}
if (!empty($prenomGerant)) {
    $model['GestionnaireProfil']->setPrenomGerant($noProfil, $prenomGerant);
}
if (!empty($contactGerant)) {
    $model['GestionnaireProfil']->setContactGerant($noProfil, $contactGerant);
}
if (!empty($cpSalle)) {
    $model['GestionnaireProfil']->setCpSalle($noProfil, $cpSalle);
}
if (!empty($villeSalle)) {
    $model['GestionnaireProfil']->setVilleSalle($noProfil, $villeSalle);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$view->render('creation_salle', $vue);

/* fin de l'affichage de la vue */
?>
