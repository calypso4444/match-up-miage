<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

//recupere tous les concerts qui se deroulent à partir de la date courante
$concert = $model['GestionnaireConcert']->getAllConcert();

//si un utilisateur essaye participer a un concert, si il est connecte le concert est ajouté a ses participations sinon il est redirigé vers la page d'accueil
$participation = filter_input(INPUT_GET, 'nConcert');
if (isset($participation)) {
    $id = $_SESSION['user']['id'];
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $model['GestionnaireUtilisateur']->participer($id, $participation);
    }
}

//permet de prendre la date courante par defaut
$dateConcert = new DateTime();
$dateConcert = $dateConcert->format('d/m/20y');

//calcul à partir de la date courante du nombre de jour dans le mois, recuperation du resultat et du nom du mois
$date = new DateTime();
$mois = $date->format('m');
$annee = $date->format('y');
$nomMois = '';
$nombreDeJours = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
$tabMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
if ($mois < 10) {
    $nomMois = $tabMois[substr($mois, 1) - 1];
} else {
    $nomMois = $tabMois[$mois - 1];
}

//gestion de l'input choix du jour dont on veut afficher les concerts (choisi par l'utilisateur)
$choixJour = filter_input(INPUT_POST, 'choixJour');
if (isset($choixJour)) {
    $dateConcert = $choixJour;
}

//recuperation de tous les concerts à afficher selon la date
$concertCarte = $model['GestionnaireCarte']->getAllSalleConcertByDate($dateConcert);

$filtreGenre=  filter_input(INPUT_POST, 'genreMusical');
$filtreArrondissement=  filter_input(INPUT_POST, 'arrondissement');

if(!empty($filtreArrondissement)){
    $filtreArrondissement=substr($filtreArrondissement,0,2);
    $concertCarte=$model['GestionnaireCarte']->getAllSalleConcertByDateArrondissement($dateConcert,$filtreArrondissement);
}

if(!empty($filtreGenre)){
    $concertCarte=$model['GestionnaireCarte']->getAllSalleConcertByDateGenre($dateConcert,$filtreGenre);
}


/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['concert'] = $concert;
$vue['concertCarte'] = $concertCarte;
$vue['nomMois'] = $nomMois;
$vue['nombreDeJours'] = $nombreDeJours;
$vue['dateConcert']=  substr($dateConcert,0,2);
$view->render('que_faire', $vue);

/* fin de l'affichage de la vue */
?>
