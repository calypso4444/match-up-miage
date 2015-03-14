<!-- vue/page -->

<div class="col-lg-12">

    <h1>que faire ?</h1>

    <div id="queFaire">
        <table class="table">
            <tbody>
                <?php
                $chk = 0;
                $dateAffichage = new DateTime();
                $dateAffichage = $dateAffichage->format('d/m/y');
                if ($vars['concert'] !== null) {
                    foreach ($vars['concert'] as $concert):
                        $date = new DateTime($concert['dateConcert']);
                        $date = $date->format('d/m/y');
                        if ($date !== $dateAffichage) {
                            if ($chk === 1) {
                                echo '</tr>';
                                $chk = 0;
                            }
                            echo '<tr>';
                            $chk++;
                            echo '<td><div id="entete"> le ' . $date . " : </div></td>";
                            $dateAffichage = $date;
                        } else {
                            echo'<td></td>';
                        }
                        echo '<td>';
                        echo "ou ? : <a href='salle.php?tmp=" . $concert['nSalle'] . "'>" . $concert['nomSalle'] . "</a>";
                        echo '</br>';
                        echo "qui ? : <a href='artiste.php?tmp=" . $concert['nArtiste'] . "'>" . $concert['nomArtiste'] . "</a>";
                        echo '</td>';

                    endforeach;
                } else {
                    echo 'rien en prévision malheureusement';
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
