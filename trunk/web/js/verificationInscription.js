/* Ce JS a pour but de vérifier les champs lors de l'inscription d'un utilisateur */

$(document).ready(function(){
	
	
	/* On va récupérer l'ensemble des attributs */
	var form = $('#formulaireInscription');
	var pseudo = $('#pseudo');
	var passe = $('#passe');
	var passe2 = $('#passe2');
	var email = $('#email');
	var pseudoInfo = $('#pseudoInfo');
	var passeInfo = $('#passeInfo');
	var passe2Info = $('#passe2Info');
	var emailInfo = $('#emailInfo');
	
	/* La fonction blur permet de déclencher l'évènement qui se produit lorsque l'élément perd le focus */
	
	pseudo.blur(validatePseudo);
	email.blur(validateEmail);
	passe.blur(validatePasse);
	passe2.blur(validatePasse2);
	
	/* La fonction keyup permet de déclencher l'évènement qui se produit lorsque l'on tape sur une touche */
	
	pseudo.keyup(validatePseudo);
	email.keyup(validateEmail);
	passe.keyup(validatePasse);
	passe2.keyup(validatePasse2);
	
	/* Lors de la validation, on verrifie si l'ensemble des fonctions ci-dessous retourne une valeur vraie ou fausse. 
	En effet si c'est faut, alors on envoit un message d'erreur et on demande à l'utilisateur de rentrer correctement
	l'ensemble des champs indiqué */
	
	form.submit(function(){
		if(validatePseudo() & validateEmail() & validatePasse() & validatePasse2()){
			return true;
		} else {
			return false;
		}
	});

	/* Fonction pour vérifier et valider le pseudo */
	function validatePseudo(){
		if(!pseudo.val().match(/^[a-zA-Z0-9]{2,20}$/i)){
			pseudoInfo.removeClass("glyphicon glyphicon-ok");
			pseudoInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			pseudoInfo.removeClass("glyphicon glyphicon-remove");
			pseudoInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}
	}
	
	/* Fonction pour vérifier et valider un email */
	function validateEmail(){
			if(!email.val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i)){
			emailInfo.removeClass("glyphicon glyphicon-ok");
			emailInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			emailInfo.removeClass("glyphicon glyphicon-remove");
			emailInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
	
	/* Fonction pour vérifier et valider le mot de passe */
	function validatePasse(){
			if(!passe.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			passeInfo.removeClass("glyphicon glyphicon-ok");
			passeInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			passeInfo.removeClass("glyphicon glyphicon-remove");
			passeInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
	
	/* Fonction pour vérifier et valider la vérification du mot de passe entré précédemment */	
	function validatePasse2(){
			if(!passe.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			passe2Info.removeClass("glyphicon glyphicon-ok");
			passe2Info.addClass("glyphicon glyphicon-remove");	
			return false;
		} else if(passe.val() !== passe2.val()){
			passe2Info.removeClass("glyphicon glyphicon-ok");
			passe2Info.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			passe2Info.removeClass("glyphicon glyphicon-remove");
			passe2Info.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
		
});
