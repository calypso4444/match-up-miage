<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$user = null;
if($_SESSION['user'] != null) {
    $user = $_SESSION['user']; 
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['user'] = $user;
$view->render('test', $vue);

/* fin de l'affichage de la vue */

?>
