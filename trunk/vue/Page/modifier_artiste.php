<!-- vue/page -->

<div class="col-lg-12">
<<<<<<< .mine
	<h1>Infos de mon profil <?php echo $vars['nomArtiste']; ?></h1>
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
                <input class="form-control" id="nomArtiste" type="text" name="nomArtiste" placeholder="<?php echo $vars['nomArtiste']; ?>" value="<?php echo $vars['nomArtiste']; ?>"/>
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
                <input class="form-control" id="genreMusical" type="text" name="genreMusical" placeholder="<?php echo $vars['genreArtiste']; ?>" value="<?php echo $vars['genreArtiste']; ?>"/>
	        </td>
	        <td>
                <span id="genreMusicalInfo"></span>
	        </td>
        </tr>

        <!-- Fin champs pour entrer son genre musical -->          

        <!-- Début champs pour entrer sa description -->  

		<tr>
			<td>
            	<label class="control-label" for="descriptionArtiste">Description :</label><br/>
            	<span id="descriptionArtisteInfo"></span>
			</td>
			<td>
                <textarea style="resize:none" class="form-control" rows="5" id="descriptionArtiste" type="text" name="descriptionArtiste" placeholder="<?php echo $vars['descriptionArtiste']; ?>" value="<?php echo $vars['descriptionArtiste']; ?>"/></textarea>
            </td>
        </tr>

        <!-- Fin champs pour entrer sa description -->

        <!-- Début champs pour choisir sa photo de profil --> 


		<tr>
			<td>
        		<label class="control-label" for="photoArtiste">Votre photo de profil :</label> 
			</td>
			<td>
				<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />	
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


<div class="container col-lg-6">
</div>