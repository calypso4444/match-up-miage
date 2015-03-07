<?php

class GestionnaireProfil extends Gestionnaire {
    public function newProfilArtiste($id){
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['ARTISTE'] . " (proprietaireArtiste) VALUES($id);");
        $tmp=mysqli_query($this->link, "SELECT MAX(nArtiste)AS idmax FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE proprietaireArtiste=$id");
        $row = mysqli_fetch_assoc($tmp);
        return $row['idmax'];
    }
}

?>