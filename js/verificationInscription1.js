			function surligne(champ, erreur){
         if(erreur)
          champ.style.backgroundColor = "#fba";
         else
          champ.style.backgroundColor = "#54F98D";
      }

     function verifPseudo(champ){
	    var pseudo = /^[a-zA-Z0-9]{2,25}$/;
        if(!pseudo.test(champ.value)){
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
           return false;
   		}else{
   			surligne(champ, false);
   			return true;
   		}
     }	
     
    function verifForm(f){
	var pseudoOk = verifPseudo(f.pseudo);
	var mailOk = verifMail(f.email);
		if(pseudoOk && mailOk)
			return true;
		else{
			alert("Veuillez remplir correctement tous les champs");
			return false;
		}
	}
