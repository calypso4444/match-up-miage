<!-- vue/page -->

<div class="col-lg-12">

    <h1><?php echo $vars['nomProfil']; ?></h1>

    <div id="photoProfil" class="col-lg-12">
        <img src="<?php echo ($vars['photoProfil'] !== null) ? $vars['photoProfil'] : "web/image/artiste.png"; ?>">
    </div>

    <div id="description" class="col-lg-9">
        <h4>Description : </h4>
        <p><?php echo $vars['descProfil']; ?></p>
    </div>

    <div id="interaction" class="col-lg-3">
        <a href="artiste.php?tmp=<?php echo $vars['noProfil']; ?>&fav=true" class="glyphicon glyphicon-heart"> Ajouter en favori </a></br>
        <a href="" class=" glyphicon glyphicon-envelope"> Contacter l'artiste </a></br>
        <a href="" class=" glyphicon glyphicon-star-empty"> Noter l'artiste </a>
    </div>

    <div id="contenu" class="col-lg-12">
        <aside id='parution'class="col-lg-4">
            <div id="albumPhoto">
                <h4>Album photo de l'artiste : </h4>
                <form id="album" method="post" action="artiste.php?tmp=<?php echo $vars['noProfil']; ?>" enctype="multipart/form-data">
                    <div class="btn-group">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                        <span class="btn"><input type="file" name="mon_fichier" id="mon_fichier" class="filestyle" data-input="false" data-buttonText="Votre photo"/></span>
                        <span class="btn"> <input class="btn btn-default" id="envoyer"  type="submit" value="OK"/></span>
                    </div>

                </form>
                <table class="table">
                    <?php
                    $compteur = 0;
                    if ($vars['albumPhoto'] !== null) {
                        foreach ($vars['albumPhoto'] as $albumPhoto):
                            if ($compteur === 0) {
                                echo '<tr>';
                            }
                            echo '<td>';
                            echo "<form id ='suppressionPhoto' action='artiste.php?tmp=" . $vars['noProfil'] . "&nP=" . $albumPhoto['nPhotoArtiste'] . "' method='post'><button id='suppression' type='submit' name='removePhoto' value='true' >x</button></form>";
                            echo "<img src=\"";
                            echo $albumPhoto['photoArtiste'];
                            echo "\"></td>";
                            $compteur++;
                            if ($compteur === 3) {
                                echo '</tr>';
                                $compteur = 0;
                            }
                        endforeach;
                    } else {
                        echo '</br>';
                    }
                    ?>
                </table>
                <div id="commentaire">
                    <h4>Les derniers commentaires : </h4></br>
                    <div>
                        <?php
                        if ($vars['commentaire']) {
                            foreach ($vars['commentaire'] as $commentaires):
                                echo"<div id='texteCommentaire'>";
                                echo "<form action='artiste.php?tmp=" . $vars['noProfil'] . "&nCom=" . $commentaires['nCommentaireArtiste'] . "' method='post'><button type='submit' name='removeComment' value='true'>x</button></form>";
                                echo "<img src=\"";
                                echo $commentaires['avatar'];
                                echo "\">";
                                echo " " . $commentaires['pseudo'] . " : </br>";
                                echo $commentaires['texteCommentaireArtiste'];
                                echo '</div></br>';
                            endforeach;
                        }
                        ?>
                    </div>
                    <form id="commentaire" method="post" action="artiste.php?tmp=<?php echo $vars['noProfil']; ?>">
                        <input type="text" name="commentaire" placeholder="Votre prose ici"/>
                        <button type="submit" class="btn glyphicon glyphicon-pencil">Commenter</button>
                    </form>
                    </br>
                </div>
                <div id="agenda">
                    <h4>L'agenda : </h4></br>
                </div>
        </aside>
        <section class="col-lg-8">
            <h4>Le fil d'actualité : </h4>
            <!--            à supprimer-->
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

            <div id="posterAnnonce">
                <p>poster une annonce</p>
                <form action="artiste.php?tmp=<?php echo $vars['noProfil']; ?>" method="post" id="posterAnnonce">
                    <textarea class="form-control" rows="5" id="posterAnnonce" type="text" name="posterAnnonce" placeholder="" value=""/></textarea>
                    </br>
                    <input class="btn btn-default" type="submit" value="Valider" id="envoyer"/>
                </form>
                </br>
            </div>
            <div id="annonceEvenement">
                <p>annonces évènement</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Annonce</th>
                            <th>Date de parution</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($vars['annonceEvenement'] !== null) {
                            foreach ($vars['annonceEvenement'] as $annonceEvenement):
                                echo '<tr>';
                                echo "<td class='col-lg-3'>" . $annonceEvenement['texteAnnonceEvenementArtiste'] . "</td>";
                                echo '<td>' . $annonceEvenement['dateEditionAnnonceEvenementArtiste'] . '</td>';
                                echo '<td>'
                                . "<a class='btn btn-danger' href=artiste.php?tmp=" . $vars['noProfil'] . "&nAnnonceEvenement=" . $annonceEvenement['nAnnonceEvenementArtiste'] . ">Supprimer</a> "
                                . '</td>';
                                echo '</tr>';
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </section>
    </div>

</div>
