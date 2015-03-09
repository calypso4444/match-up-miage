<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>toutes les salles</h1>
    
    <div id="lesSalles">
        <table class="table">
            <tbody>
                <?php
                $cmpt=0;
                foreach ($vars['profils_S'] as $salles):
                    if($cmpt===0){
                        echo'<tr>';
                    }
                    echo "<td class='col-lg-3'><a href=salle.php?tmp=" . $salles['nSalle'] . "><img src=\"" . $salles['photoProfilSalle'] . "\"></a>";
                    echo $salles['nomSalle'] . '</td>';
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
