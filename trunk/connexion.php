<?php

$link=mysqli_connect ("localhost","root","");
if(!$link){
die ('Could not connect : ' .mysql_error());
}

//choix de la base de données
mysqli_select_db($link,"mu_db");

$tableConnexion='connexion';
$tableValidation='validation';

?>