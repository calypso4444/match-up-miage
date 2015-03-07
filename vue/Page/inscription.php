<!-- vue/page -->

<div class="container col-lg-12" id="formulaireI">
    <h1> Formulaire d'inscription </h1>
    <div class="row">
    <form class="form-horizontal" id="formulaireInscription" method ="post" name="verificationInscription1">

<!-- Début champs pour entrer son email -->

	
		<div class="col-xs-1"></div>
	    <div class="form-group">
	            <label class="control-label col-xs-2" for="email">Votre mail : *</label> 
	            	<div class="col-xs-6">
	            		<input class="form-control" id="email" type="text" name="email" placeholder="test@sorbonne.fr" value=""/>
	            	</div>		
							<div class="col-xs-1">	
								<span id="emailInfo"></span>
							</div>
								<div class="col-lg-2"></div>
		</div>
	
	
<!-- Fin champs pour entrer son email -->

<!-- Début champs pour entrer son pseudo -->

	
        <div class="col-xs-1"></div>
		<div class="form-group">   
            	<label class="control-label col-xs-2" for="pseudo">Pseudo : *</label>
            		<div class="col-xs-6">
						<input class="form-control" id="pseudo" type="text" name="pseudo" placeholder="lhommedu13" value=""/>
            		</div>
            				<div class="col-xs-1">
								<span id="pseudoInfo"></span>
            				</div>
            					<div class="col-lg-2"></div>
		</div>
   

<!-- Fin champs pour entrer son pseudo -->

<!-- Début champs pour entrer son mot de passe -->

	
        <div class="col-xs-1"></div>
		<div class="form-group">   
            	<label class="control-label col-xs-2" for="passe">Mot de passe : *</label>
            		<div class="col-xs-6">
						<input class="form-control" id="passe" type="password" name="passe" value=""/>
            		</div>
            				<div class="col-xs-1">
								<span id="passeInfo"></span>
            				</div>
            					<div class="col-lg-2"></div>
		</div>
    
        
<!-- Fin champs pour entrer son mot de passe -->

<!-- Début champs pour vérifier son mot de passe -->

	
        <div class="col-xs-1"></div>
		<div class="form-group">   
            	<label class="control-label col-xs-2" for="passe2">V&eacute;rification de votre mot de passe : *</label>
            		<div class="col-xs-6">
						<input class="form-control" id="passe2" type="password" name="passe2" value=""/>
            		</div>
            				<div class="col-xs-1">
								<span id="passe2Info"></span>
            				</div>
            					<div class="col-lg-2"></div>
		</div>
   
    
<!-- Fin champs pour vérifier son mot de passe -->

    <div>
        <input class="btn btn-default" type="submit" value="M'inscrire" id="envoyer"/>
    </div>
    
    </form>
    </div>
</div>


<div class="container col-lg-6">
    <?php echo $vars['existeDeja'] ? 'Votre email ou login est deja présent' : ''; ?>
    <?php echo $vars['problemeMdp'] ? 'les deux mots de passe ne correspondent pas' : ''; ?>
</div>