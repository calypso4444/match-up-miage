<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id=$_SESSION['user']['id'];

$noProfil=0;

$nomSalle = filter_input(INPUT_POST, 'nomSalle');
$descSalle = filter_input(INPUT_POST, 'descriptionSalle');
$genreSalle = filter_input(INPUT_POST, 'genreMusical');
$adresseSalle = filter_input(INPUT_POST, 'adresseSalle');
$telSalle = filter_input(INPUT_POST, 'telSalle');
$nomGerant = filter_input(INPUT_POST, 'nomGerant');
$prenomGerant = filter_input(INPUT_POST, 'prenomGerant');
$contactGerant = filter_input(INPUT_POST, 'contactGerant');

if (!empty($nomSalle)) {
    $noProfil=$model['GestionnaireProfil']->newProfilSalle($id);
    $model['GestionnaireProfil']->setNomSalle($noProfil, $nomSalle);
}
if (!empty($descSalle)) {
    $model['GestionnaireProfil']->setDescriptionSalle($noProfil, $descSalle);
}
if (!empty($genreSalle)) {
    $model['GestionnaireProfil']->setGenreMusicalSalle($noProfil, $genreSalle);
}
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
    $chemin = "web/image/photoProfilArtiste/{$noProfil}.{$extension_upload}";
    $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
    if ($resultat) {
        $model['GestionnaireProfil']->setphotoProfilArtiste($noProfil, $chemin);
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

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$view->render('creation_salle', $vue);

/* fin de l'affichage de la vue */
?>
