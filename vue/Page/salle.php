<!-- vue/page -->

<div class="col-lg-12">

    <!-- Permet de récupérer nos informations pour notre carte -->
    <input id="adresseE" type="hidden" value="<?php echo $vars['adresse'] . " " . $vars['cp'] . " " . $vars['ville']; ?>"></input>
    <input id="nomSalle" type="hidden" value="<?php echo $vars['nomProfil']; ?>"></input>
    <input id="adresse" type="hidden" value="<?php echo $vars['adresse']; ?>"></input>
    <input id="ville" type="hidden" value="<?php echo $vars['ville']; ?>"></input>
    <input id="codepostal" type="hidden" value="<?php echo $vars['cp']; ?>"></input>
    <!-- FIN -->

    <h1><?php echo $vars['nomProfil']; ?></h1>

    <div id="photoProfil" class="col-lg-12">
        <img src="<?php echo ($vars['photoProfil'] !== null) ? $vars['photoProfil'] : "web/image/salle.png"; ?>">
    </div>

    <div id="description" class="col-lg-9">
        <h4>Description : </h4>
        <p><?php echo $vars['descProfil']; ?></p>
    </div>

    <div id="interaction" class="col-lg-3">
        <a href="salle.php?tmp=<?php echo $vars['noProfil']; ?>&fav=true" class="glyphicon glyphicon-heart"> Ajouter en favori </a></br>
        <a href="f_message.php?destS=<?php echo $vars['noProfil']; ?>" class="glyphicon glyphicon-envelope"> Contacter la salle </a></br>
        <a href="" class="glyphicon glyphicon-star-empty"> Noter la salle </a>
    </div>

    <div id="contenu" class="col-lg-12">
        <aside id='parution'class="col-lg-4">
            <div id="albumPhoto">
                <h4>Album photo de la salle : </h4>
                <form id="album" method="post" action="salle.php?tmp=<?php echo $vars['noProfil']; ?>" enctype="multipart/form-data">
                    <div class="btn-group">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
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
                            echo "<form id ='suppressionPhoto' action='salle.php?tmp=" . $vars['noProfil'] . "&nP=" . $albumPhoto['nPhotoSalle'] . "' method='post'><button id='suppression' class='btn glyphicon glyphicon-remove' type='submit' name='removePhoto' value='true' ></button></form>";
                            echo "<img src=\"";
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
                <h4>Les derniers commentaires : </h4></br>
                <div>
                    <?php
                    if ($vars['commentaire'] !== null) {
                        foreach ($vars['commentaire'] as $commentaires):
                            echo"<div id='texteCommentaire'>";
                            echo "<form action='salle.php?tmp=" . $vars['noProfil'] . "&nCom=" . $commentaires['nCommentaireSalle'] . "' method='post'><button type='submit' name='remove' value='true' class='btn glyphicon glyphicon-remove'></button></form>";
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
                    <button type="submit" value="true" class="btn glyphicon glyphicon-pencil">Commenter</button>
                </form>
                </br>
            </div>
            <div id="acces">
                <h4>L'accès : </h4>
                <div id="map-canvas"></div>
                <?php
                if ($vars['tel'] !== null) {
                    echo 'tel :' . $vars['tel'];
                }
                ?>
            </div>
        </aside>
        <section class="col-lg-8">
            <h4>Le fil d'actualité : </h4></br>
            <div id="posterAnnonce">
                <p>poster une annonce</p>
                <form action="salle.php?tmp=<?php echo $vars['noProfil']; ?>" method="post" id="posterAnnonce">
                    <input type="radio" name="typeAnnonce" value="petiteAnnonce"> une petite annonce</input>
                    <input type="radio" name="typeAnnonce" value="annonceEvenement"> une annonce évènementielle</input>
                    </br>
                    offre valable du : 
                    <input data-format="dd/MM/yyyy" type="text" placeholder="jj/mm/aa" name='dateDeb'/>
                    au : 
                    <input data-format="dd/MM/yyyy" type="text" placeholder="jj/mm/aa" name='dateFin'/>
                    </br>
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
                                echo "<td class='col-lg-8'>" . $annonceEvenement['texteAnnonceEvenementSalle'] . "</td>";
                                $date = new DateTime($annonceEvenement['dateEditionAnnonceEvenementSalle']);
                                echo '<td>' . $date->format('d/m/y') . '</td>';
                                echo '<td>'
                                . "<a class='btn btn-danger' href=salle.php?tmp=" . $vars['noProfil'] . "&nAnnonceEvenement=" . $annonceEvenement['nAnnonceEvenementSalle'] . ">Supprimer</a> "
                                . '</td>';
                                echo '</tr>';
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="petiteAnnonce">
                <p>petites annonces</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Annonce</th>
                            <th>Période</th>
                            <th>Date de parution</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($vars['petiteAnnonce'] !== null) {
                            foreach ($vars['petiteAnnonce'] as $petiteAnnonce):
                                echo '<tr>';
                                echo "<td class='col-lg-8'>" . $petiteAnnonce['textePetiteAnnonce'] . "</td>";
                                $dateDeb = new DateTime($petiteAnnonce['dateDeb']);
                                if ($petiteAnnonce['dateFin'] === null) {
                                    echo '<td>à partir du </br> ' . $dateDeb->format('d/m/y ') . '</td>';
                                } else {
                                    $dateFin = new DateTime($petiteAnnonce['dateFin']);
                                    echo '<td>du </br> ' . $dateDeb->format('d/m/y ') . '</br> au </br> ' . $dateFin->format('d/m/y ') . '</td>';
                                }
                                $dateEdition = new DateTime($petiteAnnonce['dateEditionPetiteAnnonce']);
                                echo '<td>' . $dateEdition->format('d/m/y ') . '</td>';
                                echo '<td>'
                                . "<a class='btn btn-danger' href=salle.php?tmp=" . $vars['noProfil'] . "&nPetiteAnnonce=" . $petiteAnnonce['nPetiteAnnonce'] . ">Supprimer</a> "
                                . '<a class="btn btn-default" href="repondre.php?nPetiteAnnonce=' . $petiteAnnonce['nPetiteAnnonce'] . '">Postuler</a>'
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