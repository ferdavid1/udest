#Pseudocode for the code:
#okay, first things first so what I have to do is to create a menu to see what travel accomadations they would like to have based off of their APIs
#similar to P3 in Sean Davis' ECS 40 class!
#so they have their own custom built library and they work just like the #include "file.h" in C++ and C.
#Step 1: get the city from the SQL file(getCity)
#Show the city information
#   that shows some of the attractions of the city as well.
#note: we are limiting ourselves to the United States   
#Step 2: generate the menu based off of the city they chose

#Begin Code:
import re, itertools
from collections import Counter
import sqlite3
#import pyodbc
#from geopy.distance import great_circle 
import http.client
import urllib
import json
from xml.etree.ElementTree import XML
import xml.dom.minidom
#from geopy.distance import great_circle
#import requests


def MenuDisplay(city):
        print('Congratulations for choosing',city,'! We hope you pick this city as your destination spot.' )
        print('Now, before you make the choice of going on vacation, if you need information, here are your options'
              '1.Cheapest Flights'
              '2.Hotel Reservations\n'
              )
        choice = input('Please select one of the options above:')
        startCity = input("Please select the starting place:")
        endCity = input("Please enter your destination:")
        if choice == 1:
             print('Airport Info:')
            # startCity = input("Please select the starting place:")
             startAir = startAirport(startCity)
             #endCity = input(:"Please enter your destination:")
             endAir = endAirport(endCity)
             FindLowestFairs(startAir,endAir)
             
             
        elif choice == 2:
            print('Hotel Information:')
            FindLowestHotels(endCity)
        
       #end menu function
            
def selectCity(cities):
    city = input("if you would like to have more information about a city, please enter it here:")
    #city_Information(city) #call the city_information from the API 
    MenuDisplay(city)
    
    return 0
def readCitites():
    filename = "cities.txt"
    Cities = tuple(open(filename, "r"))
    printCities(Cities)
def printCitites(cities):
    print ('Congratulations! you have been matched with the following cities' )
    print (*cities)
    selectCity(cities)

#def showLatandLong(city)
 #   print (city.latitude, city.longitude)
#def cityInformation(city)
def StartAirport(startCity):
        conn = httplib.HTTPSConnection("https://sandbox.amadeus.com/travel-innovation-sandbox/apis/get/airports/autocomplete")
        args = urllib.urlencode({'apikey':'0rVN20m0UoLP9Ur9dyKg8MindOEAEtOk', 'term':startCity, 'coutnry':'US', 'all_airports': false})
        x=conn.getresponse()
        return x
    #params = dict{apikey='0rVN20m0UoLP9Ur9dyKg8MindOEAEtOk',latitude = str(city.latitude),longitude=str(city.longitude)};

def EndAirport(endCity):
    
        conn = httplib.HTTPSConnection("https://sandbox.amadeus.com/travel-innovation-sandbox/apis/get/airports/autocomplete")
        args = urllib.urlencode({'apikey':'0rVN20m0UoLP9Ur9dyKg8MindOEAEtOk', 'term':endCity, 'coutnry':'US', 'all_airports': false})
        x=conn.getresponse()
def FindLowestFairs(startAir, endAir):
    departureDate=input("Please enter a departure date(YYYY-MM-DD):")
    conn = httplib.HTTPSConnection("https://sandbox.amadeus.com/travel-innovation-sandbox/apis/get/flights/low-fare-search")
    args = urllib.urlencode({'apikey':'0rVN20m0UoLP9Ur9dyKg8MindOEAEtOk', 'origin':startAir, 'destination':endAir, 'departure_date': departureDate})
    result = conn.getresponse()
    print(result)
def FindLowestHotels(endCity):
    checkinDate= input("Please enter the check in date(YYYY-MM-DD):")
    checkoutDate = input("Please enter the check out date(YYYY-MM-DD):")
    conn = httplib.HTTPSConnection("https://sandbox.amadeus.com/travel-innovation-sandbox/apis/get/hotels/search-circle")
    args.urllib.urlencode({'apikey':'0rVN20m0UoLP9Ur9dyKg8MindOEAEtOk', 'latitude': endCity.latitude, 'longitude': endCity.longitude, 'radius': 42, 'check_in': checkinDate, 'check_out':checkoutDate})
    result = conn.getresponse()
    print(result)
