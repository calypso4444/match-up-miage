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

$favori = filter_input(INPUT_POST, 'favori');
if ($favori === "true") {
    $model['GestionnaireUtilisateur']->ajouterEnFavoriArtiste($noProfil, $id);
}

$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdArtiste($noProfil);

$texte = filter_input(INPUT_POST, 'commentaire');
if (!empty($texte)) {
    $model['GestionnaireCommentaire']->commenterArtiste($noProfil, $id, $texte);
    $commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdArtiste($noProfil);
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['noProfil'] = $noProfil;
$vue['nomProfil'] = $nomProfil;
$vue['photoProfil'] = $photoProfil;
$vue['descProfil'] = $descProfil;
$vue['commentaire'] = $commentaires;
$view->render('artiste', $vue);

/* fin de l'affichage de la vue */
?>
