<?php
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

// Retrieve registration data from the form
$empID = $_POST['empID'];
$QualificationID = $_POST['QualificationID'];
$primary = $_POST['primary'];
$secondary = $_POST['secondary'];
// SQL query to insert a new seafarer into the table
$insertQuery = "INSERT INTO seafarer_qualifications VALUES ('$QualificationID', '$empID', '$primary', '$secondary')";
// Execute the SQL query
if (mysqli_query($connection, $insertQuery)) {
    $successMessage = "Seafarer registered successfully.";
    echo $successMessage;
} else {
    echo "Error: " . mysqli_error($connection);
}
// Close the database connection
mysqli_close($connection);
?>
