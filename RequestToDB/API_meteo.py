import mysql.connector
from mysql.connector import Error


from contextlib import closing
from urllib.request import urlopen
import dateutil.parser
import json

with closing(urlopen('https://api.meteo-concept.com/api/forecast/daily/0?token=7acb5a0a8b659ae184e26db5aab6f5f622e46d9ff7e53ee8e5e0e0b4942deae7&insee=75056')) as f:
    decoded = json.loads(f.read())
    (city,forecast) = (decoded[k] for k in ('city','forecast'))

    print(u"Aujourd'hui à {}, on prévoit {}mm (pas plus de {}mm en tous cas) de précipitations.".format(city['name'], forecast['rr10'], forecast['rr1']))
    print(u"il y a une probabilité de pleuvoir de {} % et de neigé de {} %".format(forecast['probarain'],forecast['probafrost']))
