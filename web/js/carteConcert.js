$(document).ready(function() {

//on recupere les donnees de la base de données que l'on avait placées dans la balise input hidden concertCarte
    var txt = $('#concertCarte').val();
    //comme c'est le format json_encode, on utilise la fonction JSON.parse afin d'obtenir un objet manipulable avec notre js
    var concertCarte = JSON.parse(txt);
    //on initialise deux tableaux qui vont nous servir a stocker les coordonnees des salles qu'on a recuperées juste avant (celles où il y un concert)
    var lon = new Array();
    var lat = new Array();

//on recupere les dimensions de notre carte afin de pouvoir adapter notre fonction d'interpolation
    var imageMap = document.getElementById("map");
    var mapWidth = imageMap.clientWidth;
    var mapHeight = imageMap.clientHeight;

//    MAP_WIDTH = 532.7;
//    MAP_HEIGHT = 420.7;

    /* La fonction gps2pixel va permettre de convertir les coordonnees GPS recuperees dans notre base de donnees en position en pixel relatives à la taille de la carte */
    var coinHautGauche = {lat: 48.899947, long: 2.245588}; // Correspond aux coordonnées gps de notre image de Paris dans le coin haut gauche
    var coinBasDroit = {lat: 48.817377, long: 2.418537}; // Correspond aux coordonnées gps de notre image de Paris dans le coin bas droit

    function gps2pixel(lat, long) {
        return {
            x: Math.round(mapWidth * (long - coinHautGauche.long) / (coinBasDroit.long - coinHautGauche.long)),
            y: Math.round(mapHeight * (lat - coinHautGauche.lat) / (coinBasDroit.lat - coinHautGauche.lat))
        };
    }

//tant qu'il y des salles dans notre tableau, on va recuperer leurs coordonnees, les convertir et les stocker
//on recupere aussi les infos qu'on veut afficher ensuite
//et afficher des images par dessus notre carte
    for (var i = 0; i < concertCarte.length; i++) {
        lat[i] = concertCarte[i].latitude;
        lon[i] = concertCarte[i].longitude;
        salle = concertCarte[i].nomSalle;
        adresse = concertCarte[i].adresseSalle;
        artiste = concertCarte[i].nomArtiste;
        nsalle = concertCarte[i].nSalle;
		
        var tmp = gps2pixel(lat[i], lon[i]);
        lon[i] = tmp.x;
        lat[i] = tmp.y;

//on recupere le noeud qui nous interesse a savoir la div qui contient notre carte afin de raccrocher une image que l'on va cree a l'endroit ou il a un concert sur notre carte
        var div = document.getElementById("mapContainer");
        var img = document.createElement("img");
        var a = document.createElement("a");
        var span = document.createElement("span");
        
        
        a.setAttribute("href", "salle.php?tmp=" + nsalle);
		a.setAttribute("title", "La salle : " + salle + "\nL'adresse : " + adresse + "\nL'artiste qui y participe : "+ artiste + "\nCliquez pour voir la salle où se situe le concert");
		
           
        img.setAttribute("src", "web/image/carte/etoile.svg");
        //img.setAttribute("onmouseover", "alert('" + salle + adresse + artiste + "')");
        img.setAttribute("style", "position:absolute; top:" + lat[i] + "px;left:" + lon[i] + "px; height:4%; width:4%;");
        div.appendChild(a);
        a.appendChild(img);

        

    }

});