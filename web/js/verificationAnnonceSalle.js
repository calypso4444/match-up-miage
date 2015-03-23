/* Ce JS a pour but de vérifier le nombre de caractère d'une annonce */

$(document).ready(function(){
	
	/* On va récupérer l'ensemble des attributs  */
	
	var formAnnonce = $('#posterAnnonceSalle');
	var descriptionAnnonceSalle = $('#descriptionAnnonceSalle');
	var descriptionSalleInfo = $('#descriptionSalleInfo');

	/* La fonction blur permet de déclencher l'évènement qui se produit lorsque l'élément perd le focus */
	
	descriptionAnnonceSalle.blur(validateAnnonceSalle);
	
	/* La fonction keyup permet de déclencher l'évènement qui se produit lorsque l'on tape sur une touche */
	
	descriptionAnnonceSalle.keyup(validateAnnonceSalle);

	/* Lors de la validation, on verrifie la valeur de retour de la fonction validateAnnonceSalle. Si la valeur est fausse,
	alors l'utilisateur devra rectifier son annonce.
	*/
	
	formAnnonce.submit(function(){
		if(validateAnnonceSalle()){
			return true;
		} else {
			alert("Attention au nombre de caractères de votre annonce");
			return false;
		}
	});
	
	/* Cette fonction a pour but de vérifier le nombre de caractères de l'annonce */
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



