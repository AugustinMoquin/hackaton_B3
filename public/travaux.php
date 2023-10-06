<!DOCTYPE html>
<html>
<head>
    <title>Carte des Travaux</title>
    <!-- Inclure les feuilles de style de Leaflet -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />
</head>
<body style="margin:0px">
    <!-- Créer un conteneur pour la carte -->
    <div id="map" style="height: 100vh; widht:100vw;"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var travaux = [];

        var map = L.map('map').setView([48.8566, 2.3522], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function fetchAllTravaux() {
            var limit = 50;
            var offset = 0;
            var allTravaux = [];

            function fetchTravaux() {
                fetch(`https://opendata.paris.fr/api/explore/v2.1/catalog/datasets/chantiers-perturbants/records?limit=${limit}&offset=${offset}`)
                .then(response => response.json())
                .then(data => {
                    var travauxChunk = data.results; // Accédez au tableau "results"
                    allTravaux = allTravaux.concat(travauxChunk);

                    if (travauxChunk.length === limit) {
                        offset += limit;
                        fetchTravaux();
                    } else {
                        travaux = allTravaux;
                        processTravaux(travaux);
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des données :', error);
                });
            }

            fetchTravaux();
        }

        function processTravaux(travaux) {
            travaux.forEach(function(travail) {
                var lon = travail.geo_point_2d.lon;
                var lat = travail.geo_point_2d.lat;
                // Le reste de votre code pour créer les marqueurs
                                // Prendre la première coordonnée
                var description = travail.description || "Description non disponible";
                var voie = travail.voie || "Voie non spécifiée";
                var precision_localisation = travail.precision_localisation || "Précision de localisation non spécifiée";
                var impact_circulation = travail.impact_circulation || "Impact de la circulation non spécifié";
                var impact_circulation_detail = travail.impact_circulation_detail || "Détails de l'impact non spécifiés";
                var niveau_perturbation = travail.niveau_perturbation || "Niveau de perturbation non spécifié";
                var statut = travail.statut || "Statut non spécifié";

                // Marqueur personnalisé avec une info-bulle
                var marker = L.marker([lat, lon]).addTo(map);
                marker.bindPopup("<b>Description:</b> " + description + "<br><b>Voie:</b> " + voie + "<br><b>Précision de localisation:</b> " + precision_localisation + "<br><b>Impact de la circulation:</b> " + impact_circulation + "<br><b>Détails de l'impact:</b> " + impact_circulation_detail + "<br><b>Niveau de perturbation:</b> " + niveau_perturbation + "<br><b>Statut:</b> " + statut);
            });
        }

        fetchAllTravaux();
    </script>
</body>
</html>
