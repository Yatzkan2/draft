<?php
$imageUrl = 'https://cdn2.vectorstock.com/i/1000x1000/23/81/default-avatar-%20profile-icon-vector-18942381.jpg';  // Replace with your image URL
$destination = 'images/';  // Replace with your desired destination folder

// Ensure the destination folder exists
if (!file_exists($destination)) {
    mkdir($destination, 0777, true);
}

// Extract the image file name from the URL
$imageFileName = basename($imageUrl);

// Create the complete path to save the image
$filePath = $destination . $imageFileName;

// Download the image and save it to the server
if (file_put_contents($filePath, file_get_contents($imageUrl))) {
    echo "Image saved successfully!";
} else {
    echo "Failed to save the image.";
}
?>
