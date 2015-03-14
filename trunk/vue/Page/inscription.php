<!-- vue/page -->

<div class="col-lg-12" id="formulaireI">
    <h1> Formulaire d'inscription </h1>
    	<div class="row">
			<form class="form-horizontal" id="formulaireInscription" method ="post" name="verificationInscription1">
				<table class="table">
					<tbody>
					

<!-- Début champs pour entrer son email -->

	
		<tr>
	    	<td>
	            <label class="control-label" for="email">Votre mail : *</label> 
	    	</td>
	    	<td>
	            <input class="form-control" id="email" type="text" name="email" placeholder="test@sorbonne.fr" value=""/>
	    	</td>
	    	<td>				
				<span id="emailInfo"></span>
	    	</td>
		</tr>
	
	
<!-- Fin champs pour entrer son email -->

<!-- Début champs pour entrer son pseudo -->

        <tr>
			<td>  
            	<label class="control-label" for="pseudo">Pseudo : *</label>
			</td>
			<td>
				<input class="form-control" id="pseudo" type="text" name="pseudo" placeholder="lhommedu13" value=""/>
			</td>
			<td>
            	<span id="pseudoInfo"></span>
			</td>
		</tr>
   

<!-- Fin champs pour entrer son pseudo -->

<!-- Début champs pour entrer son mot de passe -->

	
        <tr>
			<td>   
            	<label class="control-label" for="passe">Mot de passe : *</label>
			</td>
			<td>
				<input class="form-control" id="passe" type="password" name="passe" value=""/>
			</td>
			<td>
				<span id="passeInfo"></span>
			</td>
		</tr>
    
        
<!-- Fin champs pour entrer son mot de passe -->

<!-- Début champs pour vérifier son mot de passe -->

		<tr> 
			<td>
            	<label class="control-label" for="passe2">V&eacute;rification de votre mot de passe : *</label>
			</td>
			<td>
				<input class="form-control" id="passe2" type="password" name="passe2" value=""/>
			</td>
			<td>
				<span id="passe2Info"></span>
			</td>
		</tr>
   
    
<!-- Fin champs pour vérifier son mot de passe -->

    <tr>
	    <td>
        <input class="btn btn-default center-block" type="submit" value="M'inscrire" id="envoyer"/>
	    </td>
    </tr>
    
    
				</tbody>
			</table>
    	</form>
    </div>
</div>



<div class="container col-lg-6">
    <?php echo $vars['existeDeja'] ? 'Votre email ou login est deja présent' : ''; ?>
    <?php echo $vars['problemeMdp'] ? 'les deux mots de passe ne correspondent pas' : ''; ?>
</div>