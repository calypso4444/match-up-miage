/* Cette fonction a pour but d'afficher une petite map au niveau de la page d'une salle
	Les informations seront récupérées au préalable pour ensuite être afficher directement
	dans une info bulle */

$(document).ready(function() {

    var adresseE = $("#adresseE").val();
    var nomSalle = $("#nomSalle").val();
    var adresse = $("#adresse").val();
    var ville = $("#ville").val();
    var codepostal = $("#codepostal").val();
    var tel = $("#tel").val();


    $("#map-canvas").gmap3({
        marker: {
            values: [
                {address: adresseE, data: nomSalle + "<br/>" + adresse + "<br/>" + codepostal + "<br/>" + ville + "<br/>" + tel}
            ],
            options: {
                draggable: false
            },
            getlatlng: {
                address: adresseE,
                callback: function(results) {
                    if (!results)
                        return;
                    var lat = results[0].geometry.location;
                    alert(lat);
                }
            },
            events: {
                mouseover: function(marker, event, context) {
                    var map = $(this).gmap3("get"),
                            infowindow = $(this).gmap3({get: {name: "infowindow"}});
                    if (infowindow) {
                        infowindow.open(map, marker);
                        infowindow.setContent(context.data);
                    } else {
                        $(this).gmap3({
                            infowindow: {
                                anchor: marker,
                                options: {content: context.data}
                            }
                        });
                    }
                },
                mouseout: function() {
                    var infowindow = $(this).gmap3({get: {name: "infowindow"}});
                    if (infowindow) {
                        infowindow.close();
                    }
                }
            }
        },
        map: {
            options: {
                zoom: 14
            }
        }
    });
});