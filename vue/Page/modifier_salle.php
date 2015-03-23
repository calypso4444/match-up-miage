<!-- vue/page -->
<div class="col-lg-12">	
    <h1>infos de ma salle <?php echo $vars['nomSalle']; ?></h1>

    <form id="formulaireModificationProfilSalle" method ="post" name="formulaireModificationProfilSalle" enctype="multipart/form-data">
        <div id="row">    
            <div class="col-lg-6">
                <table class="table">
                    <tbody>

                        <!-- Début champs pour modifier son nom de salle -->

                        <tr>
                            <td>
                                <label class="control-label" for="nomSalle">Votre nom de salle : *</label> 
                            </td>
                            <td>
                                <input class="form-control" id="nomSalle" type="text" name="nomSalle" placeholder="<?php echo $vars['nomSalle']; ?>" value="<?php echo $vars['nomSalle']; ?>"/>
                            </td>
                            <td>		
                                <span id="nomSalleInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier son nom de salle -->

                        <!-- Début champs pour modifier son adresse -->

                        <tr> 
                            <td>  
                                <label class="control-label" for="adresseSalle">Adresse de la salle : *</label>
                            </td>
                            <td>
                                <input class="form-control" id="adresseSalle" type="text" name="adresseSalle" placeholder="<?php echo $vars['adresseSalle']; ?>" value="<?php echo $vars['adresseSalle']; ?>"/>
                            </td>
                            <td>
                                <span id="adresseSalleInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier son adresse -->

                        <!-- Début champs pour modifier la ville de la salle -->

                        <tr> 
                            <td>
                                <label class="control-label" for="villeSalle">Ville : *</label>
                            </td>
                            <td>
                                <input class="form-control" id="villeSalle" type="text" name="villeSalle" placeholder="<?php echo $vars['villeSalle']; ?>" value="<?php echo $vars['villeSalle']; ?>"/>
                            </td>
                            <td>
                                <span id="villeSalleInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier la ville de la salle -->

                        <!-- Début champs pour modifier le code postal de la salle -->

                        <tr>  
                            <td> 
                                <label class="control-label" for="cpSalle">CP Salle : *</label>
                            </td>
                            <td>
                                <input class="form-control" id="cpSalle" type="text" name="cpSalle" placeholder="<?php echo $vars['cpSalle']; ?>" value="<?php echo $vars['cpSalle']; ?>"/>
                            </td>
                            <td>
                                <span id="cpSalleInfo"></span>
                            </td>
                        </tr>

                        <!-- Début champs pour visualiser votre genre musical --> 

                        <tr> 
                            <td>
                                <label class="control-label" for="genreMusical">Votre genre musical :</label>
                            </td>
                            <td>
                                <input class="form-control" id="genreMusical" type="text" name="genreMusical" placeholder="<?php echo $vars['genreSalle']; ?>" value="<?php echo $vars['genreSalle']; ?>"/>
                            </td>
                            <td>
                                <span id="genreMusicalInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour visualiser votre genre musical -->

                        <!-- Début champs pour entrer son genre musical -->

                        <tr>
                            <td> 
                                <label class="control-label" for="genreMusical">Votre genre musical :</label>
                            </td>
                            <td style="">                                

                                <select name="genreMusical" placeholder="" >
                                    <option></option>
                                    <option> R&B </option>
                                    <option> Punk </option>
                                    <option> Classique</option>
                                    <option> Metal</option>
                                    <option> Pop</option>
                                    <option> Rap</option>
                                    <option> Reggae</option>
                                    <option> Dance </option>          
                                </select>

                                <select name="genreMusical2"  size="l">                        
                                    <option></option>
                                    <option> Punk </option>
                                    <option> Classique</option>
                                    <option> Metal</option>
                                    <option> Pop</option>
                                    <option> Rap</option>
                                    <option> Reggae</option>
                                    <option> Dance </option>          
                                </select>

                                <select name="genreMusical3"  size="l">                                                
                                    <option></option>
                                    <option> Classique</option>
                                    <option> Metal</option>
                                    <option> Pop</option>
                                    <option> Rap</option>
                                    <option> Reggae</option>
                                    <option> Dance </option>          
                                </select>


                            </td>
                        </tr>

                        <!-- Début champs pour modifier la description --> 

                        <tr> 
                            <td>
                                <label class="control-label" for="descriptionSalle">Description :</label><br/>
                                <span id="descriptionSalleInfo"></span>
                            </td>
                            <td>
                                <textarea style="resize:none" class="form-control" id="descriptionSalle" rows="5" type="text" name="descriptionSalle" placeholder="<?php echo $vars['descriptionSalle']; ?>" value="<?php echo $vars['descriptionSalle']; ?>"></textarea>
                            </td>

                        </tr>

                        <!-- Fin champs pour modifier la description -->

                        <!-- Début champs pour modifier la photo de la salle --> 

                        <tr>
                            <td>
                                <label class="control-label" for="photoSalle">Votre photo de profil :</label> 
                            </td>
                            <td>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />	
                                <input class="filestyle" type="file" name="mon_fichier" id="mon_fichier" data-input="false" data-buttonText="Votre photo"/>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier la photo de la salle -->

                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table">
                    <tbody>

                        <!-- Fin champs pour modifier le code postal de la salle -->

                        <!-- Début champs pour modifier le numéro de téléphone de la salle -->

                        <tr>
                            <td>
                                <label class="control-label" for="telSalle">Numéro de téléphone de la salle :</label>
                            </td>
                            <td>
                                <input class="form-control" id="telSalle" type="text" name="telSalle" placeholder="<?php echo $vars['telSalle']; ?>" value="<?php echo $vars['telSalle']; ?>"/>
                            </td>
                            <td>
                                <span id="telSalleInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier le numéro de téléphone de la salle -->

                        <!-- Début champs pour modifier le nom du gérant -->     

                        <tr>  
                            <td> 
                                <label class="control-label" for="nomGerant">Nom du gérant de la salle :</label>
                            </td>
                            <td>      
                                <input class="form-control" id="nomGerant" type="text" name="nomGerant" placeholder="<?php echo $vars['nomGerant']; ?>" value="<?php echo $vars['nomGerant']; ?>"/>
                            </td>
                            <td>
                                <span id="nomGerantInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier le nom du gérant -->

                        <!-- Début champs pour modifier le prénom du gérant -->      

                        <tr>
                            <td>
                                <label class="control-label" for="nomGerant">Prénom du gérant de la salle :</label>
                            </td>
                            <td>
                                <input class="form-control" id="prenomGerant" type="text" name="prenomGerant" placeholder="<?php echo $vars['prenomGerant']; ?>" value="<?php echo $vars['prenomGerant']; ?>"/>
                            </td>
                            <td>
                                <span id="prenomGerantInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier le prénom du gérant -->

                        <!-- Début champs pour modifier 'comment contacter le gérant de la salle' --> 

                        <tr>
                            <td>
                                <label class="control-label" for="contactGerant">Comment contacter le gérant de la salle :</label>
                            </td>
                            <td>
                                <input class="form-control" id="contactGerant" type="text" name="contactGerant" placeholder="<?php echo $vars['contactGerant']; ?>" value="<?php echo $vars['contactGerant']; ?>"/>
                            </td>
                            <td>
                                <span id="contactGerantInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour modifier 'comment contacter le gérant de la salle' -->


                        <tr>
                            <td>
                                <a class="btn btn-default" href="f_mes_profils.php">Retour à mes profils</a>

                            </td>
                            <td>
                                <input id="envoyer" class="btn btn-default" type="submit" value="Valider"/>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </form>  
</div>

