<?php

class GestionnaireCommentaire extends Gestionnaire {
    public function getAllCommentairesByIdSalle($noProfil){
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['COMMENTAIRE_S'] . " WHERE cible=$noProfil");
        $commentaires = array();
        while ($row = mysqli_fetch_assoc($reqm)) {
            $commentaires[] = $row;
        }
        return $commentaires;
    }
}

?>
