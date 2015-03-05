<!-- web -->

<?php
/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$user = $_SESSION['user'];

$id = $user['id'];

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

$mailDejaPris = false;
$mdpVideOuIncorrect = false;
$problemeMdp = false;

//on verifie d'abord que le champ mot de passe actuel n'est ni vide ni rempli avec un mot de passe incorrect
//sans le mot de passe courant correct on ne fait rien dans la bdd
if (!empty($cpasse)and ( sha1($cpasse) === $user['passe'])) {
    //changement de mail
    $email = htmlspecialchars($email);
    if (!empty($email)and ( $email !== $user['email'])) {
        //on verifie que le mail n'est pas deja pris
        if ($model['GestionnaireUtilisateur']->existeDejaMail($email)) {
            $mailDejaPris = true;
        } else {
            $model['GestionnaireUtilisateur']->setMail($id, $email);
        }
    }
    //changement de mot de passe
    if (!empty($npasse)and ! empty($npasse2)) {
        $npasse = htmlspecialchars($npasse);
        $npasse2 = htmlspecialchars($npasse2);
        if ($npasse == $npasse2) {
            $npasse = sha1($npasse);
            $model['GestionnaireUtilisateur']->setMdp($id, $npasse);
        } else {
            $problemeMdp = true;
        }
    }
    //changement de nom
    $nom = htmlspecialchars($nom);
    if (!empty($nom)and ( $nom !== $user['nom'])) {
        $model['GestionnaireUtilisateur']->setNom($id, $nom);
    }
    //changement de prenom
    $prenom = htmlspecialchars($prenom);
    if (!empty($prenom)and ( $prenom !== $user['prenom'])) {
        $model['GestionnaireUtilisateur']->setPrenom($id, $prenom);
    }
    //changement d'adresse
    $adresse = htmlspecialchars($adresse);
    if (!empty($adresse)and ( $adresse !== $user['adresse'])) {
        $model['GestionnaireUtilisateur']->setAdresse($id, $adresse);
    }
    //changement de CP
    $cp = htmlspecialchars($cp);
    if (!empty($cp)and ( $cp !== $user['CP'])) {
        $model['GestionnaireUtilisateur']->setCP($id, $cp);
    }
    //changement de ville
    $ville = htmlspecialchars($ville);
    if (!empty($ville)and ( $ville !== $user['ville'])) {
        $model['GestionnaireUtilisateur']->setVille($id, $ville);
    }
} else {
    $mdpVideOuIncorrect = true;
}

//traitement de l'avatar
if (isset($_FILES['mon_fichier'])) {
    $tab_img = $_FILES['mon_fichier'];
    echo $tab_img['name'] . "name</br>";
    echo $tab_img['type'] . "type</br>";
    echo $tab_img['size'] . "size</br>";
    echo $tab_img['tmp_name'] . "tmp_name</br>";
    echo $tab_img['error'] . "error</br>";
    echo implode($_FILES['mon_fichier']);
    if ($_FILES['mon_fichier']['error'] > 0) {
        $erreur = "Erreur lors du transfert";
    }
    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
    //1. strrchr renvoie l'extension avec le point (« . »).
    //2. substr(chaine,1) ignore le premier caractère de chaine.
    //3. strtolower met l'extension en minuscules.
    $extension_upload = strtolower(substr(strrchr($tab_img['name'], '.'), 1));
    if (in_array($extension_upload, $extensions_valides)) {
        echo "Extension correcte";
    }
//    $maxwidth = 0;
//    $maxheight = 0;
//    $image_sizes = getimagesize($tab_img['tmp_name']);
//    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) {
//        $erreur = "Image trop grande";
//    }
    $chemin = "web/image/avatar/{$id}.{$user['pseudo']}.{$extension_upload}";
    $resultat = move_uploaded_file($tab_img['tmp_name'], $chemin);
    if ($resultat) {
        $model['GestionnaireUtilisateur']->setAvatar($id, $chemin);
        echo "Transfert réussi";
    }
}
//$_FILES['mon-fichier']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
//$_FILES['mon_fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
//$_FILES['mon_fichier']['size'];     //La taille du fichier en octets.
//$_FILES['mon_fichier']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
//$_FILES['mon_fichier']['error'];

/* fin de séquence */

/* affichage de la vue */

$vue = array();
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
