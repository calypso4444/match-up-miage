<!-- vue/page -->

<div class="col-lg-12">

    <h1>petites annonces</h1>

    <div class="col-lg-2">
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
