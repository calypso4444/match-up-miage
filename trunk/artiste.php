<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

//on initialise une variable qui permettra d'indiquer si l'utilisateur est connecté, il pourra interagir avec le systeme si oui, si non il sera redirigé  
$estConnecte = '';

$participe = false;
$metEnFavori = false;

$noProfil = filter_input(INPUT_GET, 'tmp');
$infoProfil = $model['GestionnaireProfil']->getAllInfo_Artiste($noProfil);
$nomProfil = $infoProfil['nomArtiste'];
$photoProfil = $infoProfil['photoProfilArtiste'];
$descProfil = $infoProfil['descriptionArtiste'];
$genre = $infoProfil['genreMusicalArtiste'];

$id = $_SESSION['user']['id'];

//renvoit un boolean qui indique si l'utilisateur courant est le proprietaire du profil courant
$estProprietaire = false;
if (isset($id)) {
    $estProprietaire = $model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id);
}

//ajout en favori
$favori = filter_input(INPUT_GET, 'fav');
if ($favori === "true") {
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $model['GestionnaireUtilisateur']->ajouterEnFavoriArtiste($noProfil, $id);
        $metEnFavori = true;
    }
}

//ajout de commentaire
$texte = filter_input(INPUT_POST, 'commentaire');
if (!empty($texte)) {
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $texte = htmlspecialchars($texte);
        $model['GestionnaireCommentaire']->commenterArtiste($noProfil, $id, $texte);
    }
}
//suppression de commentaire
$nCom = filter_input(INPUT_GET, 'nCom');
$removeComment = filter_input(INPUT_POST, 'removeComment');
if ($removeComment === "true") {
    if ($model['GestionnaireCommentaire']->estProprietaireCommentaireArtiste($nCom, $id)) {
        $model['GestionnaireCommentaire']->supprimerCommentaireArtiste($nCom);
    }
}
//recuperation de tous les commentaires pour l'affichage
$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdArtiste($noProfil);

//suppression d'une photo dans l'album photo
$nPhoto = filter_input(INPUT_GET, 'nP');
$removePhoto = filter_input(INPUT_POST, 'removePhoto');
if ($removePhoto === "true") {
    if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
        $model['GestionnaireProfil']->supprimerPhotoArtiste($noProfil, $nPhoto);
    }
}
//ajout de photo dans l'album photo
if (isset($_FILES['mon_fichier'])) {
    $tab_img = $_FILES['mon_fichier'];
    if ($_FILES['mon_fichier']['error'] > 0) {
        $erreur = "Erreur lors du transfert";
    }
    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
    //1. strrchr renvoie l'extension avec le point (« . »).
    //2. substr(chaine,1) ignore le premier caractère de chaine.
    //3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(substr(strrchr($tab_img['name'], '.'), 1));
    $idmax = $model['GestionnaireProfil']->getNMaxPhotoArtiste($noProfil);
    $idmax++;
    $dossier = "web/image/albumPhotoArtiste/{$noProfil}";
    if (!is_dir($dossier)) {
        mkdir($dossier);
    }
    $chemin = "web/image/albumPhotoArtiste/{$noProfil}/{$idmax}.{$extension_upload}";
    $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
    if ($resultat) {
        $model['GestionnaireProfil']->ajouterPhotoArtiste($noProfil, $chemin);
        $albumPhoto = $model['GestionnaireProfil']->getAllPhotoArtisteById($noProfil);
    }
}
//recuperation de toutes les photos de l'album pour l'affichage
$albumPhoto = $model['GestionnaireProfil']->getAllPhotoArtisteById($noProfil);

//creation d'annonce
$texteAnnonce = filter_input(INPUT_POST, 'posterAnnonce');
if (!empty($texteAnnonce)) {
    $texteAnnonce = htmlspecialchars($texteAnnonce);
    $model['GestionnaireAnnonce']->creerAnnonceEvenementArtiste($noProfil, $texteAnnonce);
    $annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdArtiste($noProfil);
}
//suppression d'annonce
$nAnnonceEvenement = filter_input(INPUT_GET, 'nAnnonceEvenement');
$model['GestionnaireAnnonce']->supprimerAnnonceEvenementByIdArtiste($noProfil, $nAnnonceEvenement);
//recuperation des annonces pour l'affichage
$annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdArtiste($noProfil);

//ajout de morceau
$titre = filter_input(INPUT_POST, 'titre');
if (isset($_FILES['morceau'])and ! empty($titre)) {
    if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
        $tab_son = $_FILES['morceau'];
        if ($_FILES['morceau']['error'] > 0) {
            $erreur = "Erreur lors du transfert";
        }
        $extensions_valides = array('mp3', 'wav');
        $extension_upload = strtolower(substr(strrchr($tab_son['name'], '.'), 1));
        $dossier = "web/musique/{$nomProfil}";
        if (!is_dir($dossier)) {
            mkdir($dossier);
        }
        $chemin = "web/musique/{$nomProfil}/{$titre}.{$extension_upload}";
        $resultat = move_uploaded_file($tab_son['tmp_name'], $chemin);
        if ($resultat) {
            $model['GestionnaireProfil']->ajouterMorceau($noProfil, $titre, $nomProfil, $chemin);
        }
    }
}
//suppression de morceau 
$nMorceau = filter_input(INPUT_GET, 'nMorceau');
$removeSong = filter_input(INPUT_POST, 'removeSong');
if ($removeSong === "true") {
    if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
        $model['GestionnaireProfil']->supprimerMorceau($noProfil, $nMorceau);
    }
}
//recuperation de tous les morceaux de l'artiste
$playlist = $model['GestionnaireProfil']->getAllMorceau($noProfil);

//choix de la chanson a jouer dans le player
$piste = filter_input(INPUT_GET, 'nPiste');
if (isset($piste)) {
    $piste = $model['GestionnaireProfil']->getMorceau($piste);
}

//recuperation des concerts futurs 
$concerAVenir = $model['GestionnaireConcert']->GetConcertByArtiste($noProfil);

//gestion de la participation d'un utilisateur a un concert
$participation = filter_input(INPUT_GET, 'nConcert');
if (isset($participation)) {
    if (isset($id)) {
        $model['GestionnaireUtilisateur']->participer($id, $participation);
        $participe = true;
    }
}

//les notes
$note = filter_input(INPUT_GET, 'note');
if (isset($note)) {
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $model['GestionnaireUtilisateur']->noterArtiste($noProfil, $id, $note);
    }
}
$noteMoyenne = $model['GestionnaireUtilisateur']->getNoteArtiste($noProfil);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['participe'] = $participe;
$vue['metEnFavori'] = $metEnFavori;
$vue['noProfil'] = $noProfil;
$vue['nomProfil'] = $nomProfil;
$vue['photoProfil'] = $photoProfil;
$vue['descProfil'] = $descProfil;
$vue['genre'] = $genre;
$vue['noteMoyenne'] = $noteMoyenne;
$vue['albumPhoto'] = $albumPhoto;
$vue['commentaire'] = $commentaires;
$vue['aVenir'] = $concerAVenir;
$vue['annonceEvenement'] = $annoncesEvenement;
$vue['playlist'] = $playlist;
$vue['piste'] = $piste;
$vue['estProprietaire'] = $estProprietaire;
$view->render('artiste', $vue);

/* fin de l'affichage de la vue */
?>
