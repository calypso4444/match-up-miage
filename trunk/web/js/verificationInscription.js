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
			return true;
		} else {
			return false;
		}
	});

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
