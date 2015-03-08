<!-- vue/page -->

<div class="container col-lg-12">
    <form id="formulaireModificationProfilArtiste" method ="post" name="formulaireModificationProfilArtiste" enctype="multipart/form-data">
        
         <!-- Début champs pour entrer son nom d'artiste -->
        
        <div class="form-group">
            <label class="control-label col-xs-4" for="nomArtiste">Votre nom de scene :</label> 
            <div class="col-xs-6">
                <input class="form-control" id="nomArtiste" type="text" name="nomArtiste" placeholder="" value=""/>
            </div>		
            <div class="col-xs-1">	
                <span id="nomArtisteInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <!-- Fin champs pour entrer son nom d'artiste -->
        
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
                  
        <!-- Début champs pour entrer sa description -->  
                     
        <div class="form-group">   
            <label class="control-label col-xs-4" for="descriptionArtiste">Description :</label>
            <div class="col-xs-6">
                <textarea  class="form-control" rows="5" id="descriptionArtiste" type="text" name="descriptionArtiste" placeholder="" value=""/></textarea>
            </div>
            <div class="col-xs-1">
                <span id="descriptionArtisteInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        
        <!-- Fin champs pour entrer sa description -->
        
        <!-- Début champs pour choisir sa photo de profil --> 
               
        <label class="control-label col-xs-4" for="photoArtiste">Votre photo de profil :</label> 
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />	
        <input class="col-lg-offset-3" type="file" name="mon_fichier" id="mon_fichier" /><br/>
        <div>
	        
	    <!-- Fin champs pour choisir sa photo de profil --> 
	        
            <input class="btn btn-default" type="submit" value="Valider" id="envoyer"/>
        </div>
    </form>  
</div>


<div class="container col-lg-6">
</div>