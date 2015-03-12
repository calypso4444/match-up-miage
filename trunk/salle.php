<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$noProfil = filter_input(INPUT_GET, 'tmp');
$infoProfil = $model['GestionnaireProfil']->getAllInfo_Salle($noProfil);
$nomProfil = $infoProfil['nomSalle'];
$photoProfil = $infoProfil['photoProfilSalle'];
$descProfil = $infoProfil['descriptionSalle'];
$adresse = $infoProfil['adresseSalle'];
$cp = $infoProfil['cpSalle'];
$ville = $infoProfil['villeSalle'];


$id = $_SESSION['user']['id'];

$favori = filter_input(INPUT_POST, 'favori');
if ($favori === "true") {
    $model['GestionnaireUtilisateur']->ajouterEnFavoriSalle($noProfil, $id);
}


$petiteAnnonces = $model['GestionnaireAnnonce']->getAllPetiteAnnonceByIdSalle($noProfil);
$annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdSalle($noProfil);
$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);

$texte = filter_input(INPUT_POST, 'commentaire');
if (!empty($texte)) {
    $model['GestionnaireCommentaire']->commenterSalle($noProfil, $id, $texte);
    $commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);
}

$nCom = filter_input(INPUT_GET, 'nCom');
$remove = filter_input(INPUT_POST, 'remove');
if ($remove === "true") {
    if ($model['GestionnaireCommentaire']->estProprietaireCommentaireSalle($nCom, $id)or ( $model['GestionnaireProfil']->estProprietaireProfilSalle($nProfil, $id))) {
        $model['GestionnaireCommentaire']->supprimerCommentaireSalle($nCom);
    }
}
$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);

$albumPhoto = $model['GestionnaireProfil']->getAllPhotoSalleById($noProfil);

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
    $idmax = $model['GestionnaireProfil']->getNMaxPhotoSalle($noProfil);
    $idmax++;
    $chemin = "web/image/albumPhotoSalle/{$noProfil}.{$idmax}.{$extension_upload}";
    $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
    if ($resultat) {
        $model['GestionnaireProfil']->ajouterPhotoSalle($noProfil, $chemin);
        $albumPhoto = $model['GestionnaireProfil']->getAllPhotoSalleById($noProfil);
    }
}
//suppression d'annonce
$nPetiteAnnonce = filter_input(INPUT_GET, 'nPetiteAnnonce');
$model['GestionnaireAnnonce']->supprimerPetiteAnnonceByIdSalle($noProfil, $nPetiteAnnonce);
$petiteAnnonces = $model['GestionnaireAnnonce']->getAllPetiteAnnonceByIdSalle($noProfil);

$nAnnonceEvenement = filter_input(INPUT_GET, 'nAnnonceEvenement');
$model['GestionnaireAnnonce']->supprimerAnnonceEvenementByIdSalle($noProfil, $nAnnonceEvenement);
$annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdSalle($noProfil);

//creation d'annonce
$typeAnnonce = filter_input(INPUT_POST, 'typeAnnonce');
$texteAnnonce = filter_input(INPUT_POST, 'posterAnnonce');
$dateDeb = filter_input(INPUT_POST, 'dateDeb');
$dateFin = filter_input(INPUT_POST, 'dateFin');
if (isset($typeAnnonce)) {
    if ($typeAnnonce === 'petiteAnnonce') {
        if (!empty($texteAnnonce)) {
            $model['GestionnaireAnnonce']->creerPetiteAnnonceSalle($noProfil, $texteAnnonce);
            $petiteAnnonces = $model['GestionnaireAnnonce']->getAllPetiteAnnonceByIdSalle($noProfil);
        }
    }
    if ($typeAnnonce === 'annonceEvenement') {
        if (!empty($texteAnnonce)) {
            $model['GestionnaireAnnonce']->creerAnnonceEvenementSalle($noProfil, $texteAnnonce);
            $annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdSalle($noProfil);
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
$vue['petiteAnnonce'] = $petiteAnnonces;
$vue['annonceEvenement'] = $annoncesEvenement;
$vue['commentaire'] = $commentaires;
$vue['adresse'] = $adresse;
$vue['cp'] = $cp;
$vue['ville'] = $ville;
$view->render('salle', $vue);

/* fin de l'affichage de la vue */
?>