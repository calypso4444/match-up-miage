<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */
$noProfil=filter_input(INPUT_GET, 'tmp');
$infoProfil=$model['GestionnaireProfil']->getAllInfo_Artiste($noProfil);
$nomProfil=$infoProfil['nomArtiste'];
$photoProfil=$infoProfil['photoProfilArtiste'];
$descProfil=$infoProfil['descriptionArtiste'];


/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['nomProfil']=$nomProfil;
$vue['photoProfil']=$photoProfil;
$vue['descProfil']=$descProfil;
$view->render('artiste', $vue);

/* fin de l'affichage de la vue */
?>
