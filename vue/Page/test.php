<?php 

$adresse="90, rue de Tolbiac paris 75013";

function getXmlCoordsFromAdress($address) {
    $coords = array();
    $base_url = "http://maps.googleapis.com/maps/api/geocode/xml?";
// ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
    $request_url = $base_url . "address=" . urlencode($address) . '&sensor=false';
    $xml = simplexml_load_file($request_url) or die("url not loading");
//print_r($xml);
    $coords['lat'] = $coords['lon'] = '';
    $coords['status'] = $xml->status;
    if ($coords['status'] == 'OK') {
        $coords['lat'] = $xml->result->geometry->location->lat;
        $coords['lon'] = $xml->result->geometry->location->lng;
    }
    return $coords;
}

$coords=getXmlCoordsFromAdress($adresse);
echo $coords['status']." ".$coords['lat']." ".$coords['lon'];

?>