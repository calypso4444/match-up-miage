/* Cette fonction va permettre de masquer au chargement de la page le contenu de l'admin */
document.getElementById("cacher").onload = function() {masquer("salleAdmin")};
document.getElementById("cacher").onload = function() {masquer("artisteAdmin")};	
function masquer(id){
	var estProprietaire = $('#estProprietaire').val();
	  if(estProprietaire == 1 ) {
	    document.getElementById(id).style.display = 'block';
	  } else {
		document.getElementById(id).style.display = 'none';	  
	  }
}

/* Cette fonction va permettre de masquer au clique de la page le contenu de l'admin */
function masquer_div(id){
	var estProprietaire = $('#estProprietaire').val();
	  if((document.getElementById(id).style.display == 'none') && estProprietaire == 1 ) {
	       document.getElementById(id).style.display = 'block';
	  } else {
	       document.getElementById(id).style.display = 'none';
	  }
}	


	
