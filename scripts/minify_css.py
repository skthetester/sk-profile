import sys
from csscompressor import compress

input_file = 'c:/Users/sivak/Documents/code/sk-profile/style.css'
output_file = 'c:/Users/sivak/Documents/code/sk-profile/style.min.css'

with open(input_file, 'r', encoding='utf-8') as f:
    css = f.read()

minified = compress(css)

with open(output_file, 'w', encoding='utf-8') as f:
    f.write(minified)

print(f"Minified CSS written to {output_file}")
