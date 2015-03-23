/* Ce JS a pour but de vérifier les champs lors de la création et la modification d'un profil artiste */ 

$(document).ready(function(){
	
	/* On va récupérer l'ensemble des attributs */
	
	var form = $('#formulaireModificationProfilArtiste');
	
	var nomArtiste = $('#nomArtiste');
	var descriptionArtiste = $('#descriptionArtiste');
	
	var nomArtisteInfo = $('#nomArtisteInfo');
	var descriptionArtisteInfo = $('#descriptionArtisteInfo');

	/* La fonction blur permet de déclencher l'évènement qui se produit lorsque l'élément perd le focus */
	
	nomArtiste.blur(validateNomArtiste);
	descriptionArtiste.blur(validateDescriptionArtiste);
		
	/* La fonction keyup permet de déclencher l'évènement qui se produit lorsque l'on tape sur une touche */
		
	nomArtiste.keyup(validateNomArtiste);
	descriptionArtiste.keyup(validateDescriptionArtiste);

	/* Lors de la validation, on verrifie si l'ensemble des fonctions ci-dessous retourne une valeur vraie ou fausse. 
	En effet si c'est faut, alors on envoit un message d'erreur et on demande à l'utilisateur de rentrer correctement
	l'ensemble des champs indiqué */
	
	form.submit(function(){
		if(validateNomArtiste() & validateDescriptionArtiste()){
			alert("Bien enregistré");
			return true;
		} else {
			alert("Veuillez entrer un nom d'artiste ou vérifier le nombre de caractères de votre description");
			return false;
		}
	});

	/* Fonction pour vérifier et valider le nom de l'artiste */
	function validateNomArtiste(){
		if(!nomArtiste.val().match(/^[A-Za-zàéèêëîïôöûüùç.0-9]+([ -0-9][A-Za-zàéèêëîïôöûüùç.0-9]{1,})*$/i)){
			nomArtisteInfo.removeClass("glyphicon glyphicon-ok");
			nomArtisteInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			nomArtisteInfo.removeClass("glyphicon glyphicon-remove");
			nomArtisteInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}
	}
	
	/* Fonction pour vérifier et valider la description de l'artiste */
	function validateDescriptionArtiste(){
	var nombreCaractere = $(descriptionArtiste).val().length;
    var nombreCaractere = 255 - nombreCaractere;
    
    var msg = nombreCaractere + ' caractère(s) restant(s)';
	descriptionArtisteInfo.text(msg);


    if (nombreCaractere < 0) { 
	    descriptionArtisteInfo.css('color', 'red');
	    return false;
	} else { 
	    descriptionArtisteInfo.css('color', 'black');  
	    return true; 
	}
	}
		
});

