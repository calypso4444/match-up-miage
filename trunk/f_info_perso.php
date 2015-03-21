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
    $user = $_SESSION['user'];

    //on recupere toutes les informations remplies dans le formulaire par l'utilisateur
    $pseudo = filter_input(INPUT_POST, 'pseudo');
    $email = filter_input(INPUT_POST, 'email');
    $cpasse = filter_input(INPUT_POST, 'cpasse');
    $npasse = filter_input(INPUT_POST, 'npasse');
    $npasse2 = filter_input(INPUT_POST, 'npasse2');
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $adresse = filter_input(INPUT_POST, 'adresse');
    $cp = filter_input(INPUT_POST, 'CP');
    $ville = filter_input(INPUT_POST, 'ville');

    //on initialise nos boolean
    $mailDejaPris = false;
    $mdpVideOuIncorrect = false;
    $problemeMdp = false;

// si la requete est de type POST et que le mot de passe est incorrect
    if (!empty($email) && !empty($cpasse) and ( sha1($cpasse) !== $user['passe'])) {
        $mdpVideOuIncorrect = true;
    }

//on verifie d'abord que le champ mot de passe actuel n'est ni vide ni rempli avec un mot de passe incorrect
//sans le mot de passe courant correct on ne fait rien dans la bdd
    if (!empty($cpasse) and ( sha1($cpasse) === $user['passe'])) {
        //changement de mail
        $email = htmlspecialchars($email);
        if (!empty($email) and ( $email !== $user['email'])) {
            //on verifie que le mail n'est pas deja pris
            if ($model['GestionnaireUtilisateur']->existeDejaMail($email)) {
                $mailDejaPris = true;
            } else {
                $model['GestionnaireUtilisateur']->setMail($id, $email);
                $user['email'] = $email;
            }
        }
        //changement de mot de passe
        if (!empty($npasse) and ! empty($npasse2)) {
            $npasse = htmlspecialchars($npasse);
            $npasse2 = htmlspecialchars($npasse2);
            if ($npasse == $npasse2) {
                $npasse = sha1($npasse);
                $model['GestionnaireUtilisateur']->setMdp($id, $npasse);
                $user['npasse'] = $npasse;
            } else {
                $problemeMdp = true;
            }
        }
        //changement de nom
        $nom = htmlspecialchars($nom);
        if (!empty($nom) and ( $nom !== $user['nom'])) {
            $model['GestionnaireUtilisateur']->setNom($id, $nom);
            $user['nom'] = $nom;
        }
        //changement de prenom
        $prenom = htmlspecialchars($prenom);
        if (!empty($prenom) and ( $prenom !== $user['prenom'])) {
            $model['GestionnaireUtilisateur']->setPrenom($id, $prenom);
            $user['prenom'] = $prenom;
        }
        //changement d'adresse
        $adresse = htmlspecialchars($adresse);
        if (!empty($adresse) and ( $adresse !== $user['adresse'])) {
            $model['GestionnaireUtilisateur']->setAdresse($id, $adresse);
            $user['adresse'] = $adresse;
        }
        //changement de CP
        $cp = htmlspecialchars($cp);
        if (!empty($cp) and ( $cp !== $user['CP'])) {
            $model['GestionnaireUtilisateur']->setCP($id, $cp);
            $user['CP'] = $cp;
        }
        //changement de ville
        $ville = htmlspecialchars($ville);
        if (!empty($ville) and ( $ville !== $user['ville'])) {
            $model['GestionnaireUtilisateur']->setVille($id, $ville);
            $user['ville'] = $ville;
        }
    }

//traitement de l'avatar
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
        $chemin = "web/image/avatar/{$id}.{$user['pseudo']}.{$extension_upload}";
        $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
        if ($resultat) {
            $model['GestionnaireUtilisateur']->setAvatar($id, $chemin);
            $user['chemin'] = $chemin;
        }
    }
}
/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['estConnecte'] = $estConnecte;
$vue['userPseudo'] = $user['pseudo'];
$vue['userMail'] = $user['email'];
$vue['userNom'] = $user['nom'];
$vue['userPrenom'] = $user['prenom'];
$vue['userAdresse'] = $user['adresse'];
$vue['userCP'] = $user['CP'];
$vue['userVille'] = $user['ville'];
$vue['userAvatar'] = $user['avatar'];
$vue['mdpVideOuIncorrect'] = $mdpVideOuIncorrect;
$vue['problemeMdp'] = $problemeMdp;
$vue['mailDejaPris'] = $mailDejaPris;
$view->render('f_info_perso', $vue);

/* fin de l'affichage de la vue */
?>
