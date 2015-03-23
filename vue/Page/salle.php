<!-- vue/page -->

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

<!--si l'utilisateur met le profil en favori, on le redirige vers la page mes favoris-->
<?php
if ($vars['metEnFavori'] === true) {
    echo "<script>document.location.href='f_mes_favoris.php'</script>";
}
?>

<div class="col-lg-12">

    <!-- Permet de récupérer nos informations pour notre carte -->
    <input id="adresseE" type="hidden" value="<?php echo $vars['adresse'] . " " . $vars['cp'] . " " . $vars['ville']; ?>"></input>
    <input id="nomSalle" type="hidden" value="<?php echo $vars['nomProfil']; ?>"></input>
    <input id="adresse" type="hidden" value="<?php echo $vars['adresse']; ?>"></input>
    <input id="ville" type="hidden" value="<?php echo $vars['ville']; ?>"></input>
    <input id="codepostal" type="hidden" value="<?php echo $vars['cp']; ?>"></input>
    <input id="estProprietaire" type="hidden" value="<?php echo $vars['estProprietaire']; ?>"></input>
    <!-- FIN -->

    <h1><?php echo $vars['nomProfil']; ?></h1>
    <p class="text-center"><?php echo $vars['genre']; ?></p>


    <div id="photoProfil" class="col-lg-12">
        <img src="<?php echo ($vars['photoProfil'] !== null) ? $vars['photoProfil'] : "web/image/salle.png"; ?>">
        <!-- Permet d'afficher le menu admin -->
        <input type="button" id="afficherMasquer" onclick="masquer_div('salleAdmin')" value="Masquer/Afficher"></button>
        <!-- Permet d'afficher le menu admin -->
    </div>

    <div id="bandeauProfil" class="col-lg-12">
        <div id="description" class="col-lg-6">
            <p><?php echo $vars['descProfil']; ?></p>
        </div>

        <div class="rating col-lg-3">
            <table class="table">
                <tbody>
                    <tr><td>
                            <a href="salle.php?tmp=<?php echo $vars['noProfil']; ?>&note=5" title="Donner 5 étoiles" class=" glyphicon glyphicon-star"></a>
                            <a href="salle.php?tmp=<?php echo $vars['noProfil']; ?>&note=4" title="Donner 4 étoiles" class=" glyphicon glyphicon-star"></a>
                            <a href="salle.php?tmp=<?php echo $vars['noProfil']; ?>&note=3" title="Donner 3 étoiles" class=" glyphicon glyphicon-star"></a>
                            <a href="salle.php?tmp=<?php echo $vars['noProfil']; ?>&note=2" title="Donner 2 étoiles" class=" glyphicon glyphicon-star"></a>
                            <a href="salle.php?tmp=<?php echo $vars['noProfil']; ?>&note=1" title="Donner 1 étoile" class=" glyphicon glyphicon-star"></a>
                        </td>
                        <td>
                            (<?php echo $vars['noteMoyenne']; ?>/5)
                        </td>
                </tbody>
            </table>
        </div>

        <div id="interaction" class="col-lg-3">
            <a href="salle.php?tmp=<?php echo $vars['noProfil']; ?>&fav=true" class="glyphicon glyphicon-heart"> Ajouter en favori </a></br>
            <a href="f_message.php?destS=<?php echo $vars['noProfil']; ?>" class="glyphicon glyphicon-envelope"> Contacter la salle </a></br>
        </div>
    </div>

    <div id="salleAdmin" class="col-lg-12">
        <div id="gestionPhoto" class="col-lg-4">
            <div id="uploaderPhoto">
                <form id="album" method="post" action="salle.php?tmp=<?php echo $vars['noProfil']; ?>" enctype="multipart/form-data">
                    <div class="btn-group">
                        <span class="btn"><input type="file" name="mon_fichier" id="mon_fichier" class="filestyle" data-input="false" data-buttonText="Votre photo"/></span>
                        <span class="btn"> <input class="btn btn-default" id="envoyer"  type="submit" value="OK"/></span>
                    </div>
                    </br>
                </form>
                </br>
            </div>
            <div id="gererPhoto" style='border-top: dashed black 1px'>
                <h4>mes photos</h4>
                <table class="table">
                    <?php
                    $compteur = 0;
                    if ($vars['albumPhoto'] !== null) {
                        foreach ($vars['albumPhoto'] as $albumPhoto):
                            if ($compteur === 0) {
                                echo '<tr>';
                            }
                            echo '<td>';
                            echo "<form id ='suppressionPhoto' action='salle.php?tmp=" . $vars['noProfil'] . "&nP=" . $albumPhoto['nPhotoSalle'] . "' method='post'><button id='suppression' class='btn-xs glyphicon glyphicon-remove' type='submit' name='removePhoto' value='true' ></button></form>";
                            echo "<img src=\"";
                            echo $albumPhoto['photoSalle'];
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

            <div id="interactionArtiste" style='border-top: solid 2px black'>
                <h4>proposer un concert à un artiste</h4>
                <form action="salle.php?tmp=<?php echo $vars['noProfil'] ?>" method="post" id="proposerConcert">
                    <label for="nomArtiste">Nom de l'artiste</label>
                    <input class="form-control" id="nomArtiste" type="text" name="nomArtiste" placeholder="" value=""/>
                    la date que vous proposez : 
                    <input id="datepicker" class="datepicker" type="text" placeholder="jj/mm/aaaa" name='dateConcert'></input>
                    <input type="submit" name='proposerConcert' value='Valider'/>
                </form>
                <?php echo ($vars['ok']) ? "<script>document.location.href='f_message.php?destA=" . $vars['nArtiste'] . "&dC=" . $vars['dateConcert'] . "&nS=" . $vars['noProfil'] . "'</script>" : null; ?>
                <?php
                if (($vars['existeArtiste']) === false) {
                    echo"<script>alert('nom incorrect');</script>";
                }
                ?>
            </div>
        </div>

        <div id="gestionAnnonce" class="col-lg-8">
            <div id="posterAnnonce" style="border-bottom: dashed black 1px">
                <h4>poster une annonce</h4>
                <form action="salle.php?tmp=<?php echo $vars['noProfil']; ?>" method="post" id="posterAnnonceSalle">
                    <input type="radio" name="typeAnnonce" value="petiteAnnonce"> une petite annonce</input>
                    <input type="radio" name="typeAnnonce" value="annonceEvenement"> une annonce évènementielle</input>
                    </br>                  
                    <label for="dateDebut"> Offre valable du </label>
                    <input type="text" id="from" name="dateDeb">
                    <label for="dateFin">au</label>
                    <input type="text" id="to" name="dateFin">
                    </br></br>
                    <textarea class="form-control" rows="5" id="descriptionAnnonceSalle" type="text" name="posterAnnonce" placeholder="" value=""/></textarea>
                    <span id="descriptionSalleInfo"></span>
                    </br>
                    <input class="btn btn-default" type="submit" value="Valider" id="envoyerAnnonce"/>
                    </br>
                </form>
                </br>
            </div>

            <div id="gererAnnonces">
                <div id="annonceEvenement">
                    <h4>mes annonces évènement</h4>
                    <table class="table">
                        <tbody>
                            <?php
                            if ($vars['annonceEvenement'] !== null) {
                                foreach ($vars['annonceEvenement'] as $annonceEvenement):
                                    echo '<tr>';
                                    $date = new DateTime($annonceEvenement['dateEditionAnnonceEvenementSalle']);
                                    echo '<td class="col-lg-10"><div class="date">' . $date->format('d/m') . '. </div>';
                                    echo $annonceEvenement['texteAnnonceEvenementSalle'] . "</td>";
                                    echo '<td>'
                                    . "<a class='btn-sm btn-danger' href=salle.php?tmp=" . $vars['noProfil'] . "&nAnnonceEvenement=" . $annonceEvenement['nAnnonceEvenementSalle'] . ">Supprimer</a> "
                                    . '</td>';
                                    echo '</tr>';
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="petiteAnnonce" style="border-top: dashed black 1px;">
                    <h4>mes petites annonces</h4>
                    <table class="table">
                        <tbody>
                            <?php
                            if ($vars['petiteAnnonce'] !== null) {
                                foreach ($vars['petiteAnnonce'] as $petiteAnnonce):
                                    echo '<tr><td class="col-lg-10">';
                                    $dateDeb = new DateTime($petiteAnnonce['dateDeb']);
                                    if ($petiteAnnonce['dateFin'] === null) {
                                        echo '<div class="dateValidite">à partir du ' . $dateDeb->format('d/m') . '</br></div>';
                                    } else {
                                        $dateFin = new DateTime($petiteAnnonce['dateFin']);
                                        echo '<div class="dateValidite">du ' . $dateDeb->format('d/m') . ' au ' . $dateFin->format('d/m') . '</br></div>';
                                    }
                                    $dateEdition = new DateTime($petiteAnnonce['dateEditionPetiteAnnonce']);
                                    echo '<div class="date">' . $dateEdition->format('d/m') . '. </div>';
                                    echo $petiteAnnonce['textePetiteAnnonce'];
                                    echo "</td>";
                                    echo '<td>'
                                    . "<a class='btn-sm btn-danger' href=salle.php?tmp=" . $vars['noProfil'] . "&nPetiteAnnonce=" . $petiteAnnonce['nPetiteAnnonce'] . ">Supprimer</a> "
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
    </div>

    <div id="contenu" class="col-lg-12 row-same-height">
        <aside id='parution'class="col-lg-4 col-sm-height">
            <div id="albumPhoto">
                <h4>album photo de la salle : </h4>
                <table class="table">
                    <?php
                    $compteur = 0;
                    if ($vars['albumPhoto'] !== null) {
                        foreach ($vars['albumPhoto'] as $albumPhoto):
                            if ($compteur === 0) {
                                echo '<tr>';
                            }
                            echo '<td>';
                            echo "<img class='img-zoom' src=\"";
                            echo $albumPhoto['photoSalle'];
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
            </div>


            <div id="commentaire">
                <h4>les derniers commentaires : </h4></br>
                <div>
                    <?php
                    if ($vars['commentaire'] !== null) {
                        foreach ($vars['commentaire'] as $commentaires):
                            echo"<div id='texteCommentaire'>";
                            echo "<form action='salle.php?tmp=" . $vars['noProfil'] . "&nCom=" . $commentaires['nCommentaireSalle'] . "' method='post'><button type='submit' name='remove' value='true' class='btn-xs glyphicon glyphicon-remove'></button></form>";
                            echo "<img src=\"";
                            echo $commentaires['avatar'];
                            echo "\">";
                            echo " " . $commentaires['pseudo'] . " : </br>";
                            echo $commentaires['texteCommentaireSalle'];
                            echo "</div>";
                            echo"</br>";
                        endforeach;
                    }
                    ?>

                </div>
                <form id="commentaire" method="post" action="salle.php?tmp=<?php echo $vars['noProfil']; ?>">
                    <input type="text" name="commentaire" placeholder="Votre prose ici"/>
                    <button type="submit" value="true" class="glyphicon glyphicon-pencil">Commenter</button>
                </form>
                </br>
            </div>
            <div id="acces">
                <h4>l'accès : </h4>
                <div id="map-canvas"></div>
                <?php
                if ($vars['tel'] !== null) {
                    echo 'tel :' . $vars['tel'];
                }
                ?>
            </div>
        </aside>

        <section id="petiteAnnonce" class="col-lg-4 col-sm-height">
            <h4>mes petites annonces</h4>
            <div id="annonce">
                <table class="table">
                    <tbody>
                        <?php
                        if ($vars['petiteAnnonce'] !== null) {
                            foreach ($vars['petiteAnnonce'] as $petiteAnnonce):
                                echo '<tr><td>';
                                $dateDeb = new DateTime($petiteAnnonce['dateDeb']);
                                if ($petiteAnnonce['dateFin'] === null) {
                                    echo '<div class="dateValidite">';
                                    echo 'à partir du ' . $dateDeb->format('d/m');
                                    echo '</div>';
                                } else {
                                    echo '<div class="dateValidite">';
                                    $dateFin = new DateTime($petiteAnnonce['dateFin']);
                                    echo 'du ' . $dateDeb->format('d/m') . ' au ' . $dateFin->format('d/m');
                                    echo '</div>';
                                }
                                echo '<div class="date">';
                                $dateEdition = new DateTime($petiteAnnonce['dateEditionPetiteAnnonce']);
                                echo $dateEdition->format('d/m');
                                echo '. </div>';
                                echo $petiteAnnonce['textePetiteAnnonce'];
                                echo'</br>';
                                echo '<a class="btn-xs btn-default" href="f_message.php?destS=' . $vars['noProfil'] . '&nAnnonce=' . $petiteAnnonce['nPetiteAnnonce'] . '">Postuler</a>';
                                echo '</td></tr>';
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="annonceEvenement" class="col-lg-4 col-sm-height">
            <h4>mes annonces évènement</h4>
            <div id="annonce">
                <table class="table">
                    <tbody>
                        <?php
                        if ($vars['annonceEvenement'] !== null) {
                            foreach ($vars['annonceEvenement'] as $annonceEvenement):
                                echo'<tr><td>';
                                $date = new DateTime($annonceEvenement['dateEditionAnnonceEvenementSalle']);
                                echo '<div class="date">';
                                echo $date->format('d/m');
                                echo '. </div>';
                                echo $annonceEvenement['texteAnnonceEvenementSalle'];
                                echo '</tr></td>';
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<!-- SCRIPT POUR CACHER/AFFICHER DIV -->
<script id="cacher" type="text/javascript" src="web/js/salleAdmin.js"></script>		
<!-- FIN SCRIPT POUR CACHER/AFFICHER DIV-->	

