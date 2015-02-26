	function surligne(champ, erreur){
	if(erreur)
      champ.style.backgroundColor = "#fba";
	else
      champ.style.backgroundColor = "#54F98D";
	}

	function verifPseudo(champ){
		if(champ.value.length < 2 || champ.value.length >= 20){
			surligne(champ, true);
			return false;
   		}else{
      surligne(champ, false);
      return true;
   		}
	}

	function verifMail(champ){
	var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
		if(!regex.test(champ.value)){
			surligne(champ, true);
			alert("Attention votre adresse mail n'est pas valide");
			return false;
   		}else{
   			surligne(champ, false);
   			return true;
   		}
	}	