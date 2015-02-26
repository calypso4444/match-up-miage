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

function verifForm(f){
   var pseudoOK = verifPseudo(f.email);
   if(pseudoOK)
      return true;
   else{
      alert("Les champs surligne en rouge doivent etre remplie correctement !!!");
      return false;
   }
}

/*
	Cette fonction va nous permettre de passer au champ suivant lorsque la taille maximale est atteinte
*/

function suivantLimite(enCours, suivant, limite) 
  { 
  if (enCours.value.length == limite){
    document.forms["verificationInscription1"].elements[suivant].focus();
  }
}

/*
	Cette fonction va nous permettre de passer au champ suivant si l'on clique sur la touche ENTER 
*/

function suivantEnter(event, suivant){
	if(event.which == 13){
		document.forms["verificationInscription1"].elements[suivant].focus();
	}