<?php
// Example database connection code
$hostname = "localhost"; 
$username = "roots";
$password = "1234"; 
$database = "seaways";

// Create a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// include 'http://localhost/Seaways/php/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $dutyDescription = $_POST['dutyDescription'];
    $dutyDate = $_POST['dutyDate'];
    $shipID = $_POST['shipID'];
    $empID = $_POST['empID']; // Retrieve EmpID from the form
    
    // Insert the duty data into the database
    $insertSQL = "INSERT INTO seafarer_duties (EmpID, ShipID, DutyDescription, DutyDate) VALUES (?, ?, ?, ?)";

    // You should use prepared statements for security
    $stmt = mysqli_prepare($connection, $insertSQL);
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "iiss", $empID, $shipID, $dutyDescription, $dutyDate);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Duty added successfully
        header("Location: http://localhost/Seaways/Admin_panel/Duties.html"); // Redirect back to the duties page
        exit();
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($connection);
    }
    if (mysqli_stmt_execute($stmt)) {
        // Duty added successfully
        // Send a response to the HTML page
        echo "Duty added successfully";
        exit();
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($connection);
    }
    header("Location: http://localhost/Seaways/php/add_duty.php?success=1");

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($connection);
?>