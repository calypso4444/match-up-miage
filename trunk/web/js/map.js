
$(document).ready(function() {	
	var adresse = $("#adresse").val();
	
	$('#map-canvas').gmap3({	
		 marker:{
      address: adresse
          },
    map:{
      options:{
        zoom: 16
      }
    }
		
	});	
});
