// Open fullscreen preview
function openPreview(imageElement) {
    const preview = document.getElementById('preview');
    const previewImage = document.getElementById('previewImage');
    previewImage.src = imageElement.src.replace('googlealbum_compressed/', 'googlealbum/');
    preview.style.display = 'flex';
}

// Close fullscreen preview
function closePreview() {
    document.getElementById('preview').style.display = 'none';
}

// Close preview on Escape key
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') closePreview();
});

// Load more images
let offset = 0; // Start from the first image
const limit = 20; // Always load 20 images per request

function loadMoreImages() {
    const grid = document.getElementById('imageGrid');
    const loadMoreButton = document.getElementById('loadMore');

    // Disable the button while loading
    loadMoreButton.disabled = true;
    loadMoreButton.textContent = 'Loading...';

    // Fetch the next set of images
    fetch(`load_images.php?offset=${offset}&limit=${limit}`)
        .then((response) => response.text())
        .then((data) => {
            // Append the new images to the grid
            const parser = new DOMParser();
            const newElements = parser.parseFromString(data, 'text/html').querySelectorAll('.media');
            newElements.forEach((element) => grid.appendChild(element));

            // Update the offset
            offset += limit; // Increment the offset by the limit

            // Remove the "Load More" button if no more images are available
            if (newElements.length === 0) {
                loadMoreButton.remove();
            } else {
                // Re-enable the button
                loadMoreButton.disabled = false;
                loadMoreButton.textContent = 'Load More';
            }
        })
        .catch((error) => {
            console.error('Error loading images:', error);
            loadMoreButton.disabled = false;
            loadMoreButton.textContent = 'Load More';
        });
}