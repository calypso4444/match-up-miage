/* Ce JS a pour but de vérifier les champs lors de l'entrée d'un titre pour la musique */

$(document).ready(function(){
	
	/* On va récupérer l'ensemble des attributs */
	var form = $('#formulaireAjoutMusique');
	var nomMusique = $('#titre');

	/* Lors de la validation, on verrifie si l'ensemble des fonctions ci-dessous retourne une valeur vraie ou fausse. 
	En effet si c'est faut, alors on envoit un message d'erreur et on demande à l'utilisateur de rentrer correctement
	l'ensemble des champs indiqué */
	
	form.submit(function(){
		if(validateNomMusique()){
			return true;
		} else {
			alert("Veuillez entrer un titre");
			return false;
		}
	});

	/* Fonction pour vérifier et valider le titre d'une musique */
	function validateNomMusique(){
		if(!nomMusique.val().match(/^[A-Za-zàéèêëîïôöûüùç.0-9]+([ -0-9][A-Za-zàéèêëîïôöûüùç.0-9]{1,})*$/i)){
			return false;
		} else {
			return true;
		}
	}
});

