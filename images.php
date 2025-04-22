<?php
$maximages = 50; // Number of images to load per request
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllJuicePics</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="grid" id="imageGrid">
        <?php include './load_images.php'; // Load the first set of images ?>
    </div>

    <button id="loadMore" onclick="loadMoreImages()">Load More</button>

    <!-- Fullscreen Preview Modal -->
    <div id="preview" class="preview">
        <span class="close" onclick="closePreview()">&times;</span>
        <img id="previewImage" src="" alt="Preview">
    </div>

    <script src="script.js"></script>
</body>

</html>