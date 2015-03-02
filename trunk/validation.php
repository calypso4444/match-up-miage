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
            
            <section>
                <p>Inscription valid&eacute;e</p
                <p><a href="f_info_perso.php">Cliquez ici pour compl&egrave;ter votre profil</a></p>
                <p>Vous pouvez aussi vous cr&eacute;er un profil : </br>
                    <input type="checkbox" name="Fonction" value="Artiste"> Artiste
                    <input type="checkbox" name="Fonction" value="Gérant">G&eacute;rant<br/>
                    <input type="button" name="nouveau profil" value="C'est parti !"></button>
            </section>
            
            <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>
