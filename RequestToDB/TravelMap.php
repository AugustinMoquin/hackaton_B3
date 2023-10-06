<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>

<body>
    <header>
    </header>

    <?php
    $env = parse_ini_file('.env');
    $API = $API["API_KEY"];

    $mapVisible = false; // Variable pour contrôler la visibilité de la carte
    $map1Visible = true;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $search_text = $_POST['Destination'];
        $encoded_search_text = urlencode($search_text);
        $CityName = "Paris";
        $url = "https://api.openrouteservice.org/geocode/search?api_key={$API}&text={$encoded_search_text},{$CityName}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['features']) && !empty($data['features'])) {
            $coordinates = $data['features'][0]['geometry']['coordinates'];
            $longitude = $coordinates[0];
            $latitude = $coordinates[1];
        } else {
            echo "Aucune coordonnée trouvée pour la destination.<br>";
        }

        $search_text2 = $_POST['Depart'];
        $encoded_search_text2 = urlencode($search_text2);
        $url2 = "https://api.openrouteservice.org/geocode/search?api_key={$API}&text={$encoded_search_text2},{$CityName}";
        $response2 = file_get_contents($url2);
        $data2 = json_decode($response2, true);

        if (isset($data2['features']) && !empty($data2['features'])) {
            $coordinates2 = $data2['features'][0]['geometry']['coordinates'];
            $longitude2 = $coordinates2[0];
            $latitude2 = $coordinates2[1];
        } else {
            echo "Aucune coordonnée trouvée pour le départ.<br>";
        }

        $headers = 'Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8';

        $start = "{$longitude2},{$latitude2}";  // Coordonnées de départ
        $end = "{$longitude},{$latitude}"; // Coordonnées de destination

        $call = file_get_contents("https://api.openrouteservice.org/v2/directions/cycling-road?api_key={$API}&start={$start}&end={$end}&instructions=true", false, stream_context_create(['http' => ['header' => $headers]]));
        //echo $call;
        
        // Imprime le résultat si erreur 
        //echo "<br>Status code: " . $http_response_header[0] . "<br>";
        //
        
        //
        // Récupère les coordonnées du trajet
        $dataRoute = json_decode($call, true);
        $routeCoordinates = $dataRoute['features'][0]['geometry']['coordinates'];
        // Inverse les coordonnées de longitude et latitude dans $routeCoordinates
for ($i = 0; $i < count($routeCoordinates); $i++) {
    // Échange les valeurs de longitude et latitude
    $temp = $routeCoordinates[$i][0]; // Stocke la longitude temporairement
    $routeCoordinates[$i][0] = $routeCoordinates[$i][1]; // Remplace la longitude par la latitude
    $routeCoordinates[$i][1] = $temp; // Remplace la latitude par la longitude
}
        $segments = $dataRoute['features'][0]['properties']['segments'];

if (isset($segments) && !empty($segments)) {
    echo "<div style = \"position:relative\">";
    echo "<div style=\"display: flex; z-index:2;position:absolute;margin-top: 5%;background-color: white;border-radius: 25px;\">";
    echo "Instructions de l'itinéraire :";
    echo "<br>";
    foreach ($segments[0]['steps'] as $step) {
        $instruction = $step['instruction'];
        echo "- $instruction<br>";
    }
} else {
    echo "Aucune instruction trouvée pour cet itinéraire.<br>";
}
    echo "</div>";

        // Affiche la carte
        $mapVisible = true;
        $map1Visible= false;
    }
    
    ?>
        <?php if ($map1Visible) { 
        
    ?>
    
        <!-- Créer un conteneur pour la carte -->
    <div id="map" style="height: 100vh; widht:100vw; z-index:0" class ="removable"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
     
        var map = L.map('map').setView([48.8566, 2.3522], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        </script>
     <?php } ?>
    
    <!-- Afficher la carte si le formulaire a été soumis -->
    <?php if ($mapVisible) { 
        
    ?>

        <div id="map2" style="width: 100%; height: 800px; position: absolute; outline: none;z-index: 1;"></div>
        <script>
            // Créez une carte Leaflet centrée sur le trajet
            var map = L.map('map2').setView([<?php echo ($latitude + $latitude2) / 2; ?>, <?php echo ($longitude + $longitude2) / 2; ?>], 10);

            // Ajoutez une couche de carte OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Créez une ligne pour représenter le trajet
            var routeCoordinates = <?php echo json_encode($routeCoordinates); ?>;
            var route = L.polyline(routeCoordinates, { color: 'blue' }).addTo(map);
            var bounds = route.getBounds();
            //map.fitBounds(bounds);
            // Ajoutez des marqueurs de départ et d'arrivée
            L.marker([<?php echo $latitude2; ?>, <?php echo $longitude2; ?>]).addTo(map).bindPopup("Départ");
            L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]).addTo(map).bindPopup("Arrivée");
        </script>
    <?php } ?>
    </div>
    <form action="" method="post" enctype="multipart/form-data" style="position: absolute; left: 85%;top: 10%;">
        <div>
        <p style="position: relative;bottom:30%;z-index: 2;">
            <input type="text" name="Depart" style="height: 100%;border-color:black" placeholder = "Depart">
            <br>
            <br>
            <input type="text" name="Destination" style="height: 100%;border-color:black" placeholder ="Destination">
        </p>
        <input type="submit" value="➡" style="position: relative;bottom:30%;z-index: 2;">
        </div>
    </form>
</body>

</html>