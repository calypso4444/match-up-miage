<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */


/* fin de séquence */

/* affichage de la vue */

$vue = array();
$view->render('f_publication_recherche', $vue);

/* fin de l'affichage de la vue */
?>
