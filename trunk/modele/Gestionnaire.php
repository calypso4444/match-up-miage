<?php

class Gestionnaire {
    
    protected $link;
    
    public function __construct() {
        $this->link = Connexion::getConnexion(
                $GLOBALS['DATABASE_CONNEXION']['HOST'], 
                $GLOBALS['DATABASE_CONNEXION']['USER'], 
                $GLOBALS['DATABASE_CONNEXION']['PASS'], 
                $GLOBALS['DATABASE_CONNEXION']['DB_NAME']);
    }
    
}

?>
