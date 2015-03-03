<?php

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
        $motDePasse = sha1($motDePasse);
        $user = $this->getUserByMail($identifiant, $motDePasse);
        if ($user != null) {
            return $user;
        }
        return $this->getUserByPseudo($identifiant, $motDePasse);
    }

    private function getUserByMail($mail, $motDePasse) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE email='$mail' AND passe='$motDePasse'");
        $row = mysqli_fetch_assoc($reqm);
        return $row['id'] != null ? $row : null;
    }

    private function getUserByPseudo($pseudo, $motDePasse) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE pseudo='$pseudo' AND passe='$motDePasse'");
        $row = mysqli_fetch_assoc($reqm);
        return $row['id'] != null ? $row : null;
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

    public function motDePasseProvisioire($mail) {
        $mdpP = 12345678;
        $mdpCrypt = sha1($mdpP);
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET passe='$mdpCrypt' WHERE email = '" . $mail . "' ");
        return $mdpP;
    }

    public function desinscription($mail) {
        
    }

    public function validation($id) {
        $quete2 = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['VALIDATION'] . " WHERE id=$id");
        $connexion = mysqli_fetch_array($quete2);
        $pseudo = $connexion['pseudo'];
        $passe = $connexion['passe'];
        $email = $connexion['email'];
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['CONNEXION'] . " VALUES('', '$pseudo', '$passe', '$email')");
        $this->refuser($id);
    }

    public function refuser($id) {
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['VALIDATION'] . " WHERE id=$id");
    }

    public function getUsersEnValidation() {
        //on recupere tous les tuples de la table validation
        $quete = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['VALIDATION'] . "");
        $usersValidation = array();
        while ($validation = mysqli_fetch_array($quete)) {
            $usersValidation[] = $validation;
        }
        return $usersValidation;
    }

    public function test() {
        return 'caca';
    }

}

?>
