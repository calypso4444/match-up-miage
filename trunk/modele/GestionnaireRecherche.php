<?php

class GestionnaireRecherche extends Gestionnaire {

    public function rechercheParMotClef($motClef) {
        $resultat = array();
        $resultat['artiste'] = $this->rechercheArtiste($motClef);
        $resultat['salle'] = $this->rechercheSalle($motClef);
        return $resultat;
    }

    public function rechercheArtiste($motClef) {
        $req = mysqli_query($this->link, " SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " "
                . " WHERE nomArtiste LIKE '%$motClef%' "
                . " OR descriptionArtiste LIKE '%$motClef%' "
                . " OR genreMusicalArtiste LIKE '%$motClef%' "
                . " ORDER BY nomArtiste;");
        if ($req !== false) {
            $artiste = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $artiste[] = $row;
            }
            return $artiste;
        } else {
            return null;
        }
    }

    public function rechercheSalle($motClef) {
        $req = mysqli_query($this->link, " SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " "
                . " WHERE nomSalle LIKE '%$motClef%' "
                . " OR descriptionSalle LIKE '%$motClef%' "
                . " OR genreMusicalSalle LIKE '%$motClef%' "
                . " OR adresseSalle LIKE '%$motClef%' "
                . " OR villeSalle LIKE '%$motClef%' "
                . " OR nomGerant LIKE '%$motClef%' "
                . " OR prenomGerant LIKE '%$motClef%' "
                . " ORDER BY nomSalle;");
        if ($req !== false) {
            $salle = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $salle[] = $row;
            }
            return $salle;
        } else {
            return null;
        }
    }

    public function rechercheParMotClefArrondissement($motClef, $arrondissement) {
        $resultat = array();
        $resultat['artiste'] = null;
        $resultat['salle'] = $this->rechercheSalleArrondissement($motClef, $arrondissement);
        return $resultat;
    }

    public function rechercheSalleArrondissement($motClef, $arrondissement) {
        $req = mysqli_query($this->link, " SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " "
                . " WHERE (nomSalle LIKE '%$motClef%' "
                . " OR descriptionSalle LIKE '%$motClef%' "
                . " OR genreMusicalSalle LIKE '%$motClef%' "
                . " OR adresseSalle LIKE '%$motClef%' "
                . " OR villeSalle LIKE '%$motClef%' "
                . " OR nomGerant LIKE '%$motClef%' "
                . " OR prenomGerant LIKE '%$motClef%')"
                . " AND cpSalle=750$arrondissement "
                . " ORDER BY nomSalle;");
        if ($req !== false) {
            $salle = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $salle[] = $row;
            }
            return $salle;
        } else {
            return null;
        }
    }

    public function rechercheParMotClefGenre($motClef, $genre) {
        $resultat = array();
        $resultat['artiste'] = $this->rechercheArtisteGenre($motClef, $genre);
        $resultat['salle'] = $this->rechercheSalleGenre($motClef, $genre);
        return $resultat;
    }

    public function rechercheArtisteGenre($motClef, $genre) {
        $req = mysqli_query($this->link, " SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " "
                . " WHERE (nomArtiste LIKE '%$motClef%' "
                . " OR descriptionArtiste LIKE '%$motClef%' "
                . " OR genreMusicalArtiste LIKE '%$motClef%')"
                . " AND genreMusicalArtiste LIKE '%$genre' "
                . " ORDER BY nomArtiste;");
        if ($req !== false) {
            $artiste = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $artiste[] = $row;
            }
            return $artiste;
        } else {
            return null;
        }
    }

    public function rechercheSalleGenre($motClef, $genre) {
        $req = mysqli_query($this->link, " SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " "
                . " WHERE (nomSalle LIKE '%$motClef%' "
                . " OR descriptionSalle LIKE '%$motClef%' "
                . " OR genreMusicalSalle LIKE '%$motClef%' "
                . " OR adresseSalle LIKE '%$motClef%' "
                . " OR villeSalle LIKE '%$motClef%' "
                . " OR nomGerant LIKE '%$motClef%' "
                . " OR prenomGerant LIKE '%$motClef%') "
                . " AND genreMusicalArtiste LIKE '%$genre' "
                . " ORDER BY nomSalle;");
        if ($req !== false) {
            $salle = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $salle[] = $row;
            }
            return $salle;
        } else {
            return null;
        }
    }

}

?>
