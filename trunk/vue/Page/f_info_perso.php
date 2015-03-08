<!-- vue/page -->
<div class="container col-lg-12">
    <h1> Mes Infos Perso </h1>
    <form class="form-horizontal" id="formulaireGestionProfil" method ="post" name="formulaireGestionProfil" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <!-- Début champs pour entrer son email -->
                <div class="form-group">
                    <label class="control-label col-xs-4" for="email">Votre mail :</label> 
                    <div class="col-xs-6">
                        <input class="form-control" id="email" type="text" name="email" placeholder="<?php echo $vars['userMail']; ?>" value="<?php echo $vars['userMail']; ?>"/>
                    </div>		
                    <div class="col-xs-1">	
                        <span id="emailInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour entrer son email -->
                <!-- Début champs affichant son pseudo -->
                <fieldset disabled="disabled">
                    <div class="form-group">   
                        <label class="control-label col-xs-4" for="pseudo">Votre Pseudo :</label>
                        <div class="col-xs-6">
                            <input class="form-control" id="pseudo" type="text" name="pseudo" placeholder="<?php echo $vars['userPseudo']; ?>" value=" <?php echo $vars['userPseudo']; ?>"/>
                        </div>
                        <div class="col-xs-1">
                            <span id="pseudoInfo"></span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </fieldset>
                <!-- Fin champs du pseudo -->
                <!-- Début champs pour modifier son nom -->
                <div class="form-group">   
                    <label class="control-label col-xs-4" for="nom">Votre nom :</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="nom" type="text" name="nom" placeholder="<?php echo $vars['userNom']; ?>" value="<?php echo $vars['userNom']; ?>"/>
                    </div>
                    <div class="col-xs-1">
                        <span id="nomInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour modifier son nom -->
                <!-- Début champs pour modifier son prénom -->
                <div class="form-group">   
                    <label class="control-label col-xs-4" for="prenom">Votre prenom :</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="prenom" type="text" name="prenom" placeholder="<?php echo $vars['userPrenom']; ?>" value="<?php echo $vars['userPrenom']; ?>"/>
                    </div>
                    <div class="col-xs-1">
                        <span id="prenomInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour modifier son prénom -->
                <!-- Début champs pour modifier votre adresse -->
                <div class="form-group">   
                    <label class="control-label col-xs-4" for="adresse">Votre adresse :</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="adresse" type="text" name="adresse" placeholder="<?php echo $vars['userAdresse']; ?>" value="<?php echo $vars['userAdresse']; ?>"/>
                    </div>
                    <div class="col-xs-1">
                        <span id="adresseInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour modifier votre adresse -->
                <!-- Début champs pour modifier son code postal -->
                <div class="form-group">   
                    <label class="control-label col-xs-4" for="CP">Votre code postal :</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="CP" type="text" name="CP" placeholder="<?php echo $vars['userCP']; ?>" value="<?php echo $vars['userCP']; ?>"/>
                    </div>
                    <div class="col-xs-1">
                        <span id="cpInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour modifier son code postal -->
                <!-- Début champs pour modifier votre ville -->
                <div class="form-group">   
                    <label class="control-label col-xs-4" for="ville">Votre ville :</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="ville" type="text" name="ville" placeholder="<?php echo $vars['userVille']; ?>" value="<?php echo $vars['userVille']; ?>"/>
                    </div>
                    <div class="col-xs-1">
                        <span id="villeInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour modifier votre ville -->
            </div> <!-- Fin de notre div avec la classe col-lg-6 (en dessous de la row)-->
            <div class="col-lg-6"> <!-- Début de notre nouvealle colonne (mot de passe) -->
                <!-- Début champs pour entrer son mot de passe actuel (Nécessaire pour la validation des modifications) -->
                <div class="form-group">   
                    <label class="control-label col-xs-5" for="cpasse">Mot de passe : *</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="cpasse" type="password" name="cpasse" value=""/>
                    </div>
                    <div class="col-xs-1">
                        <span id="cpasseInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour entrer son mot de passe actuel -->
                <!-- Début champs pour changer son mot de passe (nouveau mot de passe)-->
                <div class="form-group">   
                    <label class="control-label col-xs-5" for="npasse">Nouveau mot de passe :</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="npasse" type="password" name="npasse" value=""/>
                    </div>
                    <div class="col-xs-1">
                        <span id="npasseInfo"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour changer son mot de passe -->
                <!-- Début champs pour vérifier son nouveau mot de passe -->
                <div class="form-group">   
                    <label class="control-label col-xs-5" for="npasse2">V&eacute;rification de votre nouveau mot de passe :</label>
                    <div class="col-xs-6">
                        <input class="form-control" id="npasse2" type="password" name="npasse2" value=""/>
                    </div>
                    <div class="col-xs-1">
                        <span id="npasse2Info"></span>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <!-- Fin champs pour vérifier son nouveau mot de passe -->
                <!-- Début champs pour modifier votre photo de profil -->
                <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />	
                <input class="col-lg-offset-3" type="file" name="mon_fichier" id="mon_fichier" /><br/>
                <!-- Fin champs pour modifier votre photo de profil -->
            </div> <!-- Fin de notre div de la colonne avec les mots de passe -->
        </div> <!-- Fin de notre row -->
        <!-- Début du bouton -->
        <div>
            <input class="btn btn-default" type="submit" value="Valider " id="envoyer"/>
        </div>
        <!-- Fin du bouton -->
    </form>  
</div>


<div class="container col-lg-6">
    <?php
    echo $vars['mailDejaPris'] ? 'Ce mail est deja pris' : '';
    echo $vars['problemeMdp'] ? 'les deux mots de passe ne correspondent pas' : '';
    echo $vars['mdpVideOuIncorrect'] ? "<script> alert('le champ mot de passe actuel a mal été rempli');</script>" : '';
    ?>
</div>