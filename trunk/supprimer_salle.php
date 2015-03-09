<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */ 
$nSalle = filter_input(INPUT_GET, 'nSalle');

$id = $_SESSION['user']['id'];
$model['GestionnaireProfil']->supprimerSalle($nSalle, $id);
 
/* fin de séquence */

/* affichage de la vue */

include 'f_mes_profils.php';

/* fin de l'affichage de la vue */
?>
