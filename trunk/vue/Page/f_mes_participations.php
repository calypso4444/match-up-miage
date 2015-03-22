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
                    echo'<div class="date">';
                    $date = new DateTime($concert['dateConcert']);
                    echo $date->format('d/m');
                    echo '. </div>';
                    echo "<a href='salle.php?tmp=" . $concert['nSalle'] . "'>" . $concert['nomSalle'] . "</a>";
                    echo ' - ';
                    echo "<a href='artiste.php?tmp=" . $concert['nArtiste'] . "'>" . $concert['nomArtiste'] . "</a>";
                    echo "<form id ='suppressionParticipation' action='f_mes_participations.php?nC=" . $concert['nConcert'] . "' method='post'><button id='suppression' class='btn-xs glyphicon glyphicon-remove' type='submit' name='removePhoto' value='true' ></button></form>";
                    echo '</br>';
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
