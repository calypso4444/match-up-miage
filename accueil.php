<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- DEBUT DESCRIPTION PAGE -->
    <head>
        <title>MATCH'UP_ACCUEIL</title>
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
                <p><h1>Ce soir &agrave; Paris</h1></p>
                <div id='map'>
                  <img src="image/map.png" alt="map" />
                </div>
                <input type="range" />
            </section>
            
            <section>
                <p><h1>&Eacute;v&egrave;nements les plus attendus</h1> <p>
            </section>
            
            <section>
                <p><h1>S&eacute;lection random</h1> <p>
                <div id='player'>
                </div>
            </section>
            
            <aside>
                <p><h1>Dernier commentaire mis en ligne</h1> <p>
                <div id='comment'>
                </div>
            </aside>
            
            <section>
                <p><h1>Artiste de la semaine</h1> <p>
            </section>
            
            <section>
                <p><h1>Salle de la semaine</h1> <p>
            </section>

            <!-- FIN CONTENT-->
        </div>

        <!--DEBUT FOOTER-->
        <?php include_once("include/foot.php") ?>

        <!--FIN FOOTER-->
    </body>
</html>
