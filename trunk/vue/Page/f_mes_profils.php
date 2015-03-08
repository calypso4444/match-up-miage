<!-- vue/page -->

<div class="container col-lg-12">
    <h1>mes profils</h1>
    <div id="mesSalles">
        <h2>salles</h2>
        <?php
        foreach ($vars['mesSalles'] as $salle):
            echo "<a href=salle.php?tmp=" . $salle['nSalle'] . "><img src=\"" . $salle['photoProfilSalle'] . "\"></a>";
            echo $salle['nomSalle'];
            echo '</br>';
        endforeach;
        ?>
    </div>
    <div id="mesArtistes">
        <h2>artistes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Snapshot</th>
                    <th>Nom de l'artiste</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($vars['mesArtistes'] as $artiste):
                    echo '<tr>';
                    echo "<td class='col-lg-3'><a href=artiste.php?tmp=" . $artiste['nArtiste'] . "><img src=\"" . $artiste['photoProfilArtiste'] . "\"></a></td>";
                    echo '<td>' . $artiste['nomArtiste'] . '</td>';
                    echo '<td>'
                        . '<a class="btn" href="modifier_artiste.php?nArtiste=' . $artiste['nArtiste'] . '">Modifier</a>'
                        . '<a class="btn btn-danger" href="supprimer_artiste.php?nArtiste=' . $artiste['nArtiste'] . '">Supprimer</a>'
                        . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <form action="f_mes_profils.php" method="post">
        <p>Créer un nouveau profil : </p>
        <input  type="submit" name="choixProfil" value="artiste">
        <input  type="submit" name="choixProfil" value="salle">
    </form>
    <!--    on injecte dans le lien de redirection deux variables php, 
    la variable choix qui correspond au bouton sur lequel l'utilisateur a cliqué
    la variable tmp qui correspond au numero de profil qui vient d'etre crée par l'utilisateur dans la bdd-->
    <a href="<?php echo $vars['choix']; ?>.php?tmp=<?php echo $vars['noprofil']; ?>"><input type=button value='GO!'></a>

</div>