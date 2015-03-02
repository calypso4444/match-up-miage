<?php

/**
 * Description of connexion
 *
 * @author Quang Kiet
 */
class Connexion {
    
    public static function getConnexion($hostname, $username, $password, $database) {
        $link = mysqli_connect($hostname, $username, $password);
        if (!$link) {
            die('Could not connect: ' . mysql_error());
        }
        mysqli_select_db($link, $database);
        return $link;
    }

}

?>
