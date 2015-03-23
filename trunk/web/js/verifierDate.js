  /* Ce JS a pour but d'afficher un calendrier en français. 
	Le gérant de la salle pourra alors indiqué la date à 
	laquelle il souhaite proposer un concert à l'artiste .*/

$(document).ready(function() {
    $('#datepicker').datepicker({
	    dateFormat : 'dd/mm/yy',
	  minDate : 0,
	  altField: "#datepicker",
	  closeText: 'Fermer',
	  prevText: 'Précédent',
	  nextText: 'Suivant',
	  currentText: 'Aujourd\'hui',
	  monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
	  monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
	  dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
	  dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
	  dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
	  weekHeader: 'Sem.',
	  dateFormat : 'dd/mm/yy',				
     });
});