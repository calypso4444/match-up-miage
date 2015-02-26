function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "#54F98D";
}

function verifPseudo(champ){
   if(champ.value.length < 2 || champ.value.length >= 20){ //Il ne peut pas faire moins de 2 caractère et plus de 20 caractères
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

function suivantLimite(enCours, suivant, limite) 
  { 
  if (enCours.value.length == limite){
    document.forms["fInscription"].elements[suivant].focus();
  }
}

function suivantEnter(event, suivant){
	if(event.which == 13){
		document.forms["fInscription"].elements[suivant].focus();
	}