<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$pseudo = filter_input(INPUT_POST, 'pseudo');
$email = filter_input(INPUT_POST, 'email');
$passe = filter_input(INPUT_POST, 'passe');
$passe2 = filter_input(INPUT_POST, 'passe2');
$existeDeja = false;
$problemeMdp = false;
if ((!empty($pseudo)) and
        (!empty($email)) and
        (!empty($passe)) and
        (!empty($passe2))) {
    //on verifie qu'on est pas en train de creer un doublon (mail ou pseudo)

    if ($model['GestionnaireUtilisateur']->existeDejaMail($email) || $model['GestionnaireUtilisateur']->existeDejaPseudo($pseudo)) {
        $existeDeja = true;
    } else {
        $existeDeja = false;
        $passe = htmlspecialchars($passe);
        $passe2 = htmlspecialchars($passe2);
        $problemeMdp = true;
        if ($passe == $passe2) {
            $pseudo = htmlspecialchars($pseudo);
            $email = htmlspecialchars($email);
           
            mysqli_query($link, "INSERT INTO $tableValidation VALUES('', '$pseudo', '$passe', '$email')");
            $problemeMdp = false;
        } 
    }
}

/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['existeDeja'] = $existeDeja;
$vue['problemeMdp'] = $problemeMdp;

$view->render('inscription', $vue);

/* fin de l'affichage de la vue */
?>
