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
                    <section id='carte'class="text-center">
                        <input id="concertCarte" type="hidden" value="<?php echo htmlentities(json_encode($vars['concertCarte'])); ?>"/>
                        <h2>Ce soir &agrave; Paris</h2>
                        
                        <canvas id='map'style='height:588.98px; width: 745.78px; padding:0; margin :0;background-image:url("web/image/carte/map.svg");background-repeat: no-repeat' >
                        </canvas>
                    </section>

                    <script>

                        var txt = $('#concertCarte').val();
                        var concertCarte = JSON.parse(txt);

                        var lon = new Array();
                        var lat = new Array();


                        MAP_WIDTH = 532.7;
                        MAP_HEIGHT = 420.7;

                        latitude = 48.8672991; // (φ)
                        longitude = 2.363467300000025;   // (λ)

                        mapWidth = 299;
                        mapHeight = 149;

                        var coinHautGauche = {lat: 48.899947, long: 2.245588};
                        var coinBasDroit = {lat: 48.817377, long: 2.418537};


                        function gps2pixel(lat, long)
                        {
                            return {
                                x: Math.round(mapWidth * (long - coinHautGauche.long) / (coinBasDroit.long - coinHautGauche.long)),
                                y: Math.round(mapHeight * (lat - coinHautGauche.lat) / (coinBasDroit.lat - coinHautGauche.lat))
                            };

                        }
                        var canvas = $("#map")[0];
                        var context = canvas.getContext("2d");

                        var img = new Image();   // Crée un nouvel objet Image
                        img.src = 'web/image/carte/map.svg'; // Définit le chemin vers sa source
                        img.onload = function() {
                            draw();
                        }

//                        function constructionLatLon(tab){
                        for (var i = 0; i <= concertCarte.length; i++){
                        lon[i] = concertCarte[i].longitude;
                                lat[i] = concertCarte[i].latitude;
                                var tmp = gps2pixel(lat[i], lon[i]);
                                lon[i] = tmp.x;
                                lat[i] = tmp.y;
                        }
//                        };

                        function draw() {
                        var ctx = document.getElementById('map').getContext('2d');
                                var img = new Image();
                                img.src = 'web/image/carte/map.svg';
                                var etoile = new Image();
                                etoile.src = 'web/image/carte/etoile.svg';
                                var position = gps2pixel(48.855306, 2.345908);
                                var position2 = gps2pixel(48.873466, 2.294898);
//                            lon = position.x;
//                            lat = position.y;
//                            lon2 = position2.x;
//                            lat2 = position2.y;
//
//                            var tabx = [248, 125, 0, 290, 299, lon, lon2];
//                            var taby = [3, 2, 87, 87, 149, lat, lat2];


                                etoile.onload = function() {
                                for (var i = 0; i < 7; i++) {
//                                    ctx.drawImage(etoile, lon[i], lat[i], 10, 8);
                                ctx.fillStyle = "green";
                                        ctx.fillRect(lon[i], lat[i], 2, 2);
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
                                echo $vars ['dernierCommentaireArtiste'] ['pseudo'] . ""
                                . " (à propos de "
                                . "<a href='artiste.php?tmp=" . $vars['dernierCommentaireArtiste']['cible'] . "'>" . $vars['dernierCommentaireArtiste'] ['nomArtiste'] . "</a>) : </br>";
                                echo $vars ['dernierCommentaireArtiste']['texteCommentaireArtiste'];
                                echo"</br>";
                            } else if ($vars['dernierCommentaireSalle'] !== null) {
                                echo "<img src=\"";
                                echo $vars['dernierCommentaireSalle']['avatar'];
                                echo "\">";
                                echo $vars ['dernierCommentaireSalle'] ['pseudo'] . ""
                                . " (à propos de "
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




