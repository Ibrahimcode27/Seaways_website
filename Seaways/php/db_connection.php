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

// Example of verifying user credentials
$username = mysqli_real_escape_string($connection, $_POST['username']); // Escape user input
$password = $_POST['password'];

$sql = "SELECT * FROM seafarers_login WHERE username = '$username'";
// Execute the SQL query here
$result = mysqli_query($connection, $sql);
// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

// Check if a user with the provided username exists
if (mysqli_num_rows($result) == 1) {
    // Fetch the result
    $row = mysqli_fetch_assoc($result);
    
    // Verify the password
    if (password_verify($password, $row['password'])) {
        if ($row['Admin'] == 1) {
            // Redirect to the admin panel
            header("Location: http://localhost/Seaways/html/admin_panel.html");
            exit(); // Important to exit after redirect
        } else {
            // Store the EmpID in the session
            $_SESSION['EmpID'] = $row['EmpID'];
            
            // Redirect to the seafarer's home page
            header("Location: http://localhost/Seaways/php/home.php");
            exit(); // Important to exit after redirect
        }
    } else {
        // Password is incorrect
        echo "Incorrect password";
    }
} else {
    // User not found
    echo "User not found";
}

// Close the database connection
mysqli_close($connection);
?>
