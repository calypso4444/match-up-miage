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
    include_once 'connexion.php';
    ?>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_INSCRIPTION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css" media="screen" />
        <link rel="stylesheet" href="style/inscription.css" media="screen"/>
        
        <link rel="stylesheet" href="css/bootstrap.css" />

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
                        <input  type="submit" value="M'inscrire" id="envoyer"/>
                    </div>

                </form>
            </section>

            <?php
            $pseudo = filter_input(INPUT_POST, 'pseudo');
            $email = filter_input(INPUT_POST, 'email');
            $passe = filter_input(INPUT_POST, 'passe');
            $passe2 = filter_input(INPUT_POST, 'passe2');
            if ((!empty($pseudo)) and 
                    ( !empty($email)) and 
                    ( !empty($passe)) and 
                    ( !empty($passe2))) { 
                //on verifie qu'on est pas en train de creer un doublon (mail ou pseudo)
                $reqp = mysqli_query($link, "SELECT COUNT(*) AS nbp FROM $tableConnexion WHERE pseudo='$pseudo'");
                $reqm = mysqli_query($link, "SELECT COUNT(*) AS nbm FROM $tableConnexion WHERE email='$email'");
                $row = mysqli_fetch_assoc($reqp);
                $nbp = $row['nbp'];
                $row = mysqli_fetch_assoc($reqm);
                $nbm = $row['nbm'];
                if ($nbp == 0) {
                    if ($nbm == 0) {
// Je mets aussi certaines s�curit�s
                        $passe = mysqli_real_escape_string($link, htmlspecialchars($_POST['passe']));
                        $passe2 = mysqli_real_escape_string($link, htmlspecialchars($_POST['passe2']));
                        if ($passe == $passe2) {
                            $pseudo = mysqli_real_escape_string($link, htmlspecialchars($_POST['pseudo']));
                            $email = mysqli_real_escape_string($link, htmlspecialchars($_POST['email']));
                            // Je vais crypter le mot de passe.
                            $passe = sha1($passe);
                            mysqli_query($link, "INSERT INTO $tableValidation VALUES('', '$pseudo', '$passe', '$email')");
                        } else {
                            echo 'Les deux mots de passe que vous avez rentr&eacute;s ne correspondent pas</br>';
                        }
                    } else {
                        echo 'mail d&eacute;j&agrave; pris';
                    }
                } else {
                    echo 'pseudo d&eacute;j&agrave; pris';
                }
            }
            mysqli_close($link);
            ?>


            <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>