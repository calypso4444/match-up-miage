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

    public function creerPetiteAnnonce($noProfil, $texteAnnonce, $dateDeb, $dateFin) {
        $texteAnnonce=mysqli_real_escape_string($this->link, $texteAnnonce);
        if (empty($dateDeb)) {
            if (empty($dateFin)) {
                mysqli_query($this->link, " INSERT INTO " . $GLOBALS['DB_TABLE']['PETITE_ANNONCE'] . " (auteur,textePetiteAnnonce, dateEditionPetiteAnnonce, dateDeb) VALUES ($noProfil,'$texteAnnonce',NOW(), NOW());");
            } else {
                mysqli_query($this->link, " INSERT INTO " . $GLOBALS['DB_TABLE']['PETITE_ANNONCE'] . " (auteur,textePetiteAnnonce, dateEditionPetiteAnnonce, dateDeb) VALUES ($noProfil,'$texteAnnonce',NOW(), STR_TO_DATE('$dateDeb','%d/%m/%Y'));");
            }
        } else {
            mysqli_query($this->link, " INSERT INTO " . $GLOBALS['DB_TABLE']['PETITE_ANNONCE'] . " (auteur,textePetiteAnnonce, dateEditionPetiteAnnonce, dateDeb, dateFin) VALUES ($noProfil,'$texteAnnonce',NOW(), STR_TO_DATE('$dateDeb','%d/%m/%Y'), STR_TO_DATE('$dateFin','%d/%m/%Y'));");
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

    public function supprimerAnnonceEvenementByIdSalle($noprofil, $nAnnonce) {
        mysqli_query($this->link, " DELETE FROM " . $GLOBALS['DB_TABLE']['ANNONCE_EVENEMENT_S'] . " WHERE nAnnonceEvenementSalle=$nAnnonce AND auteur=$noprofil");
    }

    public function supprimerAnnonceEvenementByIdArtiste($noprofil, $nAnnonce) {
        mysqli_query($this->link, " DELETE FROM " . $GLOBALS['DB_TABLE']['ANNONCE_EVENEMENT_A'] . " WHERE nAnnonceEvenementArtiste=$nAnnonce AND auteur=$noprofil");
    }

    public function creerAnnonceEvenementSalle($noProfil, $texteAnnonce) {
        $texteAnnonce=mysqli_real_escape_string($this->link, $texteAnnonce);
        mysqli_query($this->link, " INSERT INTO " . $GLOBALS['DB_TABLE']['ANNONCE_EVENEMENT_S'] . " (auteur,texteAnnonceEvenementSalle, dateEditionAnnonceEvenementSalle) VALUES ($noProfil,'$texteAnnonce',NOW());");
    }

    public function creerAnnonceEvenementArtiste($noProfil, $texteAnnonce) {
        $texteAnnonce=mysqli_real_escape_string($this->link, $texteAnnonce);
        mysqli_query($this->link, " INSERT INTO " . $GLOBALS['DB_TABLE']['ANNONCE_EVENEMENT_A'] . " (auteur,texteAnnonceEvenementArtiste, dateEditionAnnonceEvenementArtiste) VALUES ($noProfil,'$texteAnnonce',NOW())");
    }

    public function getPetiteAnnonce($nAnnonce) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['PETITE_ANNONCE'] . " WHERE nPetiteAnnonce=$nAnnonce");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row;
        } else {
            return null;
        }
    }

}

?>
