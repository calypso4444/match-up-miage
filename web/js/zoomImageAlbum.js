/* Ce JavaScript va permettre d'ajouter un effet de zoom sur les images des albums de l'artiste et de la salle */
  $(document).ready(function(){
    $('.img-zoom').hover(function() {
        $(this).addClass('transition');
 
    }, function() {
        $(this).removeClass('transition');
    });
  });
