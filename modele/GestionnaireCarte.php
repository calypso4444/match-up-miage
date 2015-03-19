<?php

class GestionnaireCarte extends Gestionnaire {

    public function getAllSalleConcertByDate($date) {
        echo "SELECT S.nSalle, nomSalle, photoProfilSalle,descriptionSalle, genreMusicalSalle, adresseSalle, cpSalle,villeSalle, latitude, longitude FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " ON S.nSalle=C.nSalle "
                . " WHERE C.dateConcert='$date';";
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, photoProfilSalle,descriptionSalle, genreMusicalSalle, adresseSalle, cpSalle,villeSalle, latitude, longitude FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " ON S.nSalle=C.nSalle "
                . " WHERE C.dateConcert='$date';");
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
