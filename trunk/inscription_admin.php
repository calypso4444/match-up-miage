<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$action = filter_input(INPUT_GET, 'action');
$id = filter_input(INPUT_GET, 'id');
if (null !== $action AND null !== $id) {
    if ($action === "accepter") {
        $model['GestionnaireUtilisateur']->validation($id);
    } elseif ($action === "refuser") {
        $model['GestionnaireUtilisateur']->refuser($id);
    }
}

$usersValidation = $model['GestionnaireUtilisateur']->getUsersEnValidation();

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['usersValidation'] = $usersValidation;
$view->render('inscription_admin', $vue);

/* fin de l'affichage de la vue */
?>
