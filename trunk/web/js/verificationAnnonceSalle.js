$(document).ready(function(){
	
	var formAnnonce = $('#posterAnnonceSalle');
	var descriptionAnnonceSalle = $('#descriptionAnnonceSalle');
	var descriptionSalleInfo = $('#descriptionSalleInfo');

	descriptionAnnonceSalle.blur(validateAnnonceSalle);
	descriptionAnnonceSalle.keyup(validateAnnonceSalle);

	formAnnonce.submit(function(){
		if(validateAnnonceSalle()){
			return true;
		} else {
			alert("Attention au nombre de caractères de votre annonce");
			return false;
		}
	});
	
	function validateAnnonceSalle(){
		
	var nombreCaractere = $(descriptionAnnonceSalle).val().length;
    var nombreCaractere = 255 - nombreCaractere;
    
    var msg = nombreCaractere + ' caractère(s) restant(s)';
	descriptionSalleInfo.text(msg);


    if (nombreCaractere < 0) { 
	    descriptionSalleInfo.css('color', 'red');
	    return false;
	} else { 
	    descriptionSalleInfo.css('color', 'black');  
	    return true; 
	}
	}
		
});



