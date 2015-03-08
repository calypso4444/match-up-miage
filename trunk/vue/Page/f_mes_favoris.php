<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>mes favoris</h1>
    
    <div id="mesFavorisSalles" style="border-bottom: solid black 1px;border-top: solid black 1px">
        <p>mes favoris salle</p>
        <?php
        foreach ($vars['mesFavoris_S'] as $fav_s):
            echo "<a href=salle.php?tmp=".$fav_s['nSalle']."><img src=\"".$fav_s['photoProfilSalle']."\"></a>";
            echo $fav_s['nomSalle'];
            echo '</br>';
        endforeach;
        ?>
    </div>
    <div id="mesFavorisArtistes"style="border-bottom: solid black 1px">
        <p>mes favoris artiste</p>
        <?php
        foreach ($vars['mesFavoris_A'] as $fav_a):
            echo "<a href=artiste.php?tmp=".$fav_a['nArtiste']."><img src=\"".$fav_a['photoProfilArtiste']."\"></a>";
            echo $fav_a['nomArtiste'];
            echo '</br>';
        endforeach;
        ?>
    </div>
    
</div>
