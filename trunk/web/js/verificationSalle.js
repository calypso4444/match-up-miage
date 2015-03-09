$(document).ready(function(){
	
	var form = $('#formulaireModificationProfilSalle');
	
	var nomSalle = $('#nomSalle');
	var descriptionSalle = $('#descriptionSalle');
	var adresseSalle = $('#adresseSalle');
	var cp = $('#CP');
	var ville = $('#ville');
	
	
	
	var nomSalleInfo = $('#nomSalleInfo');
	var descriptionSalleInfo = $('#descriptionSalleInfo');
	var adresseSalleInfo = $('#adresseSalleInfo');
	var cpInfo = $('#cpInfo');
	var villeInfo = $('#villeInfo');

	
	nomSalle.blur(validateNomSalle);
	descriptionSalle.blur(validateDescription);
	cp.blur(validateCP);
	adresseSalle.blur(validateAdresse);
	ville.blur(validateVille);
		
	nomSalle.keyup(validateNomSalle);
	descriptionSalle.keyup(validateDescription);
	cp.keyup(validateCP);
	adresseSalle.keyup(validateAdresse);
	ville.keyup(validateVille);
	
	form.submit(function(){
		if(validateNomSalle() & validateAdresse() & validateCP()){
			return true;
		} else {
			alert("Veuillez remplir les champs suivant correctement ");
			return false;
		}
	});

	function validateNomSalle(){
		if(!nomSalle.val().match(/^[a-zA-Z0-9]{2,30}$/i)){
			nomSalleInfo.removeClass("glyphicon glyphicon-ok");
			nomSalleInfo.addClass("glyphicon glyphicon-remove");
			return false;
		} else {
			nomSalleInfo.removeClass("glyphicon glyphicon-remove");
			nomSalleInfo.addClass("glyphicon glyphicon-ok");
			return true;
		}
	}
	
	function validateCP() {
        if (!cp.val().match(/^[0-9]{5,5}$/i)) {
            cpInfo.removeClass("glyphicon glyphicon-ok");
            cpInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            cpInfo.removeClass("glyphicon glyphicon-remove");
            cpInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
    
    function validateAdresse() {
        if (!adresseSalle.val().match(/^[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+$/i)) {
            adresseSalleInfo.removeClass("glyphicon glyphicon-ok");
            adresseSalleInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            adresseSalleInfo.removeClass("glyphicon glyphicon-remove");
            adresseSalleInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
    
    function validateVille() {
        if (!ville.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)) {
            villeInfo.removeClass("glyphicon glyphicon-ok");
            villeInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            villeInfo.removeClass("glyphicon glyphicon-remove");
            villeInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
		
	function validateDescription(){
		
	var nombreCaractere = $(descriptionSalle).val().length;
    var nombreCaractere = 300 - nombreCaractere;
    var nombreMots = jQuery.trim($(this).val()).split(' ').length;
    
    if($(this).val() === '') {
     	nombreMots = 0;
    }
    
    var msg = nombreCaractere + ' Caractere(s) restant';
	descriptionSalleInfo.text(msg);


    if (nombreCaractere < 0) { 
	    descriptionSalleInfo.css('color', 'red');
	} else { 
	    descriptionSalleInfo.css('color', 'black');  
	     }
	}
		
});

