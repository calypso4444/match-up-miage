<!-- vue/page -->

<div class="col-lg-12">

    <h1>petites annonces</h1>

    <div class="col-lg-2">
        <h4>Affiner votre recherche</h4>

        <form action='petites_annonces.php' method="post" name="formRechercheAvanceGenre" >
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
    <div id="lesPetitesAnnonces" class="col-lg-10">
        <table class="table">
            <tbody>
                <?php
                foreach ($vars['annonces'] as $annonces):
                    echo '<tr>';
                    echo "<td class='col-lg-3'>" . $annonces['nomSalle'] . "</br><a href=salle.php?tmp=" . $annonces['auteur'] . "><img src='" . $annonces['photoProfilSalle'] . "'/></a></td>";
                    $dateEdition = new DateTime($annonces['dateEditionPetiteAnnonce']);
                    echo '<td class="col-lg-8">';
                    $dateDeb = new DateTime($annonces['dateDeb']);
                    echo '<div class="dateValidite">';
                    if ($annonces['dateFin'] === null) {
                        echo 'à partir du </br> ' . $dateDeb->format('d/m');
                    } else {
                        $dateFin = new DateTime($annonces['dateFin']);
                        echo 'du ' . $dateDeb->format('d/m') . ' au ' . $dateFin->format('d/m');
                    }
                    echo'</div>';
                    echo '<div class="date">' . $dateEdition->format('d/m') . '. </div>';
                    echo $annonces['textePetiteAnnonce'] . '</td>';
                    echo '<td class="col-lg-1"></br>'
                    . '<a class="btn btn-default" href="f_message.php?destS=' . $annonces['auteur'] . '&nAnnonce=' . $annonces['nPetiteAnnonce'] . '">Postuler</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>

            </tbody>
        </table>
    </div>

</div>
