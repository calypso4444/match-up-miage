<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$noProfil = filter_input(INPUT_GET, 'tmp');
$infoProfil = $model['GestionnaireProfil']->getAllInfo_Artiste($noProfil);
$nomProfil = $infoProfil['nomArtiste'];
$photoProfil = $infoProfil['photoProfilArtiste'];
$descProfil = $infoProfil['descriptionArtiste'];

$id = $_SESSION['user']['id'];

$favori = filter_input(INPUT_GET, 'fav');
if ($favori === "true") {
    $model['GestionnaireUtilisateur']->ajouterEnFavoriArtiste($noProfil, $id);
}

$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdArtiste($noProfil);

$texte = filter_input(INPUT_POST, 'commentaire');
if (!empty($texte)) {
    $texte = htmlspecialchars($texte);
    $model['GestionnaireCommentaire']->commenterArtiste($noProfil, $id, $texte);
    $commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdArtiste($noProfil);
}

$nCom = filter_input(INPUT_GET, 'nCom');
$removeComment = filter_input(INPUT_POST, 'removeComment');
if ($removeComment === "true") {
    if ($model['GestionnaireCommentaire']->estProprietaireCommentaireArtiste($nCom, $id)) {
        $model['GestionnaireCommentaire']->supprimerCommentaireArtiste($nCom);
    }
}
$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdArtiste($noProfil);
$annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdArtiste($noProfil);

$nPhoto = filter_input(INPUT_GET, 'nP');
$removePhoto = filter_input(INPUT_POST, 'removePhoto');
if ($removePhoto === "true") {
    if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
        $model['GestionnaireProfil']->supprimerPhotoArtiste($noProfil, $nPhoto);
    }
}
$albumPhoto = $model['GestionnaireProfil']->getAllPhotoArtisteById($noProfil);

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
//    $maxwidth = 0;
//    $maxheight = 0;
//    $image_sizes = getimagesize($tab_img['tmp_name']);
//    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) {
//        $erreur = "Image trop grande";
//    }
    $idmax = $model['GestionnaireProfil']->getNMaxPhotoArtiste($noProfil);
    $idmax++;
    $chemin = "web/image/albumPhotoArtiste/{$noProfil}.{$idmax}.{$extension_upload}";
    $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
    if ($resultat) {
        $model['GestionnaireProfil']->ajouterPhotoArtiste($noProfil, $chemin);
        $albumPhoto = $model['GestionnaireProfil']->getAllPhotoArtisteById($noProfil);
    }
}

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
$annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdArtiste($noProfil);

$playlist = $model['GestionnaireProfil']->getAllMorceau($noProfil);
$piste = filter_input(INPUT_GET, 'nPiste');
if (isset($piste)) {
    $piste = $model['GestionnaireProfil']->getMorceau($piste);
}

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
            $playlist = $model['GestionnaireProfil']->getAllMorceau($noProfil);
        }
    }
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['noProfil'] = $noProfil;
$vue['nomProfil'] = $nomProfil;
$vue['photoProfil'] = $photoProfil;
$vue['descProfil'] = $descProfil;
$vue['albumPhoto'] = $albumPhoto;
$vue['commentaire'] = $commentaires;
$vue['annonceEvenement'] = $annoncesEvenement;
$vue['playlist'] = $playlist;
$vue['piste'] = $piste;
$view->render('artiste', $vue);

/* fin de l'affichage de la vue */
?>
