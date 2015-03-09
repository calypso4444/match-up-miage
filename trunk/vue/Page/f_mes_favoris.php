<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>mes favoris</h1>
    
    <div id="mesFavorisSalles" style="border-bottom: solid black 1px;border-top: solid black 1px">
        <h2>salles</h2>
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
                foreach ($vars['mesFavoris_S'] as $fav_s):
                    echo '<tr>';
                    echo "<td class='col-lg-3'><a href=salle.php?tmp=" . $fav_s['nSalle'] . "><img src=\"" . $fav_s['photoProfilSalle'] . "\"></a></td>";
                    echo '<td>' . $fav_s['nomSalle'] . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-danger" href="supprimer_salle.php?nSalle=' . $fav_s['nSalle'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div id="mesFavorisArtistes"style="border-bottom: solid black 1px">
        <h2>artistes</h2>
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
                foreach ($vars['mesFavoris_A'] as $fav_a):
                    echo '<tr>';
                    echo "<td class='col-lg-3'><a href=artiste.php?tmp=" . $fav_a['nArtiste'] . "><img src=\"" . $fav_a['photoProfilArtiste'] . "\"></a></td>";
                    echo '<td>' . $fav_a['nomArtiste'] . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-danger" href="supprimer_artiste.php?nArtiste=' . $fav_a['nArtiste'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    
</div>
