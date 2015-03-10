<!-- web -->

<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$noProfil=filter_input(INPUT_GET, 'tmp');
$infoProfil=$model['GestionnaireProfil']->getAllInfo_Salle($noProfil);
$nomProfil=$infoProfil['nomSalle'];
$photoProfil=$infoProfil['photoProfilSalle'];
$descProfil=$infoProfil['descriptionSalle'];
$adresse=$infoProfil['adresseSalle'];
$cp=$infoProfil['cpSalle'];
$ville=$infoProfil['villeSalle'];


$id=$_SESSION['user']['id'];

$favori=filter_input(INPUT_POST, 'favori');
    if($favori==="true"){
        $model['GestionnaireUtilisateur']->ajouterEnFavoriSalle($noProfil, $id);
    }

    
$petiteAnnonces=$model['GestionnaireAnnonce']->getAllPetiteAnnonceByIdSalle($noProfil);
$commentaires=$model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);

$texte=filter_input(INPUT_POST,'commentaire');
$model['GestionnaireCommentaire']->commenterSalle($noProfil, $id, $texte);

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['noProfil']=$noProfil;
$vue['nomProfil']=$nomProfil;
$vue['photoProfil']=$photoProfil;
$vue['descProfil']=$descProfil;
$vue['petiteAnnonce']=$petiteAnnonces;
$vue['commentaire']=$commentaires;
$vue['adresse']=$adresse;
$vue['cp']=$cp;
$vue['ville']=$ville;
$view->render('salle', $vue);

/* fin de l'affichage de la vue */
?>
