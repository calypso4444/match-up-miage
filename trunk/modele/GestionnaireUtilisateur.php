<?php

class GestionnaireUtilisateur extends Gestionnaire {

    public function inscription($mail, $login, $motDePasse) {
        $mail = mysqli_real_escape_string($this->link, $mail);
        $login = mysqli_real_escape_string($this->link, $login);
        $motDePasse = mysqli_real_escape_string($this->link, $motDePasse);
        $motDePasse = sha1($motDePasse);
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['VALIDATION'] . " VALUES('', '$login', '$motDePasse', '$mail',NOW())");
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
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row['id'] != null ? $row : null;
        } else {
            return null;
        }
    }

    public function getUserById($id) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE id='$id'");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row['id'] != null ? $row : null;
        } else {
            return null;
        }
    }

    private function getUserByPseudo($pseudo, $motDePasse) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE pseudo='$pseudo' AND passe='$motDePasse'");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row['id'] != null ? $row : null;
        } else {
            return null;
        }
    }

    public function existeDejaMail($mail) {
        $reqm = mysqli_query($this->link, "SELECT COUNT(*) AS nbm FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE email='$mail'");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row['nbm'] > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function existeDejaPseudo($pseudo) {
        $reqp = mysqli_query($this->link, "SELECT COUNT(*) AS nbp FROM " . $GLOBALS['DB_TABLE']['CONNEXION'] . " WHERE pseudo='$pseudo'");
        if ($reqp !== false) {
            $row = mysqli_fetch_assoc($reqp);
            return $row['nbp'] > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function motDePasseProvisioire($mail) {
        $mdpP = 12345678;
        $mdpCrypt = sha1($mdpP);
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET passe='$mdpCrypt' WHERE email ='$mail';");
        return $mdpP;
    }

    public function desinscription($mail) {
        
    }

    public function validation($id) {
        $quete2 = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['VALIDATION'] . " WHERE idValidation=$id;");
        $connexion = mysqli_fetch_array($quete2);
        $pseudo = $connexion['pseudo'];
        $passe = $connexion['passe'];
        $email = $connexion['email'];
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['CONNEXION'] . " (pseudo,passe,email,dateInscription,avatar) VALUES('$pseudo', '$passe', '$email',NOW(),'web/image/avatar.png');");
        $this->refuser($id);
    }

    public function refuser($id) {
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['VALIDATION'] . " WHERE idValidation=$id");
    }

    public function getUsersEnValidation() {
        //on recupere tous les tuples de la table validation
        $quete = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['VALIDATION'] . "");
        if ($quete !== false) {
            $usersValidation = array();
            while ($validation = mysqli_fetch_array($quete)) {
                $usersValidation[] = $validation;
            }
            return $usersValidation;
        } else {
            return null;
        }
    }

    public function setMail($id, $mail) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET email='$mail' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    public function setMdp($id, $mdp) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET passe='$mdp' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    public function setNom($id, $nom) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET nom='$nom' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    public function setPrenom($id, $prenom) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET prenom='$prenom' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    public function setAdresse($id, $adresse) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET adresse='$adresse' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    public function setCP($id, $cp) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET CP='$cp' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    public function setVille($id, $ville) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET ville='$ville' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    public function setAvatar($id, $path) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['CONNEXION'] . " SET avatar='$path' WHERE id = $id;");
        $this->actualisationUserSession();
    }

    private function actualisationUserSession() {
        $user = $_SESSION['user'];
        $id = $user['id'];
        $_SESSION['user'] = $this->getUserById($id);
    }

    //reflechir a la gestion des doublons, insert if not exists into n'a pas l'air de marcher
    public function ajouterEnFavoriArtiste($noprofil, $id) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['FAVORI_A'] . "  (proprietaire,cible) VALUES('$id','$noprofil'); ");
    }

    public function ajouterEnFavoriSalle($noprofil, $id) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['FAVORI_S'] . "  (proprietaire,cible) VALUES('$id','$noprofil'); ");
    }

    public function getAllFavoris_Artiste($id) {
        $req = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['FAVORI_A'] . " F INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " A  ON A.nArtiste=F.cible WHERE F.proprietaire=$id ; ");
        if ($req !== false) {
            $favoris = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $favoris[] = $row;
            }
            return $favoris;
        } else {
            return null;
        }
    }

    public function getAllFavoris_Salle($id) {
        $req = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['FAVORI_S'] . " F INNER JOIN " . $GLOBALS['DB_TABLE']['SALLE'] . " S  ON S.nSalle=F.cible WHERE F.proprietaire=$id ; ");
        if ($req !== false) {
            $favoris = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $favoris[] = $row;
            }
            return $favoris;
        } else {
            return null;
        }
    }

    public function supprimerFavoris_Salle($id, $nSalle) {
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['FAVORI_S'] . " WHERE proprietaire=$id AND cible=$nSalle ; ");
    }

    public function supprimerFavoris_Artiste($id, $nArtiste) {
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['FAVORI_A'] . " WHERE proprietaire=$id AND cible=$nArtiste ; ");
    }

    public function getAll_EvenementsSuivis($id) {
        $req = mysqli_query(
                $this->link, "SELECT A.nArtiste,nomArtiste, S.nSalle, nomSalle, dateConcert "
                . " FROM " . $GLOBALS['DB_TABLE']['EVENEMENT_SUIVI'] . " E "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['CONCERT'] . " C  ON E.cible=C.nConcert "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['SALLE'] . " S  ON S.nSalle=C.nSalle "
                . " INNER JOIN " . $GLOBALS['DB_TABLE']['ARTISTE'] . " A  ON A.nArtiste=C.nArtiste "
                . " WHERE E.proprietaire=$id "
                . " ORDER BY dateConcert; ");
        if ($req !== false) {
            $suivis = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $suivis[] = $row;
            }
            return $suivis;
        } else {
            return null;
        }
    }

    public function test() {
        return 'caca';
    }

}

?>
