<!-- vue/page -->
<div class="container col-lg-12">
    <form id="formulaireModificationProfil" method ="post" name="formulaireModificationProfil" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-xs-4" for="nomArtiste">Votre nom de scene :</label> 
            <div class="col-xs-6">
                <input class="form-control" id="nomArtiste" type="text" name="nomArtiste" placeholder="<?php echo $vars['nomArtiste']; ?>" value="<?php echo $vars['nomArtiste']; ?>"/>
            </div>		
            <div class="col-xs-1">	
                <span id="nomArtisteInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="descriptionArtiste">Description :</label>
            <div class="col-xs-6">
                <input class="form-control" id="descriptionArtiste" type="text" name="descriptionArtiste" placeholder="<?php echo $vars['descriptionArtiste']; ?>" value=" <?php echo $vars['descriptionArtiste']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="descriptionArtisteInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="genreMusical">Votre genre musical :</label>
            <div class="col-xs-6">
                <input class="form-control" id="genreMusical" type="text" name="genreMusical" placeholder="<?php echo $vars['genreArtiste']; ?>" value="<?php echo $vars['genreArtiste']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="genreMusicalInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <label class="control-label col-xs-4" for="photoArtiste">Votre photo de profil :</label> 
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />	
        <input class="col-lg-offset-3" type="file" name="mon_fichier" id="mon_fichier" /><br/>
        <div>
            <input class="btn btn-default" type="submit" value="Valider" id="envoyer"/>
        </div>
    </form>  
</div>


<div class="container col-lg-6">
</div>