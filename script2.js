const track = document.querySelector('.carousel-track');
const images = document.querySelectorAll('.carousel-image');
const prevButton = document.querySelector('.carousel-button-left');
const nextButton = document.querySelector('.carousel-button-right');

let currentIndex = 5;

// Clone images for infinite scrolling
const cloneFirst = images[0].cloneNode(true);
const cloneLast = images[images.length - 1].cloneNode(true);
track.appendChild(cloneFirst);
track.insertBefore(cloneLast, images[0]);

function updateCarousel() {
    const width = images[0].clientWidth;
    track.style.transition = 'transform 0.2s ease-in-out';
    track.style.transform = `translateX(-${(currentIndex + 1) * width}px)`;
}

function showNextImage() {
    const width = images[0].clientWidth;
    currentIndex++;
    updateCarousel();

    // Reset position for infinite scrolling
    if (currentIndex >= images.length) {
        setTimeout(() => {
            track.style.transition = 'none';
            currentIndex = 0;
            track.style.transform = `translateX(-${(currentIndex + 1) * width}px)`;
        }, 500);
    }
}

function showPrevImage() {
    const width = images[0].clientWidth;
    currentIndex--;
    updateCarousel();

    // Reset position for infinite scrolling
    if (currentIndex < 0) {
        setTimeout(() => {
            track.style.transition = 'none';
            currentIndex = images.length - 1;
            track.style.transform = `translateX(-${(currentIndex + 1) * width}px)`;
        }, 500);
    }
}

nextButton.addEventListener('click', showNextImage);
prevButton.addEventListener('click', showPrevImage);

// Automatic scrolling
setInterval(showNextImage, 3000);

// Initialize position
window.addEventListener('load', () => {
    const width = images[0].clientWidth;
    track.style.transform = `translateX(-${width}px)`;
});

window.addEventListener('resize', () => {
    const width = images[0].clientWidth;
    track.style.transition = 'none';
    track.style.transform = `translateX(-${(currentIndex + 1) * width}px)`;
});

// Clone images for seamless looping
images.forEach(image => {
    const clone = image.cloneNode(true);
    track.appendChild(clone);
});