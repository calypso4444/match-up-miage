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
