<?php

class GestionnaireConcert extends Gestionnaire {

    public function getEvenementsLesPlusSuivis() {
        $req = mysqli_query($this->link, " SELECT A.nomArtiste, S.nomSalle, C.dateConcert, C.nConcert FROM " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
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
        $date = new DateTime();
        $date = $date->format('20y-m-d');
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, A.nArtiste, A.nomArtiste, C.dateConcert, C.nConcert FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " ON S.nSalle=C.nSalle "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " A "
                . " ON A.nArtiste=C.nArtiste"
                . " WHERE C.dateConcert>='$date' "
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

    public function getConcertByArtiste($noProfil) {
        $req = mysqli_query($this->link, " SELECT S.nSalle, nomSalle, A.nArtiste, A.nomArtiste, C.dateConcert, C.nConcert FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " S "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONCERT'] . " C "
                . " ON S.nSalle=C.nSalle "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " A "
                . " ON A.nArtiste=C.nArtiste"
                . " WHERE C.dateConcert>=CURDATE()"
                . " AND A.nArtiste=$noProfil "
                . " ORDER BY C.dateConcert DESC;");
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

    public function existeArtiste($nomArtiste) {
        $reqm = mysqli_query($this->link, "SELECT nArtiste FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE nomArtiste='$nomArtiste'");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row['nArtiste'] > 0 ? $row['nArtiste'] : false;
        } else {
            return false;
        }
    }

    public function newConcert($nSalle, $nArtiste, $dateConcert) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['CONCERT'] . " (nSalle,nArtiste,dateConcert) VALUES ($nSalle,$nArtiste,STR_TO_DATE('$dateConcert','%d/%m/%Y'));");
    }

}

?>
