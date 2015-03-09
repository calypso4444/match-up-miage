<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>tous les artistes</h1>
    
    <div id="lesArtistes">
        <table class="table">
            <tbody>
                <?php
                foreach ($vars['profils_A'] as $artistes):
                    echo "<td class='col-lg-3'><a href=artiste.php?tmp=" . $artistes['nArtiste'] . "><img src=\"" . $artistes['photoProfilArtiste'] . "\"></a>";
                    echo $artistes['nomArtiste'] . '</td>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    
</div>
