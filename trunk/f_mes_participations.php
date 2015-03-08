<!-- web -->
<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id=$_SESSION['user']['id'];

//recuperation des evenements suivis par l'utilisateur via son id
$suivis=$model['GestionnaireUtilisateur']->getAll_EvenementsSuivis($id);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['suivis']=$suivis;
$view->render('f_mes_participations', $vue);

/* fin de l'affichage de la vue */
?>
