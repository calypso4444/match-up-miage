<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- CONNEXION A LA BDD -->
    <?php
    $link = mysqli_connect("localhost","root","") ;
    mysqli_select_db($link, "mu_db");
    ?>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_INSCRIPTION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/style.css" media="screen" />
    </head>
    <!-- FIN DESCRIPTION PAGE -->
    <!-- SCRIPT -->

    <script language="Javascript" src="../js/verifInscription.js"></script>

    <!-- FIN SCRIPT-->

    <!-- DEBUT PAGE -->
    <body>
        <div class="content">
            <!-- DEBUT HEADER -->
            <?php include_once("include/head.php") ?>
            <!-- FIN HEADER -->

            <!-- DEBUT CONTENT -->

            <?php include_once("include/menu.php") ?>

            <section>
                <form method="post" name="verificationInscription1">
	                <label>Adresse e-mail: <input type="text" name="email" placeholder="test@miage.com"/></label><br/>
                    <label>Pseudo: <input type="text" name="pseudo" placeholder="lhommedu13" onblur="verifPseudo(this)"/></label><br/>
                    <label>Mot de passe: <input type="password" name="passe"/></label><br/>
                    <label>Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
                    <input type="submit" value="M'inscrire"/>
                </form>
            </section>
            
            <?php
                //on verifie d'abord que les champs ne sont pas vides
                if (empty($_POST['pseudo'])) {
                    //on encadre l'emplacement en rouge avec un message
                }

                if (empty($_POST['passe'])) {
                    //on encadre l'emplacement en rouge avec un message
                }

                if (!empty($_POST['passe2'])) {
                    //on encadre l'emplacement en rouge avec un message
                }

                if (!empty($_POST['email'])) {
                    //on encadre l'emplacement en rouge avec un message
                }

                //on verifie que l'adresse mail a un format valide
                if (!filter_var('email', FILTER_VALIDATE_EMAIL)) {
                    //on encadre l'emplacement en rouge avec un message
                }
                if ((!empty($_POST['pseudo']))and ( !empty($_POST['email'])) and ( !empty($_POST['passe']))) {
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
                        echo 'Les deux mots de passe que vous avez rentrÃ©s ne correspondent pasâ?¦';
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