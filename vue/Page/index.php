<!-- vue/page -->
<div id="bloc1" class="col-lg-12">
    <table id="musique" class="table">
        <tbody>
            <tr>
                <td id="tranverse" class="col-lg-4">
                    <section id="evenementAttendus">
                        <h3>&Eacute;v&egrave;nements les plus attendus</h3>
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
                                            echo $compteur . ". ";
                                            $compteur++;
                                            echo$evenements['nomSalle'];
                                            echo' - ';
                                            echo$evenements['nomArtiste'];
                                            echo' ( ';
                                            $date = new DateTime($evenements['dateConcert']);
                                            echo$date->format('d/m/y');
                                            echo' )';
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
                        <h3>S&eacute;lection random</h3>
                        <div id='player'>
                            <?php
                            if ($vars['selectionRandom'] === null) {
                                echo '<audio controls oncanplay name="media"><source src="web/musique/piste01.mp3" type="audio/mpeg"></source></audio>';
                            } else {
                                echo '<audio controls oncanplay name="media">';
                                echo '<source src="';
                                echo $vars['selectionRandom']['morceau'];
                                echo '" type="audio/mpeg"></source></audio></br>';
                                echo $vars['selectionRandom']['titre'];
                                echo ' - ';
                                echo $vars['selectionRandom']['artiste'];
                            }
                            ?>
                        </div>
                    </section>
                </td>

                <td class="col-lg-8">
                    <section id="artisteDeLaSemaine">
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
            </tr>
        </tbody>
    </table>

</div>
<!--fin bloc1-->

<!--debut bloc2-->
<div id="bloc2" class="col-lg-12">
    <table class="table">
        <tbody>
            <tr>
                <td id="tranverse" class="col-lg-8">
                    <section id='carte'>
                        <h2>Ce soir &agrave; Paris</h2>
                        <canvas id='map'style='height:420.7px; width: 532.7px; border:solid #21e738 1px; padding:0; margin :0;background-image:url("web/image/carte/map.svg");background-repeat: no-repeat' >
<!--                            <svg viewBox="0 0 532.7 420.7" style='border:solid red 1px;'>
                            </svg>-->
                        </canvas>
                        </br>
                    </section>

                    <script>

//                        MAP_WIDTH = 532.7;
//                        MAP_HEIGHT = 420.7;
//
//                        function convert(lat, lon) {
//                            var y = ((-1 * lat) + 90) * (MAP_HEIGHT / 180);
//                            var x = (lon + 180) * (MAP_WIDTH / 360);
//                            var tab= new array(x,y);
//                            return tab;
//                        }

                        var canvas = $("#map")[0];
                        var context = canvas.getContext("2d");

                        var img = new Image();   // Crée un nouvel objet Image
                        img.src = 'web/image/carte/map.svg'; // Définit le chemin vers sa source
                        img.onload = function() {
                            draw();
                        }
                        function draw() {
                            var ctx = document.getElementById('map').getContext('2d');
                            var img = new Image();
                            img.src = 'web/image/carte/map.svg';
                            var etoile = new Image();
                            etoile.src = 'web/image/carte/etoile.svg';

//                            var t = convert(48.8672991, 2.363467300000025);
//                            var x = t[0];
//                            var y = t[1];

                            var tabx = [22, 249, 269];
                            var taby = [116, 130,96 ];


                            etoile.onload = function() {
                                for (var i = 0; i < 3; i++) {
////                                    ctx.drawImage(etoile, tabx[i], taby[i],10,8);
                                    ctx.fillStyle = "yellow";
                                    ctx.fillRect(tabx[i], taby[i], 3, 3);
//                                    star(ctx, tabx[i], taby[i], 4, 4, 0.5);
                                }
                            }
                            function star(ctx, x, y, r, p, m)
                            {
                                ctx.save();
                                ctx.beginPath();
                                ctx.translate(x, y);
                                ctx.moveTo(0, 0 - r);
                                for (var i = 0; i < p; i++)
                                {
                                    ctx.rotate(Math.PI / p);
                                    ctx.lineTo(0, 0 - (r * m));
                                    ctx.rotate(Math.PI / p);
                                    ctx.lineTo(0, 0 - r);
                                }
                                ctx.fill();
                                ctx.restore();
                            }
                        }




                    </script>

                </td>

                <td class="col-lg-4">
                    <aside>
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

                    <section id="salleDeLaSemaine">
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
                </td>
        </tbody>
    </table>
</div>
<!--fin bloc2-->




