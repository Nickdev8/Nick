import os
from PIL import Image

def compress_image(source_path, destination_path, quality=75):
    try:
        with Image.open(source_path) as img:
            # Convert PNG to RGB to avoid issues with transparency
            if img.mode in ("RGBA", "P"):
                img = img.convert("RGB")
            img.save(destination_path, "JPEG", quality=quality)
            print(f"Compressed: {source_path} -> {destination_path}")
    except Exception as e:
        print(f"Failed to compress {source_path}: {e}")

def compress_images_in_directory(source_dir, destination_dir, quality=75):
    if not os.path.exists(source_dir):
        print(f"Source directory does not exist: {source_dir}")
        return

    if not os.path.exists(destination_dir):
        os.makedirs(destination_dir)

    for root, _, files in os.walk(source_dir):
        for file in files:
            ext = file.lower().split('.')[-1]
            if ext in ['jpg', 'jpeg', 'png', 'gif']:
                source_path = os.path.join(root, file)
                relative_path = os.path.relpath(source_path, source_dir)
                destination_path = os.path.join(destination_dir, relative_path)

                # Ensure destination subdirectories exist
                os.makedirs(os.path.dirname(destination_path), exist_ok=True)

                compress_image(source_path, destination_path, quality)

if __name__ == "__main__":
    source_directory = "./googlealbum"  # Source directory containing images
    destination_directory = "./googlealbum_compressed"  # Destination for compressed images
    compression_quality = 75  # Compression quality (0-100, higher is better quality)

    compress_images_in_directory(source_directory, destination_directory, compression_quality)
    print(f"Image compression completed. Compressed images are in: {destination_directory}")