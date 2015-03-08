<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id=$_SESSION['user']['id'];

//recuperation des profils salles
$profilsSalle=$model['GestionnaireProfil']->getAllProfil_SalleById($id);

//recuperation des profils artistes
$profilsArtiste=$model['GestionnaireProfil']->getAllProfil_ArtisteById($id);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['mesArtistes']=$profilsArtiste;
$vue['mesSalles']=$profilsSalle;
$view->render('f_mes_profils', $vue);

/* fin de l'affichage de la vue */
?>
