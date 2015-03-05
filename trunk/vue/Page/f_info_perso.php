<!-- vue/page -->

<div class="container">

    <h1>mes infos persos</h1>

    <form id="formulaireGestionProfil" method ="post" name="formulaireGestionProfil" class="inline-form">

        <div class="col-lg-12">
            <label for="email"> Votre mail </label> 
            <input id="email" type="text" name="email" placeholder="<?php echo $vars['userMail']; ?>" value="<?php echo $vars['userMail']; ?>"/>
            <span id="emailInfo"></span></br>
        <fieldset disabled="disabled">
            <label for="pseudo"> Pseudo </label>
            <input id="pseudo" type="text" name="pseudo" placeholder="<?php echo $vars['userPseudo']; ?>" value=" <?php echo $vars['userPseudo']; ?>"/>
            <span id="pseudoInfo"></span></br>
        </fieldset>
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

        <div class="col-lg-12">
	        <label for="nom"> Votre nom </label>
            <input id="nom" type="text" name="nom" placeholder="<?php echo $vars['userNom']; ?>" value="<?php echo $vars['userNom']; ?>"/>
            <span id="nomInfo"></span></br>

			<label for="prenom"> Votre prénom </label>
            <input id="prenom" type="text" name="prenom" placeholder="<?php echo $vars['userPrenom']; ?>" value="<?php echo $vars['userPrenom']; ?>"/>
            <span id="prenomInfo"></span></br>

			<label for="adresse"> Votre adresse </label>
            <input id="adresse" type="text" name="adresse" placeholder="<?php echo $vars['userAdresse']; ?>" value="<?php echo $vars['userAdresse']; ?>"/>
            <span id="adresseInfo"></span></br>

			<label for="CP"> Votre code postal </label>
            <input id="CP" type="text" name="CP" placeholder="<?php echo $vars['userCP']; ?>" value="<?php echo $vars['userCP']; ?>"/>
            <span id="cpInfo"></span></br>

			<label for="ville"> Votre ville </label>
            <input id="ville" class="input-sm form-control" type="text" name="ville" placeholder="<?php echo $vars['userVille']; ?>" value="<?php echo $vars['userVille']; ?>"/>
            <span id="villeInfo"></span></br>
        </div>

        <div class="col-lg-12 text-center">
            <input  type="submit" value="Valider modifications" id="envoyer"/>
        </div>

    </form>

    <form method="post" action="f_info_perso.php" enctype="multipart/form-data">
        <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input type="file" name="mon_fichier" id="mon_fichier" /><br />
        <input type="submit" name="submit" value="Envoyer" />
    </form>

    <?php
    echo $vars['mailDejaPris'] ? 'Ce mail est deja pris' : '';
    echo $vars['problemeMdp'] ? 'les deux mots de passe ne correspondent pas' : '';
    echo $vars['mdpVideOuIncorrect'] ? "<script> alert('le champ mot de passe actuel a mal été rempli');</script>" : '';
    ?>
    

</div>

<!--!inclure une fonction reload_once est js-->