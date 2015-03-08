<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>tous les artistes</h1>
    
    <div id="lesArtistes">
        <?php
        foreach ($vars['profils_A'] as $artistes):
            echo "<a href=artiste.php?tmp=".$artistes['nArtiste']."><img src=\"".$artistes['photoProfilArtiste']."\"></a>";
            echo $artistes['nomArtiste'];
            echo '</br>';
        endforeach;
        ?>
    </div>
    
</div>
