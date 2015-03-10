<!-- vue/page -->

<div class="container col-lg-12">
    <aside>
        <p><h1>Dernier commentaire mis en ligne</h1> <p>
        <div id='commentaire'>
            <?php
            //on affiche le dernier commentaire, cad celui des deux qui n'est pas null
            if ($vars['dernierCommentaireArtiste'] !== null) {
                echo "<img src=\"";
                echo $vars['dernierCommentaireArtiste']['avatar'];
                echo "\">";
                echo $vars ['dernierCommentaireArtiste'] ['pseudo'] . " ";
                echo "(" . $vars['dernierCommentaireArtiste'] ['dateEditionCommentaireArtiste'] . ") : ";
                echo $vars['dernierCommentaireArtiste']['texteCommentaireArtiste'];
            } else {
                echo "<img src=\"";
                echo $vars['dernierCommentaireSalle']['avatar'];
                echo "\">";
                echo $vars ['dernierCommentaireSalle'] ['pseudo'] . " ";
                echo "(" . $vars['dernierCommentaireSalle'] ['dateEditionCommentaireSalle'] . ") : ";
                echo $vars['dernierCommentaireSalle']['texteCommentaireSalle'];
            }
            ?>
        </div>
    </aside>

    <section>
        <p><h1>Ce soir &agrave; Paris</h1></p>
        <div id='map'>
            <img src="web/image/map.png" alt="map" />
        </div>
        <input type="range" />
    </section>

    </br>

    <section>
        <p><h1>&Eacute;v&egrave;nements les plus attendus</h1> <p>
            <input type="submit" value="+" />
    </section>

    </br>

    <section>
        <p><h1>S&eacute;lection random</h1> <p>
        <div id='player'>
        </div>
    </section>

    </br>

    <section>
        <p><h1>Artiste de la semaine</h1> <p>
    </section>

    </br>

    <section>
        <p><h1>Salle de la semaine</h1> <p>
    </section>
</div>


