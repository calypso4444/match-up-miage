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
        <a href="f_message.php?destA=<?php echo $vars['noProfil']; ?>" class=" glyphicon glyphicon-envelope"> Contacter l'artiste </a></br>
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
                            echo "<form id ='suppressionPhoto' action='artiste.php?tmp=" . $vars['noProfil'] . "&nP=" . $albumPhoto['nPhotoArtiste'] . "' method='post'><button id='suppression' class='btn glyphicon glyphicon-remove' type='submit' name='removePhoto' value='true' ></button></form>";
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
                                echo "<form action='artiste.php?tmp=" . $vars['noProfil'] . "&nCom=" . $commentaires['nCommentaireArtiste'] . "' method='post'><button class='btn glyphicon glyphicon-remove' type='submit' name='removeComment' value='true'></button></form>";
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
            <div id="playlist" class="col-lg-12">

                <form id="formulaireAjoutMusique" name="formulaireAjoutMusique" action='artiste.php?tmp=<?php echo $vars['noProfil'] ?>' method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="col-lg-6">
                                    <input class="form-control" id="titre" type="text" name="titre" placeholder="Titre" value=""/>
                                </td>
                                <td class="col-xs-1">
                                    <input class="filestyle" type="file" id="morceau" accept="audio/*" name="morceau" placeholder="" value="" data-input="false" data-buttonText="Votre son"/>
                                </td>
                                <td class="col-lg-2">
<!--                                    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />-->
                                    <input class="btn btn-default" type="submit" value="Upload">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <table class="table">
                    <tbody>
                    <td class="col-lg-6">
                        <audio controls oncanplay name="media">
                            <?php
                            if ($vars['piste'] !== null) {
                                echo "<source src='" . $vars['piste']['morceau'] . "' type='audio/mpeg'></source>";
                            }
                            ?>
                        </audio>
                        <?php
                        if ($vars['piste'] !== null) {
                            echo'<p>';
                            echo $vars['piste']['titre'] . " - " . $vars['piste']['artiste'];
                            echo'</p>';
                        }
                        ?>
                    </td>
                    <td class="col-lg-6">
                        <?php
                        if ($vars['playlist'] !== null) {
                            $compteur = 1;
                            foreach ($vars['playlist'] as $playlist):
                                echo '<a href="artiste.php?tmp=' . $vars['noProfil'] . '&nPiste=' . $playlist['nMorceau'] . '">';
                                echo $compteur;
                                echo ". ";
                                echo $playlist['titre'] . " - ";
                                echo $playlist['artiste'];
                                echo "</a></br>";
                                $compteur++;
                            endforeach;
                        }
                        ?>
                    </td>
                    </tbody>
                </table>
            </div>

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
                                echo "<td class='col-lg-8'>" . $annonceEvenement['texteAnnonceEvenementArtiste'] . "</td>";
                                $dateEdition = new DateTime($annonceEvenement['dateEditionAnnonceEvenementArtiste']);
                                echo '<td>' . $dateEdition->format('d/m/y') . '</td>';
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
