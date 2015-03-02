<div class="container" id="formulaireI">
    <h1> Formulaire d'inscription </h1>
    <form id="formulaireInscription" method ="post" name="verificationInscription1">

        <div>
            <label for="email"> Votre mail : * </label> 
            <input id="email" type="text" name="email" placeholder="test@sorbonne.fr" value=""/>
            <span id="emailInfo"></span><br/>
        </div>

        <div>   
            <label for="pseudo"> Pseudo : * </label>
            <input id="pseudo" type="text" name="pseudo" placeholder="lhommedu13" value=""/>
            <span id="pseudoInfo"></span><br/>
        </div>

        <div>   
            <label for="passe"> Mot de passe : * </label>
            <input id="passe" type="password" name="passe" value=""/>
            <span id="passeInfo"></span><br/>
        </div>

        <div>    
            <label for="passe2"> V&eacute;rification de votre mot de passe : * </label>
            <input id="passe2" type="password" name="passe2" value=""/>
            <span id="passe2Info"></span><br/>
        </div>

        <div>
            <input  type="submit" value="M'inscrire" id="envoyer"/>
        </div>

    </form>
</section>

<div class="container">
    <?php echo $vars['existeDeja'] ? 'Votre email ou login est deja présent' : ''; ?>
    <?php echo $vars['problemeMdp'] ? 'les deux mots de passe ne correspondent pas' : ''; ?>
</div>