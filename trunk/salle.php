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
$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);

$texte = filter_input(INPUT_POST, 'commentaire');
if (!empty($texte)) {
    $model['GestionnaireCommentaire']->commenterSalle($noProfil, $id, $texte);
    $commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);
}

$nCom= filter_input(INPUT_GET, 'nCom');
$remove = filter_input(INPUT_POST, 'remove');
if ($remove === "true") {
    if ($model['GestionnaireCommentaire']->estProprietaireCommentaireSalle($nCom, $id)or ($model['GestionnaireProfil']->estProprietaireProfilSalle($nProfil, $id))) {
        $model['GestionnaireCommentaire']->supprimerCommentaireSalle($nCom);
    }
}
$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);

$albumPhoto=$model['GestionnaireProfil']->getAllPhotoSalleById($noProfil);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['noProfil'] = $noProfil;
$vue['nomProfil'] = $nomProfil;
$vue['photoProfil'] = $photoProfil;
$vue['descProfil'] = $descProfil;
$vue['albumPhoto']=$albumPhoto;
$vue['petiteAnnonce'] = $petiteAnnonces;
$vue['commentaire'] = $commentaires;
$vue['adresse'] = $adresse;
$vue['cp'] = $cp;
$vue['ville'] = $ville;
$view->render('salle', $vue);

/* fin de l'affichage de la vue */
?>
