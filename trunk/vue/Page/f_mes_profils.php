<!-- vue/page -->

<div class="container col-lg-12">
    
    <h1>mes profils</h1>
    <form action="f_mes_profils.php" method="post">
        <p>Créer un nouveau profil : </p>
        <input type="submit" name="choixProfil" value="artiste">
        <input type="submit" name="choixProfil" value="gérant">
    </form>
    <a href="<?php echo $vars['choix'];?>.php"><input type=button value='GO!'></a>
    
</div>
