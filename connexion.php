<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$login = filter_input(INPUT_POST, 'login');
$passe = filter_input(INPUT_POST, 'passe');

$user = $model['GestionnaireUtilisateur']->connexion($login, $passe);
if($user != null) {
    $_SESSION['user'] = $user;
}

/* fin de séquence */

/* redirection */

include 'index.php';

?>
