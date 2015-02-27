<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_TOUS_LES_ARTISTES</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css" media="screen" />
    </head>
    <!-- FIN DESCRIPTION PAGE -->

    <!-- DEBUT PAGE -->
    <body>
        <div class="content">
            <!-- DEBUT HEADER -->
            <?php include_once("include/head.php") ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENT -->
            <?php include_once("include/menu.php") ?>

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
                echo '<a href="inscription_admin.php?action=refuser&id=' . $validation['id'] . '"> Refuser </a>';
                echo '<br/>';
            }

            if (null!==filter_input(INPUT_GET, 'action') AND null!==filter_input(INPUT_GET, 'id')) {
                $action = filter_input(INPUT_GET, 'action');
                if ($action == "accepter") {
                    $id = filter_input(INPUT_GET, 'id');
                    $quete2 = mysqli_query($link,"SELECT * FROM validation WHERE id='$id'");
                    $connexion = mysqli_fetch_array($quete2);
                    $pseudo = $connexion['pseudo'];
                    $passe = $connexion['passe'];
                    $email = $connexion['email'];
                    mysqli_query($link,"INSERT INTO connexion VALUES('$id', '$pseudo', '$passe', '$email')");
                    mysqli_query($link,"DELETE FROM validation WHERE id='$id'");
                } elseif ($action === "refuser") {
                    $id = filter_input(INPUT_GET, 'id');
                    mysqli_query($link,"DELETE FROM validation WHERE id='$id'");
                }
            }
            ?>

            <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>


