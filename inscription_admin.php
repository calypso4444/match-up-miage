<?php

$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "mu_db");

$quete = mysqli_query($link, "SELECT * FROM validation");
while ($validation = mysqli_fetch_array($quete)) {
    echo 'Pseudo: ';
    echo $validation['pseudo'];
    echo ' Mot de passe: ';
    echo $validation['passe'];
    echo ' E-mail: ';
    echo $validation['email'];
    echo '<a href="validation.php?action=accepter&id=' . $validation['id'] . '"></br> Accepter </a>';
    echo '<a href="validation.php?action=refuser&id=' . $validation['id'] . '"> Refuser </a>';
    echo '<br/>';
}

if (isset($_GET['action']) AND isset($_GET['id'])) {
    $action = $_GET['action'];
    if ($action == "accepter") {
        $id = $_GET['id'];
        $quete2 = mysql_query("SELECT * FROM validation WHERE id='$id'");
        $connexion = mysql_fetch_array($quete2);
        $pseudo = $connexion['pseudo'];
        $passe = $connexion['passe'];
        $email = $connexion['email'];
        mysql_query("INSERT INTO connexion VALUES('$id', '$pseudo', '$passe', '$email')");
        mysql_query("DELETE FROM validation WHERE id='$id'");
    } elseif ($action == "refuser") {
        $id = $_GET['id'];
        mysql_query("DELETE FROM validation WHERE id='$id'");
    }
}
?>