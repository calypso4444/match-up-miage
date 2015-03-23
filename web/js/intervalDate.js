  /* Ce JS a pour but d'afficher un calendrier en français. 
	L'utilisateur pourra alors indiqué la date de début ainsi que 
	la date de fin. Il y aura alors une vérification avec l'interval
	entre la date de début et de fin.*/ 
  
  $(function() {
    $( "#from" ).datepicker({
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
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
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
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });