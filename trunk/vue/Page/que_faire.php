<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php
if ($vars['estConnecte'] === false) {
    echo "<script>document.location.href='inscription.php'</script>";
}
?>

<div class="col-lg-12">

    <h1>que faire ?</h1>

    <section id='carteFiltre' class="col-lg-12">
        <input id="concertCarte" type="hidden" value="<?php echo htmlentities(json_encode($vars['concertCarte'])); ?>"/>
        <canvas id='map'style='height:841.1px; width: 1065.4px; padding:0; margin :0;background-image:url("web/image/carte/map.svg");background-repeat: no-repeat' >
        </canvas>
        <form action="que_faire.php" method="post" >
            <input type="range"value="" max="31" min="0" step="1"/>
        </form>
    </section>

    <div id="queFaire">
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

</div>
