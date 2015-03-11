<!-- vue/page -->

<div class="container col-lg-12">
    <h1>mes profils</h1>
    <div id="mesSalles">
        <h2>salles</h2>
        <a href='creation_salle.php'> Créer un nouveau profil salle</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Snapshot</th>
                    <th>Nom de la salle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['mesSalles'] as $salle):
                    echo '<tr>';
                    echo '<td>' . $salle['nomSalle'] . '</td>';
                    echo "<td class='col-lg-3'><a href=salle.php?tmp=" . $salle['nSalle'] . "><img src=\"" . $salle['photoProfilSalle'] . "\"></a></td>";
                    echo '<td>'
                    . '<a class="btn" href="modifier_salle.php?nSalle=' . $salle['nSalle'] . '">Modifier</a>'
                    . '<a class="btn btn-danger" href="supprimer_salle.php?nSalle=' . $salle['nSalle'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div id="mesArtistes">
        <h2>artistes</h2>
        <a href='creation_artiste.php'> Créer un nouveau profil artiste</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Snapshot</th>
                    <th>Nom de l'artiste</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['mesArtistes'] as $artiste):
                    echo '<tr>';
                    echo "<td class='col-lg-3'><a href=artiste.php?tmp=" . $artiste['nArtiste'] . "><img src=\"" . $artiste['photoProfilArtiste'] . "\"></a></td>";
                    echo '<td>' . $artiste['nomArtiste'] . '</td>';
                    echo '<td>'
                    . '<a class="btn" href="modifier_artiste.php?nArtiste=' . $artiste['nArtiste'] . '">Modifier</a>'
                    . '<a class="btn btn-danger" href="supprimer_artiste.php?nArtiste=' . $artiste['nArtiste'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>