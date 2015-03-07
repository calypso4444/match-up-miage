<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */
$id=$_SESSION['user']['id'];
$choix = filter_input(INPUT_POST, 'choixProfil');
$noprofil=0;
if (isset($choix)) {
    //on va interroger la base de données pour generer un numero identifier le profil qui va etre créé
    $noprofil=$model['GestionnaireProfil']->newProfilArtiste($id);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['choix']=$choix;
$vue['noprofil']=$noprofil;
$view->render('f_mes_profils', $vue);

/* fin de l'affichage de la vue */
?>
