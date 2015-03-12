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

    public function getAllPetiteAnnonce() {
        $reqm = mysqli_query($this->link, " SELECT nPetiteAnnonce, auteur,textePetiteAnnonce, dateDeb, dateFin,dateEditionPetiteAnnonce, nomSalle, photoProfilSalle "
                . " FROM " . $GLOBALS['DB_TABLE']['PETITE_ANNONCE'] . " P "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " ON S.nSalle=auteur "
                . " ORDER BY dateEditionPetiteAnnonce DESC; ");
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

    public function supprimerPetiteAnnonceByIdSalle($noprofil, $nAnnonce) {
        mysqli_query($this->link, " DELETE FROM " . $GLOBALS['DB_TABLE']['PETITE_ANNONCE'] . " WHERE nPetiteAnnonce=$nAnnonce AND auteur=$noprofil");
    }

    public function getAllAnnonceEvenementByIdSalle($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ANNONCE_EVENEMENT_S'] . " WHERE auteur=$noProfil");
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

    public function getAllAnnonceEvenementByIdArtiste($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ANNONCE_EVENEMENT_A'] . " WHERE auteur=$noProfil");
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
