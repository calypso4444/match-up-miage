$(document).ready(function(){
	
	var form = $('#formulaireInscription');
	var pseudo = $('#pseudo');
	var passe = $('#passe');
	var passe2 = $('#passe2');
	var email = $('#email');
	var pseudoInfo = $('#pseudoInfo');
	var passeInfo = $('#passeInfo');
	var passe2Info = $('#passe2Info');
	var emailInfo = $('#emailInfo');
	
	pseudo.blur(validatePseudo);
	email.blur(validateEmail);
	passe.blur(validatePasse);
	passe2.blur(validatePasse2);
	
	pseudo.keyup(validatePseudo);
	email.keyup(validateEmail);
	passe.keyup(validatePasse);
	passe2.keyup(validatePasse2);
	
	form.submit(function(){
		if(validatePseudo() & validateEmail() & validatePasse() & validatePasse2()){
			alert("CONGRATULATION");
			return true;
		} else {
			alert("FAILED")
			return false;
		}
	});

	function validatePseudo(){
		if(!pseudo.val().match(/^[a-zA-Z0-9]{2,20}$/i)){
			pseudo.addClass("error");
			pseudoInfo.removeClass("good");
			pseudoInfo.text("Votre pseudo doit contenir entre 2 et 20 caractères");
			pseudoInfo.addClass("error");
			return false;
		} else {
			pseudo.removeClass("error");
			pseudoInfo.addClass("good").text("Bon Pseudo");
			pseudoInfo.removeClass("error");
			return true;
		}
	}
	
	function validateEmail(){
			if(!email.val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i)){
			email.addClass("error");
			emailInfo.removeClass("good");
			emailInfo.text("Mauvais email");
			emailInfo.addClass("error");
			return false;
		} else {
			email.removeClass("error");
			emailInfo.addClass("good").text("Bon email");
			emailInfo.removeClass("error");
			return true;
		}	
	}
	
		function validatePasse(){
			if(!passe.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			passe.addClass("error");
			passeInfo.removeClass("good");
			passeInfo.text("Votre mot de passe fait moins de 8 caractères");
			passeInfo.addClass("error");
			return false;
		} else {
			passe.removeClass("error");
			passeInfo.addClass("good").text("Bon mot de passe");
			passeInfo.removeClass("error");
			return true;
		}	
	}
	
		function validatePasse2(){
			if(!passe.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			passe2.addClass("error");
			passe2Info.removeClass("good");
			passe2Info.text("Le mot de passe ci-dessus ne respecte pas les conditions");
			passe2Info.addClass("error");	
			return false;
		} else if(passe.val() != passe2.val()){
			passe2.addClass("error");
			passe2Info.removeClass("good");
			passe2Info.text("Ne correspond pas au mot de passe");
			passe2Info.addClass("error");
			return false;
		} else {
			passe2.removeClass("error");
			passe2Info.addClass("good").text("Bon");
			passe2Info.removeClass("error");
			return true;
		}	
	}
		
});
