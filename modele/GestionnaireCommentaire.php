<?php

class GestionnaireCommentaire extends Gestionnaire {

    public function getAllCommentairesByIdSalle($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT nCommentaireSalle,cible,texteCommentaireSalle,dateEditionCommentaireSalle, auteur, pseudo, avatar "
                . " FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . " "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONNEXION'] . " "
                . " ON auteur=id "
                . "WHERE cible=$noProfil");
        if ($reqm !== false) {
            $commentaires = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $commentaires[] = $row;
            }
            return $commentaires;
        } else {
            return null;
        }
    }

    public function getAllCommentairesByIdArtiste($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT nCommentaireArtiste,cible,texteCommentaireArtiste,dateEditionCommentaireArtiste, auteur, pseudo, avatar "
                . " FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . " "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONNEXION'] . " "
                . " ON auteur=id "
                . "WHERE cible=$noProfil");
        if ($reqm !== false) {
            $commentaires = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $commentaires[] = $row;
            }
            return $commentaires;
        } else {
            return null;
        }
    }

    public function getLastCommentaireArtiste() {
        $tmp = mysqli_query($this->link, "SELECT MAX(nCommentaireArtiste)AS idmax FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . "");
        $row = mysqli_fetch_assoc($tmp);
        $indice = $row['idmax'];
        if ($indice !== null) {
            $tmp = mysqli_query($this->link, "SELECT nCommentaireArtiste,cible,texteCommentaireArtiste,dateEditionCommentaireArtiste, auteur, pseudo, avatar,nomArtiste "
                    . " FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . " "
                    . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONNEXION'] . " "
                    . " ON auteur=id "
                    . " INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " "
                    . " ON cible=nArtiste "
                    . " WHERE nCommentaireArtiste=$indice");
            $row = mysqli_fetch_assoc($tmp);
            return $row;
        }
        return null;
    }

    public function getLastCommentaireSalle() {
        $tmp = mysqli_query($this->link, "SELECT MAX(nCommentaireSalle)AS idmax FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . "");
        $row = mysqli_fetch_assoc($tmp);
        $indice = $row['idmax'];
        if ($indice !== null) {
            $tmp = mysqli_query($this->link, "SELECT nCommentaireSalle,cible,texteCommentaireSalle,dateEditionCommentaireSalle, auteur, pseudo, avatar,nomSalle "
                    . " FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . " "
                    . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONNEXION'] . " "
                    . " ON auteur=id "
                    . " INNER JOIN " . $GLOBALS['DB_TABLE']['SALLE'] . " "
                    . " ON cible=nSalle "
                    . " WHERE nCommentaireSalle=$indice");
            $row = mysqli_fetch_assoc($tmp);
            return $row;
        }
        return null;
    }

    public function commenterSalle($noProfil, $id, $texte) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . "  (nCommentaireSalle, cible, texteCommentaireSalle, auteur, dateEditionCommentaireSalle) VALUES('',$noProfil,'" . mysqli_real_escape_string($this->link, $texte) . "',$id ,NOW());");
    }

    public function commenterArtiste($noProfil, $id, $texte) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . "  (nCommentaireArtiste, cible, texteCommentaireArtiste, auteur, dateEditionCommentaireArtiste) VALUES('',$noProfil,'" . mysqli_real_escape_string($this->link, $texte) . "',$id ,NOW());");
    }

    public function supprimerCommentaireSalle($nCommentaire) {
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . "  WHERE nCommentaireSalle=$nCommentaire;");
    }

    public function supprimerCommentaireArtiste($nCommentaire) {
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . "  WHERE nCommentaireArtiste=$nCommentaire;");
    }

    public function estProprietaireCommentaireSalle($nCommentaire, $id) {
        $reqm = mysqli_query($this->link, "SELECT COUNT(*) AS nb FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . " WHERE nCommentaireSalle=$nCommentaire AND auteur=$id");
        if($reqm!==false){
        $row = mysqli_fetch_assoc($reqm);
        return $row['nb'] > 0 ? true : false;
        }else{
            return false;
        }
    }

    public function estProprietaireCommentaireArtiste($nCommentaire, $id) {
        $reqm = mysqli_query($this->link, "SELECT COUNT(*) AS nb FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . " WHERE nCommentaireArtiste=$nCommentaire AND auteur=$id");
        $row = mysqli_fetch_assoc($reqm);
        return $row['nb'] > 0 ? true : false;
    }

}

?>
