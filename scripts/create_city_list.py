from os.path import join, dirname
from watson_developer_cloud import AlchemyLanguageV1
import ast
import json

#open the text file for reading only
with open('keywords.txt', 'r') as f:
       s = f.read()
       keywords = ast.literal_eval(s)

alchemy_language = AlchemyLanguageV1(api_key='0e37247a7b700bf3e007c800b7a3ad3116b57fd1')

text_input='I want to travel to a place that has gambling, bicycle riding, and soccer.'

combined_operations = ['entity', 'keyword']
json_object=alchemy_language.combined(text_input, extract=combined_operations)
full_text=json.dumps(alchemy_language.combined(text_input, extract=combined_operations), indent=2)
print(full_text)
print(json_object['entities'][0]['type'])

suggestion_list=[]

#check if they wrote any cities add those cities to the list
for item in json_object["entities"]:
	if item['type']=='City':
		suggestion_list.append(item['text'])

for item in json_object["keywords"]:
	print(item['text'])
	if item['text'] in keywords: 
		for city_index in keywords[item['text']]:
			suggestion_list.append(city_index)

with open ('cities.txt','w') as file:
	for item in suggestion_list:
		file.write(str(item))
		file.write('\n')
