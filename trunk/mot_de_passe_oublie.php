<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$mailVide = false;
$mailInconnu = false;
$mdpProvisoire='';
if (!empty(filter_input(INPUT_POST, 'email'))) {
    $email = filter_input(INPUT_POST, 'email');
    if (!$model['GestionnaireUtilisateur']->existeDejaMail($email)) {
        $mailInconnu = true;
//    exit();
    } else {
        $mdpProvisoire = $model['GestionnaireUtilisateur']->motDePasseProvisioire ($email);
    }
} else {
    $mailVide = true;
//    exit();
}




/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['mailVide'] = $mailVide;
$vue['mailInconnu'] = $mailInconnu;
$vue['mdpProvisoire'] = $mdpProvisoire;

$view->render('mot_de_passe_oublie', $vue);

/* fin de l'affichage de la vue */
?>
