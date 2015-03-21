<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

$id = $_SESSION['user']['id'];
if (isset($id)) {
    $estConnecte = true;

    //on initialise la variable dont on se servira plus tard
    $noProfil = 0;

//on recupere la valeur de tous les champs remplis dans le formulaire par l'utilisateur
    $nomArtiste = filter_input(INPUT_POST, 'nomArtiste');
    $descArtiste = filter_input(INPUT_POST, 'descriptionArtiste');
    $genreArtiste = filter_input(INPUT_POST, 'genreMusical');

    //on commence par cree un profil artiste avec les champs obligatoires si bien rempli par l'utilisateur
    if (!empty($nomArtiste)) {
        $noProfil = $model['GestionnaireProfil']->newProfilArtiste($id, $nomArtiste);
    }

    //on rempli ensuite les autres attribut de l'artiste en bdd avec les informations entrées par l'utilisateur via le formulaire
    if (!empty($descArtiste)) {
        $model['GestionnaireProfil']->setDescriptionArtiste($noProfil, $descArtiste);
    }
    if (!empty($genreArtiste)) {
        $model['GestionnaireProfil']->setGenreMusicalArtiste($noProfil, $genreArtiste);
    }

//on insere une image par defaut au cas ou l'utilisateur n'en upload pas car on en a besoin pour l'affichage sur les pages du site
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
} else {
    $estConnecte = false;
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$view->render('creation_artiste', $vue);

/* fin de l'affichage de la vue */
?>
