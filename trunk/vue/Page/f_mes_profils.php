<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php echo $vars['estConnecte'] ? null : "<script>document.location.href='inscription.php'</script>" ?>

<div class="col-lg-12">
    <h1>mes profils</h1>
    <div id="mesSalles" class="col-lg-6">
        <h2>salles</h2>
        <a href='creation_salle.php' class="btn btn-default"> créer un nouveau profil salle</a>
        <table class="table">
            <tbody>
                <?php
                foreach ($vars['mesSalles'] as $salle):
                    echo '<tr>';
                    echo "<td class='col-lg-7'><a href=salle.php?tmp=" . $salle['nSalle'] . "><img src=\"" . $salle['photoProfilSalle'] . "\"></a></td>";
                    echo '<td>' . $salle['nomSalle'] . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-default" href="modifier_salle.php?nSalle=' . $salle['nSalle'] . '">Modifier</a>'
                    . '<a class="btn btn-danger" href="supprimer_salle.php?nSalle=' . $salle['nSalle'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div id="mesArtistes" class='col-lg-6'>
        <h2>artistes</h2>
        <a href='creation_artiste.php'class="btn btn-default"> créer un nouveau profil artiste</a>
        <table class="table">
            <tbody>
                <?php
                foreach ($vars['mesArtistes'] as $artiste):
                    echo '<tr>';
                    echo "<td class='col-lg-7'><a href=artiste.php?tmp=" . $artiste['nArtiste'] . "><img src=\"" . $artiste['photoProfilArtiste'] . "\"></a></td>";
                    echo '<td>' . $artiste['nomArtiste'] . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-default" href="modifier_artiste.php?nArtiste=' . $artiste['nArtiste'] . '">Modifier</a>'
                    . '<a class="btn btn-danger" href="supprimer_artiste.php?nArtiste=' . $artiste['nArtiste'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>