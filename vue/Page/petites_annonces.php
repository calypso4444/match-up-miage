<!-- vue/page -->

<div class="col-lg-12">

    <h1>petites annonces</h1>

    <div id="lesPetitesAnnonces">
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
