<!-- vue/page -->
<div id="bloc1" class="col-lg-12">
    <div id="musique" class="col-lg-4">
        <section id="evenementAttendus">
            <h3>&Eacute;v&egrave;nements les plus attendus</h3>
            <div id="txtEvenement">
                <?php
                $compteur = 1;
                if ($vars['evenements'] !== null) {
                    foreach ($vars['evenements'] as $evenements) :
                        if ($compteur > 5) {
                            break;
                        }
                        echo $compteur . ". ";
                        $compteur++;
                        echo$evenements['nomSalle'];
                        echo' - ';
                        echo$evenements['nomArtiste'];
                        echo' ( ';
                        $date = new DateTime($evenements['dateConcert']);
                        echo$date->format('d/m/y');
                        echo' )</br>';
                    endforeach;
                }
                ?>
            </div>
            <form method="post">
                <input type="submit" value="+" />
            </form>
        </section>

        <section id="selectionRandom">
            <h3>S&eacute;lection random</h3>
            <div id='player'>
                <?php
                if ($vars['selectionRandom'] === null) {
                    echo '<audio controls oncanplay name="media"><source src="web/musique/piste01.mp3" type="audio/mpeg"></source></audio>';
                } else {
                    echo '<audio controls oncanplay name="media">';
                    echo '<source src="';
                    echo $vars['selectionRandom']['morceau'];
                    echo '" type="audio/mpeg"></source></audio>';
                }
                ?>
            </div>
        </section>
    </div>

    <section id="artisteDeLaSemaine" class="col-lg-8">
        <h3>Artiste de la semaine</h3>
        <table class="table">
            <?php
            if ($vars['artisteFavori'] !== null) {
                echo '<ul class="photo-grid">';
                $nom;
                $desc;
                $genre;
                foreach ($vars['artisteFavori'] as $artisteFavori) :
                    $nom = $artisteFavori['nomArtiste'];
                    $desc = $artisteFavori['descriptionArtiste'];
                    $genre = $artisteFavori['genreMusicalArtiste'];
                    $txt = "Son petit nom : " . $nom . "</br>Ce à quoi il ressemble : " . $desc . "</br>son genre : " . $genre . "</br>";
                    echo '<li><a href=artiste.php?tmp=' . $artisteFavori["nArtiste"] . '><figure><img src="';
                    echo$artisteFavori['photoProfilArtiste'];
                    echo '"/>';
                    echo '<figcaption><p>' . $txt . '</p></figcaption></figure>';
                    echo '</a></li>';
                    break;
                endforeach;
            }
            ?>
        </table>
    </section>

</div>

<div id="bloc2" class="col-lg-12">
    <section id='carte' class="col-lg-8">
        <h2>Ce soir &agrave; Paris</h2>
        <div id='map'>
            <img src="web/image/map.png" alt="map" />
        </div>
        <input type="range" />
        </br>
    </section>

    <aside class="col-lg-4">
        <h3>Dernier commentaire mis en ligne</h3>
        <div id='texteCommentaire'>
            <?php
            //on affiche le dernier commentaire, cad celui des deux qui n'est pas null ou rien si il n'y a pas de commentaires dans la bdd
            if ($vars['dernierCommentaireArtiste'] !== null) {
                echo "<img src=\"";
                echo $vars['dernierCommentaireArtiste']['avatar'];
                echo "\" > ";
                echo $vars ['dernierCommentaireArtiste'] ['pseudo'] . " : </br>";
                echo "<a href='artiste.php?tmp=" . $vars['dernierCommentaireArtiste']['cible'] . "'>" . $vars ['dernierCommentaireArtiste']['texteCommentaireArtiste'] . "</a>";
                echo"</br>";
            } else if ($vars['dernierCommentaireSalle'] !== null) {
                echo "<img src=\"";
                echo $vars['dernierCommentaireSalle']['avatar'];
                echo "\">";
                echo $vars ['dernierCommentaireSalle'] ['pseudo'] . " : </br> ";
                echo "<a href='salle.php?tmp=" . $vars['dernierCommentaireSalle']['cible'] . "'>" . $vars ['dernierCommentaireSalle']['texteCommentaireSalle'] . "</a>";
                echo"</br>";
            } else {
                echo"</br>";
            }
            ?>
        </div>
        </br>
    </aside>

    <section id="salleDeLaSemaine" class="col-lg-4">
        <h3>Salle de la semaine</h3>
        <table class="table">
            <?php
            if ($vars['salleFavorite'] !== null) {
                $nom;
                $desc;
                $genre;
                echo '<ul class="photo-grid">';
                foreach ($vars['salleFavorite'] as $salleFavorite) :
                    $nom = $salleFavorite['nomSalle'];
                    $genre = $salleFavorite['genreMusicalSalle'];
                    $txt = "son petit nom : " . $nom . "</br>son genre : " . $genre . "</br>";
                    echo '<li><a href=salle.php?tmp=' . $salleFavorite["nSalle"] . '><figure><img src="';
                    echo$salleFavorite['photoProfilSalle'];
                    echo '"/>';
                    echo'<figcaption><p>' . $txt . '</p></figcaption></figure>';
                    echo '</a></li>';
                    break;
                endforeach;
            }
            ?>
        </table>
    </section>

</div>




