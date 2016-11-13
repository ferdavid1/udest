import json
from os.path import join, dirname
from watson_developer_cloud import AlchemyLanguageV1
import ast
import sys

#open the text file for reading only
with open('keywords.txt', 'r') as f:
       s = f.read()
       keywords = ast.literal_eval(s)
# get the user inputs for city name and url
city_name=input('Enter the city name:')
url=input('Enter url:')

alchemy_language = AlchemyLanguageV1(api_key='0e37247a7b700bf3e007c800b7a3ad3116b57fd1')
try:
	json_object=alchemy_language.combined(url=url, extract='keyword')
except:
	print('ERROR:Invalid url. Exiting.')
	sys.exit()

for item in json_object["keywords"]:
	#check if the keyword has the city name in it
	if city_name not in item['text']:
		#check if this keyword already exists
		if item['text'] not in keywords:
			keywords[item['text']]=[]
		#if this keyword doesn't already have this city
		if city_name not in keywords[item['text']]:
			#add the city name to the list
			keywords[item['text']].append(city_name)

#print(keywords)

keyword_file=open('keywords.txt','w')

keyword_file.write(str(keywords))

