import sys
from jsmin import jsmin

input_file = 'c:/Users/sivak/Documents/code/sk-profile/js/site.js'
output_file = 'c:/Users/sivak/Documents/code/sk-profile/js/site.min.js'

with open(input_file, 'r', encoding='utf-8') as f:
    js = f.read()

minified = jsmin(js)

with open(output_file, 'w', encoding='utf-8') as f:
    f.write(minified)

print(f"Minified JS written to {output_file}")
