<!-- vue/page -->

<div class="container">

<<<<<<< .mine
    
=======
    <script type="text/javascript" language="Javascript" src="web/js/modificationProfil.js"></script>

>>>>>>> .r179
    <h1>mes infos persos</h1>

    <form id="formulaireGestionProfil" method ="post" name="formulaireGestionProfil">

        <div class="col-lg-6 text-right">
            <label for="email"> Votre mail </label> 
            <input id="email" type="text" name="email" placeholder="<?php echo $vars['userMail']; ?>" value="<?php echo $vars['userMail']; ?>"/>
            <span id="emailInfo"></span></br>

            <label for="pseudo"> Pseudo </label>
            <input id="pseudo" type="text" name="pseudo" placeholder="<?php echo $vars['userPseudo']; ?>" value=" <?php echo $vars['userPseudo']; ?>"/></br>

            <label for="cpasse"> Mot de passe actuel </label>
            <input id="cpasse" type="password" name="cpasse" value=""/>
            <span id="cpasseInfo"></span></br>

            <label for="npasse"> Nouveau mot de passe </label>
            <input id="npasse" type="password" name="npasse" value=""/>
            <span id="npasseInfo"></span></br>

            <label for="npasse2"> V&eacute;rification de votre nouveau mot de passe </label>
            <input id="npasse2" type="password" name="npasse2" value=""/>
            <span id="npasse2Info"></span></br>
        </div>

        <div class="col-lg-6 text-left">
            <input id="nom" type="text" name="nom" placeholder="<?php echo $vars['userNom']; ?>" value="<?php echo $vars['userNom']; ?>"/>
            <label for="nom"> Votre nom </label>
            <span id="nomInfo"></span></br>

            <input id="prenom" type="text" name="prenom" placeholder="<?php echo $vars['userPrenom']; ?>" value="<?php echo $vars['userPrenom']; ?>"/>
            <label for="prenom"> Votre prénom </label>
            <span id="prenomInfo"></span></br>

            <input id="adresse" type="text" name="adresse" placeholder="<?php echo $vars['userAdresse']; ?>" value="<?php echo $vars['userAdresse']; ?>"/>
            <label for="adresse"> Votre adresse </label>
            <span id="adresseInfo"></span></br>

            <input id="CP" type="text" name="CP" placeholder="<?php echo $vars['userCP']; ?>" value="<?php echo $vars['userCP']; ?>"/>
            <label for="CP"> Votre code postal </label>
            <span id="cpInfo"></span></br>
        </div>

        <div class="col-lg-12 text-center">
            <input  type="submit" value="Valider modifications" id="envoyer"/>
        </div>

    </form>

    <?php
    echo $vars['mailDejaPris'] ? 'Ce mail est deja pris' : '';
    echo $vars['problemeMdp'] ? 'les deux mots de passe ne correspondent pas' : '';
    echo $vars['mdpVideOuIncorrect'] ? 'le champ mot de passe actuel a mal été rempli' : '';
    ?>

</div>

<!--!inclure une fonction reload_once est js-->