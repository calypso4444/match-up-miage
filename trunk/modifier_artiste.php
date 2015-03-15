<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$noProfil = filter_input(INPUT_GET, 'nArtiste');
$infoProfil = $model['GestionnaireProfil']->getAllInfo_Artiste($noProfil);

$nomArtiste = filter_input(INPUT_POST, 'nomArtiste');
$descArtiste = filter_input(INPUT_POST, 'descriptionArtiste');
$genreArtiste = filter_input(INPUT_POST, 'genreMusical');

if (!empty($nomArtiste)and $nomArtiste !== $infoProfil['nomArtiste']) {
    $model['GestionnaireProfil']->setNomArtiste($noProfil, $nomArtiste);
    $infoProfil['nomArtiste'] = $nomArtiste;
}

if (!empty($descArtiste)and $descArtiste !== $infoProfil['descriptionArtiste']) {
    $model['GestionnaireProfil']->setDescriptionArtiste($noProfil, $descArtiste);
    $infoProfil['descriptionArtiste'] = $descArtiste;
}

if (!empty($genreArtiste)and $genreArtiste !== $infoProfil['genreMusicalArtiste']) {
    $model['GestionnaireProfil']->setGenreMusicalArtiste($noProfil, $genreArtiste);
    $infoProfil['genreMusicalArtiste'] = $genreArtiste;
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

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['nomArtiste'] = $infoProfil['nomArtiste'];
$vue['photoArtiste'] = $infoProfil['photoProfilArtiste'];
$vue['descriptionArtiste'] = $infoProfil['descriptionArtiste'];
$vue['genreArtiste'] = $infoProfil['genreMusicalArtiste'];
$view->render('modifier_artiste', $vue);

/* fin de l'affichage de la vue */
?>
