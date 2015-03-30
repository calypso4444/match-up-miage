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

<!--si l'utilisateur clique sur le bouton je participe, on le redirige vers la page mes_particpations-->
<?php
if ($vars['participe'] === true) {
    echo "<script>document.location.href='f_mes_participations.php'</script>";
}
?>

<div id='bloc1' class='col-lg-12'>
    <h1>que faire ?</h1>
    <p class='text-center'>Concerts du <?php echo $vars['dateConcert'] . " " . $vars['nomMois']; ?>

    <div id='filtreConcert' class='col-lg-2'>
        <h4>Affiner votre recherche</h4>
       	Choisissez un jour pour lequel vous voulez un affichage sur la carte</p>
        <form action="que_faire.php" method="post" name='choixJour'>
            <input id="datepicker" class="datepicker form-control" name="choixJour" placeholder="jj/mm/aaaa"></input>
            </br>
            <input type='submit' class='btn-success' value="Valider"/>
        </form>

        <form action='que_faire.php' method="post" name="formRechercheAvanceGenre" >
            <table class="table">
                <tbody>
                    <tr> <td> 
                            <p>Par genre musical</p>
                            <select class='form-control' name="genreMusical">
                                <option></option>
                                <option> R&B </option>
                                <option> Punk </option>
                                <option> Classique</option>
                                <option> Metal</option>
                                <option> Pop</option>
                                <option> Rap</option>
                                <option> Reggae</option>
                                <option> Dance </option>          
                            </select>
                        </td></tr>
                    <tr><td>
                            <p>Par arrondissement</p>
                            <select class='form-control' name="arrondissement">
                                <option></option>
                                <option> 01er Arrondissement </option>
                                <option> 02e Arrondissement </option>
                                <option> 03e Arrondissement</option>
                                <option> 04e Arrondissement</option>
                                <option> 05e Arrondissement</option>
                                <option> 06e Arrondissement</option>
                                <option> 07e Arrondissement</option>
                                <option> 08e Arrondissement </option>          
                                <option> 09e Arrondissement </option>
                                <option> 10e Arrondissement </option>
                                <option> 11e Arrondissement </option>
                                <option> 12e Arrondissement </option>
                                <option> 13e Arrondissement </option>
                                <option> 14e Arrondissement </option>
                                <option> 15e Arrondissement </option>
                                <option> 16e Arrondissement </option>
                                <option> 17e Arrondissement </option>
                                <option> 18e Arrondissement </option>
                                <option> 19e Arrondissement </option>
                                <option> 20e Arrondissement </option>
                            </select>
                        </td></tr>
                </tbody>
            </table>
            <input type='submit' class="btn-success"></input>
        </form>
        </br>

    </div>

    <section id='carte' class="text-center col-lg-10">
        <input id="concertCarte" type="hidden" value="<?php echo htmlentities(json_encode($vars['concertCarte'])); ?>"/>
        <div id='mapContainer' class=''>
            <img id='map'src='web/image/carte/map.svg'/>
        </div>
    </section>

    <div id="queFaire" class='col-lg-12'>
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

