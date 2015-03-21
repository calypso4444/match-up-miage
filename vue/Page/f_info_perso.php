<!-- vue/page -->
    <div class="col-lg-12">
        <h1>Mes Infos Perso</h1>

        <form class="form-horizontal" id="formulaireGestionProfil" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table">
                        <tbody>
                            <!-- Début champs pour entrer son email -->

                            <tr>
                                <td><label class="control-label" for="email">Votre mail :</label></td>

                                <td><input class="form-control" id="email" type="text" name="email" placeholder="<?php echo $vars['userMail']; ?>" value="<?php echo $vars['userMail']; ?>"></td>

                                <td><span id="emailInfo"></span></td>
                            </tr><!-- Fin champs pour entrer son email -->
                            <!-- Début champs affichant son pseudo -->

                            <tr>
                                <td><label class="control-label" for="pseudo">Votre Pseudo :</label></td>

                                <td>
                                    <fieldset disabled="disabled">
                                        <input class="form-control" id="pseudo" type="text" name="pseudo" placeholder="<?php echo $vars['userPseudo']; ?>" value=" <?php echo $vars['userPseudo']; ?>">
                                    </fieldset>
                                </td>

                                <td><span id="pseudoInfo"></span></td>
                            </tr><!-- Fin champs du pseudo -->
                            <!-- Début champs pour modifier son nom -->

                            <tr>
                                <td><label class="control-label" for="nom">Votre nom :</label></td>

                                <td><input class="form-control" id="nom" type="text" name="nom" placeholder="<?php echo $vars['userNom']; ?>" value="<?php echo $vars['userNom']; ?>"></td>

                                <td><span id="nomInfo"></span></td>
                            </tr><!-- Fin champs pour modifier son nom -->
                            <!-- Début champs pour modifier son prénom -->

                            <tr>
                                <td><label class="control-label" for="prenom">Votre prenom :</label></td>

                                <td><input class="form-control" id="prenom" type="text" name="prenom" placeholder="<?php echo $vars['userPrenom']; ?>" value="<?php echo $vars['userPrenom']; ?>"></td>

                                <td><span id="prenomInfo"></span></td>
                            </tr><!-- Fin champs pour modifier son prénom -->
                            <!-- Début champs pour modifier votre adresse -->

                            <tr>
                                <td><label class="control-label" for="adresse">Votre adresse :</label></td>

                                <td><input class="form-control" id="adresse" type="text" name="adresse" placeholder="<?php echo $vars['userAdresse']; ?>" value="<?php echo $vars['userAdresse']; ?>"></td>

                                <td><span id="adresseInfo"></span></td>
                            </tr><!-- Fin champs pour modifier votre adresse -->
                            <!-- Début champs pour modifier son code postal -->

                            <tr>
                                <td><label class="control-label" for="CP">Votre code postal :</label></td>

                                <td><input class="form-control" id="CP" type="text" name="CP" placeholder="<?php echo $vars['userCP']; ?>" value="<?php echo $vars['userCP']; ?>"></td>

                                <td><span id="cpInfo"></span></td>

                                <td></td>
                            </tr><!-- Fin champs pour modifier son code postal -->
                            <!-- Début champs pour modifier votre ville -->

                            <tr>
                                <td><label class="control-label" for="ville">Votre ville :</label></td>

                                <td><input class="form-control" id="ville" type="text" name="ville" placeholder="<?php echo $vars['userVille']; ?>" value="<?php echo $vars['userVille']; ?>"></td>

                                <td><span id="villeInfo"></span></td>
                            </tr><!-- Fin champs pour modifier votre ville -->
                        </tbody>
                    </table>
                </div><!-- Fin de notre div avec la classe col-lg-6 (en dessous de la row)-->

                <div class="col-lg-6">
                    <!-- Début de notre nouvealle colonne (mot de passe) -->

                    <table class="table">
                        <tbody>
                            <!-- Début champs pour entrer son mot de passe actuel (Nécessaire pour la validation des modifications) -->

                            <tr>
                                <td><label class="control-label" for="cpasse">Mot de passe : *</label></td>

                                <td><input class="form-control" id="cpasse" type="password" name="cpasse" value=""></td>

                                <td><span id="cpasseInfo"></span></td>
                            </tr><!-- Fin champs pour entrer son mot de passe actuel -->
                            <!-- Début champs pour changer son mot de passe (nouveau mot de passe)-->

                            <tr>
                                <td><label class="control-label" for="npasse">Nouveau mdp :</label></td>

                                <td><input class="form-control" id="npasse" type="password" name="npasse" value=""></td>

                                <td><span id="npasseInfo"></span></td>
                            </tr><!-- Fin champs pour changer son mot de passe -->
                            <!-- Début champs pour vérifier son nouveau mot de passe -->

                            <tr>
                                <td><label class="control-label" for="npasse2">V&eacute;rification mdp :</label></td>

                                <td><input class="form-control" id="npasse2" type="password" name="npasse2" value=""></td>

                                <td><span id="npasse2Info"></span></td>
                            </tr><!-- Fin champs pour vérifier son nouveau mot de passe -->
                            <!-- Début champs pour modifier votre photo de profil -->

                            <tr>
                                <td><label for="mon_fichier">Votre avatar (max. 3 Mo) :</label></td>

                                <td><input type="hidden" name="MAX_FILE_SIZE" value="1048576"> <input class="filestyle" type="file" name="mon_fichier" id="mon_fichier" data-input="false" data-buttonText="Votre fichier"></td>
                            </tr><!-- Fin champs pour modifier votre photo de profil -->
                            
                          
                            
                        </tbody>
                    </table>
                
                      <!-- Début du bouton -->
					<div>
						<input class="btn btn-default center-block" type="submit" value="Valider " id="envoyer">
					</div>
            				
            				<!-- Fin du bouton -->
                </div><!-- Fin de notre div de la colonne avec les mots de passe -->
            </div><!-- Fin de notre row -->

        </form>
    </div>

    <div class="container col-lg-6">
        <?php
        echo $vars['mailDejaPris'] ? 'Ce mail est deja pris' : '';
        echo $vars['problemeMdp'] ? 'les deux mots de passe ne correspondent pas' : '';
        echo $vars['mdpVideOuIncorrect'] ? "<script> alert('le champ mot de passe actuel a mal été rempli');</script>" : '';
        ?>
    </div>
