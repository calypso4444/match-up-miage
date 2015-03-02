<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$_SESSION['user'] = null;

/* fin de séquence */

/* redirection */

include 'index.php';
?>
