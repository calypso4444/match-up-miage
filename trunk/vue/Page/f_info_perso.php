<!-- vue/page -->

<div class="container">

    <h1>mes infos persos</h1>

    <form id="formulaireInscription" method ="post" name="verificationInscription1">

        <div class="col-lg-6 text-right">
            <label for="email"> Votre mail </label> 
            <input id="email" type="text" name="email" placeholder="<?php echo $vars['userMail']; ?>" value="<?php echo $vars['userMail']; ?>"/></br>

            <label for="pseudo"> Pseudo </label>
            <input id="pseudo" type="text" name="pseudo" placeholder="<?php echo $vars['userPseudo']; ?>" value=" <?php echo $vars['userPseudo']; ?>"/></br>

            <label for="passe"> Mot de passe actuel </label>
            <input id="passe" type="password" name="passe" value=""/></br>

            <label for="npasse"> Nouveau mot de passe </label>
            <input id="passe" type="password" name="npasse" value=""/></br>

            <label for="npasse2"> V&eacute;rification de votre nouveau mot de passe </label>
            <input id="passe" type="password" name="npasse2" value=""/></br>
        </div>

        <div class="col-lg-6 text-left">
            <input id="prenom" type="text" name="nom" placeholder="" value=""/>
            <label for="nom"> Votre nom </label> </br>

            <input id="prenom" type="text" name="prenom" placeholder="" value=""/>
            <label for="nom"> Votre prénom </label></br>

            <input id="adresse" type="text" name="adresse" placeholder="" value=""/>
            <label for="adresse"> Votre adresse </label> </br>

            <input id="CP" type="text" name="CP" placeholder="" value=""/>
            <label for="CP"> Votre code postal </label> </br>
        </div>

        <div class="col-lg-12 text-center">
            <input  type="submit" value="Valider modifications" id="envoyer"/>
        </div>

    </form>

</div>
