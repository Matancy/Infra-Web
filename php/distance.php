<?php
    function distance($lat1, $lon1) {
        $lat2 = 37.259845;
        $lon2 = -115.820513;
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $resultat = $dist * 60 * 1.1515/* * 1.609344 pour les km*/;
        return ($resultat);
    }
?>