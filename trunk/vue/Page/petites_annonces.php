<!-- vue/page -->

<div class="col-lg-12">

    <h1>petites annonces</h1>

    <div id="lesPetitesAnnonces">
        <table class="table">
            <thead>
                <tr>
                    <th>Posté par</th>
                    <th>Annonce</th>
                    <th>Période</th>
                    <th>Date de parution</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['annonces'] as $annonces):
                    echo '<tr>';
                    echo "<td class='col-lg-4'>" . $annonces['nomSalle'] . "</br><a href=salle.php?tmp=" . $annonces['auteur'] . "><img src='" . $annonces['photoProfilSalle'] . "'/></a></td>";
                    echo '<td class="col-lg-4">' . $annonces['textePetiteAnnonce'] . '</td>';
                    $dateDeb = new DateTime($annonces['dateDeb']);
                    if ($annonces['dateFin'] === null) {
                        echo '<td>à partir du </br> ' . $dateDeb->format('d/m/y') . '</td>';
                    } else {
                        $dateFin = new DateTime($annonces['dateFin']);
                        echo '<td>du </br> ' . $dateDeb->format('d/m/y') . '</br> au </br> ' . $dateFin->format('d/m/y ') . '</td>';
                    }
                    $dateEdition = new DateTime($annonces['dateEditionPetiteAnnonce']);
                    echo '<td>' . $dateEdition->format('d/m/y') . '</td>';
                    echo '<td class="col-lg-1">'
                    . '<a class="btn btn-default" href="f_message.php?destS=' . $annonces['auteur'] . '&nAnnonce=' . $annonces['nPetiteAnnonce'] . '">Postuler</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>

            </tbody>
        </table>
    </div>

</div>
