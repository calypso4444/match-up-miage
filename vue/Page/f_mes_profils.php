<!-- vue/page -->

<div class="container col-lg-12">
   
    
    <h1>mes profils</h1>
    <form action="f_mes_profils.php" method="post">
        <p>Créer un nouveau profil : </p>
        <input  type="submit" name="choixProfil" value="artiste">
        <input  type="submit" name="choixProfil" value="salle">
    </form>
<!--    on injecte dans le lien de redirection deux variables php, 
la variable choix qui correspond au bouton sur lequel l'utilisateur a cliqué
la variable tmp qui correspond au numero de profil qui vient d'etre crée par l'utilisateur dans la bdd-->
    <a href="<?php echo $vars['choix'];?>.php?tmp=<?php echo $vars['noprofil'];?>"><input type=button value='GO!'></a>
    
</div>
