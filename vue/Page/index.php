<!-- vue/page -->

<div id="bloc1" class="col-lg-12"style="border-bottom: solid black 1px">
    <div id="musique" class="col-lg-4" style="border-right: solid black 1px;">
        <section id="evenementAttendus" style="border-bottom: solid black 1px">
            <h3>&Eacute;v&egrave;nements les plus attendus</h3>
                <input type="submit" value="+" />
        </section>

        <section id="selectionRandom">
            <h3>S&eacute;lection random</h3>
            <div id='player'>
                <!--a supprimer-->
                <audio controls
                       data-info-album-art="http://farm5.staticflickr.com/4050/4353986539_ec89b52698_d.jpg"
                       data-info-album-title="8874"
                       data-info-artist="Billy Murray"
                       data-info-title="Come, take a trip in my air-ship"
                       data-info-label="Edison Gold Moulded Record"
                       data-info-year="1905"
                       data-info-att="University of California, Santa Barbara Library."
                       data-info-att-link="http://cylinders.library.ucsb.edu/search.php?query=8874">
                    <source src="/bootstrap-player/media/cusb-cyl2985d.ogg" type="audio/ogg" />
                    <source src="/bootstrap-player/media/cusb-cyl2985d.mp3" type="audio/mpeg" />
                    <a href="/bootstrap-player/media/cusb-cyl2985d.mp3">cusb_cyl2985d</a>
                </audio>
            </div>
        </section>
    </div>

    <section class="col-lg-8">
        <p><h3>Artiste de la semaine</h3> <p>
    </section>

</div>

<div id="bloc2" class="col-lg-12" style="">
    <section class="col-lg-8" style="border-right: solid black 1px">
        <h2>Ce soir &agrave; Paris</h2>
        <div id='map'>
            <img src="web/image/map.png" alt="map" />
        </div>
        <input type="range" />
        </br>
    </section>

    <aside class="col-lg-4" style="border-bottom: solid black 1px">
        <h3>Dernier commentaire mis en ligne</h3>
        <div id='texteCommentaire'>
            <?php
            //on affiche le dernier commentaire, cad celui des deux qui n'est pas null ou rien si il n'y a pas de commentaires dans la bdd
            if ($vars['dernierCommentaireArtiste'] !== null) {
                echo "<img src=\"";
                echo $vars['dernierCommentaireArtiste']['avatar'];
                echo "\"> ";
                echo $vars ['dernierCommentaireArtiste'] ['pseudo'] . " : </br>";
                echo "<a href='artiste.php?tmp=" . $vars['dernierCommentaireArtiste']['cible'] . "'>" . $vars['dernierCommentaireArtiste']['texteCommentaireArtiste'] . "</a>";
                echo"</br>";
            } else if ($vars['dernierCommentaireSalle'] !== null) {
                echo "<img src=\"";
                echo $vars['dernierCommentaireSalle']['avatar'];
                echo "\">";
                echo $vars ['dernierCommentaireSalle'] ['pseudo'] . " : </br> ";
                echo "<a href='salle.php?tmp=" . $vars['dernierCommentaireSalle']['cible'] . "'>" . $vars['dernierCommentaireSalle']['texteCommentaireSalle'] . "</a>";
                echo"</br>";
            } else {
                echo"</br>";
            }
            ?>
        </div>
    </aside>

    <section id="salleDeLaSemaine" class="col-lg-4">
        <h3>Salle de la semaine</h3>
    </section>

</div>




