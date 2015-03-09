<!-- vue/page -->
<div class="container col-lg-12">
    <form id="formulaireModificationProfilSalle" method ="post" name="formulaireModificationProfilSalle" enctype="multipart/form-data">
	    
	     <!-- Début champs pour entrer son nom de salle -->
	     
        <div class="form-group">
            <label class="control-label col-xs-4" for="nomSalle">Votre nom de salle :</label> 
            <div class="col-xs-6">
                <input class="form-control" id="nomSalle" type="text" name="nomSalle" placeholder="" value=""/>
            </div>		
            <div class="col-xs-1">	
                <span id="nomSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <!-- Fin champs pour entrer son nom de salle -->
        
        <!-- Début champs pour entrer son genre musical -->
        
        <div class="form-group">   
            <label class="control-label col-xs-4" for="genreMusical">Votre genre musical :</label>
            <div class="col-xs-6">
                <input class="form-control" id="genreMusical" type="text" name="genreMusical" placeholder="" value=""/>
            </div>
            <div class="col-xs-1">
                <span id="genreMusicalInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <!-- Fin champs pour entrer son genre musical -->
        
        <!-- Début champs pour entrer l'adresse de la salle -->
                
        <div class="form-group">   
            <label class="control-label col-xs-4" for="adresseSalle">Adresse de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="adresseSalle" type="text" name="adresseSalle" placeholder="" value=""/>
            </div>
            <div class="col-xs-1">
                <span id="adresseSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <!-- Fin champs pour entrer l'adresse de la salle -->
                       
        <!-- Début champs pour modifier son code postal -->
        
        <div class="form-group">   
            <label class="control-label col-xs-4" for="CP">Votre code postal :</label>
            <div class="col-xs-6">
                <input class="form-control" id="CP" type="text" name="CP" placeholder="" value=""/>
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
                <input class="form-control" id="ville" type="text" name="ville" placeholder="" value=""/>
            </div>
            <div class="col-xs-1">
                <span id="villeInfo"></span>
            </div>
            <div class="col-lg-2"></div>
		</div>
		
        <!-- Fin champs pour modifier votre ville -->
        
        <!-- Début champs pour entrer le numéro de téléphone de la salle -->
        
        <div class="form-group">   
            <label class="control-label col-xs-4" for="telSalle">Numéro de téléphone de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="telSalle" type="text" name="telSalle" placeholder="" value=""/>
            </div>
            <div class="col-xs-1">
                <span id="telSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>        
        
        <!-- Fin champs pour entrer le numéro de téléphone de la salle -->
        
        <!-- Début champs pour entrer le nom du gérant -->
        
        <div class="form-group">   
            <label class="control-label col-xs-4" for="nomGerant">Nom du gérant de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="nomGerant" type="text" name="nomGerant" placeholder="" value=""/>
            </div>
            <div class="col-xs-1">
                <span id="nomGerantInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>        
        
        <!-- Fin champs pour entrer le nom du gérant -->
        
        <!-- Début champs pour entrer le prénom du gérant -->
                
        <div class="form-group">   
            <label class="control-label col-xs-4" for="prenomGerant">Prénom du gérant de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="prenomGerant" type="text" name="prenomGerant" placeholder="" value=""/>
            </div>
            <div class="col-xs-1">
                <span id="prenomGerantInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <!-- Fin champs pour entrer le prénom du gérant -->
        
        <!-- Début champs pour entrer le contact gérant -->
              
        <div class="form-group">   
            <label class="control-label col-xs-4" for="contactGerant">Comment contacter le gérant de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="contactGerant" type="text" name="contactGerant" placeholder="" value=""/>
            </div>
            <div class="col-xs-1">
                <span id="contactGerantInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>       
        
        <!-- Fin champs pour entrer le contact gérant -->
                   
        <!-- Début champs pour entrer la description -->
        
        <div class="form-group">   
            <label class="control-label col-xs-4" for="descriptionSalle">Description :</label>
            <div class="col-xs-6">
                <textarea class="form-control" rows="5" id="descriptionSalle" type="text" name="descriptionSalle" placeholder="" value=""/></textarea>
            </div>
            <div class="col-xs-1">
                <span id="descriptionSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <!-- Fin champs pour entrer la description -->
        
        <!-- Début champs pour ajouter une photo de profil -->        
        
        <div class='form-group'>
            <label class="control-label col-xs-4" for="photoSalle">Votre photo de profil :</label> 
            <div class="col-xs-6">
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />	
                <input class="col-lg-offset-3" type="file" name="mon_fichier" id="mon_fichier" /><br/>
            </div>
        </div>
        
        <!-- Fin champs pour ajouter une photo de profil -->
               
        <div class='form-group'>
            <div class="col-xs-6">
            </div>
            <div class="col-xs-1">
                <input class="btn btn-default" type="submit" value="Valider" id="envoyer"/>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </form>  
</div>


<div class="container col-lg-6">
</div>