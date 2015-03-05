$(document).ready(function(){
		
	var form = $('#formulaireGestionProfil');
	
	var cpasse = $('#cpasse');
	var npasse = $('#npasse');
	var npasse2 = $('#npasse2');
	var email = $('#email');
	var cp = $('#CP');
	var adresse = $('#adresse');
	var nom = $('#nom');
	var prenom = $('#prenom');
	var ville = $('#ville');
	
	var adresseInfo = $('#adresseInfo');
	var cpInfo = $('#cpInfo');
	var cpasseInfo = $('#cpasseInfo');
	var npasseInfo = $('#npasseInfo');
	var npasse2Info = $('#npasse2Info');
	var emailInfo = $('#emailInfo');
	var cpInfo = $('#cpInfo');
	var adresseInfo = $('#adresseInfo');
	var nomInfo = $('#nomInfo');
	var prenomInfo = $('#prenomInfo');
	var villeInfo = $('#villeInfo');
	
	email.blur(validateEmail);
	cpasse.blur(validateCPasse);
	npasse.blur(validateNouveau);
	npasse2.blur(validateNouveau2);
	cp.blur(validateCP);
	adresse.blur(validateAdresse);
	nom.blur(validateNom);
	prenom.blur(validatePrenom);
	ville.keyup(validateVille);
	
	email.keyup(validateEmail);
	cpasse.keyup(validateCPasse);
	npasse.keyup(validateNouveau);
	npasse2.keyup(validateNouveau2);
	cp.keyup(validateCP);
	adresse.keyup(validateAdresse);
	nom.keyup(validateNom);
	prenom.keyup(validatePrenom);
	ville.keyup(validateVille);
	
	form.('#envoyer').(function(){
		if (validateEmail() & validateNouveau() & validateNouveau2() & validateCPasse()){
			return true;
		} else {
			return false;
		}
	});
	
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

	function validateCPasse(){
		if(cpasse.val() == ""){
			return false;
		} else {
			return true;
		}
	}

	function validateNouveau(){
		if (npasse.val() == ""){
			return true;
		}
		else if(!npasse.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			npasseInfo.removeClass("glyphicon glyphicon-ok");
			npasseInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			npasseInfo.removeClass("glyphicon glyphicon-remove");
			npasseInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
	
	function validateNouveau2(){
		if((npasse.val() == "") && (npasse2.val() == "")){
			return true;
		}
		else if(!npasse.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			npasse2Info.removeClass("glyphicon glyphicon-ok");
			npasse2Info.addClass("glyphicon glyphicon-remove");	
			return false;
		} else if(npasse.val() !== npasse2.val()){
			npasse2Info.removeClass("glyphicon glyphicon-ok");
			npasse2Info.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			npasse2Info.removeClass("glyphicon glyphicon-remove");
			npasse2Info.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
	
	function validateCP(){
		if(!cp.val().match(/^[0-9]{5,5}$/i)){
			cpInfo.removeClass("glyphicon glyphicon-ok");
			cpInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			cpInfo.removeClass("glyphicon glyphicon-remove");
			cpInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}		
	
		function validateAdresse(){
		if(!adresse.val().match(/^[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+$/i)){
			adresseInfo.removeClass("glyphicon glyphicon-ok");
			adresseInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			adresseInfo.removeClass("glyphicon glyphicon-remove");
			adresseInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
	
		function validatePrenom(){
		if(!prenom.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)){
			prenomInfo.removeClass("glyphicon glyphicon-ok");
			prenomInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			prenomInfo.removeClass("glyphicon glyphicon-remove");
			prenomInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
	
		function validateNom(){
		if(!nom.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)){
			nomInfo.removeClass("glyphicon glyphicon-ok");
			nomInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			nomInfo.removeClass("glyphicon glyphicon-remove");
			nomInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}	
	
		function validateVille(){
		if(!ville.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)){
			villeInfo.removeClass("glyphicon glyphicon-ok");
			villeInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			villeInfo.removeClass("glyphicon glyphicon-remove");
			villeInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}	
	
});
