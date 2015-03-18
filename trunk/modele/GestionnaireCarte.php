<?php

class GestionnaireCarte extends Gestionnaire {

    public function getAllSalleConcertByDate($date) {
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, photoProfilSalle,descriptionSalle, genreMusicalSalle, adresseSalle, cpSalle,villeSalle, latitude, longitude FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " INNER JOIN "
                . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " ON S.nSalle=C.nSalle "
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
    
}

?>
