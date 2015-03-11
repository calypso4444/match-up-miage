<?php

class GestionnaireAnnonce extends Gestionnaire {

    public function getAllPetiteAnnonceByIdSalle($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['PETITE_ANNONCE'] . " WHERE auteur=$noProfil");
        if ($reqm !== false) {
            $annonces = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $annonces[] = $row;
            }
            return $annonces;
        } else {
            return null;
        }
    }

}

?>
