$(document).ready(function() {
    var txt = $('#concertCarte').val();
    var concertCarte = JSON.parse(txt);
    var lon = new Array();
    var lat = new Array();
    var canvas = $("#map")[0];
    var context = canvas.getContext("2d");
    var img = new Image();   // Crée un nouvel objet Image
    img.src = 'web/image/carte/map.svg'; // Définit le chemin vers sa source

    MAP_WIDTH = 532.7;
    MAP_HEIGHT = 420.7;
    mapWidth = 299;
    mapHeight = 149;

    /* La fonction gps2pixel va permettre de  */
    var coinHautGauche = {lat: 48.899947, long: 2.245588}; // Correspond aux coordonnées gps de notre image de Paris dans le coin haut gauche
    var coinBasDroit = {lat: 48.817377, long: 2.418537}; // Correspond aux coordonnées gps de notre image de Paris dans le coin bas droit

    function gps2pixel(lat, long) {
        return {
            x: Math.round(mapWidth * (long - coinHautGauche.long) / (coinBasDroit.long - coinHautGauche.long)),
            y: Math.round(mapHeight * (lat - coinHautGauche.lat) / (coinBasDroit.lat - coinHautGauche.lat))
        };
    }


    img.onload = function() {
        draw();
    }


    for (var i = 0; i <= concertCarte.length; i++) {
        lon[i] = concertCarte[i].longitude;
        lat[i] = concertCarte[i].latitude;
        var tmp = gps2pixel(lat[i], lon[i]);
        lon[i] = tmp.x;
        lat[i] = tmp.y;
    }


    function draw() {
        var ctx = document.getElementById('map').getContext('2d');
        var etoile = new Image();
        etoile.src = 'web/image/carte/etoile.svg';
        etoile.onload = function() {
            for (var i = 0; i < 7; i++) {
//          	ctx.drawImage(etoile, lon[i], lat[i], 10, 8);
                ctx.fillStyle = "green";
                ctx.fillRect(lon[i], lat[i], 2, 2);
//              star(ctx, tabx[i], taby[i], 4, 4, 0.5);
            }
        }

        /* Permet de déssiner l'étoile */
        function star(ctx, x, y, r, p, m) {
            ctx.save();
            ctx.beginPath();
            ctx.translate(x, y);
            ctx.moveTo(0, 0 - r);
            for (var i = 0; i < p; i++)
            {
                ctx.rotate(Math.PI / p);
                ctx.lineTo(0, 0 - (r * m));
                ctx.rotate(Math.PI / p);
                ctx.lineTo(0, 0 - r);
            }
            ctx.fill();
            ctx.restore();
        }
    }

});
