<!-- vue/page -->

<div class="col-lg-12">

    <h1>recherche avancée</h1>

    <div id="optionAvancee" class="col-lg-2" style="border-right : solid black 1px; border-top: solid black 1px; margin-right: -1px">
        <form id="RechercheAvanceGenre" method="post" name="formRechercheAvanceGenre" enctype="multipart/form-data">
            <tr>                
            <select name="genreMusical" size="l">
                        <option> R&B </option>
                        <option> Punk </option>
                        <option> Classique</option>
                        <option> Metal</option>
                        <option> Pop</option>
                        <option> Rap</option>
                        <option> Reggae</option>
                        <option> Dance </option>          
                        </select>
        </tr>
        <tr>
            <select name="Arrondissements" size="l">
                        <option> 1er Arrondissement </option>
                        <option> 2e Arrondissement </option>
                        <option> 3e Arrondissement</option>
                        <option> 4e Arrondissement</option>
                        <option> 5e Arrondissement</option>
                        <option> 6e Arrondissement</option>
                        <option> 7e Arrondissement</option>
                        <option> 8e Arrondissement </option>          <option> 9e Arrondissement </option>
                        <option> 10e Arrondissement </option>
                        <option> 11e Arrondissement </option>
                        <option> 12e Arrondissement </option>
                        <option> 13e Arrondissement </option>
                        <option> 14e Arrondissement </option>
                        <option> 15e Arrondissement </option>
                        <option> 16e Arrondissement </option>
                        <option> 17e Arrondissement </option>
                        <option> 18e Arrondissement </option>
                        <option> 19e Arrondissement </option>
                        <option> 20e Arrondissement </option>
                        </select>
        </tr>
        </form>
        </br>
    </div>

    <div id='resultat' class="col-lg-10" style="border-top: solid black 1px; border-left : solid black 1px;">
        <p> Voici les résultats correspondant à votre recherche : <?php echo "'" . $vars['mot'] . "'"; ?></p>
        <?php
        if (!empty($vars['resultat'])) {
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
        } else {
            echo 'aucun résultat';
        }
        ?>
        </br>
    </div>

</div>
