<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

//on recupere les info du profil courant
$noProfil = filter_input(INPUT_GET, 'nArtiste');
$infoProfil = $model['GestionnaireProfil']->getAllInfo_Artiste($noProfil);

//on recupere les information soumises par l'utilisateur dans le formulaire
$nomArtiste = filter_input(INPUT_POST, 'nomArtiste');
$descArtiste = filter_input(INPUT_POST, 'descriptionArtiste');
$genreArtiste = filter_input(INPUT_POST, 'genreMusical');
$genreArtiste2 = filter_input(INPUT_POST, 'genreMusical2');
$genreArtiste3 = filter_input(INPUT_POST, 'genreMusical3');

//on verifie que l'utilisateur est bien connecte avant toute modification
$id = $_SESSION['user']['id'];
if (!isset($id)) {
    $estConnecte = false;
} else {
    $estConnecte = true;
//on met a jour les informations en bdd avec ce que l'utilisateur a rempli
    if (!empty($nomArtiste)and $nomArtiste !== $infoProfil['nomArtiste']) {
        $model['GestionnaireProfil']->setNomArtiste($noProfil, $nomArtiste);
        $infoProfil['nomArtiste'] = $nomArtiste;
    }
    if (!empty($descArtiste)and $descArtiste !== $infoProfil['descriptionArtiste']) {
        $model['GestionnaireProfil']->setDescriptionArtiste($noProfil, $descArtiste);
        $infoProfil['descriptionArtiste'] = $descArtiste;
    }
    if (!empty($genreArtiste)) {
        if (!empty($genreArtiste2)) {
            $genreArtiste = $genreArtiste . " - " . $genreArtiste2;
        }
        if (!empty($genreArtiste3)) {
            $genreArtiste = $genreArtiste . " - " . $genreArtiste3;
        }
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
        $chemin = "web/image/photoProfilArtiste/{$noProfil}.{$extension_upload}";
        $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
        if ($resultat) {
            $model['GestionnaireProfil']->setphotoProfilArtiste($noProfil, $chemin);
        }
    }
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['nomArtiste'] = $infoProfil['nomArtiste'];
$vue['photoArtiste'] = $infoProfil['photoProfilArtiste'];
$vue['descriptionArtiste'] = $infoProfil['descriptionArtiste'];
$vue['genreArtiste'] = $infoProfil['genreMusicalArtiste'];
$view->render('modifier_artiste', $vue);

/* fin de l'affichage de la vue */
?>
