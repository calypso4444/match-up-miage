$(document).ready(function(){
	
	var form = $('#formulaireModificationProfilArtiste');
	
	var nomArtiste = $('#nomArtiste');
	var descriptionArtiste = $('#descriptionArtiste');
	
	var nomArtisteInfo = $('#nomArtisteInfo');
	var descriptionArtisteInfo = $('#descriptionArtisteInfo');

	
	nomArtiste.blur(validateNomArtiste);
	descriptionArtiste.blur(validateDescriptionArtiste);
		
	nomArtiste.keyup(validateNomArtiste);
	descriptionArtiste.keyup(validateDescriptionArtiste);

	
	form.submit(function(){
		if(validateNomArtiste() & validateDescriptionArtiste()){
			alert("Bien enregistré");
			return true;
		} else {
			alert("Veuillez entrer un nom d'artiste ou vérifier le nombre de caractères de votre description");
			return false;
		}
	});

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
	
	function validateDescriptionArtiste(){
		
	var nombreCaractere = $(descriptionArtiste).val().length;
    var nombreCaractere = 300 - nombreCaractere;
    
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

