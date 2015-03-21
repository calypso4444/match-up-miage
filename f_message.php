<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$destA = filter_input(INPUT_GET, 'destA');
$nA = filter_input(INPUT_GET, 'destA');//on sauvegarde le nArtiste pour plus tard
$destS = filter_input(INPUT_GET, 'destS');
$dest = null;
$messageEnvoye = false;
$txt = '';
$lien='';

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
if (isset($nAnnonce)) {
    $annonce = $model['GestionnaireAnnonce']->getPetiteAnnonce($nAnnonce);
    $dateEdition = new DateTime($annonce['dateEditionPetiteAnnonce']);
    $dateEdition = $dateEdition->format('d/m/y');
    $objet = "Votre annonce du " . $dateEdition;
}

$dateConcert = filter_input(INPUT_GET, 'dC');
$nSalle = filter_input(INPUT_GET, 'nS');
if (isset($dateConcert)and isset($nSalle)) {
    $nomSalle=$model['GestionnaireProfil']->getAllInfo_Salle($nSalle);
    $nomSalle=$nomSalle['nomSalle'];
    $objet = $nomSalle . " vous propose un concert le " . $dateConcert;
    $lien = "<a href='index.php?nS=" . $nSalle . "&nA=" . $nA . "&dC=" . $dateConcert . "'>Cliquez ici pour accepter</a>"; //on affiche provisoirement ce lien au dessus du corps de message pour pouvoir confirmer car on est en local et on ne peut pas envoyer de message...
    $txt="Cliquez sur le lien ci-dessous pour accepter \n http://localhost/match-up-miage/index.php?nS=" . $nSalle . "&nA=" . $nA . "&dC=" . $dateConcert;
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['destinataire'] = $dest['email'];
$vue['expediteur'] = $exp['email'];
$vue['objet'] = $objet;
$vue['lien'] = $lien;
$vue['txt'] = $txt;
$vue['messageEnvoye'] = $messageEnvoye;
$view->render('f_message', $vue);

/* fin de l'affichage de la vue */
?>
