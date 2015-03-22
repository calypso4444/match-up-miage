<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id = $_SESSION['user']['id'];

if (isset($id)) {
    $nSalle = filter_input(INPUT_GET, 'nSalle');
    if (isset($nSalle)) {
        $confirm = filter_input(INPUT_GET, 'confirm');
        if (isset($confirm)) {
            if ($confirm === "true") {
                $model['GestionnaireProfil']->supprimerSalle($nSalle, $id);
            }
        } else {
            echo "<script>var tmp=confirm('Voulez vous vraiment supprimer ce profil ?'); if(tmp){document.location.href='supprimer_salle.php?nSalle=" . $nSalle . "&confirm=true';}</script>";
        }
    }
}


/* fin de séquence */

/* affichage de la vue */

include 'f_mes_profils.php';

/* fin de l'affichage de la vue */
?>
