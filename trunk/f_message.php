<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$destA = filter_input(INPUT_GET, 'destA');
$destS = filter_input(INPUT_GET, 'destS');
$dest = null;
$messageEnvoye = false;

if (isset($destA)) {
    $destA = $model['GestionnaireProfil']->getProprietaireArtiste($destA);
    $dest = $model['GestionnaireUtilisateur']->getUserById($destA);
}
if (isset($destS)) {
    $destS = $model['GestionnaireProfil']->getProprietaireSalle($destS);
    $dest = $model['GestionnaireUtilisateur']->getUserById($destS);
}

$exp = $model['GestionnaireUtilisateur']->getUserById($_SESSION['user']['id']);


$destinataire = filter_input(INPUT_POST, 'destinataire');
$expediteur = filter_input(INPUT_POST, 'expediteur');
$objet = filter_input(INPUT_POST, 'objet');
$message = filter_input(INPUT_POST, 'txtMessage');
if (!empty($message)) {
    $message = htmlspecialchars($message);
    $objet = htmlspecialchars($objet);
    //on ne peut pas envoyer de mail en local....
//    mail($destinataire, $objet, $message);
    $messageEnvoye = true;
}

if ($dest === null) {
    $dest['email'] = null;
}

if ($exp === null) {
    $dexp['email'] = null;
}

$nAnnonce = filter_input(INPUT_GET, 'nAnnonce');
$annonce;
if(isset($nAnnonce)){
    $annonce=$model['GestionnaireAnnonce']->getPetiteAnnonce($nAnnonce);
    $dateEdition = new DateTime($annonce['dateEditionPetiteAnnonce']);
    $dateEdition=$dateEdition->format('d/m/y');
    $objet="Votre annonce du ".$dateEdition;
}


/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['destinataire'] = $dest['email'];
$vue['expediteur'] = $exp['email'];
$vue['objet'] = $objet;
$vue['messageEnvoye'] = $messageEnvoye;
$view->render('f_message', $vue);

/* fin de l'affichage de la vue */
?>
