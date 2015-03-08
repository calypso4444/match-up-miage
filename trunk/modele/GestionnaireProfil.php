<?php

class GestionnaireProfil extends Gestionnaire {

    public function newProfilArtiste($id) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['ARTISTE'] . " (proprietaireArtiste) VALUES($id);");
        $tmp = mysqli_query($this->link, "SELECT MAX(nArtiste)AS idmax FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE proprietaireArtiste=$id");
        $row = mysqli_fetch_assoc($tmp);
        return $row['idmax'];
    }

    public function newProfilSalle($id) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['SALLE'] . " (proprietaireSalle) VALUES($id);");
        $tmp = mysqli_query($this->link, "SELECT MAX(nSalle)AS idmax FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE proprietaireSalle=$id");
        $row = mysqli_fetch_assoc($tmp);
        return $row['idmax'];
    }

    public function getAllInfo_Artiste($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE nArtiste='$noProfil'");
        $row = mysqli_fetch_assoc($reqm);
        return $row != null ? $row : null;
    }

    public function getAllInfo_Salle($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE nSalle='$noProfil'");
        $row = mysqli_fetch_assoc($reqm);
        return $row != null ? $row : null;
    }

    public function getAllProfil_ArtisteById($id) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE proprietaireArtiste=$id");
        $profils = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $profils[] = $row;
        }
        return $profils;
    }

    public function getAllProfil_SalleById($id) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE proprietaireSalle=$id");
        $profils = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $profils[] = $row;
        }
        return $profils;
    }

    public function getAllProfil_Artiste() {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . "");
        $profils = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $profils[] = $row;
        }
        return $profils;
    }

    public function getAllProfil_Salle() {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . "");
        $profils = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $profils[] = $row;
        }
        return $profils;
    }

}

?>