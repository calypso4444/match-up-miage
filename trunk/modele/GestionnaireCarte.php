<?php

class GestionnaireCarte extends Gestionnaire {

    public function getAllSalleConcertByDate($date) {
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, photoProfilSalle, adresseSalle, cpSalle,villeSalle, latitude, longitude,A.nArtiste, nomArtiste FROM " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " ON S.nSalle=C.nSalle "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['ARTISTE'] . " A"
                . " ON A.nArtiste=C.nArtiste "
                . " WHERE C.dateConcert=STR_TO_DATE('$date','%d/%m/%Y');");
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
    
    public function getAllSalleConcertByDateArrondissement($date,$arrondissement) {
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, photoProfilSalle, adresseSalle, cpSalle,villeSalle, latitude, longitude,A.nArtiste, nomArtiste FROM " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " ON S.nSalle=C.nSalle "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['ARTISTE'] . " A"
                . " ON A.nArtiste=C.nArtiste "
                . " WHERE C.dateConcert=STR_TO_DATE('$date','%d/%m/%Y')"
                . " AND cpSalle=750$arrondissement ;");
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
    
    public function getAllSalleConcertByDateGenre($date,$genre) {
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, photoProfilSalle, adresseSalle, cpSalle,villeSalle, latitude, longitude,A.nArtiste, nomArtiste, genreMusicalArtiste, genreMusicalSalle FROM " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " ON S.nSalle=C.nSalle "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['ARTISTE'] . " A"
                . " ON A.nArtiste=C.nArtiste "
                . " WHERE ( C.dateConcert=STR_TO_DATE('$date','%d/%m/%Y')"
                . " AND genreMusicalSalle LIKE '%$genre%')"
                . " OR ( C.dateConcert=STR_TO_DATE('$date','%d/%m/%Y')"
                . " AND genreMusicalArtiste LIKE '%$genre%') ;");
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
