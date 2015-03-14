<!-- vue/page -->

<div class="col-lg-12">

    <h1>recherche avancée</h1>

    <div id='resultat'>
        Voici les résultats correspondant à votre recherche : <?php echo "'".$vars['mot']."'"; ?>
        </br>
        <?php
        if ($vars['resultat'] !== null) {
            if ($vars['resultat']['artiste'] !== null) {
                echo 'dans la catégorie artistes : </br>';
                foreach ($vars['resultat']['artiste'] as $artiste):
                    echo $artiste['nomArtiste'];
                endforeach;
            }
            echo "</br>";
            if ($vars['resultat']['salle'] !== null) {
                echo 'dans la catégorie salles : </br>';
                foreach ($vars['resultat']['salle'] as $salle):
                    echo $salle['nomSalle'];
                endforeach;
            }
        }
        ?>
    </div>

</div>
