<!-- vue/page -->

<!-- SCRIPT POUR LA MAP -->
<script type="text/javascript" src="web/js/carteConcert.js"></script>
<!-- SCRIPT POUR LA MAP -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php
if ($vars['estConnecte'] === false) {
    echo "<script>document.location.href='inscription.php'</script>";
}
?>

<!--si l'utilisateur clique sur le bouton je participe, on le redirige vers la page mes_particpations-->
<?php
if ($vars['participe'] === true) {
    echo "<script>document.location.href='f_mes_participations.php'</script>";
}
?>

<!--apres la creation d'un concert, on recharge la page-->
<?php
if ($vars['creationConcertOk'] === true) {
    echo "<script>document.location.href='index.php'</script>";
}
?>

<div id="bloc1" class="col-lg-12 row-same-height">
    <div id="musique" class="col-lg-4 col-sm-height">
        <section id="evenementAttendus">
            <h3>&eacute;v&egrave;nements les plus attendus</h3>
            <div id="txtEvenement">
                <table class="table">
                    <tbody>
                        <?php
                        $compteur = 1;
                        if ($vars['evenements'] !== null) {
                            foreach ($vars['evenements'] as $evenements) :
                                if ($compteur > 5) {
                                    break;
                                }
                                echo '<tr>';
                                echo '<td>';
                                $compteur++;
                                echo'<div class="date">';
                                $date = new DateTime($evenements['dateConcert']);
                                echo$date->format('d/m');
                                echo'. </div>';
                                echo$evenements['nomSalle'];
                                echo' - ';
                                echo$evenements['nomArtiste'];
                                echo '</td><td>';
                                echo '<a href="index.php?nConcert=' . $evenements['nConcert'] . '" class="btn-xs btn-default"> Participer </a>';
                                echo '</td>';
                                echo '</tr>';
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="btnExtra">
                <a href="tous_les_evenements_attendus.php"><button class="btn-default">+</button></a>
            </div>
        </section>

        <section id="selectionRandom">
            <h3>s&eacute;lection random</h3>
            <table class="table" id="tablePlaylist">
                <tbody>
                    <?php
                    if ($vars['selectionRandom'] !== null) {
                        echo '<tr><td>';
                        echo'<a href="artiste.php?tmp=' . $vars['selectionRandom']['proprietaire'] . '">';
                        echo $vars['selectionRandom']['titre'];
                        echo ' - ';
                        echo $vars['selectionRandom']['artiste'];
                        echo'</a>';
                        echo '</td></tr><tr><td>';
                        echo '<audio controls oncanplay name="media">';
                        echo '<source src="';
                        echo $vars['selectionRandom']['morceau'];
                        echo '" type="audio/mpeg"></source></audio></br>';
                        echo '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    <section id="artisteDeLaSemaine"class="col-lg-8 col-sm-height" >
        <h3>artiste du moment</h3>
        <table class="table">
            <?php
            if ($vars['artisteFavori'] !== null) {
                echo '<ul class="photo-grid">';
                $nom;
                $desc;
                $genre;
                $compteur = 1;
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
                    $compteur++;
                    if ($compteur === 3) {
                        break;
                    }
                endforeach;
            }
            ?>
        </table>
    </section>

</div>
<!--fin bloc1-->

<!--debut bloc2-->
<div id="bloc2" class="col-lg-12 row-same-height">
    <section id='carte'class="text-center col-lg-7 col-sm-height">
        <input id="concertCarte" type="hidden" value="<?php echo htmlentities(json_encode($vars['concertCarte'])); ?>"/>
        <h3>aujourd'hui &agrave; Paris</h3>
        <div id='mapContainer' class='col-lg-12'>
            <img id='map'src='web/image/carte/map.svg'/>
        </div>
    </section>

    <div id="bloc2_2" class="col-lg-5 col-sm-height">
        <aside>
            <h3>dernier commentaire mis en ligne</h3>
            <div id='texteCommentaire'>
                <?php
                //on affiche le dernier commentaire, cad celui des deux qui n'est pas null ou rien si il n'y a pas de commentaires dans la bdd
                if ($vars['dernierCommentaireArtiste'] !== null) {
                    echo "<img src=\"";
                    echo $vars['dernierCommentaireArtiste']['avatar'];
                    echo "\" > ";
                    echo $vars ['dernierCommentaireArtiste'] ['pseudo'] . ""
                    . " (à propos de "
                    . "<a href='artiste.php?tmp=" . $vars['dernierCommentaireArtiste']['cible'] . "'>" . $vars['dernierCommentaireArtiste'] ['nomArtiste'] . "</a>) : </br>";
                    echo $vars ['dernierCommentaireArtiste']['texteCommentaireArtiste'];
                    echo"</br>";
                } else if ($vars['dernierCommentaireSalle'] !== null) {
                    echo "<img src=\"";
                    echo $vars['dernierCommentaireSalle']['avatar'];
                    echo "\">";
                    echo " " . $vars ['dernierCommentaireSalle'] ['pseudo'] . ""
                    . " ("
                    . "<a href='salle.php?tmp=" . $vars['dernierCommentaireSalle']['cible'] . "'>" . $vars['dernierCommentaireSalle'] ['nomSalle'] . "</a>) : </br>";
                    echo $vars ['dernierCommentaireSalle']['texteCommentaireSalle'];
                    echo"</br>";
                } else {
                    echo"</br>";
                }
                ?>
            </div>
            </br>
        </aside>

        <section id="salleDeLaSemaine">
            <h3>salles du moment</h3>
            <table class="table">
                <?php
                if ($vars['salleFavorite'] !== null) {
                    $nom;
                    $desc;
                    $genre;
                    echo '<ul class="photo-grid">';
                    $compteur = 0;
                    foreach ($vars['salleFavorite'] as $salleFavorite) :
                        $nom = $salleFavorite['nomSalle'];
                        $genre = $salleFavorite['genreMusicalSalle'];
                        $txt = "son petit nom : " . $nom . "</br>son genre : " . $genre . "</br>";
                        echo '<li><a href=salle.php?tmp=' . $salleFavorite["nSalle"] . '><figure><img src="';
                        echo$salleFavorite['photoProfilSalle'];
                        echo '"/>';
                        echo'<figcaption><p>' . $txt . '</p></figcaption></figure>';
                        echo '</a></li>';
                        $compteur++;
                        if ($compteur === 3) {
                            break;
                        }
                    endforeach;
                }
                ?>
            </table>
        </section>
    </div>
    <!--fin bloc2-->




