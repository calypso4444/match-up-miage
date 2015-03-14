<!-- vue/page -->

<div class="container col-lg-12">

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
                    echo '<td>';
                    echo "ou ? : <a href='salle.php?tmp=" . $concert['nSalle'] . "'>" . $concert['nomSalle'] . "</a>";
                    echo '</br>';
                    echo "qui ? : <a href='artiste.php?tmp=" . $concert['nArtiste'] . "'>" . $concert['nomArtiste'] . "</a>";
                    echo '</br>';
                    $date = new DateTime($concert['dateConcert']);
                    echo "quand? : " . $date->format('d/m/y');
                    echo '</td>';
                    if ($compteur === 3) {
                        echo '</tr>';
                        $compteur = 0;
                    }

                endforeach;
                ?>
            </tbody>
        </table>
    </div>

</div>
