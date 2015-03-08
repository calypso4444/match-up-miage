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
    
    public function supprimerArtiste($nArtiste, $idProprietaire) {
        if(mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE nArtiste=$nArtiste AND proprietaireArtiste=$idProprietaire")) {
            mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['FAVORI_A'] . " WHERE cible='$nArtiste'");
        }
    }
    
    public function supprimerSalle($nSalle, $idProprietaire) {
        if(mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE nArtiste=$nSalle AND proprietaireSalle=$idProprietaire")) {
            mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['FAVORI_S'] . " WHERE cible='$nSalle'");
        }
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

    public function setNomArtiste($noprofil,$nom){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET nomArtiste='$nom' WHERE nArtiste = $noprofil;");
    }
    
    public function setDescriptionArtiste($noprofil,$desc){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET descriptionArtiste='$desc' WHERE nArtiste = $noprofil;");
    }
    
    public function setphotoProfilArtiste($noprofil,$path){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET photoProfilArtiste='$path' WHERE nArtiste = $noprofil;");
    }
    
    public function setGenreMusicalArtiste($noprofil,$genre){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET genreMusicalArtiste='$genre' WHERE nArtiste = $noprofil;");
    }
    
    public function setNomSalle($noprofil,$nom){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET nomSalle='$nom' WHERE nSalle = $noprofil;");
    }
    
    public function setDescriptionSalle($noprofil,$desc){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET descriptionSalle='$desc' WHERE nSalle = $noprofil;");
    }
    
    public function setphotoProfilSalle($noprofil,$path){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET photoProfilSalle='$path' WHERE nSalle = $noprofil;");
    }
    
    public function setGenreMusicalSalle($noprofil,$genre){
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET genreMusicalSalle='$genre' WHERE nSalle = $noprofil;");
    }
}

?>