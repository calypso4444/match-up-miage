<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$id = $_SESSION['user']['id'];

if (isset($id)) {
    $nArtiste = filter_input(INPUT_GET, 'nArtiste');
    if (isset($nArtiste)) {
        $confirm = filter_input(INPUT_GET, 'confirm');
        if (isset($confirm)) {
            if ($confirm === "true") {
                $model['GestionnaireProfil']->supprimerArtiste($nArtiste, $id);
            }
        } else {
            echo "<script>var tmp=confirm('Voulez vous vraiment supprimer ce profil ?'); if(tmp){document.location.href='supprimer_artiste.php?nArtiste=" . $nArtiste . "&confirm=true';}</script>";
        }
    }
}

/* fin de séquence */

/* affichage de la vue */

include 'f_mes_profils.php';

/* fin de l'affichage de la vue */
?>
