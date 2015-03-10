<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id=$_SESSION['user']['id'];
$noProfil=filter_input(INPUT_GET,'tmp');
$texte=filter_input(INPUT_POST,'commentaire');

$model['GestionnaireCommentaire']->commenterArtiste($noProfil, $id, $texte);

/* fin de séquence */

/* affichage de la vue */

include 'artiste.php';

/* fin de l'affichage de la vue */
?>
