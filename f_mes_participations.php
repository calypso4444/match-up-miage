<!-- web -->
<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

$id = $_SESSION['user']['id'];
if (!isset($id)) {
    $estConnecte = false;
} else {
    $estConnecte = true;

//recuperation des evenements suivis par l'utilisateur via son id
    $suivis = $model['GestionnaireUtilisateur']->getAll_EvenementsSuivis($id);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['suivis'] = $suivis;
$view->render('f_mes_participations', $vue);

/* fin de l'affichage de la vue */
?>
