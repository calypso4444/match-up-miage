<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- CONNEXION A LA BDD -->
    <?php
    //connexion au serveur mySQL
    $link = mysqli_connect("localhost", "root", "");
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }


    //choix de la base de données
    mysqli_select_db($link, "mu_db");
    ?>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_INSCRIPTION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css" media="screen" />
        <link rel="stylesheet" href="style/inscription.css" media="screen"/>

    </head>
    <!-- FIN DESCRIPTION PAGE -->

    <!-- SCRIPT -->

    <script type="text/javascript" language="Javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="Javascript" src="js/verificationInscription.js"></script>

    <!-- FIN SCRIPT-->

    <!-- DEBUT PAGE -->
    <body>
        <div class="content">
            <!-- DEBUT HEADER -->
            <?php include_once("include/head.php") ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENT -->

            <?php include_once("include/menu.php") ?>

            <section id="formulaireI">
                <h1> Formulaire d'inscription </h1>
                <form id="formulaireInscription" method ="post" name="verificationInscription1">

                    <div>
                        <label for="email"> Votre mail : * </label> 
                        <input id="email" type="text" name="email" placeholder="test@sorbonne.fr" value=""/>
                        <span id="emailInfo"></span><br/>
                    </div>

                    <div>   
                        <label for="pseudo"> Pseudo : * </label>
                        <input id="pseudo" type="text" name="pseudo" placeholder="lhommedu13" value=""/>
                        <span id="pseudoInfo"></span><br/>
                    </div>

                    <div>   
                        <label for="passe"> Mot de passe : * </label>
                        <input id="passe" type="password" name="passe" value=""/>
                        <span id="passeInfo"></span><br/>
                    </div>

                    <div>    
                        <label for="passe2"> V&eacute;rification de votre mot de passe : * </label>
                        <input id="passe2" type="password" name="passe2" value=""/>
                        <span id="passe2Info"></span><br/>
                    </div>

                    <div>
                        <input type="submit" value="M'inscrire" id="envoyer"/>
                    </div>

                </form>
            </section>

            <?php
            $pseudo = filter_input(INPUT_POST, 'pseudo');
            if ((!empty(filter_input(INPUT_POST, 'pseudo')))and ( !empty(filter_input(INPUT_POST, 'email'))) and ( !empty(filter_input(INPUT_POST, 'passe')))and ( !empty(filter_input(INPUT_POST, 'passe2')))) {
                // Je mets aussi certaines sécurités
                $passe = mysqli_real_escape_string($link, htmlspecialchars($_POST['passe']));
                $passe2 = mysqli_real_escape_string($link, htmlspecialchars($_POST['passe2']));
                if ($passe == $passe2) {
                    $pseudo = mysqli_real_escape_string($link, htmlspecialchars($_POST['pseudo']));
                    $email = mysqli_real_escape_string($link, htmlspecialchars($_POST['email']));
                    // Je vais crypter le mot de passe.
                    $passe = sha1($passe);
                    mysqli_query($link, "INSERT INTO validation VALUES('', '$pseudo', '$passe', '$email')");
                } else {
                    echo 'Les deux mots de passe que vous avez rentr&eacute;s ne correspondent pas</br>';
                }
            }


//            $quete = mysqli_query($link, "SELECT * FROM validation");
//            while ($validation = mysqli_fetch_array($quete)) {
//                echo 'Pseudo: ';
//                echo $validation['pseudo'];
//                echo ' Mot de passe: ';
//                echo $validation['passe'];
//                echo ' E-mail: ';
//                echo $validation['email'];
//                echo '<a href="validation.php?action=accepter&id=' . $validation['id'] . '"></br> Accepter </a>';
//                echo '<a href="refus.php?action=refuser&id=' . $validation['id'] . '"> Refuser </a>';
//                echo '<br/>';
//            }
//
//            if (null !== filter_input(INPUT_GET, 'action') AND null !== filter_input(INPUT_GET, 'id')) {
//                $action = filter_input(INPUT_GET, 'action');
//                if ($action == "accepter") {
//                    $id = filter_input(INPUT_GET, 'id');
//                    $quete2 = mysqli_query($link, "SELECT * FROM validation WHERE id='$id'");
//                    $connexion = mysqli_fetch_array($quete2);
//                    $pseudo = $connexion['pseudo'];
//                    $passe = $connexion['passe'];
//                    $email = $connexion['email'];
//                    mysqli_query($link, "INSERT INTO connexion VALUES('$id', '$pseudo', '$passe', '$email')");
//                    mysqli_query($link, "DELETE FROM validation WHERE id='$id'");
//                } elseif ($action === "refuser") {
//                    $id = filter_input(INPUT_GET, 'id');
//                    mysqli_query($link, "DELETE FROM validation WHERE id='$id'");
//                }
//            }
            // Fin de connection
            mysqli_close($link);
            ?>


            <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>