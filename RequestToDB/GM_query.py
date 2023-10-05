import requests
import json
import os
from dotenv import load_dotenv

load_dotenv()
API_KEY = os.getenv('API_KEY')

search_text = str(input())

CityName = "Paris"

url = f'https://api.openrouteservice.org/geocode/search?api_key={API_KEY}&text={search_text},{CityName}'
print(url)
response = requests.get(url)
data = response.json()  

if 'features' in data and data['features']:
    coordinates = data['features'][0]['geometry']['coordinates']
    longitude, latitude = coordinates  
    print(f"Latitude : {latitude}")
    print(f"Longitude : {longitude}")
    print(latitude,longitude)
else:
    print("Aucune coordonnée trouvée dans la réponse.")


headers = {
    'Accept': 'application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8',
}
# start = string(input())
start = f"{longitude},{latitude}"  # Coordonnées de base
end = f"{longitude},{latitude}" # Coordonnées de fin
call = requests.get(f'https://api.openrouteservice.org/v2/directions/cycling-road?api_key={API_KEY}&start='+start+'&end='+end, headers=headers)

#print(call.status_code, call.reason)
#print(call.text)

#call = requests.get(f'https://api.openrouteservice.org/geocode/search?api_key={API_KEY}&text=kirane\'s', headers=headers)
print(call.status_code, call.reason)
print(call.text)

