<!-- vue/page -->
<div class="container col-lg-12">
    <form id="formulaireModificationProfil" method ="post" name="formulaireModificationProfil" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-xs-4" for="nomSalle">Votre nom de salle :</label> 
            <div class="col-xs-6">
                <input class="form-control" id="nomArtiste" type="text" name="nomSalle" placeholder="<?php echo $vars['nomSalle']; ?>" value="<?php echo $vars['nomSalle']; ?>"/>
            </div>		
            <div class="col-xs-1">	
                <span id="nomSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="genreMusical">Votre genre musical :</label>
            <div class="col-xs-6">
                <input class="form-control" id="genreMusical" type="text" name="genreMusical" placeholder="<?php echo $vars['genreSalle']; ?>" value="<?php echo $vars['genreSalle']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="genreMusicalInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="adresseSalle">Adresse de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="adresseSalle" type="text" name="adresseSalle" placeholder="<?php echo $vars['adresseSalle']; ?>" value="<?php echo $vars['adresseSalle']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="adresseSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="telSalle">Numéro de téléphone de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="telSalle" type="text" name="telSalle" placeholder="<?php echo $vars['telSalle']; ?>" value="<?php echo $vars['telSalle']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="telSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="nomGerant">Nom du gérant de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="nomGerant" type="text" name="nomGerant" placeholder="<?php echo $vars['nomGerant']; ?>" value="<?php echo $vars['nomGerant']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="nomGerantInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="nomGerant">Prénom du gérant de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="prenomGerant" type="text" name="prenomGerant" placeholder="<?php echo $vars['prenomGerant']; ?>" value="<?php echo $vars['prenomGerant']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="prenomGerantInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="contactGerant">Comment contacter le gérant de la salle :</label>
            <div class="col-xs-6">
                <input class="form-control" id="contactGerant" type="text" name="contactGerant" placeholder="<?php echo $vars['contactGerant']; ?>" value="<?php echo $vars['contactGerant']; ?>"/>
            </div>
            <div class="col-xs-1">
                <span id="contactGerantInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="form-group">   
            <label class="control-label col-xs-4" for="descriptionSalle">Description :</label>
            <div class="col-xs-6">
                <textarea class="form-control" id="descriptionSalle" type="text" name="descriptionSalle" placeholder="<?php echo $vars['descriptionSalle']; ?>" value="<?php echo $vars['descriptionSalle']; ?>"/></textarea>
            </div>
            <div class="col-xs-1">
                <span id="descriptionSalleInfo"></span>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class='form-group'>
            <label class="control-label col-xs-4" for="photoSalle">Votre photo de profil :</label> 
            <div class="col-xs-6">
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />	
                <input class="col-lg-offset-3" type="file" name="mon_fichier" id="mon_fichier" /><br/>
            </div>
        </div>
        <div class='form-group'>
            <div class="col-xs-6">
            </div>
            <div class="col-xs-1">
                <input class="btn btn-default" type="submit" value="Valider"/>
            </div>
            <div class="col-xs-1">
                <a class="btn btn-default" href="f_mes_profils.php">Retour à mes profils</a>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </form>  
</div>


<div class="container col-lg-6">
</div>