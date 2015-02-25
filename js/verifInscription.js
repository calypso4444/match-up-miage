<SCRIPT language="Javascript">

/*
	Fonction permettant de surligner en rouge ou vert le champ s'il est bien remplit ou non
*/

function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "#54F98D";
}

/*
	Fonction permettant de vérifier le champ correspondant au prénom.
*/

function verifFirstname(champ){
   if(champ.value.length < 2 || champ.value.length > 35){
      surligne(champ, true);
      return false;
   }else{
      surligne(champ, false);
      return true;
   }
}

/*
	Fonction permettant de vérifier le champ correspondant au nom.
*/

function verifLastname(champ){
   if(champ.value.length < 2 || champ.value.length > 35)
   {
      surligne(champ, true);
      return false;
   }else{
      surligne(champ, false);
      return true;
   }
}

/*
	Fonction permettant de vérifier le champ correspondant au mail.
*/

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

/*
	Fonction permettant de vérifier si le formulaire est complet. S'il ne l'est pas alors on aura une alert pop-up.
*/

function verifForm(f){
   var lastnameOk = verifLastname(f.lastname);
   var firstnameOK = verifFirstname(f.firstname);
   var mailOk = verifMail(f.email);
   if(lastnameOk && mailOk && firstnameOK)
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
    document.forms["Formulaire_Inscription"].elements[suivant].focus();
  }
}

/*
	Cette fonction va nous permettre de passer au champ suivant si l'on clique sur la touche ENTER 
*/

function suivantEnter(event, suivant){
	if(event.which ==13){
		document.forms["Formulaire_Inscription"].elements[suivant].focus();
	}
</SCRIPT>