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
$username = $_POST['username'];
$password = $_POST['password'];
$Admin = $_POST['Admin'];
$contractType = $_POST['contractType'];
$contractEnd = $_POST['contractEnd'];

// Check if the username already exists
$checkUsernameQuery = "SELECT * FROM seafarers_login WHERE username = '$username'";
$checkResult = mysqli_query($connection, $checkUsernameQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Username already exists, display an error message
    echo "Username '$username' already exists. Please choose a different username.";
} else {
    // Username is unique, proceed with registration

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert a new seafarer into the table
    $insertQuery = "INSERT INTO seafarers_login (username, password, Admin, contractType, contractEnd) 
                    VALUES ('$username', '$hashedPassword', '$Admin', '$contractType', '$contractEnd')";

    // Execute the SQL query
    if (mysqli_query($connection, $insertQuery)) {
        $successMessage = "Seafarer registered successfully.";
        echo $successMessage;
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>
