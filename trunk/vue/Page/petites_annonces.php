<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>petites annonces</h1>
    
    <div id="lesPetitesAnnonces">
        <table class="table">
            <thead>
                <tr>
                    <th>Posté par</th>
                    <th>Annonce</th>
                    <th>Dates</th>
                    <th>Date de parution</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['annonces'] as $annonces):
                    echo '<tr>';
                    echo "<td class='col-lg-3'><a href=salle.php?tmp=" . $annonces['auteur'] . ">".$annonces['nomSalle']."</a></td>";
                    echo '<td>' . $annonces['textePetiteAnnonce'] .'</td>';
                    echo '<td>entre le ' . $annonces['dateDeb'] . 'et le '.$annonces['dateFin'].'</td>';
                    echo '<td>' . $annonces['dateEditionPetiteAnnonce'] .'</td>';
                    echo '<td>'
                    . '<a class="btn" href="petites_annonces.php?nSalle=' . $annonces['auteur'] . '&nAnnonce=' . $annonces['nPetiteAnnonce'] . '">Postuler</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    
</div>
