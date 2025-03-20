<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the directory where uploaded files will be saved
$targetDir = "uploads/"; // Ensure this directory exists and is writable
$targetFile = $targetDir . basename($_FILES["ebook"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file is a valid format
if (isset($_POST["submit"])) {
    if ($fileType != "pdf" && $fileType != "epub" && $fileType != "mobi") {
        echo "Sorry, only PDF, EPUB & MOBI files are allowed.";
        $uploadOk = 0;
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// If everything is ok, try to upload the file
} else {
    if (move_uploaded_file($_FILES["ebook"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["ebook"]["name"])) . " has been uploaded.";
        // Redirect to library or show a success message
        header("Location: library.html");
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
