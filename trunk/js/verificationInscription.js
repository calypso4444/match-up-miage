$(document).ready(function(){
	
			$("#pseudo").keyup(function(){
			if(!$("#pseudo").val().match(/^[a-zA-Z0-9]{2,20}$/i)){
				$("#pseudo").next(".error-message").show().text("Veuillez entrer un pseudo valide entre 2 et 20 caractères")
			}else{
				$("#pseudo").next(".error-message").hide().text("");
			}
			});
			
			$("#email").keyup(function(){
			if(!$("#email").val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i)){
				$("#email").next(".error-message").show().text("Veuillez entrer une adresse mail valide")
				}else{
				$("#email").next(".error-message").hide().text("");	
			}
			});
			
			$("#passe").keyup(function(){
			if(!$("#passe").val().match(/^[a-zA-Z0-9]{8,}$/i)){
				$("#passe").next(".error-message").show().text("Mot de passe trop court")
				}else{
				$("#passe").next(".error-message").hide().text("");	
			}
			});
			
			$("#passe2").keyup(function (){
			if($("#passe2").val() != $("passe").val()){
				$("#passe2").next(".error-message").show().text("Mot de passe différent")
				}else{
				$("#passe2").next(".error-message").hide().text("");	
			}
			});
}); 
 
/*
Cette fonction va nous permettre de vérifier si l'ensemble des champs sont respesctés, autrement on ne pourra pas envoyer le formulaire	
*/

$(function(){
	$("#envoyer").click(function(){
		var valid = false;

		if(!$("#pseudo").val().match(/^[a-zA-Z0-9]{2,20}$/i)){
			valid = false;
		}else{
			valid = true;
		}
		if(!$("#email").val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i)){
			valid = false;
		}else{
			valid = true;
		}
		if(!$("#passe").val().match(/^[a-zA-Z0-9]{8,}$/i)){
			valid = false;
		}else{
			valid=true;
		}

		return valid;
	});
});

