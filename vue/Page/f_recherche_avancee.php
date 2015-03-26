<!-- vue/page -->

<div class="col-lg-12">

    <h1>recherche avancée</h1>

    <div id="optionAvancee" class="col-lg-2">
        <h4>Affiner votre recherche</h4>

        <form action='f_recherche_avancee.php' method="post" name="formRechercheAvanceGenre" >
            <table class="table">
                <tbody>
                    <tr> <td> 
                            <p>Par genre musical</p>
                            <select class='form-control' name="genreMusical" size="l">
                                <option></option>
                                <option> R&B </option>
                                <option> Punk </option>
                                <option> Classique</option>
                                <option> Metal</option>
                                <option> Pop</option>
                                <option> Rap</option>
                                <option> Reggae</option>
                                <option> Dance </option>          
                            </select>
                        </td></tr>
                    <tr><td>
                            <p>Par arrondissement</p>
                            <select class='form-control' name="arrondissement" size="l">
                                <option></option>
                                <option> 01er Arrondissement </option>
                                <option> 02e Arrondissement </option>
                                <option> 03e Arrondissement</option>
                                <option> 04e Arrondissement</option>
                                <option> 05e Arrondissement</option>
                                <option> 06e Arrondissement</option>
                                <option> 07e Arrondissement</option>
                                <option> 08e Arrondissement </option>          
                                <option> 09e Arrondissement </option>
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
                        </td></tr>
                </tbody>
            </table>
            <input type='submit' class="btn-success"></input>
        </form>
        </br>
    </div>

    <div id='resultat' class="col-lg-10">
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
