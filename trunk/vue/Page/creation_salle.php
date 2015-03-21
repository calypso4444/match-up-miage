<!-- vue/page -->

<!--si l'utilisateur n'est pas connecté, on le redirige vers la page d'inscription-->
<?php echo $vars['estConnecte']? null: "<script>document.location.href='inscription.php'</script>"?>

<div class="col-lg-12">	
	
	<h1> création de votre salle </h1>
		
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
                <input class="form-control" id="nomSalle" type="text" name="nomSalle" placeholder="" value=""/>
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
                <input class="form-control" id="adresseSalle" type="text" name="adresseSalle" placeholder="" value=""/>
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
                <input class="form-control" id="villeSalle" type="text" name="villeSalle" placeholder="" value=""/>
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
                <input class="form-control" id="cpSalle" type="text" name="cpSalle" placeholder="" value=""/>
            </td>
            <td>
                <span id="cpSalleInfo"></span>
            </td>
        </tr>
        
        <!-- Début champs pour modifier le genre musical --> 
        
        <tr> 
	        <td>
            <label class="control-label" for="genreMusical">Votre genre musical :</label>
	        </td>
	        <td>
                <input class="form-control" id="genreMusical" type="text" name="genreMusical" placeholder="" value=""/>
	        </td>
	        <td>
                <span id="genreMusicalInfo"></span>
            </td>
        </tr>
        
        <!-- Fin champs pour modifier le genre musical -->
       
        <!-- Début champs pour modifier la description --> 
     
        <tr> 
	        <td>
            <label class="control-label" for="descriptionSalle">Description :</label><br/>
	        <span id="descriptionSalleInfo"></span>
	        </td>
	        <td>
                <textarea style="resize:none" class="form-control" id="descriptionSalle" rows="5" type="text" name="descriptionSalle" placeholder="" value=""></textarea>
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
                <input class="form-control" id="telSalle" type="text" name="telSalle" placeholder="" value=""/>
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
                <input class="form-control" id="nomGerant" type="text" name="nomGerant" placeholder=""/>
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
                <input class="form-control" id="prenomGerant" type="text" name="prenomGerant" placeholder="" value=""/>
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
                <input class="form-control" id="contactGerant" type="text" name="contactGerant" placeholder="" value=""/>
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

