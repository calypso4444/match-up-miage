<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php echo $vars['estConnecte'] ? null : "<script>document.location.href='inscription.php'</script>" ?>

<div class="col-lg-12">
    <h1>création de la page artiste</h1>
    <form id="formulaireModificationProfilArtiste" method ="post" name="formulaireModificationProfilArtiste" enctype="multipart/form-data">
        <div id="row">    
            <div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
                <table class="table">
                    <tbody>

                        <!-- Début champs pour entrer son nom d'artiste -->

                        <tr>
                            <td>
                                <label class="control-label" for="nomArtiste">Votre nom de scène :</label> 
                            </td>
                            <td>
                                <input class="form-control" id="nomArtiste" type="text" name="nomArtiste" placeholder="" value=""/>
                            </td>
                            <td>	
                                <span id="nomArtisteInfo"></span>
                            </td>
                        </tr>

                        <!-- Fin champs pour entrer son nom d'artiste -->

                        <!-- Début champs pour entrer son genre musical -->

                        <tr>
                            <td> 
                                <label class="control-label" for="genreMusical">Votre genre musical :</label>
                            </td>
                            <td>                                

                                <select name="genreMusical">
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

                                <select name="genreMusical2">                        
                                    <option></option>
                                    <option> Punk </option>
                                    <option> Classique</option>
                                    <option> Metal</option>
                                    <option> Pop</option>
                                    <option> Rap</option>
                                    <option> Reggae</option>
                                    <option> Dance </option>          
                                </select>

                                <select name="genreMusical3">                                                
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
						 <!-- Fin champs pour entrer son genre musical -->
                        
                        <tr>
                            <td>
                                <label class="control-label" for="descriptionArtiste">Description :</label><br/>
                                <span id="descriptionArtisteInfo"></span>
                            </td>
                            <td>
                                <textarea class="form-control" rows="5" id="descriptionArtiste" type="text" name="descriptionArtiste" placeholder="" value=""/></textarea>
                            </td>
                        </tr>

                        <!-- Fin champs pour entrer sa description -->

                        <!-- Début champs pour choisir sa photo de profil --> 


                        <tr>
                            <td>
                                <label class="control-label" for="photoArtiste">Votre photo de profil :</label> 
                            </td>
                            <td>
                                <input class="filestyle" type="file" name="mon_fichier" id="mon_fichier" data-input="false" data-buttonText="Votre photo"/><br/>
                            </td>
                        </tr>

                        <!-- Fin champs pour choisir sa photo de profil --> 

                        <tr>
                            <td>
                                <a class="btn btn-default" href="f_mes_profils.php">Retour à mes profils</a>  
                            </td>
                            <td>
                                <input id="envoyer" class="btn btn-default" type="submit" value="Valider"/>
                            </td>
                        </tr>


                </table>
            </div>
        </div>
    </form>  
</div>