<!-- vue/page -->

<div class="container">
    
    <form id="formulaireMdpOublie" method ="post" name="mot_de_passe_oublie">
    Veuillez entrer votre adresse mail : <input type="text" name="email"/><br/>
    <input type="submit" value="Envoyer"/>
    </form>
    
    </br>
    
    <?php echo $vars['mailVide'] ? 'Mail vide' : ''; ?>
    <?php echo $vars['mailInconnu'] ? 'Mail inconnu' : '';?> 
    <?php echo $vars['mdpProvisoire'];?>
    
</div>

