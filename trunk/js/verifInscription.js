/*
	Bonjour ceci est un test pour voir si cela marche
	Fonction permettant de surligner en rouge ou vert le champ s'il est bien remplit ou non
	s
*/

function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "#54F98D";
}

/*
	Fonction permettant de vérifier le champ correspondant au pseudo.
*/

function verifPseudo(champ){
   if(champ.value.length < 2 || champ.value.length >= 20){ //Il ne peut pas faire moins de 2 caractère et plus de 20 caractères
      surligne(champ, true);
      return false;
   }else{
      surligne(champ, false);
      return true;
   }
}

/*
	Fonction permettant de vérifier si le formulaire est complet. S'il ne l'est pas alors on aura une alert pop-up.
*/

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
    document.forms["fInscription"].elements[suivant].focus();
  }
}

/*
	Cette fonction va nous permettre de passer au champ suivant si l'on clique sur la touche ENTER 
*/

function suivantEnter(event, suivant){
	if(event.which == 13){
		document.forms["fInscription"].elements[suivant].focus();
	}