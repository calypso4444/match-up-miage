<?php

/**
 * Description of GestionnaireUtilisateur
 *
 * @author Quang Kiet
 */
class GestionnaireUtilisateur extends Gestionnaire {
    
    public function inscription($mail, $login, $motDePasse) {
        $mail = mysqli_real_escape_string($this->link, $mail);
        $login = mysqli_real_escape_string($this->link, $login);
        $motDePasse = mysqli_real_escape_string($this->link, $motDePasse);
        $motDePasse = sha1($motDePasse);
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['VALIDATION'] . " VALUES('', '$login', '$motDePasse', '$mail')");
    }

    /**
     * 
     * @param type $identifiant
     * @param type $motDePasse
     */
    public function connexion($identifiant, $motDePasse) {
        
    }

    public function existeDejaMail($mail) {
        $reqm = mysqli_query($this->link, "SELECT COUNT(*) AS nbm FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE email='$mail'");
        $row = mysqli_fetch_assoc($reqm);
        return $row['nbm'] > 0 ? true : false;
    }

    public function existeDejaPseudo($pseudo) {
        $reqp = mysqli_query($this->link, "SELECT COUNT(*) AS nbp FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE pseudo='$pseudo'");
        $row = mysqli_fetch_assoc($reqp);
        return $row['nbp'] > 0 ? true : false;
    }

    public function desinscription($mail) {
        
    }

    public function validation($mail) {
        
    }

    public function test() {
        return 'caca';
    }

}

?>
