/* Ce JS a pour but de vérifier les champs lors de la création et la modification d'un profil salle */ 

$(document).ready(function() {

    /* On va récupérer l'ensemble des attributs */
    var form = $('#formulaireModificationProfilSalle');

    var nomSalle = $('#nomSalle');
    var descriptionSalle = $('#descriptionSalle');
    var adresseSalle = $('#adresseSalle');
    var cpSalle = $('#cpSalle');
    var villeSalle = $('#villeSalle');

    var nomSalleInfo = $('#nomSalleInfo');
    var descriptionSalleInfo = $('#descriptionSalleInfo');
    var adresseSalleInfo = $('#adresseSalleInfo');
    var cpSalleInfo = $('#cpSalleInfo');
    var villeSalleInfo = $('#villeSalleInfo');

	/* La fonction blur permet de déclencher l'évènement qui se produit lorsque l'élément perd le focus */

    nomSalle.blur(validateNomSalle);
    descriptionSalle.blur(validateDescriptionSalle);
    cpSalle.blur(validateCpSalle);
    adresseSalle.blur(validateAdresse);
    villeSalle.blur(validateVilleSalle);

	/* La fonction keyup permet de déclencher l'évènement qui se produit lorsque l'on tape sur une touche */

    nomSalle.keyup(validateNomSalle);
    descriptionSalle.keyup(validateDescriptionSalle);
    cpSalle.keyup(validateCpSalle);
    adresseSalle.keyup(validateAdresse);
    villeSalle.keyup(validateVilleSalle);

	/* Lors de la validation, on verrifie si l'ensemble des fonctions ci-dessous retourne une valeur vraie ou fausse. 
	En effet si c'est faut, alors on envoit un message d'erreur et on demande à l'utilisateur de rentrer correctement
	l'ensemble des champs indiqué */
	
    form.submit(function() {
        if (validateAdresse() & validateCpSalle() & validateVilleSalle() & validateNomSalle() & validateDescriptionSalle()) {
            alert("Bien enregistré");
            return true;
        } else {
            alert("Veuillez remplir correctement les champs ");
            return false;
        }
    });

	/* Fonction pour vérifier et valider le nom de le salle */
    function validateNomSalle() {
        if (!nomSalle.val().match(/^[A-Za-zàéèêëîïôöûüùç.0-9]+([ -0-9][A-Za-zàéèêëîïôöûüùç.0-9]{1,})*$/i)) {
            nomSalleInfo.removeClass("glyphicon glyphicon-ok");
            nomSalleInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            nomSalleInfo.removeClass("glyphicon glyphicon-remove");
            nomSalleInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }

	/* Fonction pour vérifier et valider le code postal */
    function validateCpSalle() {
        if (!cpSalle.val().match(/^[0-9]{5,5}$/i)) {
            cpSalleInfo.removeClass("glyphicon glyphicon-ok");
            cpSalleInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            cpSalleInfo.removeClass("glyphicon glyphicon-remove");
            cpSalleInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
	
	/* Fonction pour vérifier et valider l'adresse */
    function validateAdresse() {
        if (!adresseSalle.val().match(/^[0-9]{1,5}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)+$/i)) {
            adresseSalleInfo.removeClass("glyphicon glyphicon-ok");
            adresseSalleInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            adresseSalleInfo.removeClass("glyphicon glyphicon-remove");
            adresseSalleInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }

	/* Fonction pour vérifier et valider la ville */
    function validateVilleSalle() {
        if (!villeSalle.val().match(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.]{1,})*$/i)) {
            villeSalleInfo.removeClass("glyphicon glyphicon-ok");
            villeSalleInfo.addClass("glyphicon glyphicon-remove");
            return false;
        } else {
            villeSalleInfo.removeClass("glyphicon glyphicon-remove");
            villeSalleInfo.addClass("glyphicon glyphicon-ok");
            return true;
        }
    }
	
	/* Fonction pour vérifier et valider la description de la salle */
    function validateDescriptionSalle() {

        var nombreCaractere = $(descriptionSalle).val().length;
        var nombreCaractere = 255 - nombreCaractere;

        var msg = nombreCaractere + ' caractère(s) restant(s)';
        descriptionSalleInfo.text(msg);


        if (nombreCaractere < 0) {
            descriptionSalleInfo.css('color', 'red');
            return false;
        } else {
            descriptionSalleInfo.css('color', 'black');
            return true;

        }
    }
});

