<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id = $_SESSION['user']['id'];

//on initialise la variable dont on se servira plus tard
$noProfil = 0;

//on recupere la valeur de tous les champs remplis dans le formulaire par l'utilisateur
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

//on crée d'abord un profil salle avec les champs obligatoires (nom et adresse complete)
if (!empty($nomSalle)and ! empty($adresseSalle) and ! empty($villeSalle)and ! empty($cpSalle)) {
    //la fonction newProfil renvoit le dernier numéro de profil crée par l'utilisateur donc celui qu'on est en train de creer
    $noProfil=$model['GestionnaireProfil']->newProfilSalle($id, $nomSalle, $adresseSalle, $cpSalle, $villeSalle);
}
//puis on remplit les autres attribut de la salle en bdd lorsqu'on trouve un champ rempli par l'utilisateur
if (!empty($descSalle)) {
    $model['GestionnaireProfil']->setDescriptionSalle($noProfil, $descSalle);
}
if (!empty($genreSalle)) {
    $model['GestionnaireProfil']->setGenreMusicalSalle($noProfil, $genreSalle);
}

//on insere une image par defaut au cas ou l'utilisateur n'en upload pas car on en a besoin pour l'affichage sur les pages du site
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
    $chemin = "web/image/photoProfilSalle/{$noProfil}.{$extension_upload}";
    $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
    if ($resultat) {
        $model['GestionnaireProfil']->setphotoProfilSalle($noProfil, $chemin);
    }
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
