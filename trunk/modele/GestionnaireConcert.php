<?php

class GestionnaireConcert extends Gestionnaire {

    public function getEvenementsLesPlusSuivis() {
        $req = mysqli_query($this->link, " SELECT A.nomArtiste, S.nomSalle, C.dateConcert FROM " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " INNER JOIN "
                . " (SELECT cible, COUNT(*) AS nbrSuivi "
                . " FROM " . $GLOBALS['DB_TABLE']['EVENEMENT_SUIVI']
                . " GROUP BY cible) E"
                . " ON nConcert=E.cible "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " A "
                . " ON A.nArtiste=C.nArtiste"
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " ON S.nSalle=C.nSalle "
                . " ORDER BY nbrSuivi DESC;");
        if ($req !== false) {
            $concerts = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $concerts[] = $row;
            }
            return $concerts;
        } else {
            return null;
        }
    }

    public function getAllConcertByDate($date) {
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, A.nArtiste, A.nomArtiste, C.dateConcert FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " ON S.nSalle=C.nSalle "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " A "
                . " ON A.nArtiste=C.nArtiste"
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " ON S.nSalle=C.nSalle "
                . " ORDER BY C.dateConcert "
                . " WHERE C.dateConcert=STR_TO_DATE('$date','%d/%m/%Y');");
        if ($req !== false) {
            $concert = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $concert[] = $row;
            }
            return $concert;
        } else {
            return null;
        }
    }

    public function getAllConcert() {
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, A.nArtiste, A.nomArtiste, C.dateConcert FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " ON S.nSalle=C.nSalle "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " A "
                . " ON A.nArtiste=C.nArtiste"
                . " WHERE C.dateConcert>=CURDATE() "
                . " ORDER BY C.dateConcert;");
        if ($req !== false) {
            $concert = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $concert[] = $row;
            }
            return $concert;
        } else {
            return null;
        }
    }

}

?>
