<!DOCTYPE html>
<html>
<head>
    <title>Carte des Stations Velib</title>
    <!-- Inclure les feuilles de style de Leaflet -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />
</head>
<body>
    <!-- Créer un conteneur pour la carte -->
    <div id="map" style="height: 500px;"></div>

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
                fetch(`https://opendata.paris.fr/api/explore/v2.1/catalog/datasets/velib-disponibilite-en-temps-reel/records?limit=${limit}&offset=${offset}`)
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
                var lat = station.coordonnees_geo.lat;
                var lon = station.coordonnees_geo.lon;
                var name = station.name;
                var capacity = station.capacity;
                var num_docks_dispo = station.numdocksavailable;
                var num_vélo_dispo = station.numbikesavailable;

                // marqueur personnalisé info-bulle
                var marker = L.marker([lat, lon]).addTo(map);
                marker.bindPopup("<b>" + name + "</b><br>Capacité : " + capacity + "<br>Docks disponibles : " + num_docks_dispo + "<br>Vélos disponibles : " + num_vélo_dispo);
            });
        }

        fetchAllStations(); 
    </script>
</body>
</html>
