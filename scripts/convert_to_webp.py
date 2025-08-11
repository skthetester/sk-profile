import sys
from pathlib import Path
from PIL import Image

def convert_to_webp(image_path):
    image_path = Path(image_path)
    if not image_path.exists():
        print(f"File not found: {image_path}")
        return
    output_path = image_path.with_suffix('.webp')
    try:
        with Image.open(image_path) as img:
            img.save(output_path, 'webp')
        print(f"Converted {image_path} to {output_path}")
    except Exception as e:
        print(f"Error converting {image_path}: {e}")

def main():
    if len(sys.argv) != 2:
        print("Usage: python convert_to_webp.py <image_path>")
        sys.exit(1)
    image_path = sys.argv[1]
    convert_to_webp(image_path)

if __name__ == "__main__":
    main()
