<?php

class Data {

    public static function getPlayerVideo($url_video) {
        //afin d'avoir uniquement l'id de la video, return la balise iframe
        $parseUrl = parse_url($url_video);
        if (isset($parseUrl['query'])) {
            $query = explode('=', $parseUrl['query'])[1];
            return '<iframe width="800" height="500" src="https://www.youtube.com/embed/'.$query.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        } else {
            return '';
        }
    }

    public static function getMapsModal($addr, $city, $zip) {
        $geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
        $adresse = $addr;
        $adresse .= ', '.$zip;
        $adresse .= ', '.$city;

        // Requête envoyée à l'API Geocoding
        $query = sprintf($geocoder, urlencode(utf8_encode($adresse)));

        $result = json_decode(file_get_contents($query));

        $json = isset($result->results[0]) ? $result->results[0] : null;
        $lat = isset( $json->geometry->location->lat) ? (string) $json->geometry->location->lat : null;
        $lng = isset( $json->geometry->location->lng) ? (string) $json->geometry->location->lng : null;

        return "<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href='emg.com/fr'>https://embedgooglemaps.com/fr/</a></small></div><div><small><a href='http://botonmegusta.org/'>fb agregar</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(".$lat.",".$lng."),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(48.849145,2.389659100000017)});infowindow = new google.maps.InfoWindow({content:'<strong>Titre</strong><br>242 rue du faubourg saint antoine<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>";
    }
}
