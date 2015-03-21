<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php echo $vars['estConnecte'] ? null : "<script>document.location.href='inscription.php'</script>" ?>

<div class="col-lg-12">

    <h1>mes participations</h1>

    <div id="suivi">
        <table class="table">
            <tbody>
                <?php
                $compteur = 0;
                foreach ($vars['suivis'] as $concert):
                    if ($compteur === 0) {
                        echo '<tr>';
                    }
                    echo '<td class="col-lg-2">';
                    echo "ou ? : <a href='salle.php?tmp=" . $concert['nSalle'] . "'>" . $concert['nomSalle'] . "</a>";
                    echo '</br>';
                    echo "qui ? : <a href='artiste.php?tmp=" . $concert['nArtiste'] . "'>" . $concert['nomArtiste'] . "</a>";
                    echo '</br>';
                    $date = new DateTime($concert['dateConcert']);
                    echo "quand? : " . $date->format('d/m/y');
                    echo '</td>';
                    $compteur++;
                    if ($compteur === 5) {
                        echo '</tr>';
                        $compteur = 0;
                    }

                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>
