<?php
$url = 'https://api.velib-metropole.fr/api/2/stations';

$params = [
    'contract' => 'Paris',
];

//  requête HTTP
$response = file_get_contents($url . '?' . http_build_query($params));

if ($response !== false) {
    $data = json_decode($response, true);
    
    if ($data !== null && isset($data['total'], $data['records'])) {
        $total = $data['total'];
        $stations = $data['records'];

        echo "Nombre total de stations Velib : $total\n\n";

        foreach ($stations as $station) {
            $name = $station['name'];
            $capacity = $station['capacity'];
            $num_docks_dispo = $station['numdocksavailable'];
            $num_vélo_dispo = $station['numbikesavailable'];
            $coord_geo = $station['coordonnees_geo'];

            echo "Nom de la station : $name\n";
            echo "Capacité totale : $capacity\n";
            echo "Nombre de docks disponibles : $num_docks_dispo\n";
            echo "Nombre de vélos disponibles : $num_vélo_dispo\n";
            echo "Coordonnées géographiques : Latitude {$coord_geo['lat']}, Longitude {$coord_geo['lon']}\n\n";
        }
    } else {
        echo "Erreur : Les données JSON de l'API sont mal formatées.\n";
    }
} else {
    echo "Erreur de requête HTTP : Impossible de récupérer les données de l'API.\n";
}
?>
