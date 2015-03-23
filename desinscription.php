<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

    $confirm = false;
    $id = filter_input(INPUT_GET, 'id');
    if (isset($id)) {
        $confirm = filter_input(INPUT_GET, 'confirm');
        if (isset($confirm)) {
            if ($confirm === "true") {
                $model['GestionnaireUtilisateur']->desinscription($id);
                $_SESSION['user'] = null;
                echo "<script>document.location.href='index.php';</script>";
            }
        } else {
            echo "<script>var tmp=confirm('Voulez vous vraiment vous desinscrire ?'); if(tmp){document.location.href='desinscription.php?id=" . $id . "&confirm=true';}</script>";
        }
    }

/* fin de séquence */

/* redirection */

include 'index.php';
?>
