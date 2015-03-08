<!-- vue/page -->

<div class="container col-lg-12">

    <h1>mes participations</h1>
    
    <div id="suivi">
        <?php
        foreach ($vars['suivis'] as $concert):
            echo "ou ? : ".$concert['nomSalle'];
            echo "qui ? : ".$concert['nomArtiste'];
            echo "quand? : ".$concert['dateConcert'];
            echo '</br>';
        endforeach;
        ?>
    </div>

</div>
