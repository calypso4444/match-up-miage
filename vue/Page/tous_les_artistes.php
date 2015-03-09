<!-- vue/page -->

<div class="col-lg-12">
    
    <h1>tous les artistes</h1>
    
    <div id="lesArtistes">
        <table class="table">
            <tbody>
                <?php
                $cmpt=0;
                foreach ($vars['profils_A'] as $artistes):
                    if($cmpt===0){
                        echo'<tr>';
                    }
                    echo "<td class='col-lg-3'><a href=artiste.php?tmp=" . $artistes['nArtiste'] . "><img src=\"" . $artistes['photoProfilArtiste'] . "\"></a>";
                    echo $artistes['nomArtiste'] . '</td>';
                    $cmpt++;
                    if($cmpt===3){
                        echo'</tr>';
                        $cmpt=0;
                    }
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    
</div>
