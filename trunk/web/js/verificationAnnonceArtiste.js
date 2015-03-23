/* Ce JS a pour but de vérifier le nombre de caractère d'une annonce */

$(document).ready(function(){
	
	/* On va récupérer l'ensemble des attributs  */
	
	var formAnnonce = $('#posterAnnonce');
	var descriptionAnnonceArtiste = $('#descriptionAnnonceArtiste');
	var descriptionArtisteInfo = $('#descriptionArtisteInfo');

	/* La fonction blur permet de déclencher l'évènement qui se produit lorsque l'élément perd le focus */
	
	descriptionAnnonceArtiste.blur(validateAnnonceArtiste);
	
	/* La fonction keyup permet de déclencher l'évènement qui se produit lorsque l'on tape sur une touche */
	
	descriptionAnnonceArtiste.keyup(validateAnnonceArtiste);

	/* Lors de la validation, on verrifie la valeur de retour de la fonction validateAnnonceArtiste. Si la valeur est fausse,
	alors l'utilisateur devra rectifier son annonce.
	*/
	
	formAnnonce.submit(function(){
		if(validateAnnonceArtiste()){
			return true;
		} else {
			alert("Attention au nombre de caractères de votre annonce");
			return false;
		}
	});
	
	/* Cette fonction a pour but de vérifier le nombre de caractères de l'annonce */
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



