<!-- vue/page -->

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

<div class="col-lg-12">
    <h3>&eacute;v&egrave;nements les plus attendus</h3>
    <div id="txtEvenement">
        <table class="table">
            <tbody>
                <?php
                if ($vars['evenements'] !== null) {
                    foreach ($vars['evenements'] as $evenements) :
                        echo '<tr>';
                        echo '<td>';
                        echo'<div class="date">';
                        $date = new DateTime($evenements['dateConcert']);
                        echo$date->format('d/m');
                        echo'. </div>';
                        echo$evenements['nomSalle'];
                        echo' - ';
                        echo$evenements['nomArtiste'];
                        echo '</td><td>';
                        echo '<a href="index.php?nConcert=' . $evenements['nConcert'] . '" class="btn-xs btn-default"> Participer </a>';
                        echo '</td>';
                        echo '</tr>';
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>