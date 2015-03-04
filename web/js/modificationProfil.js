$(document).ready(function(){
	
	var form = $('#formulaireGestionProfil');
	
	var cpasse = $('#cpasse');
	var npasse = $('#npasse');
	var npasse2 = $('#npasse2');
	var email = $('#email');
	
	var adresseInfo = $('#adresseInfo');
	var cpInfo = $('#cpInfo');
	var cpasseInfo = $('#cpasseInfo');
	var npasseInfo = $('#passeInfo');
	var npasse2Info = $('#passe2Info');
	var emailInfo = $('#emailInfo');
	
	email.blur(validateEmail);
	npasse.blur(validateNPasse);
	npasse2.blur(validateNPasse2);
	cpasse.blur(validateCPasse);
	
	email.keyup(validateEmail);
	npasse.keyup(validateNPasse);
	npasse2.keyup(validateNPasse2);
	cpasse.keyup(validateCPasse);
	
	form.submit(function(){
		if (validateEmail() & validateNPasse() & validateNPasse2() & validateCPasse()){
			alert('HEYYYYYY');
			return true;
		} else {
			alert("NOOOOOOOOON");
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
			if(!cpasse.val()){
			cpasseInfo.removeClass("glyphicon glyphicon-ok");
			cpasseInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else if(!cpasse.val().match(/^[a-zA-Z0-9]{8,}$/i)){ 
			cpasseInfo.removeClass("glyphicon glyphicon-ok");
			cpasseInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			cpasseInfo.removeClass("glyphicon glyphicon-remove");
			cpasseInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}

		function validateNPasse(){
			if(!npasse.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			npasseInfo.removeClass("glyphicon glyphicon-ok");
			npasseInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else if(validateCPasse() == false) {
			npasseInfo.removeClass("glyphicon glyphicon-ok");
			npasseInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {	
			npasseInfo.removeClass("glyphicon glyphicon-remove");
			npasseInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
	
		function validateNPasse2(){
			if(!passe.val().match(/^[a-zA-Z0-9]{8,}$/i)){
			npasse2Info.removeClass("glyphicon glyphicon-ok");
			npasse2Info.addClass("glyphicon glyphicon-remove");	
			return false;
		}else if (validateNPasse()==false) {
			npasse2Info.removeClass("glyphicon glyphicon-ok");
			npasse2Info.addClass("glyphicon glyphicon-remove");	
			return false;
		}else if(passe.val() !== passe2.val()){
			npasse2Info.removeClass("glyphicon glyphicon-ok");
			npasse2Info.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			npasse2Info.removeClass("glyphicon glyphicon-remove");
			npasse2Info.addClass("glyphicon glyphicon-ok");
			return true;
		}	
	}
		
});
