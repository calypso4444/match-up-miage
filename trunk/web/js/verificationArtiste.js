$(document).ready(function(){
	
	var form = $('#formulaireModificationProfilArtiste');
	
	var nomArtiste = $('#nomArtiste');
	var descriptionArtiste = $('#descriptionArtiste');
	
	var nomArtisteInfo = $('#nomArtisteInfo');
	var descriptionArtisteInfo = $('#descriptionArtisteInfo');

	
	nomArtiste.blur(validateNomArtiste);
	descriptionArtiste.blur(validateDescription);
		
	nomArtiste.keyup(validateNomArtiste);
	descriptionArtiste.keyup(validateDescription);

	
	form.submit(function(){
		if(validateNomArtiste()){
			return true;
		} else {
			alert("Veuillez entrer un nom d'artiste");
			return false;
		}
	});

	function validateNomArtiste(){
		if(!nomArtiste.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)){
			nomArtisteInfo.removeClass("glyphicon glyphicon-ok");
			nomArtisteInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			nomArtisteInfo.removeClass("glyphicon glyphicon-remove");
			nomArtisteInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}
	}
	
	function validateDescription(){
		
	var nombreCaractere = $(descriptionArtiste).val().length;
    var nombreCaractere = 300 - nombreCaractere;
    var nombreMots = jQuery.trim($(this).val()).split(' ').length;
    
    if($(this).val() === '') {
     	nombreMots = 0;
    }
    
    var msg = nombreCaractere + ' Caractere(s) restant';
	descriptionArtisteInfo.text(msg);


    if (nombreCaractere < 0) { 
	    descriptionArtisteInfo.css('color', 'red');
	} else { 
	    descriptionArtisteInfo.css('color', 'black');  
	     }
	}
		
});

