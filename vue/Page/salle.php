<!-- vue/page -->

<div class="col-lg-12">
	
    <h1><?php echo $vars['nomProfil']; ?></h1>

    <div id="photoProfil" class="col-lg-12">
        <img src="<?php echo ($vars['photoProfil'] !== null) ? $vars['photoProfil'] : "web/image/salle.png"; ?>">
    </div>

    <div id="description" class="col-lg-9">
        <h4>Description : </h4>
        <p><?php echo $vars['descProfil']; ?></p>
    </div>

    <div id="interaction" class="col-lg-3">
        <form action="salle.php?tmp=<?php echo $vars['noProfil']; ?>" method="post">
            <button type="submit" name="favori" value="true" class="btn glyphicon glyphicon-heart"> Ajouter en favori </button>
        </form>
        <a href="" class="glyphicon glyphicon-envelope"> Contacter la salle </a>
        <a href="" class="glyphicon glyphicon-star-empty"> Noter la salle </a>
    </div>

    <div id="contenu" class="col-lg-12">
        <aside class="col-lg-3">
            <div id="albumPhoto">
                <h4>Album photo de la salle : </h4></br>
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
                            echo "</div></br>";
                        endforeach;
                    }
                    ?>

                </div>
                <form id="commentaire" method="post" action="salle.php?tmp=<?php echo $vars['noProfil']; ?>">
                    <input type="text" name="commentaire" placeholder="Taper votre commentaire ici"/>
                    <button type="submit" value="true" class="btn glyphicon glyphicon-pencil">Commenter</button>
                </form>
                </br>
            </div>
            <div id="acces">
                <h4>L'accès : </h4>
                <?php echo $vars['adresse'] . " " . $vars['cp'] . " " . $vars['ville']; ?>
				<input id="adresse" type="hidden" value="<?php echo $vars['adresse']; ?>"></input>
				<div id="map-canvas"></div>
            </div>
        </aside>
        <section class="col-lg-9">
            <h4>Le fil d'actualité : </h4></br>
            <div id="annonceEvenement">

            </div>
            <div id="petiteAnnonce" style="border : solid 1px">
                <p>petites annonces</p>
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        if ($vars['petiteAnnonce'] !== null) {
                            foreach ($vars['petiteAnnonce'] as $petiteAnnonce):
                                echo '<tr>';
                                echo "<td class='col-lg-3'>" . $petiteAnnonce['textePetiteAnnonce'] . "</td>";
                                echo '<td>'
                                . '<a class="btn" href="supprimer_petiteAnnonce.php?nPetiteAnnonce=' . $petiteAnnonce['nPetiteAnnonce'] . '">Supprimer</a>'
                                . '<a class="btn btn-danger" href="repondre.php?nPetiteAnnonce=' . $petiteAnnonce['nPetiteAnnonce'] . '">Répondre à cette annonce</a>'
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
