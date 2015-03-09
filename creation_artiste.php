<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id = $_SESSION['user']['id'];

$noProfil = 0;

$nomArtiste = filter_input(INPUT_POST, 'nomArtiste');
$descArtiste = filter_input(INPUT_POST, 'descriptionArtiste');
$genreArtiste = filter_input(INPUT_POST, 'genreMusical');

if (!empty($nomArtiste)) {
    $noProfil = $model['GestionnaireProfil']->newProfilArtiste($id);
    $model['GestionnaireProfil']->setNomArtiste($noProfil, $nomArtiste);
}
if (!empty($descArtiste)) {
    $model['GestionnaireProfil']->setDescriptionArtiste($noProfil, $descArtiste);
}
if (!empty($genreArtiste)) {
    $model['GestionnaireProfil']->setGenreMusicalArtiste($noProfil, $genreArtiste);
}

//on insere une image par defaut
$img_default = "web/image/artiste.png";
$model['GestionnaireProfil']->setphotoProfilArtiste($noProfil, $img_default);
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
$view->render('creation_artiste', $vue);

/* fin de l'affichage de la vue */
?>
