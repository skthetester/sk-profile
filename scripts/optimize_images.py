import os
from PIL import Image

# Directories to optimize
IMG_DIRS = [
    os.path.join('..', 'img'),
    os.path.join('..', 'img', 'uploads')
]

# Supported image extensions
IMAGE_EXTENSIONS = ('.jpg', '.jpeg', '.png')

# Quality for JPEG compression
JPEG_QUALITY = 85

# Max width/height for resizing (set to None to skip resizing)
MAX_SIZE = None  # e.g., (1920, 1080)

def optimize_image(image_path):
    try:
        with Image.open(image_path) as img:
            img_format = img.format
            # Optionally resize
            if MAX_SIZE:
                img.thumbnail(MAX_SIZE, Image.ANTIALIAS)
            # Save optimized
            if img_format == 'JPEG':
                img.save(image_path, 'JPEG', quality=JPEG_QUALITY, optimize=True)
            elif img_format == 'PNG':
                img.save(image_path, 'PNG', optimize=True)
            else:
                # Skip unsupported formats
                return False
        print(f"Optimized: {image_path}")
        return True
    except Exception as e:
        print(f"Failed to optimize {image_path}: {e}")
        return False

def optimize_images_in_dir(directory):
    for root, _, files in os.walk(directory):
        for file in files:
            if file.lower().endswith(IMAGE_EXTENSIONS):
                image_path = os.path.join(root, file)
                optimize_image(image_path)

def main():
    script_dir = os.path.dirname(os.path.abspath(__file__))
    for rel_dir in IMG_DIRS:
        abs_dir = os.path.normpath(os.path.join(script_dir, rel_dir))
        if os.path.exists(abs_dir):
            print(f"Optimizing images in: {abs_dir}")
            optimize_images_in_dir(abs_dir)
        else:
            print(f"Directory not found: {abs_dir}")

if __name__ == "__main__":
    main()
