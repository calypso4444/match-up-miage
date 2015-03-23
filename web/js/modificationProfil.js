/* Cette fonction a pour but de vérifier les champs lors de la création et la modification d'un profil */ 

$(document).ready(function() {

/* On va récupérer l'ensemble des attributs  */
    var form = $('#formulaireGestionProfil');

    var cpasse = $('#cpasse');
    var npasse = $('#npasse');
    var npasse2 = $('#npasse2');
    var email = $('#email');
    var cp = $('#CP');
    var adresse = $('#adresse');
    var nom = $('#nom');
    var prenom = $('#prenom');
    var ville = $('#ville');

    var adresseInfo = $('#adresseInfo');
    var cpInfo = $('#cpInfo');
    var cpasseInfo = $('#cpasseInfo');
    var npasseInfo = $('#npasseInfo');
    var npasse2Info = $('#npasse2Info');
    var emailInfo = $('#emailInfo');
    var cpInfo = $('#cpInfo');
    var adresseInfo = $('#adresseInfo');
    var nomInfo = $('#nomInfo');
    var prenomInfo = $('#prenomInfo');
    var villeInfo = $('#villeInfo');

	/* La fonction blur permet de déclencher l'évènement qui se produit lorsque l'élément perd le focus */

    email.blur(validateEmail);
    cpasse.blur(validateCPasse);
    npasse.blur(validateNouveau);
    npasse2.blur(validateNouveau2);
    cp.blur(validateCP);
    adresse.blur(validateAdresse);
    nom.blur(validateNom);
    prenom.blur(validatePrenom);
    ville.keyup(validateVille);

	/* La fonction keyup permet de déclencher l'évènement qui se produit lorsque l'on tape sur une touche */

    email.keyup(validateEmail);
    cpasse.keyup(validateCPasse);
    npasse.keyup(validateNouveau);
    npasse2.keyup(validateNouveau2);
    cp.keyup(validateCP);
    adresse.keyup(validateAdresse);
    nom.keyup(validateNom);
    prenom.keyup(validatePrenom);
    ville.keyup(validateVille);

	/* Lors de la validation, on verrifie si l'ensemble des fonctions ci-dessous retourn une valeur vraie ou faux. 
	En effet si c'est faut, alors on envoit un message d'erreur et on demande à l'utilisateur de rentrer correctement
	l'ensemble des champs indiqué */
	 
    form.submit(function() {
        if (validateEmail() & validateNouveau() & validateNouveau2() & validateCPasse()) {
            return true;
        } else {
            alert('Veuillez bien remplir votre mot de passe actuel pour valider vos modifications');
            return false;
        }
    });

	/* Fonction pour vérifier et valider un email */
    function validateEmail() {
        if (!email.val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i)) {
            emailInfo.removeClass("glyphicon glyphicon-ok");
            emailInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            emailInfo.removeClass("glyphicon glyphicon-remove");
            emailInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
	
	/* Fonction pour vérifier et valider le mot de passe courant */
    function validateCPasse() {
        if (cpasse.val() == "") {
            return false;
        } else {
            return true;
        }
    }
	
	/* Fonction pour vérifier et valider le nouveau mot de passe */
    function validateNouveau() {
        if (npasse.val() == "") {
            return true;
        }
        else if (!npasse.val().match(/^[a-zA-Z0-9]{8,}$/i)) {
            npasseInfo.removeClass("glyphicon glyphicon-ok");
            npasseInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            npasseInfo.removeClass("glyphicon glyphicon-remove");
            npasseInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }

	/* Fonction pour vérifier et valider la vérification du nouveau mot de passe */
    function validateNouveau2() {
        if ((npasse.val() == "") && (npasse2.val() == "")) {
            return true;
        }
        else if (!npasse.val().match(/^[a-zA-Z0-9]{8,}$/i)) {
            npasse2Info.removeClass("glyphicon glyphicon-ok");
            npasse2Info.addClass("glyphicon glyphicon-remove");
            return false;
        } else if (npasse.val() !== npasse2.val()) {
            npasse2Info.removeClass("glyphicon glyphicon-ok");
            npasse2Info.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            npasse2Info.removeClass("glyphicon glyphicon-remove");
            npasse2Info.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
	
	/* Fonction pour vérifier et valider le code postal */
    function validateCP() {
        if (!cp.val().match(/^[0-9]{5,5}$/i)) {
            cpInfo.removeClass("glyphicon glyphicon-ok");
            cpInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            cpInfo.removeClass("glyphicon glyphicon-remove");
            cpInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
	
	/* Fonction pour vérifier et valider l'adresse */
    function validateAdresse() {
        if (!adresse.val().match(/^[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+$/i)) {
            adresseInfo.removeClass("glyphicon glyphicon-ok");
            adresseInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            adresseInfo.removeClass("glyphicon glyphicon-remove");
            adresseInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }

	/* Fonction pour vérifier et valider le prénom */
    function validatePrenom() {
        if (!prenom.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)) {
            prenomInfo.removeClass("glyphicon glyphicon-ok");
            prenomInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            prenomInfo.removeClass("glyphicon glyphicon-remove");
            prenomInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }

	/* Fonction pour vérifier et valider le nom */
    function validateNom() {
        if (!nom.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)) {
            nomInfo.removeClass("glyphicon glyphicon-ok");
            nomInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            nomInfo.removeClass("glyphicon glyphicon-remove");
            nomInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }

	/* Fonction pour vérifier et valider la ville */
    function validateVille() {
        if (!ville.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)) {
            villeInfo.removeClass("glyphicon glyphicon-ok");
            villeInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            villeInfo.removeClass("glyphicon glyphicon-remove");
            villeInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }

});
