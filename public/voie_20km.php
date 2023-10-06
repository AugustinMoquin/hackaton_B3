<!DOCTYPE html>
<html>
<head>
    <title>Carte des Stations Velib</title>
    <!-- Inclure les feuilles de style de Leaflet -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />
    <style>
        /* Définissez une hauteur et une largeur pour le conteneur de la carte */
        #map {
            height: 100vh;
            width: 100vw;
        }
    </style>
</head>
<body style="margin:0%">
    <!-- Créer un conteneur pour la carte -->
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var stations = [];

        var map = L.map('map').setView([48.8566, 2.3522], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function fetchAllStations() {
            var limit = 99; 
            var offset = 0; 
            var allStations = [];

            function fetchStations() {
                fetch(`https://opendata.paris.fr/api/explore/v2.1/catalog/datasets/zones-de-rencontre/records?limit=${limit}&offset=${offset}`)
                .then(response => response.json())
                .then(data => {
                    var stationsChunk = data.results; 
                    allStations = allStations.concat(stationsChunk); 

                    if (stationsChunk.length === limit) {
                        
                        offset += limit;
                        fetchStations(); 
                    } else {
                        
                        stations = allStations; 
                        processStations(stations);
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
            }

            fetchStations(); 
        }

        function processStations(stations) {
            
            stations.forEach(function(station) {
                var lat = parseFloat(station.geo_point_2d.lat);
                var lon = parseFloat(station.geo_point_2d.lon);
                var name = station.nom_zca;
                var capacity = station.capacity;
                var num_docks_dispo = station.numdocksavailable;
                var num_velo_dispo = station.numbikesavailable;

                // Créez un polygone autour de la station
                var polygon = L.polygon([
                    [lat - 0.001, lon - 0.001],
                    [lat + 0.001, lon - 0.001],
                    [lat + 0.001, lon + 0.001],
                    [lat - 0.001, lon + 0.001]
                ]).addTo(map);

                polygon.bindPopup("<b>" + name + "</b><br>zone 20kmh ");
            });
        }

        fetchAllStations(); 
    </script>
</body>
</html>
