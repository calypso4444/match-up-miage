$(document).ready(function(){
	
	var form = $('#formulaireAjoutMusique');
	
	var nomMusique = $('#titre');

	
	form.submit(function(){
		if(validateNomMusique()){
			return true;
		} else {
			alert("Veuillez entrer un titre");
			return false;
		}
	});

	function validateNomMusique(){
		if(!nomMusique.val().match(/^[A-Za-zàéèêëîïôöûüùç.0-9]+([ -0-9][A-Za-zàéèêëîïôöûüùç.0-9]{1,})*$/i)){
			return false;
		} else {
			return true;
		}
	}
});

