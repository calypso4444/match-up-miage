<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

$id = $_SESSION['user']['id'];
if (!isset($id)) {
    $estConnecte = false;
} else {
    $estConnecte = true;

//on recupere la valeur des variables passées dans l'url
    $destA = filter_input(INPUT_GET, 'destA');
    $nA = filter_input(INPUT_GET, 'destA'); //on sauvegarde le nArtiste pour plus tard
    $destS = filter_input(INPUT_GET, 'destS');
    $dest = null;
    $messageEnvoye = false;
    $txt = '';
    $lien = '';

    //on regarde si un destinataire a été specifié, si oui on recupere tous les info relatives au proprietaire du profil
    if (isset($destA)) {
        $destA = $model['GestionnaireProfil']->getProprietaireArtiste($destA);
        $dest = $model['GestionnaireUtilisateur']->getUserById($destA);
    }
    if (isset($destS)) {
        $destS = $model['GestionnaireProfil']->getProprietaireSalle($destS);
        $dest = $model['GestionnaireUtilisateur']->getUserById($destS);
    }

    //pour l'expediteur , on recupere les infos relatives au proprietaire du profil courant
    $exp = $model['GestionnaireUtilisateur']->getUserById($id);

//on recupere ici les informations entrées dans le formulaire par l'utilisateur ou preremplies par nos soins selon les cas
    $destinataire = filter_input(INPUT_POST, 'destinataire');
    $expediteur = filter_input(INPUT_POST, 'expediteur');
    $objet = filter_input(INPUT_POST, 'objet');
    $message = filter_input(INPUT_POST, 'txtMessage');

    //si le champ de messag n'est pas laissé vide, 
    if (!empty($message)) {
        $message = htmlspecialchars($message);
        $objet = htmlspecialchars($objet);
        //on ne peut pas envoyer de mail en local.... mais si on arrive ici c'est que tout s'est bien passé et le mail peut s'envoyer correctement en theorie
//    mail($destinataire, $objet, $message);
        $messageEnvoye = true;
    }

    if ($dest === null) {
        $dest['email'] = null;
    }

    if ($exp === null) {
        $dexp['email'] = null;
    }

    //si une variable nAnnonce a été specifiée dans l'url on la recupere (c'est le cas quand qqn postule à une annonce)
    $nAnnonce = filter_input(INPUT_GET, 'nAnnonce');
    $annonce;
    //si elle n'est pas vide, on va preeremplir le champ objet du formulaire avec certaines infos relatives à l'annonce designee par nAnnonce
    if (isset($nAnnonce)) {
        $annonce = $model['GestionnaireAnnonce']->getPetiteAnnonce($nAnnonce);
        $dateEdition = new DateTime($annonce['dateEditionPetiteAnnonce']);
        $dateEdition = $dateEdition->format('d/m/y');
        $objet = "Votre annonce du " . $dateEdition;
    }

    //si des variables dC et nS ont été specifiées dans l'url on les recupere (c'est le cas quand une salle propose à un artiste de faire un concert)
    $dateConcert = filter_input(INPUT_GET, 'dC');
    $nSalle = filter_input(INPUT_GET, 'nS');
    //si ces variables ne sont pas vides, on va preremplir les champs objet et message
    if (isset($dateConcert)and isset($nSalle)) {
        $nomSalle = $model['GestionnaireProfil']->getAllInfo_Salle($nSalle);
        $nomSalle = $nomSalle['nomSalle'];
        $objet = $nomSalle . " vous propose un concert le " . $dateConcert;
        $lien = "<a href='index.php?nS=" . $nSalle . "&nA=" . $nA . "&dC=" . $dateConcert . "'>Cliquez ici pour accepter</a>"; //on affiche provisoirement ce lien au dessus du corps de message pour pouvoir confirmer car on est en local et on ne peut pas envoyer de message...
        $txt = "Cliquez sur le lien ci-dessous pour accepter \n http://localhost/match-up-miage/index.php?nS=" . $nSalle . "&nA=" . $nA . "&dC=" . $dateConcert;
    }
}
/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['destinataire'] = $dest['email'];
$vue['expediteur'] = $exp['email'];
$vue['objet'] = $objet;
$vue['lien'] = $lien;
$vue['txt'] = $txt;
$vue['messageEnvoye'] = $messageEnvoye;
$view->render('f_message', $vue);

/* fin de l'affichage de la vue */
?>
