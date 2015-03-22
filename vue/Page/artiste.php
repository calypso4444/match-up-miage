<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php
if ($vars['estConnecte'] === false) {
    echo "<script>document.location.href='inscription.php'</script>";
}
?>

<div class="col-lg-12">

    <!-- Permet de récupérer nos informations pour notre carte -->
    <input id="estProprietaire" type="hidden" value="<?php echo $vars['estProprietaire']; ?>"></input>
    <!-- FIN -->

    <h1><?php echo $vars['nomProfil']; ?></h1>

    <!-- Permet d'afficher le menu admin -->
    <input type="button" onclick="masquer_div('artisteAdmin')" value="Masquer/Afficher"></button>
    <!-- Permet d'afficher le menu admin -->

    <div id="photoProfil" class="col-lg-12">
        <img src="<?php echo ($vars['photoProfil'] !== null) ? $vars['photoProfil'] : "web/image/artiste.png"; ?>">
    </div>

    <div id='bandeauProfil' class='col-lg-12 row-same-height'>
        <div id="description" class="col-lg-6 col-sm-height">
            <h4>description</h4>
            <p><?php echo $vars['descProfil']; ?></p>
        </div>

        <div id="genreMusical" class="col-lg-3 col-sm-height">
            <h4>genre musical</h4>
            <p><?php echo $vars['genre']; ?></p>
        </div>

        <div id="interaction" class="col-lg-3 col-sm-height">
            <a href="artiste.php?tmp=<?php echo $vars['noProfil']; ?>&fav=true" class="glyphicon glyphicon-heart"> Ajouter en favori </a></br>
            <a href="f_message.php?destA=<?php echo $vars['noProfil']; ?>" class=" glyphicon glyphicon-envelope"> Contacter l'artiste </a></br>
            <a href="" class=" glyphicon glyphicon-star-empty"> Noter l'artiste </a>
        </div>
    </div>

    <div id="artisteAdmin" class="col-lg-12">
        <div id='gestionPhoto' class='col-lg-4'>
            <div id="uploaderPhoto">
                <p>uploader une photo</p>
                <form id="album" method="post" action="artiste.php?tmp=<?php echo $vars['noProfil']; ?>" enctype="multipart/form-data">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="col-lg-6">
                                    <span class="btn"><input type="file" name="mon_fichier" id="mon_fichier" class="filestyle" data-input="false" data-buttonText="Votre photo"/></span>
                                </td>
                                <td class="col-lg-6">
                                    <span class="btn"> <input class="btn btn-default" id="envoyer"  type="submit" value="OK"/></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </form>
            </div>
            <div id='gererPhoto' style='border-top: dashed black 1px'>
                <p>mes photos</p>
                <table class="table">
                    <?php
                    $compteur = 0;
                    if ($vars['albumPhoto'] !== null) {
                        foreach ($vars['albumPhoto'] as $albumPhoto):
                            if ($compteur === 0) {
                                echo '<tr>';
                            }
                            echo '<td>';
                            echo "<form id ='suppressionPhoto' action='artiste.php?tmp=" . $vars['noProfil'] . "&nP=" . $albumPhoto['nPhotoArtiste'] . "' method='post'><button id='suppression' class='btn-xs glyphicon glyphicon-remove' type='submit' name='removePhoto' value='true' ></button></form>";
                            echo "<img src=\"";
                            echo $albumPhoto['photoArtiste'];
                            echo "\"></td>";
                            $compteur++;
                            if ($compteur === 5) {
                                echo '</tr>';
                                $compteur = 0;
                            }
                        endforeach;
                    } else {
                        echo '</br>';
                    }
                    ?>
                </table>
            </div>
            
        </div>


        <div id="gestionMusique" class="col-lg-4">
            <div id="uploaderMorceau">
                <p>uploader un morceau</p>
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
                                    <input class="btn btn-default" type="submit" value="Upload">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>

            <div id="gererPlaylist" style='border-top: dashed black 1px'>
                <p>mes morceaux</p>
                <table class="table" id="tablePlaylist">
                    <tbody>
                        <?php
                        if ($vars['playlist'] !== null) {
                            $compteur = 1;
                            foreach ($vars['playlist'] as $playlist):
                                echo"<tr>";
                                echo '<td>';
                                echo '<a href="artiste.php?tmp=' . $vars['noProfil'] . '&nPiste=' . $playlist['nMorceau'] . '">';
                                echo $compteur;
                                echo ". ";
                                echo $playlist['titre'] . " - ";
                                echo $playlist['artiste'];
                                echo "</a>";
                                echo '</td><td>';
                                echo "<form id='suppressionMorceau' action='artiste.php?tmp=" . $vars['noProfil'] . "&nMorceau=" . $playlist['nMorceau'] . "' method='post'><button id='suppression'class='btn-xs glyphicon glyphicon-remove' type='submit' name='removeSong' value='true'></button></form>";
                                echo "</td></tr>";
                                $compteur++;
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="gestionAnnonce" class="col-lg-4 ">
            <div id="posterAnnonce">
                <p>poster une annonce</p>
                <form action="artiste.php?tmp=<?php echo $vars['noProfil']; ?>" method="post" id="posterAnnonce">
                    <textarea  class="form-control" rows="5" id="posterAnnonce" type="text" name="posterAnnonce" placeholder="" value=""/></textarea>
                    </br>
                    <input class="btn btn-default" type="submit" value="Valider" id="envoyer"/>
                </form>
                </br>
            </div>

            <div id="gererAnnonces" style='border-top: dashed black 1px'>
                <p>mes annonces</p>
                <table class="table">
                    <tbody>
                        <?php
                        if ($vars['annonceEvenement'] !== null) {
                            foreach ($vars['annonceEvenement'] as $annonceEvenement):
                                echo '<tr>';
                                $dateEdition = new DateTime($annonceEvenement['dateEditionAnnonceEvenementArtiste']);
                                echo '<td>' . $dateEdition->format('d/m') . '</td>';
                                echo "<td>" . $annonceEvenement['texteAnnonceEvenementArtiste'] . "</td>";
                                echo '<td>'
                                . "<a class='btn-sm btn-danger' href=artiste.php?tmp=" . $vars['noProfil'] . "&nAnnonceEvenement=" . $annonceEvenement['nAnnonceEvenementArtiste'] . ">Supprimer</a> "
                                . '</td>';
                                echo '</tr>';
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="contenu" class="col-lg-12 row-same-height">

        <aside id='parution'class="col-lg-4 col-sm-height">
            <div id="albumPhoto">
                <h4>album photo de l'artiste</h4>

                <table class="table">
                    <?php
                    $compteur = 0;
                    if ($vars['albumPhoto'] !== null) {
                        foreach ($vars['albumPhoto'] as $albumPhoto):
                            if ($compteur === 0) {
                                echo '<tr>';
                            }
                            echo '<td>';
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
                    <h4>les derniers commentaires</h4></br>
                    <div>
                        <?php
                        if ($vars['commentaire']) {
                            foreach ($vars['commentaire'] as $commentaires):
                                echo"<div id='texteCommentaire'>";
                                echo "<form action='artiste.php?tmp=" . $vars['noProfil'] . "&nCom=" . $commentaires['nCommentaireArtiste'] . "' method='post'><button class='btn-xs glyphicon glyphicon-remove' type='submit' name='removeComment' value='true'></button></form>";
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
                        <button type="submit" class="glyphicon glyphicon-pencil">Commenter</button>
                    </form>
                    </br>
                </div>
                <div id="agenda">
                    <h4>l'agenda</h4></br>
                    <table class="table">
                        <tbody>
                            <?php
                            if ($vars['aVenir'] !== null) {
                                foreach ($vars['aVenir'] as $aVenir):
                                    $date = new DateTime($aVenir['dateConcert']);
                                    $dateConcert = $date->format('d/m');
                                    echo '<tr>';
                                    echo '<td> <div class="date"> ' . $dateConcert . '. </div>' . $aVenir['nomSalle'] . '</td>';
                                    echo '<td> <a href="artiste.php?tmp=' . $vars['noProfil'] . '&nConcert=' . $aVenir['nConcert'] . '" class=" btn-xs btn-default"> Participer </a></td>';
                                    echo'</tr>';
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </aside>



        <section id="playlist" class="col-lg-4 col-sm-height">
            <h4>ma musique</h4>

            <table class="table" id="tablePlaylist">
                <tbody>
                    <tr style='border-top: transparent 1px solid;'>
                        <td style="color: whitesmoke">
                            <?php
                            if ($vars['piste'] !== null) {
                                echo'<p>';
                                echo $vars['piste']['titre'] . " - " . $vars['piste']['artiste'];
                                echo'</p>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <audio controls oncanplay name="media">
                                <?php
                                if ($vars['piste'] !== null) {
                                    echo "<source src='" . $vars['piste']['morceau'] . "' type='audio/mpeg'></source>";
                                }
                                ?>
                            </audio>
                        </td>
                    </tr>
                    <?php
                    if ($vars['playlist'] !== null) {
                        $compteur = 1;
                        foreach ($vars['playlist'] as $playlist):
                            echo"<tr><td>";
                            echo '<a href="artiste.php?tmp=' . $vars['noProfil'] . '&nPiste=' . $playlist['nMorceau'] . '">';
                            echo $compteur;
                            echo ". ";
                            echo $playlist['titre'] . " - ";
                            echo $playlist['artiste'];
                            echo "</a>";
                            echo "</td></tr>";
                            $compteur++;
                        endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </section>


        <section id="annonceEvenement" class="col-lg-4 col-sm-height">
            <h4>mes annonces</h4>
            <div id="annonce">
                <table class="table">
                    <tbody>
                        <?php
                        if ($vars['annonceEvenement'] !== null) {
                            foreach ($vars['annonceEvenement'] as $annonceEvenement):
                                echo'<tr><td>';
                                $dateEdition = new DateTime($annonceEvenement['dateEditionAnnonceEvenementArtiste']);
                                echo "<div class='date'>" . $dateEdition->format('d/m') . ". </div>";
                                echo $annonceEvenement['texteAnnonceEvenementArtiste'];
                                echo '</tr></td>';
                            endforeach;
                        }
                        ?>
                        </div>
                    </tbody>
                </table>
        </section>
    </div>       
</div>

<!-- SCRIPT POUR CACHER/AFFICHER DIV -->
<script id="cacher" type="text/javascript" src="web/js/artisteAdmin.js"></script>		
<!-- FIN SCRIPT POUR CACHER/AFFICHER DIV-->	