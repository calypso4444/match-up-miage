<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php echo $vars['estConnecte'] ? null : "<script>document.location.href='inscription.php'</script>" ?>

<div class="col-lg-12">

    <h1>mes favoris</h1>
    <div id="mesFavorisSalles" class='col-lg-6'>
        <h2>salles</h2>
        <table class="table">
            <tbody>
                <?php
                foreach ($vars['mesFavoris_S'] as $fav_s):
                    echo '<tr>';
                    echo "<td class='col-lg-7'><a href=salle.php?tmp=" . $fav_s['nSalle'] . "><img src=\"" . $fav_s['photoProfilSalle'] . "\"></a></td>";
                    echo '<td>' . $fav_s['nomSalle'] . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-danger" href="f_mes_favoris.php?nSalle=' . $fav_s['nSalle'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <div id="mesFavorisArtistes" class='col-lg-6'>
        <h2>artistes</h2>
        <table class="table">
            <tbody>
                <?php
                foreach ($vars['mesFavoris_A'] as $fav_a):
                    echo '<tr>';
                    echo "<td class='col-lg-7'><a href=artiste.php?tmp=" . $fav_a['nArtiste'] . "><img src=\"" . $fav_a['photoProfilArtiste'] . "\"></a></td>";
                    echo '<td>' . $fav_a['nomArtiste'] . '</td>';
                    echo '<td>'
                    . '<a class="btn btn-danger" href="f_mes_favoris.php?nArtiste=' . $fav_a['nArtiste'] . '">Supprimer</a>'
                    . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>
