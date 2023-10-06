<!DOCTYPE html>
<html>
<head>
    <title>Carte des futures pistes</title>
    <!-- Inclure les feuilles de style de Leaflet -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />
</head>
<body style="margin:0%">
    <!-- Créer un conteneur pour la carte -->
    <div id="map" style="height: 100vh; widht:100vw;"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // carte de Paris
        var map = L.map('map').setView([48.8566, 2.3522], 12);

        //e+ couche de carte OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Récupération toutes les données des voies depuis l'API
        var limit = 99; 
        var offset = 0; 
        var allVoies = [];

        function fetchAllVoies() {
            fetch(`https://opendata.paris.fr/api/explore/v2.1/catalog/datasets/plan-velo-2026/records?limit=${limit}&offset=${offset}`)
                .then(response => response.json())
                .then(data => {
                    var voies = data.results;
                    allVoies = allVoies.concat(voies); // Ajouter les nouvelles données à la liste existante

                    if (voies.length === limit) {
                        // Si le nombre de résultats est égal à la limite, il peut y avoir plus de données à récupérer
                        offset += limit;
                        fetchAllVoies(); // Effectuer une autre requête
                    } else {
                        // Toutes les données ont été récupérées
                        processVoies(allVoies);
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
        }

        function processVoies(voies) {
            voies.forEach(function (voie) {
                var coordinates = voie.geo_shape.geometry.coordinates;
                var name = voie.reseau;
                var statut = voie.statut;

                // Couleur en fonction du statut et du réseau
                var color;
                if (statut === "à réaliser") {
                    color = 'green'; // Vert pour "à réaliser"
                } else {
                    color = 'blue'; // Couleur par défaut (bleu) pour les autres cas
                }

                // Marqueur personnalisé avec une info-bulle
                var polyline = L.polyline(coordinates.map(coord => [coord[1], coord[0]]), { color: color })
                    .bindPopup("<b>Réseau:</b> " + name + "<br><b>Statut:</b> " + statut)
                    .addTo(map);
            });
        }

        fetchAllVoies(); 
    </script>
</body>
</html>
