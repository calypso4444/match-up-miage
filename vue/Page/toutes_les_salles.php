<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>toutes les salles</h1>
    
    <div id="lesSalles">
        <table class="table">
            <tbody>
                <?php
                foreach ($vars['profils_S'] as $salles):
                    echo "<td class='col-lg-3'><a href=salle.php?tmp=" . $salles['nSalle'] . "><img src=\"" . $salles['photoProfilSalle'] . "\"></a>";
                    echo $salles['nomSalle'] . '</td>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    
</div>
