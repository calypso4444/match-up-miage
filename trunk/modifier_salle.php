<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

//recuperation des info concernant le profil courant
$noProfil = filter_input(INPUT_GET, 'nSalle');
$infoProfil = $model['GestionnaireProfil']->getAllInfo_Salle($noProfil);

//on recupere les informations entrées dans le formulaire par l'utilisateur
$nomSalle = filter_input(INPUT_POST, 'nomSalle');
$descSalle = filter_input(INPUT_POST, 'descriptionSalle');
$genreSalle = filter_input(INPUT_POST, 'genreMusical');
$genreSalle2 = filter_input(INPUT_POST, 'genreMusical2');
$genreSalle3 = filter_input(INPUT_POST, 'genreMusical3');
$adresseSalle = filter_input(INPUT_POST, 'adresseSalle');
$cpSalle = filter_input(INPUT_POST, 'cpSalle');
$villeSalle = filter_input(INPUT_POST, 'villeSalle');
$telSalle = filter_input(INPUT_POST, 'telSalle');
$nomGerant = filter_input(INPUT_POST, 'nomGerant');
$prenomGerant = filter_input(INPUT_POST, 'prenomGerant');
$contactGerant = filter_input(INPUT_POST, 'contactGerant');

//on verifie que l'utilisateur est bien connecte avant toute modif
$id = $_SESSION['user']['id'];
if (!isset($id)) {
    $estConnecte = false;
} else {
    $estConnecte = true;
//on met a jour les informations en base de donnees
    if (!empty($nomSalle)and $nomSalle !== $infoProfil['nomSalle']) {
        $model['GestionnaireProfil']->setNomSalle($noProfil, $nomSalle);
        $infoProfil['nomSalle'] = $nomSalle;
    }
    if (!empty($descSalle)and $descSalle !== $infoProfil['descriptionSalle']) {
        $model['GestionnaireProfil']->setDescriptionSalle($noProfil, $descSalle);
        $infoProfil['descSalle'] = $descSalle;
    }
    if (!empty($genreSalle)) {
        if (!empty($genreSalle2)) {
            $genreSalle = $genreSalle . " - " . $genreSalle2;
        }
        if (!empty($genreSalle3)) {
            $genreSalle = $genreSalle . " - " . $genreSalle3;
        }
        $model['GestionnaireProfil']->setGenreMusicalSalle($noProfil, $genreSalle);
        $infoProfil['genreMusicalSalle'] = $genreSalle;
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
        $chemin = "web/image/photoProfilSalle/{$noProfil}.{$extension_upload}";
        $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
        if ($resultat) {
            $model['GestionnaireProfil']->setphotoProfilSalle($noProfil, $chemin);
            $infoProfil['chemin'] = $chemin;
        }
    }
    if (!empty($adresseSalle)and ! empty($cpSalle) and ! empty($villeSalle)) {
        $model['GestionnaireProfil']->setAdresseSalle($noProfil, $adresseSalle, $cpSalle, $villeSalle);
        $infoProfil['adresseSalle'] = $adresseSalle;
        $infoProfil['cpSalle'] = $cpSalle;
        $infoProfil['villeSalle'] = $villeSalle;
    }
    if (!empty($telSalle)and $telSalle !== $infoProfil['telSalle']) {
        $model['GestionnaireProfil']->setTelSalle($noProfil, $telSalle);
        $infoProfil['telSalle'] = $telSalle;
    }
    if (!empty($nomGerant)and $nomGerant !== $infoProfil['nomGerant']) {
        $model['GestionnaireProfil']->setNomGerant($noProfil, $nomGerant);
        $infoProfil['nomGerant'] = $nomGerant;
    }
    if (!empty($prenomGerant)and $prenomGerant !== $infoProfil['prenomGerant']) {
        $model['GestionnaireProfil']->setPrenomGerant($noProfil, $prenomGerant);
        $infoProfil['prenomGerant'] = $prenomGerant;
    }
    if (!empty($contactGerant)and $contactGerant !== $infoProfil['contactGerant']) {
        $model['GestionnaireProfil']->setContactGerant($noProfil, $contactGerant);
        $infoProfil['contactGerant'] = $contactGerant;
    }
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['nomSalle'] = $infoProfil['nomSalle'];
$vue['photoSalle'] = $infoProfil['photoProfilSalle'];
$vue['descriptionSalle'] = $infoProfil['descriptionSalle'];
$vue['genreSalle'] = $infoProfil['genreMusicalSalle'];
$vue['adresseSalle'] = $infoProfil['adresseSalle'];
$vue['cpSalle'] = $infoProfil['cpSalle'];
$vue['villeSalle'] = $infoProfil['villeSalle'];
$vue['telSalle'] = $infoProfil['telSalle'];
$vue['nomGerant'] = $infoProfil['nomGerant'];
$vue['prenomGerant'] = $infoProfil['prenomGerant'];
$vue['contactGerant'] = $infoProfil['contactGerant'];
$view->render('modifier_salle', $vue);

/* fin de l'affichage de la vue */
?>
