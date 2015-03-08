<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */ 
$nArtiste = filter_input(INPUT_GET, 'nArtiste');

$id = $_SESSION['user']['id'];
$model['GestionnaireProfil']->supprimerArtiste($nArtiste, $id);
 
/* fin de séquence */

/* affichage de la vue */

include 'f_mes_profils.php';

/* fin de l'affichage de la vue */
?>
