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
$infoProfil = $model['GestionnaireProfil']->getAllInfo_Salle($noProfil);
$nomProfil = $infoProfil['nomSalle'];
$photoProfil = $infoProfil['photoProfilSalle'];
$descProfil = $infoProfil['descriptionSalle'];
$genre = $infoProfil['genreMusicalSalle'];
$adresse = $infoProfil['adresseSalle'];
$cp = $infoProfil['cpSalle'];
$ville = $infoProfil['villeSalle'];
$tel = $infoProfil['telSalle'];

if (isset($_SESSION['user']['id'])) {
    $id = $_SESSION['user']['id'];
}
//renvoit un boolean qui indique si l'utilisateur courant est le proprietaire du profil courant
$estProprietaire = false;
if (isset($id)) {
    $estProprietaire = $model['GestionnaireProfil']->estProprietaireProfilSalle($noProfil, $id);
}

//ajout du profil courant en favori
$favori = filter_input(INPUT_GET, 'fav');
if ($favori === "true") {
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $model['GestionnaireUtilisateur']->ajouterEnFavoriSalle($noProfil, $id);
        $metEnFavori = true;
    }
}

//ajout d'un commentaire
$texte = filter_input(INPUT_POST, 'commentaire');
if (!empty($texte)) {
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $texte = htmlspecialchars($texte);
        $model['GestionnaireCommentaire']->commenterSalle($noProfil, $id, $texte);
    }
}
//suppression d'un commentaire
$nCom = filter_input(INPUT_GET, 'nCom');
$remove = filter_input(INPUT_POST, 'remove');
if ($remove === "true") {
    if (isset($id)) {
        if ($model['GestionnaireCommentaire']->estProprietaireCommentaireSalle($nCom, $id)or ( $model['GestionnaireProfil']->estProprietaireProfilSalle($noProfil, $id))) {
            $model['GestionnaireCommentaire']->supprimerCommentaireSalle($nCom);
        }
    }
}
//recuperation de tous les commentaires pour l'affichage
$commentaires = $model['GestionnaireCommentaire']->getAllCommentairesByIdSalle($noProfil);

//suppression d'un photo de l'album
$nPhoto = filter_input(INPUT_GET, 'nP');
$removePhoto = filter_input(INPUT_POST, 'removePhoto');
if (isset($id)) {
    if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
        if ($removePhoto === "true") {
            if ($model['GestionnaireProfil']->estProprietaireProfilSalle($noProfil, $id)) {
                $model['GestionnaireProfil']->supprimerPhotoSalle($noProfil, $nPhoto);
            }
        }
    }
}
//ajout d'un photo a l'album
if (isset($_FILES['mon_fichier'])) {
    if (isset($id)) {
        if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
            $tab_img = $_FILES['mon_fichier'];
            if ($_FILES['mon_fichier']['error'] > 0) {
                $erreur = "Erreur lors du transfert";
            }
            $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(substr(strrchr($tab_img['name'], '.'), 1));
            $idmax = $model['GestionnaireProfil']->getNMaxPhotoSalle($noProfil);
            $idmax++;
            $dossier = "web/image/albumPhotoSalle/{$noProfil}";
            if (!is_dir($dossier)) {
                mkdir($dossier);
            }
            $chemin = "web/image/albumPhotoSalle/{$noProfil}/{$idmax}.{$extension_upload}";
            $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
            if ($resultat) {
                $model['GestionnaireProfil']->ajouterPhotoSalle($noProfil, $chemin);
            }
        }
    }
}
//recuperation de toutes les photos de l'album pour l'affichage
$albumPhoto = $model['GestionnaireProfil']->getAllPhotoSalleById($noProfil);

//suppression d'une petite annonce
$nPetiteAnnonce = filter_input(INPUT_GET, 'nPetiteAnnonce');
if (isset($id)) {
    if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
        $model['GestionnaireAnnonce']->supprimerPetiteAnnonceByIdSalle($noProfil, $nPetiteAnnonce);
    }
}
//suppression d'une annonce evenement
$nAnnonceEvenement = filter_input(INPUT_GET, 'nAnnonceEvenement');
if (isset($id)) {
    if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
        $model['GestionnaireAnnonce']->supprimerAnnonceEvenementByIdSalle($noProfil, $nAnnonceEvenement);
    }
}
//creation d'annonce
$typeAnnonce = filter_input(INPUT_POST, 'typeAnnonce');
$texteAnnonce = filter_input(INPUT_POST, 'posterAnnonce');
$dateDeb = filter_input(INPUT_POST, 'dateDeb');
$dateFin = filter_input(INPUT_POST, 'dateFin');
if (isset($typeAnnonce)) {
    if (isset($id)) {
        if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
            if ($typeAnnonce === 'petiteAnnonce') {
                if (!empty($texteAnnonce)) {
                    $texteAnnonce = htmlspecialchars($texteAnnonce);
                    $model['GestionnaireAnnonce']->creerPetiteAnnonce($noProfil, $texteAnnonce, $dateDeb, $dateFin);
                    $petiteAnnonces = $model['GestionnaireAnnonce']->getAllPetiteAnnonceByIdSalle($noProfil);
                }
            }
            if ($typeAnnonce === 'annonceEvenement') {
                if (!empty($texteAnnonce)) {
                    $texteAnnonce = htmlspecialchars($texteAnnonce);
                    $model['GestionnaireAnnonce']->creerAnnonceEvenementSalle($noProfil, $texteAnnonce);
                    $annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdSalle($noProfil);
                }
            }
        }
    }
}
//recuperation de toutes les annonces pour l'affichage
$petiteAnnonces = $model['GestionnaireAnnonce']->getAllPetiteAnnonceByIdSalle($noProfil);
$annoncesEvenement = $model['GestionnaireAnnonce']->getAllAnnonceEvenementByIdSalle($noProfil);

//proposition de concert
$nomArtiste = filter_input(INPUT_POST, 'nomArtiste');
$dateConcert = filter_input(INPUT_POST, 'dateConcert');
$existeArtiste = true;
$ok = false;
$nArtiste = null;
if (isset($nomArtiste)) {
//    if (isset($id)) {
//        if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
            $existeArtiste = $model['GestionnaireConcert']->existeArtiste($nomArtiste); //on recupere ici le numero de profil de l'artiste si il existe
            if ($existeArtiste !== false) {
                if (isset($dateConcert)) {
                    $ok = true;
                    $nArtiste = $existeArtiste;
                }
            }
//        }
//    }
}

//les notes
$note = filter_input(INPUT_GET, 'note');
if (isset($note)) {
    if (!isset($id)) {
        $estConnecte = false;
    } else {
        $estConnecte = true;
        $model['GestionnaireUtilisateur']->noterSalle($noProfil, $id, $note);
    }
}
$noteMoyenne = $model['GestionnaireUtilisateur']->getNoteSalle($noProfil);

//annulation d'un concert
$nConcertSup = filter_input(INPUT_GET, 'nConcertSup');
if (isset($nConcertSup)) {
    if (isset($id)) {
        if ($model['GestionnaireProfil']->estProprietaireProfilArtiste($noProfil, $id)) {
            $confirm = filter_input(INPUT_GET, 'confirm');
            if (isset($confirm)) {
                if ($confirm === "true") {
                    $model['GestionnaireConcert']->annulerConcert($nConcertSup);
                }
            } else {
                echo "<script>var tmp=confirm('Voulez vous vraiment annuler ce concert ?'); if(tmp){document.location.href='salle.php?tmp=" . $noProfil . "&nConcertSup=" . $nConcertSup . "&confirm=true';}</script>";
            }
        }
    }
}

//recuperation des concerts à venir
$aVenir = $model['GestionnaireConcert']->getConcertBySalle($noProfil);

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
$vue['petiteAnnonce'] = $petiteAnnonces;
$vue['annonceEvenement'] = $annoncesEvenement;
$vue['commentaire'] = $commentaires;
$vue['adresse'] = $adresse;
$vue['cp'] = $cp;
$vue['ville'] = $ville;
$vue['tel'] = $tel;
$vue['estProprietaire'] = $estProprietaire;
$vue['existeArtiste'] = $existeArtiste;
$vue['nomArtiste'] = $nomArtiste;
$vue['dateConcert'] = $dateConcert;
$vue['ok'] = $ok;
$vue['nArtiste'] = $nArtiste;
$vue['aVenir'] = $aVenir;
$view->render('salle', $vue);

/* fin de l'affichage de la vue */
?>