<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>toutes les salles</h1>
    
    <div id="lesSalles">
        <?php
        foreach ($vars['profils_S'] as $salles):
            echo "<a href=artiste.php?tmp=".$salles['nSalle']."><img src=\"".$salles['photoProfilSalle']."\"></a>";
            echo $salles['nomSalle'];
            echo '</br>';
        endforeach;
        ?>
    </div>
    
</div>
