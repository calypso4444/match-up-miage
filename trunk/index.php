<?php

/* instanciation des fichiers de config + modele */

include_once 'config/includeGlobal.php';

/* fin de l'instanciation */

/* séquence du controleur */

$testTime = time();
$testTime += $testTime;
$testAppel = $model['GestionnaireUtilisateur']->test();
/* fin de séquence */

/* affichage de la vue */

$vue = array();
$vue['testTime'] = $testTime;
$vue['testAppel'] = $testAppel;

$view->render('test', $vue);

/* fin de l'affichage de la vue */

?>
