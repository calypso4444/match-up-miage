<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- CONNEXION A LA BDD -->
    <?php
    $link = mysqli_connect("localhost","root","root") ;
    mysqli_select_db($link, "mu_db");
    ?>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_INSCRIPTION</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style/style.css" media="screen"/>
        <link rel="stylesheet" type="text/css" href="style/inscription.css" media="screen"/>

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

            <section>
                <form id="formulaireInscription" method ="post" name="verificationInscription1">
				
					Votre mail : * 
                    <input id="email" type="text" name="email" placeholder="test@sorbonne.fr" value=""/>
                    <span class="error-message"></span><br/>

                    Pseudo : *
                    <input id="pseudo" type="text" name="pseudo" placeholder="lhommedu13" value=""/>
                    <span class="error-message"></span><br/>
                    
                    Mot de passe : * 
                    <input id="passe" type="password" name="passe" value=""/>
                    <span class="error-message"></span><br/>
                    
                    Vérification de votre Mot de passe : * 
                    <input id="passe2" type="password" name="passe2"/>
                    <span class="error-message"></span><br/>

                    <input type="submit" value="M'inscrire" id="envoyer"/>
                </form>
            </section>
            
            <?php
                if (empty($_POST['pseudo'])) {
                }
                if (empty($_POST['passe'])) {
                }
                if (!empty($_POST['passe2'])) {
                }
                if (!empty($_POST['email'])) {
                }
                if (!filter_var('email', FILTER_VALIDATE_EMAIL)) {
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
                        echo('Les deux mots de passe que vous avez rentré ne correspondent pas?');
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