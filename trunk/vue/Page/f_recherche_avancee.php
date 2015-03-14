<!-- vue/page -->

<div class="col-lg-12">

    <h1>recherche avancée</h1>

    <div id='resultat'>
        Voici les résultats correspondant à votre recherche : <?php echo "'" . $vars['mot'] . "'"; ?>
        </br>
        <?php
        if ($vars['resultat'] !== null) {
            if (!empty($vars['resultat']['artiste'])) {
                echo '<table class="table col-lg-4">';
                echo 'dans la catégorie artistes : </br>';
                $compteur = 0;
                foreach ($vars['resultat']['artiste'] as $artiste):
                    if ($compteur === 0) {
                        echo '<tr>';
                    }
                    echo'<td class="col-lg-3">';
                    echo $artiste['nomArtiste'];
                    echo '<a href=artiste.php?tmp=' . $artiste['nArtiste'] . '><img src="' . $artiste['photoProfilArtiste'] . '"/></a>';
                    echo'</td>';
                    $compteur++;
                    if ($compteur === 4) {
                        echo '<tr>';
                        $compteur = 0;
                    }
                endforeach;
                echo'</table>';
            }
            echo "</br>";
            if (!empty($vars['resultat']['salle'])) {
                echo '<table class="table col-lg-3">';
                echo 'dans la catégorie salles : </br>';
                $compteur = 0;
                foreach ($vars['resultat']['salle'] as $salle):
                    if ($compteur === 0) {
                        echo '<tr>';
                    }
                    echo'<td>';
                    echo $salle['nomSalle'];
                    echo '<a href=salle.php?tmp=' . $salle['nSalle'] . '><img src="' . $salle['photoProfilSalle'] . '"/></a>';
                    echo'</td>';
                    $compteur++;
                    if ($compteur === 4) {
                        echo '<tr>';
                        $compteur = 0;
                    }
                endforeach;
                echo'</table>';
            }
        }
        ?>
    </div>

</div>
