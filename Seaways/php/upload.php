<?php
// Example database connection code
$hostname = "localhost"; // Change this to your actual hostname
$username = "roots"; // Change this to your actual username
$password = "1234"; // Change this to your actual password
$database = "seaways"; // Change this to your actual database name

// Create a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle file upload
    $targetDirectory = "C:/XAMPP/cgi-bin/";
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        
        // Store file information in the database
        $filename = basename($_FILES["fileToUpload"]["name"]);
        $description = $_POST["fileDescription"];

        $insertQuery = "INSERT INTO documents (filename, description) VALUES ('$filename', '$description')";
        if (mysqli_query($connection, $insertQuery)) {
            echo "File information has been stored in the database.";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close the database connection
mysqli_close($connection);
?>