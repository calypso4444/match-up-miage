<!-- vue/page -->

<!-- SCRIPT POUR LA MAP -->
<script type="text/javascript" src="web/js/carteConcert.js"></script>
<!-- SCRIPT POUR LA MAP -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php
if ($vars['estConnecte'] === false) {
    echo "<script>document.location.href='inscription.php'</script>";
}
?>

<div id='bloc1' class='col-lg-12'>
    <h1>que faire ?</h1>
    <p class='text-center'>

    <div id='filtreConcert' class='col-lg-2' style='border-top:black 2px solid'>
       	Choisissez un jour</p>
        <form action="que_faire.php" method="post" name='choixJour'>
            <div id="datepicker" class="datepicker"></div>
            </br>
            <input type='submit' class='btn-success' value="Valider"/>
        </form>
    </div>

    <section id='carte'class="text-center col-lg-10" style='border-left:black 2px solid; border-top:black 2px solid '>
        <input id="concertCarte" type="hidden" value="<?php echo htmlentities(json_encode($vars['concertCarte'])); ?>"/>
        <div id='mapContainer' class=''>
            <img id='map'src='web/image/carte/map.svg'/>
        </div>
    </section>

    <div id="queFaire" class='col-lg-12' style='border-top:black 2px solid'>
        <table class="table">
            <tbody>
                <?php
                $chk = 0;
                $dateAffichage = new DateTime('00/00');
                $dateAffichage = $dateAffichage->format('d/m');
                if ($vars['concert'] !== null) {
                    foreach ($vars['concert'] as $concert):
                        $date = new DateTime($concert['dateConcert']);
                        $date = $date->format('d/m');
                        if ($date !== $dateAffichage) {
                            if ($chk === 1) {
                                echo '</tr>';
                                $chk = 0;
                            }
                            echo '<tr>';
                            $chk++;
                            echo '<td><div class="date">' . $date . ". </div></td>";
                            $dateAffichage = $date;
                        } else {
                            echo'<td></td>';
                        }
                        echo '<td>';
                        echo "ou ? : <a href='salle.php?tmp=" . $concert['nSalle'] . "'>" . $concert['nomSalle'] . "</a>";
                        echo '</br>';
                        echo "qui ? : <a href='artiste.php?tmp=" . $concert['nArtiste'] . "'>" . $concert['nomArtiste'] . "</a>";
                        echo '</br>';
                        echo '<a href="que_faire.php?nConcert=' . $concert['nConcert'] . '" class="btn-xs btn-default"> Participer </a>';
                        echo '</td>';

                    endforeach;
                } else {
                    echo 'rien en prévision malheureusement';
                }
                ?>
            </tbody>
        </table>
    </div>

