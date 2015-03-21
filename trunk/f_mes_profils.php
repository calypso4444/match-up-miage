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

//recuperation des profils salles
    $profilsSalle = $model['GestionnaireProfil']->getAllProfil_SalleById($id);

//recuperation des profils artistes
    $profilsArtiste = $model['GestionnaireProfil']->getAllProfil_ArtisteById($id);
    
} else {
    $estConnecte = false;
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['mesArtistes'] = $profilsArtiste;
$vue['mesSalles'] = $profilsSalle;
$view->render('f_mes_profils', $vue);

/* fin de l'affichage de la vue */
?>
