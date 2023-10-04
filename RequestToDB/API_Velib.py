import requests


url = 'https://api.velib-metropole.fr/api/2/stations'


params = {
    'contract': 'Paris',  
}



response = requests(url,params=params)

if response.status_code == 200:
    data = response.json()
    total = data['total']
    stations = data['records']

    print(f"Nombre total de stations Velib : {total}\n")

    for station in stations:
        name = station['name']
        capacité = station['capacity']
        num_docks_dispo = station['numdocksavailable']
        num_vélo_dispo = station['numbikesavailable']
        coord_geo = station['coordonnees_geo']
        print(f"Nom de la station : {name}")
        print(f"Capacité totale : {capacité}")
        print(f"Nombre de docks disponibles : {num_docks_dispo}")
        print(f"Nombre de vélos disponibles : {num_vélo_dispo}")
        print(f"Coordonnées géographiques : Latitude {coord_geo['lat']}, Longitude {coord_geo['lon']}")
        print("\n")

else:
    print(f"Erreur de requête : {response.status_code}")
