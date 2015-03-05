<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$user=$_SESSION['user'];

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['userPseudo']=$user['pseudo'];
$vue['userMail']=$user['email'];
$vue['userCPasse']=$user['passe'];
$view->render('f_info_perso', $vue);

/* fin de l'affichage de la vue */
?>
