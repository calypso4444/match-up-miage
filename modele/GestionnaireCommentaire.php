<?php

class GestionnaireCommentaire extends Gestionnaire {
    public function getAllCommentairesByIdSalle($noProfil){
        $reqm = mysqli_query($this->link, 
                "SELECT nCommentaireSalle,cible,texteCommentaireSalle,dateEditionCommentaireSalle, auteur, pseudo "
                . " FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . " "
                . " INNER JOIN ". $GLOBALS['DB_TABLE']['CONNEXION'] . " "
                . " ON auteur=id "
                . "WHERE cible=$noProfil");
        $commentaires = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $commentaires[] = $row;
        }
        return $commentaires;
    }
}

?>
