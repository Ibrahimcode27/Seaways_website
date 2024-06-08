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

// Retrieve the username to be removed from the form
$removeUsername = $_POST['removeUsername'];

// Check if there are personal details associated with the user
$personalDetailsQuery = "SELECT EmpID FROM seafarers_login WHERE username = '$removeUsername'";
$personalDetailsResult = mysqli_query($connection, $personalDetailsQuery);

if ($personalDetailsResult && mysqli_num_rows($personalDetailsResult) > 0) {
    // Fetch the EmpID of the user
    $row = mysqli_fetch_assoc($personalDetailsResult);
    $empID = $row['EmpID'];

    // Check if there are personal details associated with this EmpID
    $detailsQuery = "SELECT EmpID FROM seafarer_personal_details WHERE EmpID = $empID";
    $detailsResult = mysqli_query($connection, $detailsQuery);

    if ($detailsResult && mysqli_num_rows($detailsResult) > 0) {
        // Delete the associated personal details first
        $deleteDetailsQuery = "DELETE FROM seafarer_personal_details WHERE EmpID = $empID";
        if (mysqli_query($connection, $deleteDetailsQuery)) {
            // Now you can delete the user from seafarers_login
            $deleteUserQuery = "DELETE FROM seafarers_login WHERE username = '$removeUsername'";
            if (mysqli_query($connection, $deleteUserQuery)) {
                echo "Seafarer removed successfully.";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    } else {
        // If there are no associated personal details, you can directly delete the user from seafarers_login
        $deleteUserQuery = "DELETE FROM seafarers_login WHERE username = '$removeUsername'";
        if (mysqli_query($connection, $deleteUserQuery)) {
            echo "Seafarer removed successfully.";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
} else {
    echo "Error: Username not found.";
}

// Close the database connection
mysqli_close($connection);
?>
