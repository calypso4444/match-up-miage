<?php

class GestionnaireProfil extends Gestionnaire {

    public function getProprietaireSalle($noProfil) {
        $tmp = mysqli_query($this->link, "SELECT proprietaireSalle AS id FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE nSalle=$noProfil;");
        $row = mysqli_fetch_assoc($tmp);
        return $row['id'];
    }

    public function getProprietaireartiste($noProfil) {
        $tmp = mysqli_query($this->link, "SELECT proprietaireArtiste AS id FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE nArtiste=$noProfil;");
        $row = mysqli_fetch_assoc($tmp);
        return $row['id'];
    }

    public function newProfilArtiste($id, $nom) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['ARTISTE'] . " (proprietaireArtiste,nomArtiste) VALUES($id,'$nom');");
        $tmp = mysqli_query($this->link, "SELECT MAX(nArtiste)AS idmax FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE proprietaireArtiste=$id");
        $row = mysqli_fetch_assoc($tmp);
        return $row['idmax'];
    }

    public function newProfilSalle($id, $nom, $adresse, $cp, $ville) {
        $address = $adresse . ' ' . $cp . ' ' . $ville;
        $coords = $this->getXmlCoordsFromAdress($address);
        $latitude = $coords['lat'];
        $longitude = $coords['lon'];
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['SALLE'] . " (proprietaireSalle,nomSalle,adresseSalle,cpSalle, villeSalle,latitude, longitude) VALUES($id,'$nom','$adresse','$cp','$ville','$latitude','$longitude');");
        $tmp = mysqli_query($this->link, "SELECT MAX(nSalle)AS idmax FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE proprietaireSalle=$id");
        $row = mysqli_fetch_assoc($tmp);
        return $row['idmax'];
    }

    public function getAllInfo_Artiste($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE nArtiste='$noProfil'");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row != null ? $row : null;
        } else {
            return null;
        }
    }

    public function supprimerArtiste($nArtiste, $idProprietaire) {
        if (mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE nArtiste=$nArtiste AND proprietaireArtiste=$idProprietaire")) {
            mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['FAVORI_A'] . " WHERE cible='$nArtiste'");
        }
    }

    public function supprimerSalle($nSalle, $idProprietaire) {
        if (mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE nSalle=$nSalle AND proprietaireSalle=$idProprietaire")) {
            mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['FAVORI_S'] . " WHERE cible='$nSalle'");
        }
    }

    public function getAllInfo_Salle($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE nSalle='$noProfil'");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row != null ? $row : null;
        } else {
            return null;
        }
    }

    public function getAllProfil_ArtisteById($id) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE proprietaireArtiste=$id");
        if ($reqm !== false) {
            $profils = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $profils[] = $row;
            }
            return $profils;
        } else {
            return null;
        }
    }

    public function getAllProfil_SalleById($id) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE proprietaireSalle=$id");
        if ($reqm !== false) {
            $profils = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $profils[] = $row;
            }
            return $profils;
        } else {
            return null;
        }
    }

    public function getAllProfil_Artiste() {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . "");
        if ($reqm !== false) {
            $profils = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $profils[] = $row;
            }
            return $profils;
        } else {
            return null;
        }
    }

    public function getAllProfil_Salle() {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['SALLE'] . "");
        if ($reqm !== false) {
            $profils = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $profils[] = $row;
            }
            return $profils;
        } else {
            return null;
        }
    }

    public function setNomArtiste($noprofil, $nom) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET nomArtiste='$nom' WHERE nArtiste = $noprofil;");
    }

    public function setDescriptionArtiste($noprofil, $desc) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET descriptionArtiste='$desc' WHERE nArtiste = $noprofil;");
    }

    public function setphotoProfilArtiste($noprofil, $path) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET photoProfilArtiste='$path' WHERE nArtiste = $noprofil;");
    }

    public function setGenreMusicalArtiste($noprofil, $genre) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['ARTISTE'] . " SET genreMusicalArtiste='$genre' WHERE nArtiste = $noprofil;");
    }

    public function setNomSalle($noprofil, $nom) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET nomSalle='$nom' WHERE nSalle = $noprofil;");
    }

    public function setDescriptionSalle($noprofil, $desc) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET descriptionSalle='$desc' WHERE nSalle = $noprofil;");
    }

    public function setphotoProfilSalle($noprofil, $path) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET photoProfilSalle='$path' WHERE nSalle = $noprofil;");
    }

    public function setGenreMusicalSalle($noprofil, $genre) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET genreMusicalSalle='$genre' WHERE nSalle = $noprofil;");
    }

    public function setAdresseSalle($noprofil, $adresse) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET adresseSalle='$adresse' WHERE nSalle = $noprofil;");
    }

    public function settelSalle($noprofil, $tel) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET telSalle='$tel' WHERE nSalle = $noprofil;");
    }

    public function setNomGerant($noprofil, $nom) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET nomGerant='$nom' WHERE nSalle = $noprofil;");
    }

    public function setPrenomGerant($noprofil, $prenom) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET prenomGerant='$prenom' WHERE nSalle = $noprofil;");
    }

    public function setContactGerant($noprofil, $contact) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET contactGerant='$contact' WHERE nSalle = $noprofil;");
    }

    public function setCpSalle($noprofil, $cpSalle) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET cpSalle='$cpSalle' WHERE nSalle = $noprofil;");
    }

    public function setVilleSalle($noprofil, $villeSalle) {
        mysqli_query($this->link, "UPDATE " . $GLOBALS['DB_TABLE']['SALLE'] . " SET villeSalle='$villeSalle' WHERE nSalle = $noprofil;");
    }

    public function estProprietaireProfilSalle($nProfil, $id) {
        $reqm = mysqli_query($this->link, "SELECT COUNT(*) AS nb FROM " . $GLOBALS['DB_TABLE']['SALLE'] . " WHERE nSalle=$nProfil AND proprietaireSalle=$id");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row['nb'] > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function estProprietaireProfilArtiste($nProfil, $id) {
        $reqm = mysqli_query($this->link, "SELECT COUNT(*) AS nb FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . " WHERE nArtiste=$nProfil AND proprietaireArtiste=$id");
        if ($reqm !== false) {
            $row = mysqli_fetch_assoc($reqm);
            return $row['nb'] > 0 ? true : false;
        } else {
            return false;
        }
    }

    public function getAllPhotoSalleById($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_S'] . " WHERE proprietaire=$noProfil");
        if ($reqm !== false) {
            $photos = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $photos[] = $row;
            }
            return $photos;
        } else {
            return null;
        }
    }

    public function getAllPhotoArtisteById($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_A'] . " WHERE proprietaire=$noProfil");
        if ($reqm !== false) {
            $photos = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $photos[] = $row;
            }
            return $photos;
        } else {
            return null;
        }
    }

    public function ajouterPhotoSalle($noProfil, $path) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_S'] . " (proprietaire, photoSalle) VALUES ($noProfil,'$path')");
    }

    public function ajouterPhotoArtiste($noProfil, $path) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_A'] . " (proprietaire, photoArtiste) VALUES ($noProfil,'$path')");
    }

    public function supprimerPhotoSalle($noProfil, $nPhoto) {
        $tmp = mysqli_query($this->link, "SELECT photoSalle AS path FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_S'] . " WHERE proprietaire=$noProfil AND nPhotoSalle=$nPhoto");
        $row = mysqli_fetch_assoc($tmp);
        $filename = $row['path'];
        unlink($filename);
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_S'] . " WHERE proprietaire=$noProfil AND nPhotoSalle=$nPhoto");
    }

    public function supprimerPhotoArtiste($noProfil, $nPhoto) {
        $tmp = mysqli_query($this->link, "SELECT photoArtiste AS path FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_A'] . " WHERE proprietaire=$noProfil AND nPhotoArtiste=$nPhoto");
        $row = mysqli_fetch_assoc($tmp);
        $filename = $row['path'];
        unlink($filename);
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_A'] . " WHERE proprietaire=$noProfil AND nPhotoArtiste=$nPhoto");
    }

    public function getNMaxPhotoSalle($noProfil) {
        $tmp = mysqli_query($this->link, "SELECT MAX(nPhotoSalle)AS idmax FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_S'] . " WHERE proprietaire=$noProfil");
        $row = mysqli_fetch_assoc($tmp);
        return $row['idmax'];
    }

    public function getNMaxPhotoArtiste($noProfil) {
        $tmp = mysqli_query($this->link, "SELECT MAX(nPhotoArtiste)AS idmax FROM " . $GLOBALS['DB_TABLE']['ALBUM_PHOTO_A'] . " WHERE proprietaire=$noProfil");
        $row = mysqli_fetch_assoc($tmp);
        return $row['idmax'];
    }

    public function getClassementFavoriSalle() {
        $req = mysqli_query($this->link, " SELECT nSalle, nomSalle, photoProfilSalle,descriptionSalle, genreMusicalSalle FROM " . $GLOBALS['DB_TABLE']['SALLE'] . ""
                . " INNER JOIN "
                . " (SELECT cible, COUNT(*) AS nbrFav "
                . " FROM " . $GLOBALS['DB_TABLE']['FAVORI_S']
                . " GROUP BY cible) F "
                . " ON nSalle=F.cible "
                . " ORDER BY nbrFav DESC;");
        if ($req !== false) {
            $classement = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $classement[] = $row;
            }
            return $classement;
        } else {
            return null;
        }
    }

    public function getClassementFavoriArtiste() {
        $req = mysqli_query($this->link, " SELECT nArtiste, nomArtiste, photoProfilArtiste,descriptionArtiste, genreMusicalArtiste FROM " . $GLOBALS['DB_TABLE']['ARTISTE'] . ""
                . " INNER JOIN "
                . " (SELECT cible, COUNT(*) AS nbrFav "
                . " FROM " . $GLOBALS['DB_TABLE']['FAVORI_A']
                . " GROUP BY cible) F "
                . " ON nArtiste=F.cible "
                . " ORDER BY nbrFav DESC;");
        if ($req !== false) {
            $classement = array();
            while ($row = mysqli_fetch_assoc($req)) {
                $classement[] = $row;
            }
            return $classement;
        } else {
            return null;
        }
    }

    public function getAllMorceau($noProfil) {
        $reqm = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['BIBLIOTHEQUE'] . " WHERE proprietaire=$noProfil");
        if ($reqm !== false) {
            $playlist = array();
            while ($row = mysqli_fetch_assoc($reqm)) {
                $playlist[] = $row;
            }
            return $playlist;
        } else {
            return null;
        }
    }

    public function getMorceau($nMorceau) {
        $tmp = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['BIBLIOTHEQUE'] . " WHERE nMorceau=$nMorceau;");
        $row = mysqli_fetch_assoc($tmp);
        return $row;
    }

    public function ajouterMorceau($noProfil, $titre, $artiste, $path) {
        mysqli_query($this->link, "INSERT INTO " . $GLOBALS['DB_TABLE']['BIBLIOTHEQUE'] . " (proprietaire, titre,artiste, morceau) VALUES ($noProfil,'$titre','$artiste','$path');");
    }

    public function supprimerMorceau($noProfil, $nMorceau) {
        $tmp = mysqli_query($this->link, "SELECT morceau AS path FROM " . $GLOBALS['DB_TABLE']['BIBLIOTHEQUE'] . " WHERE proprietaire=$noProfil AND nMorceau=$nMorceau");
        $row = mysqli_fetch_assoc($tmp);
        $filename = $row['path'];
        unlink($filename);
        mysqli_query($this->link, "DELETE FROM " . $GLOBALS['DB_TABLE']['BIBLIOTHEQUE'] . " WHERE proprietaire=$noProfil AND nMorceau=$nMorceau");
    }

    public function getMorceauRandom() {
        $tmp = mysqli_query($this->link, "SELECT MAX(nMorceau)AS idmax FROM " . $GLOBALS['DB_TABLE']['BIBLIOTHEQUE'] . ";");
        $row = mysqli_fetch_assoc($tmp);
        $max = $row['idmax'];
        $nRand = rand(1, $max);
        $trouve = false;
        while ($trouve === false) {
            $tmp = mysqli_query($this->link, "SELECT * FROM " . $GLOBALS['DB_TABLE']['BIBLIOTHEQUE'] . " WHERE nMorceau=$nRand;");
            if ($tmp !== false) {
                $row = mysqli_fetch_assoc($tmp);
                if (!empty($row)) {
                    $trouve = true;
                    return $row;
                }
                $nRand = rand(1, $max);
            }
        }
    }

    private function getXmlCoordsFromAdress($address) {
        $coords = array();
        $base_url = "http://maps.googleapis.com/maps/api/geocode/xml?";
        $request_url = $base_url . "address=" . urlencode($address) . '&sensor=false';
        $xml = simplexml_load_file($request_url) or die("url not loading");
        $coords['lat'] = $coords['lon'] = '';
        $coords['status'] = $xml->status;
        if ($coords['status'] == 'OK') {
            $coords['lat'] = $xml->result->geometry->location->lat;
            $coords['lon'] = $xml->result->geometry->location->lng;
        }
        return $coords;
    }

}

?>