<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id=$_SESSION['user']['id'];

//creation d'un nouveau profil
$choix = filter_input(INPUT_POST, 'choixProfil');
$noprofil=0;
if (isset($choix)) {
    //on va interroger la base de données pour generer un numero identifier le profil qui va etre créé
    if($choix==='artiste'){
    $noprofil=$model['GestionnaireProfil']->newProfilArtiste($id);
    }
    if($choix==='salle'){
    $noprofil=$model['GestionnaireProfil']->newProfilSalle($id);
    }
    
}

//recuperation des profils salles
$profilsSalle=$model['GestionnaireProfil']->getAllProfil_Salle($id);

//recuperation des profils artistes
$profilsArtiste=$model['GestionnaireProfil']->getAllProfil_Artiste($id);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['choix']=$choix;
$vue['noprofil']=$noprofil;
$vue['mesArtistes']=$profilsArtiste;
$vue['mesSalles']=$profilsSalle;
$view->render('f_mes_profils', $vue);

/* fin de l'affichage de la vue */
?>
