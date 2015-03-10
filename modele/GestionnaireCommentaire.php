<?php

class GestionnaireCommentaire extends Gestionnaire {

    public function getAllCommentairesByIdSalle($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT nCommentaireSalle,cible,texteCommentaireSalle,dateEditionCommentaireSalle, auteur, pseudo, avatar "
                . " FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . " "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONNEXION'] . " "
                . " ON auteur=id "
                . "WHERE cible=$noProfil");
        $commentaires = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $commentaires[] = $row;
        }
        return $commentaires;
    }

    public function getAllCommentairesByIdArtiste($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT nCommentaireArtiste,cible,texteCommentaireArtiste,dateEditionCommentaireArtiste, auteur, pseudo, avatar "
                . " FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . " "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONNEXION'] . " "
                . " ON auteur=id "
                . "WHERE cible=$noProfil");
        $commentaires = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $commentaires[] = $row;
        }
        return $commentaires;
    }

    public function getLastCommentaire() {
        
    }

    public function commenterSalle($noProfil, $id, $texte) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . "  (nCommentaireSalle, cible, texteCommentaireSalle, auteur, dateEditionCommentaireSalle) VALUES('',$noProfil,'$texte',$id ,NOW());");
    }
    
    public function commenterArtiste($noProfil, $id, $texte) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['COMMENTAIRE_A'] . "  (nCommentaireArtiste, cible, texteCommentaireArtiste, auteur, dateEditionCommentaireArtiste) VALUES('',$noProfil,'$texte',$id ,NOW());");
    }

}

?>
