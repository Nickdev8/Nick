function openPreview(imageElement) {
    const preview = document.getElementById('preview');
    const previewImage = document.getElementById('previewImage');
    const imageSrc = imageElement.src;

    // Replace compressed image path with original image path
    const originalSrc = imageSrc.replace('googlealbum_compressed/', 'googlealbum/');
    previewImage.src = originalSrc;

    preview.style.display = 'flex';
}

function closePreview() {
    const preview = document.getElementById('preview');
    preview.style.display = 'none';
}

// Close the preview when the Escape key is pressed
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closePreview();
    }
});

let offset = 0; // Start from the first image
const limit = 50; // Number of images to load per request
let displayedImages = new Set(); // Track displayed images

function loadMoreImages() {
    const grid = document.getElementById('imageGrid');
    const loadMoreButton = document.getElementById('loadMore');

    // Disable the button while loading
    loadMoreButton.disabled = true;
    loadMoreButton.textContent = 'Loading...';

    // Fetch the next set of images
    fetch(`load_images.php?offset=${offset}&limit=${limit}&displayed=${Array.from(displayedImages).join(',')}`)
        .then(response => response.text())
        .then(data => {
            // Append the new images to the grid
            const parser = new DOMParser();
            const newElements = parser.parseFromString(data, 'text/html').querySelectorAll('.media');
            newElements.forEach((element) => {
                const img = element.querySelector('img');
                if (img) {
                    displayedImages.add(img.src); // Add the image to the displayed set
                }
                grid.appendChild(element);
            });

            // Update the offset
            offset += limit;

            // Remove the "Load More" button if no more images are available
            if (newElements.length === 0) {
                loadMoreButton.remove();
            } else {
                // Re-enable the button
                loadMoreButton.disabled = false;
                loadMoreButton.textContent = 'Load More';
            }
        })
        .catch(error => {
            console.error('Error loading more images:', error);
            loadMoreButton.disabled = false;
            loadMoreButton.textContent = 'Load More';
        });
}