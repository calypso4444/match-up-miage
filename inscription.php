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

    <script language="Javascript" src="js/verifInscription.js"></script>

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
                <form method="post">
                    <label>Pseudo: <input type="text" name="pseudo"/></label><br/>
                    <label>Mot de passe: <input type="password" name="passe"/></label><br/>
                    <label>Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
                    <label>Adresse e-mail: <input type="text" name="email"/></label><br/>
                    <input type="submit" value="M'inscrire"/>
                </form>

            </section>

            <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>