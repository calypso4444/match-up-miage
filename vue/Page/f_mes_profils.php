<!-- vue/page -->

<div class="container col-lg-12">


    <h1>mes profils</h1>
    <div id="mesSalles" style="border-bottom: solid black 1px;border-top: solid black 1px">
        <p>mes profils salle</p>
        <?php
        foreach ($vars['mesSalles'] as $salle):
            echo "<a href=salle.php?tmp=".$salle['nSalle']."><img src=\"".$salle['photoProfilSalle']."\"></a>";
            echo $salle['nomSalle'];
            echo '</br>';
        endforeach;
        ?>
    </div>
    <div id="mesArtistes"style="border-bottom: solid black 1px">
        <p>mes profils artiste</p>
        <?php
        foreach ($vars['mesArtistes'] as $artiste):
            echo "<a href=artiste.php?tmp=".$artiste['nArtiste']."><img src=\"".$artiste['photoProfilArtiste']."\"></a>";
            echo $artiste['nomArtiste'];
            echo '</br>';
        endforeach;
        ?>
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
