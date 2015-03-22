$(document).ready(function(){
	
	var formAnnonce = $('#posterAnnonce');
	var descriptionAnnonceArtiste = $('#descriptionAnnonceArtiste');
	var descriptionArtisteInfo = $('#descriptionArtisteInfo');

	descriptionAnnonceArtiste.blur(validateAnnonceArtiste);
	descriptionAnnonceArtiste.keyup(validateAnnonceArtiste);

	formAnnonce.submit(function(){
		if(validateAnnonceArtiste()){
			return true;
		} else {
			alert("Attention au nombre de caractères de votre annonce");
			return false;
		}
	});
	
	function validateAnnonceArtiste(){
		
	var nombreCaractere = $(descriptionAnnonceArtiste).val().length;
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



